<?php
/**
 * Add new fields above 'Update' button at user profile.
 *
 * @param WP_User $user User object.
 */
/*
 *
 * USERS SIDE
 *
 * */
//include templates/user.php
function cup_additional_profile_fields( $user ) {
    //Birthday data
    $months 	= array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $default	= array( 'day' => '', 'month' => '', 'year' => '', );
    $birth_date = wp_parse_args( get_the_author_meta( 'birth_date', $user->ID ), $default );

    ?>
    <h3>Extra profile information</h3>

    <table class="form-table">
        <tr>
            <th><label for="birth-date-day">Birth date:</label></th>
            <td>
                <select id="birth-date-day" name="birth_date[day]">
                    <option value=""></option>
                    <?php
                    for ( $i = 1; $i <= 31; $i++ ) {
                        printf( '<option value="%1$s" %2$s>%1$s</option>', $i, selected( $birth_date['day'], $i, false ) );
                    }
                    ?></select>
                <select id="birth-date-month" name="birth_date[month]">
                    <option value=""></option>
                    <?php
                    foreach ( $months as $month ) {
                        printf( '<option value="%1$s" %2$s>%1$s</option>', $month, selected( $birth_date['month'], $month, false ) );
                    }
                    ?></select>
                <select id="birth-date-year" name="birth_date[year]">
                    <option value=""></option>
                    <?php
                    for ( $i = 1950; $i <= 2015; $i++ ) {
                        printf( '<option value="%1$s" %2$s>%1$s</option>', $i, selected( $birth_date['year'], $i, false ) );
                    }
                    ?></select>
            </td>
        </tr>
        <tr>
            <th><label for="team">Your team:</label></th>
            <td>
                <select id="team" name="team">
                    <option value="" selected="selected"></option>
                    <?php

                    $args = array(
                        'post_type'      => 'team',
                        'posts_per_page' => 999,
                        'order'          => 'ASC',
                        'orderby'        => 'none',
                    );

                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();

                            echo '<option value="'. get_the_ID() .'"'
                                . selected( get_the_ID(), get_the_author_meta( 'team', $user->ID))  . '>'
                                . get_the_title() . '</option>';
                        }
                    } else {
                    }
                    wp_reset_postdata();
                    ?></select>
            </td>
        </tr>
        <tr>
            <th><label for="po">Your Product Owner:</label></th>
            <td>
                <select id="po" name="po">
                    <option value="" selected="selected"></option>
                    <?php

                    $args = array(
                        'post_type'      => 'po',
                        'posts_per_page' => 999,
                        'order'          => 'ASC',
                        'orderby'        => 'none',
                    );

                    $query = new WP_Query( $args );

                    // The Loop
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();

                            echo '<option value="'. get_the_ID() .'"'
                                . selected( get_the_ID(), get_the_author_meta( 'po', $user->ID) )  . '>'
                                . get_the_title() . '</option>';
                        }
                    } else {
                    }
                    wp_reset_postdata();
                    ?></select>
            </td>
        </tr>
        <tr>
            <th><label for="floor">You working on the floor:</label></th>
            <td><?php
                $floors = get_option('floor');
                $user_floor = get_the_author_meta('floor', $user->ID);

                for ($i = 10; $i >= 1; $i--) {
                    $checked = ( $user_floor == $i ) ? 'checked' : '';

                    if( in_array($i, $floors) ) {
                        echo '<label><input id="floor-' . $i . '" type="radio" name="floor" value="'
                            . $i . '" ' . $checked . '>' . $i . ' floor</label><br>';
                    } else {
                        echo '<label><input id="floor-' . $i . '" type="radio" name="floor" value="'
                            . $i . '" disabled>' . $i . ' floor</label><br>';
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <th><label for="position">Your position:</label></th>
            <td><?php
                $positions = json_decode( get_option('position') );

                $users_positions_array = array();
                $users_positions_array = get_the_author_meta('position', $user->ID );
                $users_positions_array_integer = array_map('intval',  $users_positions_array);
                foreach ($positions as $position) {
                    $checked = ( in_array($position->id, $users_positions_array_integer) ) ? 'checked' : '';
                    if ( $checked ) {
                        echo '<div>
                                <label>
                                    <input type="checkbox" name="position[]" value="'. $position->id . '"' . $checked
                        . '>' .
                            $position->name
                            .  '</label>
                              </div>';
                    } else {
                        //$checked = ( in_array($position->id, $users_positions_array_integer) ) ? 'checked' : '';

                        echo '<div>
                                <label>
                                    <input type="checkbox" name="position[]" value="'. $position->id . '">' .
                            $position->name
                            .  '</label>
                              </div>';

                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <th><label for="phone">Your phone(s):</label></th>
            <td><?php
                $users_phones_array = array();
                $users_phones_array = get_the_author_meta('phone', $user->ID );

                if ( empty($users_phones_array) ) {
                    echo '<div><input type="tel" name="phone[]" value="" placeholder="095 111 22 33"></div>
                          <div><input type="tel" name="phone[]" value="" placeholder="063 111 22 33"></div>
                          <div><input type="tel" name="phone[]" value="" placeholder="097 111 22 33"></div>';
                } else {
                    for ( $i = 0; $i < count($users_phones_array); $i++) {
                        echo '<div><input type="tel" name="phone[]" value="' .  $users_phones_array[$i] . '"></div>';
                    };
                }
                ?>
            </td>
        </tr>
        <tr>
            <th><label for="skype">Your skype nickname:</label></th>
            <td><?php
                echo
                    '<div><input id="skype" type="text" name="skype" placeholder="Victoria" value="' .
                    get_the_author_meta( 'skype', $user->ID ) . '"></div>'
                ?>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'show_user_profile', 'cup_additional_profile_fields' );//Добавить свои собственные поля
add_action( 'edit_user_profile', 'cup_additional_profile_fields' );//Добавить свои собственные поля

/**
 * Save additional profile fields.
 * Save data from user profile
 * @param  int $user_id Current user ID.
 */
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
    //add array of checked items by user to db
    if ( isset( $_POST['position'] ) ) {
        $users_positions = $_POST['position'];
        /*$users_positions = array();

        foreach ($_POST['position'] as $check) {
            $users_positions[] = $check;
        }*/
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

/*
 *
 * PLUGIN SIDE
 *
 * */

/**
 *Add submenu to Users
 */

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

//Add Bootstrap styles to users.php page
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
    <!--Choose positions -->
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
                type="text" value="' . $position->name . '" disabled></input>
                      <button class="edit-save btn btn-outline-info btn-sm" type="button">Edit</button>
                      <button class=\'delete_position btn btn-outline-danger btn-sm\' type=\'button\'>Delete</button>
                      </div>';
            }
            ?>
        </form>
    </div>
    <?php
}

/** Register Scripts. */
add_action( 'admin_enqueue_scripts', 'add_cup_scripts', 100 );
function add_cup_scripts() {

    /** Add JavaScript Functions File */
    wp_enqueue_script( 'functions-js', plugins_url('functions.js', __FILE__) , array( 'jquery' ), '1.0', true );

    /** Localize Scripts */
    /*wp_localize_script( 'functions-js', 'ajax_name', array(
        'url' => admin_url('admin-ajax.php'),
    ) );*/
}

//send data to db
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

//edit and save data to db
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

//delete position from db
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
            settings_fields( 'option_group' );     // скрытые защитные поля
            do_settings_sections( 'floor_page' ); // секции с настройками (опциями). У нас она всего одна
            // 'section_id'
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Регистрируем настройки.
 * Настройки будут храниться в массиве, а не одна настройка = одна опция.
 */
add_action('admin_init', 'plugin_settings');
function plugin_settings(){
    // параметры: $option_group, $option_name, $sanitize_callback
    register_setting( 'option_group', 'floor');

    // параметры: $id, $title, $callback, $page
    add_settings_section( 'section_id', 'Check / uncheck floors', '', 'floor_page' );

    // параметры: $id, $title, $callback, $page, $section, $args
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