<?php
function cup_additional_profile_fields( $user ) {

    $months 	= array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $default	= array( 'day' => '', 'month' => '', 'year' => '', );
    $birth_date = wp_parse_args( get_the_author_meta( 'birth_date', $user->ID ), $default );

    include 'templates/user.html';
}

add_action( 'show_user_profile', 'cup_additional_profile_fields' );
add_action( 'edit_user_profile', 'cup_additional_profile_fields' );

function cup_save_profile_fields( $user_id ) {

    if ( isset( $_POST['birth_date'] ) ) {
        $birth_date = $_POST['birth_date'];
        update_user_meta( $user_id, 'birth_date', $birth_date );
    }
    if ( isset( $_POST['team'] ) ) {
        $team = $_POST['team'];
        update_user_meta( $user_id, 'team', $team );
    }
    if ( isset( $_POST['po'] ) ) {
        $product_owner = $_POST['po'];
        update_user_meta( $user_id, 'po', $product_owner );
    }
    if ( isset( $_POST['floor'] ) ) {
        $floor = $_POST['floor'];
        update_user_meta( $user_id, 'floor', $floor );
    }
    if ( isset( $_POST['position'] ) ) {
        $users_positions = $_POST['position'];
        update_user_meta( $user_id, 'position', $users_positions );
    } else {
        update_user_meta( $user_id, 'position', array() );
    }
    if ( isset( $_POST['phone'] ) ) {
        $phone = $_POST['phone'];
        update_user_meta( $user_id, 'phone', $phone );
    }
    if ( isset($_POST['skype']) ) {
        $skype = $_POST['skype'];
        update_user_meta( $user_id, 'skype', $skype );
    }
};

add_action( 'personal_options_update', 'cup_save_profile_fields' );
add_action( 'edit_user_profile_update', 'cup_save_profile_fields' );

function cup_options_page() {
    add_submenu_page(
        'users.php',
        'Positions',
        'Positions',
        'manage_options',
        'cup_positions',
        'cup_positions_options_page_html'
    );
}
add_action('admin_menu', 'cup_options_page');

function load_custom_wp_admin_style($users_page_cup_positions) {
    if($users_page_cup_positions != 'users_page_cup_positions') {
        return;
    }
    wp_enqueue_style( 'custom_wp_admin_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function company_settings_options_page() {
    add_menu_page(
        'Company_settings',
        'Company settings',
        'manage_options',
        'company_settings',
        'company_settings_page',
        'dashicons-admin-generic',
        27
    );
    add_submenu_page('company_settings', 'Settings floors', 'Floors', 'manage_options', 'settings_floors', 'floor_options_page_output');
}
add_action( 'admin_menu', 'company_settings_options_page' );
function company_settings_page ( ) {
    ?>
    <h2>Info:</h2>
    <?php
}

function cup_positions_options_page_html() {
    ?>
    <h2>Add new position:</h2>
    <div style="width: 450px; vertical-align: top;">
        <form id="position-form" action="" method="post">
            <label>
                <input type="text" name="position" id="position-field" value="New position">
            </label>
            <button class="btn btn-success btn btn-primary btn-sm" style="vertical-align: top;" id="submitFormButton" value="Add position"
                    type='button'>Add</button>
            <hr>
            <h4>Existing positions:</h4>
            <?php
            $positions = json_decode( get_option('position') );
            foreach ($positions as $position) {
                echo '<div class="position_row">
                        <input data-positionid="' . $position->id . '" name="position" class="position-input"
                type="text" value="' . $position->name . '" disabled>
                      <button class="edit-save btn btn-outline-info btn-sm" type="button">Edit</button>
                      <button class=\'delete_position btn btn-outline-danger btn-sm\' type=\'button\'>Delete</button>
                      </div>';
            }
            ?>
        </form>
    </div>
    <?php
}

add_action( 'admin_enqueue_scripts', 'add_cup_scripts', 100 );
function add_cup_scripts() {
    wp_enqueue_script( 'functions-js', plugins_url('functions.js', __FILE__) , array( 'jquery' ), '1.0', true );
}

add_action( 'wp_ajax_add_new_position', 'add_new_position_callback' );
function add_new_position_callback() {
    $positions_array = array();
    $result = get_option('position');
    if( $result ) {
        $result_array = json_decode( $result );
        $last_key = array_key_last($result_array);
        $last_id = $result_array[$last_key]->id;
        $result_array[] = array('id' => $last_id + 1, 'name' => $_POST['position']);
        $positions_array = $result_array;
    } else {
        $positions_array[] = array('id' => 0, 'name' => $_POST['position']);
    }

    update_option('position', json_encode($positions_array), 'no');

    wp_die();
};

add_action( 'wp_ajax_edit_position', 'edit_position_callback' );
function edit_position_callback(){
    $result = get_option('position');
    $result_array = (array)json_decode( $result );
    $pos_id = intval($_POST['id']);

    foreach ($result_array as $key => $value) {
        if ($result_array[$key]->id === $pos_id) {
            $result_array[$key]->name = $_POST['name'];
            break;
        }
    };

    update_option('position', json_encode($result_array));
    wp_die();
}

add_action( 'wp_ajax_delete_position', 'delete_position_callback' );
function delete_position_callback(){
    $result = get_option('position');
    $result_array = (array)json_decode( $result );
    $pos_id = intval($_POST['id']);

    foreach ($result_array as $key => $value) {
        if ($result_array[$key]->id === $pos_id) {
            unset($result_array[$key]);
            break;
        }
    }

    update_option('position', json_encode($result_array));
    wp_die();
}

function floor_options_page_output(){
    ?>
    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>

        <form action="options.php" method="POST">
            <?php
            settings_fields( 'option_group' );
            do_settings_sections( 'floor_page' );

            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'plugin_settings');
function plugin_settings(){
    register_setting( 'option_group', 'floor');
    add_settings_section( 'section_id', 'Check / uncheck floors', '', 'floor_page' );
    add_settings_field('floor_field', 'List of the floors:', 'fill_floor_field', 'floor_page', 'section_id' );
}

function fill_floor_field(){
    $floors = array();
    $floors = get_option('floor');

    echo '<br>';
    for ($i = 10; $i >= 1; $i--) {
        $checked = ( in_array("$i", $floors) ) ? 'checked' : '';
        echo '<label><input id="floor-' . $i . '" type="checkbox" name="floor[]" ' . $checked .
            ' value="' . $i . '">' . $i . ' floor</input></label><br>';
    }
}