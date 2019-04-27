<?php
add_action( 'wp_enqueue_scripts', 'hyperion_theme_scripts' );

function hyperion_theme_scripts() {
    /*styles*/
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    /*scripts*/
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js');
    wp_enqueue_script( 'jquery', '', '', '', 'true' );
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', 'jquery', '', 'true');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', 'jquery', '', 'true');
}

add_action('wp_enqueue_scripts', 'myajax_data');
function myajax_data(){
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/main.js', 'jquery', '', 'true');
    wp_localize_script('ajax-script', 'myajax', array('url' => admin_url('admin-ajax.php')));
}

add_theme_support( 'post-thumbnails' );
add_image_size('user-thumb', 40, 40, true);

add_action( 'widgets_init', 'hyperionportal_widgets_init' );
function hyperionportal_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'hyperionportal' ),
        'id' => 'sidebar-main',
        'description' => __( 'Add widgets here.', 'hyperionportal' ),
        'before_widget' => '<p id="%1$s" class="widget %2$s">',
        'after_widget'  => '</p>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'wp_ajax_nopriv_search_user', 'search_user_callback' );
add_action('wp_ajax_search_user', 'search_user_callback');
function search_user_callback(){
    $searchQuery = $_POST['request'];
    //Get first and last NAMES
    $search_name = array(
        'meta_query' => array(
            'relation' => 'OR',
                array(
                    'key' => 'first_name',
                    'value' => $searchQuery,
                    'compare' => 'LIKE',
                    ),
                array(
                    'key' => 'last_name',
                    'value' => $searchQuery,
                    'compare' => 'LIKE',
                    ),
                )
        );
        $my_user_query = new WP_User_Query($search_name);
        $user_names = $my_user_query->get_results();
        $output = '<div>' . 'Result of searching by' . '<b> Name </b>' . 'fields:' . '</div>';
        // Check for user_names
        if (!empty($user_names)) {
            $output .= '<ul class="user_names-list">';
            // Loop over user_names.
            foreach ($user_names as $user_name) {
                $user_name_info = get_userdata($user_name->ID);
                $output .= '<li><span>User Name: ' . $user_name_info->display_name . '</span></li>';
                $output .= '<span>User First name: ' . get_the_author_meta('first_name', $user_name->ID) . '</span><br>';
                $output .= '<span>User Last name: ' . get_the_author_meta('last_name', $user_name->ID) . '</span>';
            }
            $output .= '</ul>';
        } else {
            // Display "no user_names found" message.
            $output .=  __('<p>' . 'No user_names found!' . '</p>');
        }
    echo $output;
    wp_die();
}

add_action( 'wp_ajax_nopriv_search_user_skype', 'search_user_skype' );
add_action('wp_ajax_search_user_skype', 'search_user_skype');
function search_user_skype(){
    $searchQuery = $_POST['request'];

    //Get skype nicks
    $search_skype_login = array(
        'meta_query' => array(
            array(
                'key' => 'skype',
                'value' => $searchQuery,
                'compare' => 'LIKE',
            )
        )
    );
    $my_user_query = new WP_User_Query( $search_skype_login );
    $user_skype_logins = $my_user_query->get_results();
    $output = '<div>' . 'Result of searching by' . '<b> Skype field: </b>' . '</div>';

    // Check for user_skype_logins
    if ( ! empty( $user_skype_logins ) ) {
        $output .= '<ul class="user_skype_logins-list">';
        // Loop over user_skype_logins.

        foreach ( $user_skype_logins as $user_skype_login ) {
            $user_skype_info = get_userdata( $user_skype_login->ID );
            $output .= '<li><span>User Name: ' . $user_skype_info->display_name . '</span></li>';
            $output .= '<span>User Skype: ' . get_the_author_meta( 'skype', $user_skype_login->ID ) . '</span>';
        }
        echo '</ul>';
    } else {
        // Display "no user_skype_logins found" message.
        $output .=  __( '<p>' . 'No user_skype_logins found!' . '</p>');
    }
    echo $output;
    wp_die();
}

add_action( 'wp_ajax_nopriv_search_user_nickname', 'search_user_nickname' );
add_action('wp_ajax_search_user_nickname', 'search_user_nickname');
function search_user_nickname(){
    $searchQuery = $_POST['request'];
    //Get Nicknames
    $search_nicknames = array(
        'search' => '*' . $searchQuery . '*',
    );
    $my_user_query = new WP_User_Query( $search_nicknames );

    $user_nicenames = $my_user_query->get_results();
    $output = '<div>' . 'Result of searching by' . '<b> Nickname field: </b>' . '</div>';
    if ( ! empty( $user_nicenames ) ) {
        $output .= '<ul class="user_nicenames-list">';

        foreach ( $user_nicenames as $user_nicename ) {
            $output .= '<li>' . get_the_author_meta('user_nicename', $user_nicename->ID ) . '</li>';
        }
        $output .= '</ul>';
    } else {
        $output .=  __( '<p>' . 'No user_nicenames found!' . '</p>');
    }
    echo $output;
    wp_die();
}

add_action( 'wp_ajax_nopriv_get_users_on_floor', 'get_users_on_floor' );
add_action('wp_ajax_get_users_on_floor', 'get_users_on_floor');
function get_users_on_floor(){
    $searchQuery = $_POST['request'];

    $get_users_on_floor = array(
        'meta_query' => array(
            array(
                'key' => 'floor',
                'value' => $searchQuery,
            )
        )
    );

    $my_user_query = new WP_User_Query( $get_users_on_floor );
    $get_users_on_floors = $my_user_query->get_results();
    $output = '<div>' . 'There are users on checked ' . '<b> Floor: </b>' . '</div>';
    if ( ! empty( $get_users_on_floors ) ) {
        $output .= '<ul class="user_names-list">';

        foreach ( $get_users_on_floors as $user_name ) {
            $user_name_info = get_userdata( $user_name->ID );
            $output .= '<li><span>User Name: ' . $user_name_info->display_name . '</span></li>';
            $output .= '<span>User First name: ' . get_the_author_meta('first_name', $user_name->ID) . '</span><br>';
            $output .= '<span>User Last name: ' . get_the_author_meta('last_name', $user_name->ID) . '</span>';
        }
        $output .= '</ul>';
    } else {
        // Display "no users found" message.
        $output .=  __( '<p>' . 'No users found on this floor!' . '</p>');
    }
    echo $output;
    wp_die();
}


