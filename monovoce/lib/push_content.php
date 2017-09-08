<?php

// check if the Push content field has data
// =====================================================================================================================
add_action( 'genesis_after', 'mono_push_content', 15 );
function mono_push_content() {
	
	
	if( have_rows('content_row') ):
		while ( have_rows('content_row') ) : the_row();
			if( get_row_layout() == 'row_setup' ):
				while ( have_rows('column') ) : the_row();
				// $rows = get_field( 'push_content' );
				//	if($rows) {
					if (get_sub_field('push_article')){
						echo '<div class="overlay overlay-contentpush">';
						echo '<button type="button" class="overlay-close">Close</button><section>';
							the_sub_field('text_content');
						echo '</section></div>';
					}
				//	}
				endwhile;
			endif;
		endwhile;
	endif;	
}

add_action( 'wp_enqueue_scripts', 'push_scripts_jquery' );
function push_scripts_jquery() {
	$pushcontent = get_field('content_row');
	$push = get_sub_field( 'push_content' ); 
		
	if( have_rows('content_row') ):
	while ( have_rows('content_row') ) : the_row();
		if( get_row_layout() == 'row_setup' ){
		while ( have_rows('column') ) : the_row();
		if (get_sub_field('push_article')){
			wp_enqueue_script( 'classie-push-script', get_bloginfo( 'stylesheet_directory' ) . '/js/classie.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'push-script-jquery', get_stylesheet_directory_uri() . '/js/push.js', array( 'jquery' ), '1.0.0', true );
		}
		endwhile;
		}
	endwhile;
	endif;
}