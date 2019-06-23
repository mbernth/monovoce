<?php
/**
 * Archive for mono voce theme.
 *
 * @author mono voce aps
 * @package mono voce
 * @subpackage Customizations
 */

/*
Template Name: Archive Profile
*/


//* Add landing body class to the head
add_filter( 'body_class', 'work_archive_add_body_class' );
function work_archive_add_body_class( $classes ) {
	$classes[] = 'work-archive';
	return $classes;
}
//* Remove the entry title
remove_action( 'genesis_after_header', 'mono_title_reposition' );


// List post alphabetical ascending
/*
add_action( 'genesis_before_loop', 'work_list_order' );
function work_list_order() {
        global $query_string;
        query_posts( wp_parse_args( $query_string, array( 'orderby' => 'title', 'order' => 'ASC' ) ) );
}
*/

// Reposition archive description
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
add_action( 'genesis_after_header', 'rv_cpt_archive_title_description' );
function rv_cpt_archive_title_description() {

	$archive_settings = get_option( 'genesis-cpt-archive-settings-work' );

	echo '<article class="gridcontainer title-element">';
		echo '<div class="wrap">';
			echo '<section>';
				echo '<h1 lang="en" class="entry-title">'.$archive_settings['headline'].'</h1>';
				echo '<p>'.$archive_settings['intro_text'].'</p>';
			echo '</section>';
		echo '</div>';
		// echo '<canvas id="canvas"></canvas>';
	echo '</article>';
	
}

// Custom loop
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {
	
	if(have_posts()){
		echo '<section class="gridcontainer featured_cases">';
		echo '<div class="wrap">';
		while(have_posts()) : 
			the_post();
			// Repeat while content
			echo '<section>';

					$img = genesis_get_image( array( 'format' => 'src' ) );
					$work_thumbnail = get_field( 'featured_work_image' ); 
					
					if ( $work_thumbnail ){
						echo '<figure><a href="' . get_permalink() . '"><img src="'.$work_thumbnail['url'].'" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
					}else{
						echo '<figure><a href="' . get_permalink() . '"><img src="wp-content/themes/monovoce/images/thumb.png" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
					}
					

					echo '<div>';
					echo '<header><h4 lang="en"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4></header>';
					echo '<p><a href="' . get_permalink() . '">See the case</a></p>';
					echo '</div>';
			
			echo '</section>';

		endwhile;
		echo '</div>';
		echo '</section>';
	}else{
	}

}

//* Run the Genesis loop
genesis();
