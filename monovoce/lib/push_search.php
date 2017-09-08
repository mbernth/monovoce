<?php

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header-search',
	'name'        => __( 'Above Header Search', 'monobrighton' ),
	'description' => __( 'This is the search widget area above header.', 'monobrighton' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-footer-search',
	'name'        => __( 'After Footer Search', 'monobrighton' ),
	'description' => __( 'This is the search widget area after footer.', 'monobrighton' ),
) );

//* Hook Search widget area above header
add_action( 'genesis_before', 'monobrighton_search_above', 15 );
function monobrighton_search_above() {

	genesis_widget_area( 'before-header-search', array(
		'before' => '<nav id="c-menu--push-top" class="c-menu c-menu--push-top widget-area"><div class="wrap"><span class="c-menu__close"><svg class="icon-cross"><use xlink:href="#icon-cross"></use></svg></span>',
		'after'  => '</div></nav><div id="c-mask" class="c-mask"></div>',
	) );

}
//* Hook Search widget area after footer
add_action( 'genesis_before_footer', 'monobrighton_search_after', 15 );
function monobrighton_search_after() {

	genesis_widget_area( 'after-footer-search', array(
		'before' => '<div class="footer_search"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

//* Push search
// =====================================================================================================================

add_filter( 'genesis_attr_site-container', 'themeprefix_site_container_id' );
function themeprefix_site_container_id( $attributes ) { 
 $attributes['id'] = 'o-wrapper';
 $attributes['class'] .= ' o-wrapper';
 return $attributes;
}

add_action( 'wp_enqueue_scripts', 'push_scripts_styles' );
function push_scripts_styles() {
		wp_enqueue_script( 'classie-script', get_bloginfo( 'stylesheet_directory' ) . '/js/menu.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'push-script', get_stylesheet_directory_uri() . '/js/menu_push.js', array( 'jquery' ), '1.0.0', true );
}

//* Costum Search form
// =====================================================================================================================

/*
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML. 
*/
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div>
	<span class="c-button_icon"><svg class="icon-search"><use xlink:href="#icon-search"></use></svg></span>
    <input class="input__field input__field--yoko" type="search" value="' . get_search_query() . '" name="s" id="s" />
	<label class="input__label input__label--yoko" for="s"><span class="input__label-content input__label-content--yoko">' . __( 'Search' ) . '</span></label>
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );