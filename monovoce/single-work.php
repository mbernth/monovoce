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

add_action ( 'genesis_after_entry', 'single_work_post_featured_image', 10 );
function single_work_post_featured_image() {
    if ( (is_single() || is_page()) ) :
        
        $img = genesis_get_image( array( 'format' => 'src' ) );
        $terms = get_the_terms( $post->ID , 'work_category' );
        $client_name = get_field('client_name');
        $project_link = get_field('project_link');
        $brief = get_field('brief');
        $solution = get_field('solution');

        echo '<section class="gridcontainer work-grid">';
            echo '<div class="wrap">';

                echo '<article class="work-info">';
                    echo '<section class="work-client">';
                        echo '<h4>Client</h4><h5>'.$client_name.'</h5>';
                    echo '</section>';
                    if($brief){
                    echo '<section class="work-brief">';
                        echo '<h4>Brief</h4>'.$brief.'';
                    echo '</section>';
                    }
                    if($solution){
                        echo '<section class="work-solution">';
                            echo '<h4>Solutions</h4>'.$solution.'';
                        echo '</section>';
                        }
                echo '</article>';
                echo '<aside class="work-data">';
                    if ($project_link){
                        echo '<section class="work-data-website">';
                            echo '<h4>Visit the website</h4>';
                            echo '<a href="'.$project_link.'" target="_blank" rel="noreferrer">'.$project_link.'</a>';
                        echo '</section>';
                    }
                    echo '<section class="work-data-list">';
                        echo '<h4>What we did</h4>';
                        echo '<ul class="work-list">';
		    	        foreach ( $terms as $term ) {
			    	        $term_link = get_term_link( $term, 'work_category' );
				            if( is_wp_error( $term_link ) )
                            continue;
				            echo '<li><a href="' . $term_link . '">'.$term->name.'</a></li>';
                        }
                        echo '</ul>';
                    echo '</section>';
                echo '</aside>';
            
            echo '</div>';
        echo '</section>';
    endif;
}

//* Add back link
/*
add_action( 'genesis_after_entry', 'back_link', 20 );
function back_link() {
	if ( is_single() ) {
		echo '<p><a class="button button-info" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">' . __( 'Tilbage', 'mono' ) . '</a></p>';
	}
}
*/

// Post next previous links

add_action( 'genesis_after_entry', 'ja_prev_next_post_nav', 20 );
function ja_prev_next_post_nav() {
	if( is_single() || is_category( array( 'blog') ) ){
        echo '<selction class="post-navigation narrow">';
            echo '<div class="wrap">';
    			next_post_link( '<div class="previous"><span><svg class="icon-arrow-left7"><use xlink:href="#icon-arrow-left7"></use></svg> %link</span></div>', '%title' );
	    		previous_post_link( '<div class="next"><span>%link <svg class="icon-untitled2"><use xlink:href="#icon-untitled2"></use></svg></span></div>', '%title' );	
            echo '</div>';
        echo '</section>';
	}
}


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