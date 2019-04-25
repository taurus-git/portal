<?php
//Init Team custom post type
add_action('init', 'team_init');
function team_init(){
    register_post_type('team', array(
        'labels'             => array(
            'name'               => 'Team',
            'singular_name'      => 'team',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new team',
            'edit_item'          => 'Edit team',
            'new_item'           => 'New team',
            'view_item'          => 'Watch team',
            'search_items'       => 'Find team',
            'not_found'          =>  'Any team did\'n finded',
            'not_found_in_trash' => 'No team in trashbox',
            'parent_item_colon'  => '',
            'menu_name'          => 'Teams'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-groups',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    ) );
}
//Init Product Owner custom post type
add_action('init', 'po_init');
function po_init(){
    register_post_type('po', array(
        'labels'             => array(
            'name'               => 'Product Owner',
            'singular_name'      => 'product_owner',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new Product Owner',
            'edit_item'          => 'Edit Product Owner',
            'new_item'           => 'New Product Owner',
            'view_item'          => 'Watch Product Owner',
            'search_items'       => 'Find Product Owner',
            'not_found'          =>  'Any Product Owner did\'n finded',
            'not_found_in_trash' => 'No Product Owner in trashbox',
            'parent_item_colon'  => '',
            'menu_name'          => 'Product Owner'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-businessman',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    ) );
}