<?php
/**
 * This file adds the home template to the mono pro.
 *
 * @author mono voce aps
 * @package mono pro
 * @subpackage Customizations
*/

/*
Template Name: Style Guide
*/

//* Add custom body class to the head
add_filter( 'body_class', 'style_guide_add_body_class' );
function style_guide_add_body_class( $classes ) {
   $classes[] = 'style-guide';
   return $classes;

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove before header
// remove_action( 'genesis_before_header', 'monobrighton_before_header', 15 );

// Remove secondary navigation
// remove_action( 'genesis_after_header', 'genesis_do_subnav' );

// Remove breadcrumbs
// remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');

//* Remove site footer widgets
// remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

// Setup Swatches
// include_once( get_stylesheet_directory() . '/lib/swatches.php' );
include_once( get_stylesheet_directory() . '/lib/palettes.php' );

// Setup Swatches
include_once( get_stylesheet_directory() . '/lib/typography.php' );

// Setup Flexible page content
include_once( get_stylesheet_directory() . '/lib/flexible_page_content.php' );

//* Run the Genesis loop
genesis();