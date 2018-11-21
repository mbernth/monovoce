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
	
	if(have_posts()){
		echo '<section class="gridcontainer coll1 archive-works">';
		echo '<div class="wrap">';
		while(have_posts()) : 
			the_post();
			// Repeat while content
			echo '<section class="featured_widget">';
				echo '<div class="featured_widget_thumb">';

					$img = genesis_get_image( array( 'format' => 'src' ) );
					$work_thumbnail = get_field( 'work_thumbnail' ); 
					echo '<div class="featured_widget_image">';
						if ( $work_thumbnail ){
							echo '<figure><a href="' . get_permalink() . '"><img src="'.$work_thumbnail['url'].'" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
						}else{
							echo '<figure><a href="' . get_permalink() . '"><img src="wp-content/themes/monovoce/images/thumb.png" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
						}
						/*
						if ($img){
							printf( '<figure><a href="' . get_permalink() . '"><img src="%s" alt="' . get_the_title() . '"></a></figure>', $img );
						}else{
							printf( '<figure><a href="' . get_permalink() . '"><img src="wp-content/themes/monovoce/images/thumb.png" alt="' . get_the_title() . '"></a></figure>' );
						}
						*/
					echo '</div>';

					echo '<div class="featured_widget_preview">';
					echo '<header><h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2></header>';
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
			
				echo '</div>';
			echo '</section>';

		endwhile;
		echo '</div>';
		echo '</section>';
	}else{
	}

}
/*
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
		echo '<section class="gridcontainer coll2 archive-works">';
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
*/
//* Run the Genesis loop
genesis();
