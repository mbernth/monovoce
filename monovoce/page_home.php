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

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_hero_slider' );
function enqueue_scripts_hero_slider() {
	$turn_on_slider = get_field( 'turn_on_slider' );

	if ($turn_on_slider){
		// wp_enqueue_script( 'mono-flip-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0' );
		// wp_enqueue_script( 'mono-modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.min.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'frontpage-owl-min', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'frontpage-owl', get_stylesheet_directory_uri() . '/js/owl.frontslider.js', array( 'jquery' ), '1.0.0', true );
	}
	
}
add_filter( 'body_class', 'slider_body_class' );
function slider_body_class( $classes ) {
	$turn_on_slider = get_field( 'turn_on_slider' );
	if ( $turn_on_slider )
		$classes[] = 'has-owl-slider';
		return $classes;
		
}

// check if the flexible content field has rows of data
/*
add_action( 'genesis_after_header', 'mono_hero_element' );
function mono_hero_element() {
	$maintext = get_field( 'main_text' );
	$turn_on_slider = get_field( 'turn_on_slider' );
	$loopCount = 0;

	
	if ($turn_on_slider){
		if ( have_rows( 'slider_images' ) ) :

			if ($maintext):
				echo '<div class="gridcontainer non hero slider">';
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
					
					
					echo '<div id="owl-slider" class="owl-carousel owl-theme">';
						while ( have_rows( 'slider_images' ) ) : the_row();
						$slide_image = get_sub_field( 'slide_image' );
	
							if ( $slide_image ) {
								echo '<div class="item frame'.$loopCount.'">';
									echo '<div class="featured-section" style="background-image:url('.$slide_image['url'].');">';
										echo '<div class="image-section"></div>';
									echo '</div>';
								echo '</div>';
								$loopCount ++;
							}
	
						endwhile;
					echo '</div>';
					

				echo '</div>';
			else:
			endif;

		else :
			// no rows found
		endif;
	}else{
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
				// echo '<canvas id="canvas"></canvas>';
			echo '</div>';
		else:
		endif;
	}
}
*/

// check if the flexible content field has rows of data
add_action( 'genesis_after_header', 'mono_hero_element' );
function mono_hero_element() {
	$maintext = get_field( 'main_text' );
	$turn_on_slider = get_field( 'turn_on_slider' );
	$loopCount = 0;

	
	if ($turn_on_slider){
		if ( have_rows( 'slider_images' ) ) :			
					
				echo '<div class="gridcontainer non">';
				echo '<div class="wrap">';
					echo '<div id="owl-slider" class="owl-carousel owl-theme">';
						while ( have_rows( 'slider_images' ) ) : the_row();
						$slide_image = get_sub_field( 'slide_image' );
	
							if ( $slide_image ) {
								echo '<div class="item frame'.$loopCount.'">';
									echo '<div class="featured-section" style="background-image:url('.$slide_image['url'].');">';
										echo '<div class="image-section"></div>';
									echo '</div>';
								echo '</div>';
								$loopCount ++;
							}
	
						endwhile;
					echo '</div>';
				echo '</div>';
				echo '</div>';
					
		else :
			// no rows found
		endif;
	}else{
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
				// echo '<canvas id="canvas"></canvas>';
			echo '</div>';
		else:
		endif;
	}
}

//* Run the Genesis loop
genesis();
