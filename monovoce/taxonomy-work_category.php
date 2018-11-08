<?php
/**
 * This file adds the home template to the Convision Pro theme.
 *
 * @author mono voce aps
 * @package Convision Pro
 * @subpackage Customizations
*/

/*
Template Name: Profiles Taxonomy
*/

//* Add landing body class to the head
add_filter( 'body_class', 'works_taxonomy_add_body_class' );
function works_taxonomy_add_body_class( $classes ) {
	$classes[] = 'work-archive category-archive';
	return $classes;
}

//* Remove the entry title
remove_action( 'genesis_after_header', 'mono_title_reposition' );


// List post alphabetical ascending
add_action( 'genesis_before_loop', 'work_list_order' );
function work_list_order() {
        global $query_string;
        query_posts( wp_parse_args( $query_string, array( 'orderby' => 'title', 'order' => 'ASC' ) ) );
}

// Reposition archive description
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
add_action( 'genesis_after_header', 'rv_cpt_archive_title_description' );
function rv_cpt_archive_title_description() {
	$archive_settings = get_option( 'genesis-cpt-archive-settings-work' );

	echo '<article class="gridcontainer title-element">';
		echo '<div class="wrap">';
			echo '<section>';
				echo '<h1 class="entry-title">'.$archive_settings['headline'].'</h1>';
				echo '<p>'.$archive_settings['intro_text'].'</p>';
			echo '</section>';
		echo '</div>';
	echo '</article>';
	
}


remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 15 );


// Custom loop
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {
	
	if(have_posts()){
		echo '<section class="gridcontainer coll1 narrow archive-works">';
		echo '<div class="wrap">';
		while(have_posts()) : 
			the_post();
			echo '<article>';
				$img = genesis_get_image( array( 'format' => 'src' ) );
				if ($img){
					printf( '<figure><a href="' . get_permalink() . '"><img src="%s" alt="' . get_the_title() . '"></a></figure>', $img );
				}
					echo '<div class="work-info">';
					echo '<header><h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3></header>';
					echo '<footer class="post-meta-content">';
						echo '<ul>';
						$terms = get_the_terms( $works->ID , 'work_category' );
						foreach ( $terms as $term ) {
							$term_link = get_term_link( $term );
							if( is_wp_error( $term_link ) )
							continue;
							echo '<li><a href="' . $term_link . '">'.$term->name.'</a></li>';
						}
						echo '</ul>';
					echo '</footer>';
				echo '</div>';
			echo '</article>';
		endwhile;
		echo '</div>';
		echo '</section>';
	}else{
	}

}

//* Run the Genesis loop
genesis();