<?php
/**
 * @author mono voce aps
 * @package Convision Pro
*/

/*
Template Name: Profile Single
*/

//* Add landing body class to the head
add_filter( 'body_class', 'work_single_add_body_class' );
function work_single_add_body_class( $classes ) {
	$classes[] = 'work-single';
	return $classes;
}

remove_action ( 'genesis_after_header', 'single_post_featured_image', 15 );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
// add_action( 'genesis_entry_content', 'genesis_do_post_title', 5 );

add_action ( 'genesis_entry_content', 'single_work_post_featured_image', 1 );
function single_work_post_featured_image() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
        $img = genesis_get_image( array( 'format' => 'src' ) );
        $terms = get_the_terms( $post->ID , 'work_category' );

        echo '<div class="work-section"><figure><img src="'.$img.'"></figure>';
        the_title( '<div class="work-meta"><h1 class="work-title" itemprop="headline">', '</h1>' );
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term, 'work_category' );
				if( is_wp_error( $term_link ) )
                continue;
				echo '<a href="' . $term_link . '">'.$term->name.'</a> ';
			}
        echo '</div></div>';
    endif;
}

//* Add back link
add_action( 'genesis_entry_content', 'back_link', 20 );
function back_link() {
	if ( is_single() ) {
		echo '<p><a class="button button-info" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">' . __( 'Tilbage', 'mono' ) . '</a></p>';
	}
}

// Post next previous links
/*
add_action( 'genesis_after_entry', 'ja_prev_next_post_nav', 20 );
function ja_prev_next_post_nav() {
	if( is_single() || is_category( array( 'blog') ) ){
        echo '<selction class="post-navigation narrow">';
            echo '<div class="wrap">';
    			next_post_link( '<div class="previous"><svg class="icon-arrow-left7"><use xlink:href="#icon-arrow-left7"></use></svg> %link</div>', '%title' );
	    		previous_post_link( '<div class="next">%link <svg class="icon-untitled2"><use xlink:href="#icon-untitled2"></use></svg></div>', '%title' );	
            echo '</div>';
        echo '</section>';
	}
}
*/

// List all works
/*
add_action( 'genesis_after_entry', 'work_single_do_loop', 25 ); // Add custom loop
function work_single_do_loop() {
    $args = array(
		'post_type' => 'work', // enter your custom post type
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page'=> '2000', // overrides posts per page in theme settings
    );
    $loop = new WP_Query( $args );
    if( $loop->have_posts() ):
        echo '<ul>';
        while( $loop->have_posts() ): $loop->the_post(); global $post;
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        endwhile;
        echo '</ul>';
    endif;
}
*/


//* Run the Genesis loop
genesis();