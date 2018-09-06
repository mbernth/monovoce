<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Include Icons
include_once( get_stylesheet_directory() . '/lib/svg_icomoon.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Setup custom header
include_once( get_stylesheet_directory() . '/lib/custom-header.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'mono', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'mono' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'mono voce' );
define( 'CHILD_THEME_URL', 'https://github.com/mbernth/monovoce' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'mono_enqueue_scripts' );
function mono_enqueue_scripts() {
	// Responsive menu
	// wp_enqueue_script( 'mono-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-multi-level-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/mono-multi-level-menu.js', array( 'jquery' ), '1.0.0' );
	// Jquery 1.9.1
	wp_enqueue_script( 'mono-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', array( 'jquery' ), '1.0.0' );
	// Responsive text for selected headlines
	wp_enqueue_script( 'mono-fittext', get_stylesheet_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ), '1.0.0', true );
	// Responsive movie scripts
	wp_enqueue_script( 'mono-fitvids-script', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.0', true );
	// Hide and show header
	wp_enqueue_script( 'jquery-headroom', get_bloginfo( 'stylesheet_directory' ) . '/js/jQuery.headroom.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'headroom', get_bloginfo( 'stylesheet_directory' ) . '/js/headroom.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'headroom-action', get_bloginfo( 'stylesheet_directory' ) . '/js/headroom_action.js', array( 'jquery' ), '1.0.0', true );
}

/* Enqueue Fonts
add_action( 'wp_enqueue_scripts', 'mono_enqueue_fonts' );
function mono_enqueue_fonts() {
	// Dashicons
	wp_enqueue_style( 'dashicons' );
}
*/

//* Disable the superfish script
//* This is the Genesis Default Menu
add_action( 'wp_enqueue_scripts', 'sp_disable_superfish' );
function sp_disable_superfish() {
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/** Conditional html element classes */
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <?php
}

//* Add custom meta tag for mobile browsers
add_action( 'genesis_meta', 'mono_viewport_meta_tag' );
function mono_viewport_meta_tag() {
	echo '<meta name="HandheldFriendly" content="True">';
	echo '<meta name="MobileOptimized" content="320">';
}
// Change favicon location and add touch icons
add_filter( 'genesis_pre_load_favicon', 'mono_favicon_filter' );
function mono_favicon_filter( $favicon ) {
	echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon.ico" type="image/x-icon" />';
	echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-16x16.png" sizes="16x16">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-32x32.png" sizes="32x32">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-96x96.png" sizes="96x96">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/android-chrome-192x192.png" sizes="192x192">';
	echo '<meta name="msapplication-square70x70logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//smalltile.png" />';
	echo '<meta name="msapplication-square150x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//mediumtile.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//widetile.png" />';
	echo '<meta name="msapplication-square310x310logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//largetile.png" />';

}

//* Add svg upload
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );	

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );
// add_theme_support( 'genesis-accessibility', array( 'headings', 'search-form', 'skip-links', 'rems' ) );

//* Position elemente
// =====================================================================================================================

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Move breadcrumbs
remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
add_action('genesis_after_header', 'genesis_do_breadcrumbs', 20);

add_filter( 'genesis_breadcrumb_args', 'crunchify_custom_breadcrumb_args' );
function crunchify_custom_breadcrumb_args( $args ) {
	$args['home'] = 'Home';   // Home Page
	$args['sep'] = ' <svg class="icon-arrow-right6"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right6"></use></svg> ';  // My favorite arrow
	$args['list_sep'] = ', '; 
	$args['prefix'] = '<div class="breadcrumb"><div class="wrap">';
	$args['suffix'] = '</div></div>';
	$args['heirarchial_attachments'] = true; 
	$args['heirarchial_categories'] = true; 
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = 'Archives for ';
	$args['labels']['category'] = 'Archives for '; 
	$args['labels']['tag'] = 'Archives for ';
	$args['labels']['date'] = 'Archives for ';
	$args['labels']['search'] = 'Search for ';
	$args['labels']['tax'] = 'Archives for ';
	$args['labels']['post_type'] = 'Archives for ';
	$args['labels']['404'] = 'Not found: '; 
return $args;
}


//* Widgets
// =====================================================================================================================

//* Remove the header right widget area
unregister_sidebar( 'header-right' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'mono' ),
	'description' => __( 'This is the before header widget area.', 'mono' ),
) );
genesis_register_sidebar( array(
	'id'          => 'featured_works',
	'name'        => __( 'Featured Works', 'mono' ),
	'description' => __( 'This is the featured works widget area.', 'mono' ),
) );


//* Hook before header widget area above header
add_action( 'genesis_before_header', 'mono_before_header', 15 );
function mono_before_header() {

	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

//* Reposition Entry Title
// =====================================================================================================================

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action ( 'genesis_after_header', 'mono_title_reposition' );
function mono_title_reposition(){
	if ( (! has_post_thumbnail()) ) :
		the_title( '<div class="gridcontainer title-element"><div class="wrap"><h1 class="entry-title" itemprop="headline">', '</h1></div></div>' );
	endif;
}

//* Featured Image
// =====================================================================================================================

//* DISPLAY FULL WIDTH FEATURED IMAGE ON STATIC PAGES
add_action ( 'genesis_after_header', 'single_post_featured_image', 15 );
function single_post_featured_image() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
		
		remove_action( 'genesis_after_header', 'mono_title_reposition' );
		remove_action( 'genesis_after_header', 'mono_title_reposition' );

		$img = genesis_get_image( array( 'format' => 'src' ) );
		printf( '<div class="featured-section" style="background-image:url(%s);"><div class="image-section">', $img );
		the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
		printf('</div></div>');
		// elseif( (! is_front_page()) ):
		// printf( '<div class="image-section" style="background-color:#231f20;"></div>', $img );
		
		
	endif;
	
}

add_filter( 'body_class', 'featured_body_class' );
function featured_body_class( $classes ) {
	
	if ( ( is_single( )  || is_page()) && has_post_thumbnail() )
		$classes[] = 'featured-image';
		return $classes;
		
}
// =====================================================================================================================

//* Advanced Custom Fields includes
// =====================================================================================================================

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/flexible_grids_content.php' );

// =====================================================================================================================

//* Gravity forms
// =====================================================================================================================

// Enables the confirmation anchor on all forms
add_filter( 'gform_confirmation_anchor', '__return_true' );


//* Post archive page
// =====================================================================================================================


//* Customize the next page link
add_filter ( 'genesis_next_link_text' , 'sp_next_page_link' );
function sp_next_page_link ( $text ) {
    return '<svg class="icon-arrow-right5"><use xlink:href="#icon-arrow-right5"></use></svg>';
}
//* Customize the previous page link
add_filter ( 'genesis_prev_link_text' , 'sp_previous_page_link' );
function sp_previous_page_link ( $text ) {
    return '<svg class="icon-arrow-left5"><use xlink:href="#icon-arrow-left5"></use></svg>';
}

//* Custom post types
// =====================================================================================================================
include_once( get_stylesheet_directory() . '/lib/works_post_type.php' );