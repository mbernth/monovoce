<?php

function create_works_post_type() {

   $labels = array(
        'name' => __( 'Works' ),
        'singular_name' => __( 'Work' ),
        'add_new' => _x('Add New Work', 'Works'),
        'add_new_item' => __('Add New Work'),
        'edit_item' => __('Edit Work'),
        'new_item' => __('New Work'),
        'all_items' => __('All Works'),
        'view_item' => __('View Work'),
        'search_items' => __('Search Works'),
        'not_found' =>  __('No works found'),
        'not_found_in_trash' => __('No works found in trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Works'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'mono voce works',
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'works'),
        'supports'  => array( 'title', 'editor', 'thumbnail', 'excerpt', 'genesis-cpt-archives-settings' )
    );

  register_post_type( 'work', $args);
}
add_action( 'init', 'create_works_post_type' );


function custom_taxonomies_works() {

    $labels = array(
        'name'              => _x( 'Work Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Work Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Work Categories' ),
        'all_items'         => __( 'All Work Categories' ),
        'parent_item'       => __( 'Parent Work Category' ),
        'parent_item_colon' => __( 'Parent Work Category:' ),
        'edit_item'         => __( 'Edit Work Category' ), 
        'update_item'       => __( 'Update Work Category' ),
        'add_new_item'      => __( 'Add New Work Category' ),
        'new_item_name'     => __( 'New Work Category' ),
        'menu_name'         => __( 'Work Categories' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'work_category', 'work', $args );
}
add_action( 'init', 'custom_taxonomies_works', 0 );

// Add support for the Genesis Scripts meta box on a custom post type
add_post_type_support( 'works', 'genesis-scripts' );
add_post_type_support( 'works', 'genesis-layouts' );