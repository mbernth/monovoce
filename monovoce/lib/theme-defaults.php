<?php

//* Simple Social Icon Defaults
add_filter( 'simple_social_default_styles', 'altitude_social_default_styles' );
function altitude_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'alignleft',
		'background_color'       => '#2d2d2d',
		'background_color_hover' => '#595a59',
		'border_radius'          => 0,
		'icon_color'             => '#dfe1df',
		'icon_color_hover'       => '#dfe1df',
		'size'                   => 36,
		);
		
	$args = wp_parse_args( $args, $defaults );
	
	return $args;
	
}