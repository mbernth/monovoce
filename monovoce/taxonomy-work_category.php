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
	$classes[] = 'work-archive';
	return $classes;
}

// add_action( 'genesis_before_entry', 'genesis_do_taxonomy_title_description', 15 );

/*
add_action( 'genesis_before_content', 'work_output_category_info' );
function work_output_category_info() {
	if ( is_category() || is_tag() || is_tax() ) {
		echo '<article class="gridcontainer archive-works-description coll1 narrow"><div class="wrap transparent">';
		echo '<section>';
		echo term_description();
		echo '</section></div></article>';
	}
}
*/

/*
//* Add featured image to category
add_action( 'genesis_after_header', 'works_top_image', 15 );
function works_top_image() {

	if ( z_taxonomy_image_url() ) {
        
        remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
		// remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		echo '<div class="featured-section" style="background: url(';
			if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url();
        echo ') no-repeat center; background-size: cover;"><div class="image-section"><h1 class="entry-title" itemprop="headline">';
        single_cat_title();
		// the_title( '<h1 class="entry-title" itemprop="headline"><span>', '</span></h1>' );
		echo '</h1><span class="bounce"><svg class="icon-arrow-down7"><use xlink:href="#icon-arrow-down7"></use></svg></span></div></div>';
		
	}
	
}

add_filter( 'body_class', 'works_add_body_class' );
function works_add_body_class( $catclass ) {
	if (z_taxonomy_image_url()){
		$catclass[] = 'featured-image';
		return $catclass;
		}else{
		$catclass[] = 'not-featured-image';
		return $catclass;	
	}

}
*/
/*
//* Remove the post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

function mono_do_query() {
 
    if( is_category() || is_tag() || is_tax() ){
        global $query_string;
 
        query_posts( wp_parse_args( $query_string, array( 'orderby' => 'title', 'order' => 'ASC' ) ) );
    }
 
}
add_action( 'genesis_before_loop', 'mono_do_query' );
*/

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );

// Reposition archive description
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
add_action( 'genesis_before_content', 'rv_cpt_archive_title_description' );
function rv_cpt_archive_title_description() {
	/**
	 *	Genesis stores the archive settings in an option (array) named genesis-cpt-archive-settings-{post_type}
	 *	This example uses a custom post type called 'service'
	 */
	$archive_settings = get_option( 'genesis-cpt-archive-settings-work' );

	echo '<article class="gridcontainer archive-works-description coll1 narrow">';
		echo '<div class="wrap">';
			echo '<section>';
				echo '<h1 class="entry-title">'.$archive_settings['headline'].'</h1>';
				echo '<p>'.$archive_settings['intro_text'].'</p>';
			echo '</section>';
		echo '</div>';
	echo '</article>';
	
}

// Custom loop
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {
	$args = array(
		'post_type' => 'work', // enter your custom post type
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page'=> '2000', // overrides posts per page in theme settings
	);

	$loop = new WP_Query( $args );
	if( $loop->have_posts() ):
		echo '<section class="gridcontainer coll2 narrow archive-works">';
		echo '<div class="wrap">';
		while( $loop->have_posts() ): $loop->the_post(); global $post;
			echo '<article>';
				$img = genesis_get_image( array( 'format' => 'src' ) );
				printf( '<figure><a href="' . get_permalink() . '"><img src="%s" alt="' . get_the_title() . '"></a></figure>', $img );
				echo '<div class="work-info">';
					echo '<header><h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3></header>';
					echo '<footer class="post-meta-content">';
					$terms = get_the_terms( $post->ID , 'work_category' );
						foreach ( $terms as $term ) {
							$term_link = get_term_link( $term, 'work_category' );
							if( is_wp_error( $term_link ) )
                        	continue;
							echo '<a href="' . $term_link . '">'.$term->name.'</a> ';
					}
					echo '</footer>';
				echo '</div>';
			echo '</article>';
		endwhile;
		echo '</div>';
		echo '</article>';
	endif;
}

//* Run the Genesis loop
genesis();