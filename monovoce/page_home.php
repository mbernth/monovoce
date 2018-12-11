<?php
/**
 * This file adds the home template to the mono pro.
 *
 * @author mono voce aps
 * @package mono pro
 * @subpackage Customizations
*/

/*
Template Name: Home
*/

/*
add_action( 'wp_enqueue_scripts', 'hero_enqueue_scripts' );
function hero_enqueue_scripts() {
	wp_enqueue_script( 'tween-max', get_bloginfo( 'stylesheet_directory' ) . '/js/TweenMax.min.js', array( 'jquery' ), '1.18.0', true );
	wp_enqueue_script( 'canvas_red', get_bloginfo( 'stylesheet_directory' ) . '/js/canvas_red.js', array( 'jquery' ), '1.0.0', true );
}
*/

//* Add custom body class to the head
add_filter( 'body_class', 'home_add_body_class' );
function home_add_body_class( $classes ) {

   $classes[] = 'home-section';
   return $classes;
   
}

//* Remove custom background
remove_theme_support( 'custom-background');

//* Remove the entry title
remove_action( 'genesis_after_header', 'mono_title_reposition' );


//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Hero element
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_header', 'mono_hero_element' );
function mono_hero_element() {
	$maintext = get_field( 'main_text' );

	if ($maintext):
		echo '<div class="gridcontainer non hero">';
			echo '<div class="wrap">';
				echo '<h1 class="hero-text">'.$maintext.'<br>';
					if ( have_rows( 'text_animation' ) ) :
						while ( have_rows( 'text_animation' ) ) : the_row();
						$word = get_sub_field( 'word' );
							echo '<span>'.$word.'</span>';
						endwhile;
					else :
					// no rows found
					endif;
				echo '</h1>';
			echo '</div>';

			echo '<div class="bounce"><svg class="icon-arrow-down7"><use xlink:href="#icon-arrow-down7"></use></svg></div>';
		    echo '<canvas id="canvas"></canvas>';
		echo '</div>';
	else:
	endif;
	
}

//* Run the Genesis loop
genesis();
