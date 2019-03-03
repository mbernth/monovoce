<?php
/**
 * This file adds the slider template to the mono pro.
 *
 * @author mono voce aps
 * @package mono pro
 * @subpackage Customizations
*/

/*
Template Name: Slider
*/

//* Add custom body class to the head
add_filter( 'body_class', 'home_add_body_class' );
function home_add_body_class( $classes ) {

   $classes[] = 'page-slider';
   return $classes;
   
}

//* Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_slider_images' );
function enqueue_scripts_slider_images() {
    wp_enqueue_script( 'flickity', get_stylesheet_directory_uri() . '/js/flickity.pkgd.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'flickity-fade', get_stylesheet_directory_uri() . '/js/flickity-fade.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'flickity-mono', get_stylesheet_directory_uri() . '/js/flickity.mono.js', array( 'jquery' ), '1.0.0', true );
}

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_slider_images', 15 );
function mono_slider_images() {
    echo '<article class="gridcontainer coll1">';
    echo '<div class="wrap">';
    echo '<section>';
    if ( have_rows( 'slider' ) ) :
        echo '<div class="main-carousel">';
        
        while ( have_rows( 'slider' ) ) : the_row();
            $image = get_sub_field( 'image' );
            echo '<div class="carousel-cell">';
		        if ( get_sub_field( 'image' ) ) {
                    // echo '<img src="'.$image['url'].'" />';
                    echo '<div style="width:1000px; background-image:url('.$image['url'].');">';
						echo '<div style="height:100vh;"></div>';
					echo '</div>';
                }
            echo '</div>';
	    endwhile;

        echo '</div>';
    else :
	    // no rows found
    endif;
    echo '</div>';
    echo '</section>';
    echo '</article>';
}


//* Run the Genesis loop
genesis();
