<?php
/**
 * This file adds the 404 template to the mono pro.
 *
 * @author mono voce aps
 * @package mono pro
 * @subpackage Customizations
 */
 
 /*
Template Name: 404 page
*/

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {

	echo genesis_html5() ? '<article class="gridcontainer  coll1">' : '';

		printf( '<h1 class="row_headline">%s</h1>', apply_filters( 'genesis_404_entry_title', __( 'Well, that was embarrassing. The page you were looking for could not be found', 'genesis' ) ) );
		echo '<div class="wrap">';

			if ( genesis_html5() ) :
				echo '<div>';
				echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'genesis' ), trailingslashit( home_url() ) ) . '</p>' );
				echo '</div>';
				echo '<div>';
					get_search_form();
				echo '</div>';

			else :
	?>

			<p><?php printf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'genesis' ), trailingslashit( home_url() ) ); ?></p>



	<?php
			endif;
			/*
			if ( genesis_a11y( '404-page' ) ) {
				echo '<h2>' . __( 'Sitemap', 'genesis' ) . '</h2>';
				genesis_sitemap( 'h3' );
			} else {
				genesis_sitemap( 'h4' );
			}
			*/
			echo '</div>';

		echo genesis_html5() ? '</article>' : '';

}



genesis();