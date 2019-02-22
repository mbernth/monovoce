<?php
/**
 * This file adds the contact template to the mono pro.
 *
 * @author mono voce aps
 * @package mono pro
 * @subpackage Customizations
*/

/*
Template Name: Contact
*/

//* Add custom body class to the head
add_filter( 'body_class', 'home_add_body_class' );
function home_add_body_class( $classes ) {

   $classes[] = 'page-contact';
   return $classes;
   
}

//* Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


//* Run the Genesis loop
genesis();
