<?php // <- Don't add me in
// Gist updated to use code from Genesis Framework 2.4.2
//remove initial header functions
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );
//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'sm_genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'sm_genesis_header_markup_close', 15 );
add_action( 'genesis_header', 'sm_genesis_do_header' );

//New Header functions
function sm_genesis_header_markup_open() {
 genesis_markup( array(
 'html5' => '<header %s>',
 'context' => 'site-header',
 ) );
 /* Added in content
 echo '<div class="header-ghost"></div>';
 */
 genesis_structural_wrap( 'header' );
}
function sm_genesis_header_markup_close() {
 genesis_structural_wrap( 'header', 'close' );
 genesis_markup( array(
 'close' => '</header>',
 'context' => 'site-header',
 ) );
}

function sm_genesis_do_header() {
 global $wp_registered_sidebars;
 genesis_markup( array(
 'open' => '<div %s>',
 'context' => 'title-area',
 ) );
 // Added in content
 echo '<div class="site-id">
 		<a class="site-logo" href="' . esc_url( home_url( '/' ) ) . '">
 
<svg id="site-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.2 50">
  <defs>
    <style>
      .cls-1 {fill: #ef405c;}
    </style>
  </defs>
  <title>monovoce</title>
    <g id="logotype">
      <path class="cls-1" d="M434.07,406.86a21.91,21.91,0,0,0-15.45,6.29,21.92,21.92,0,0,0-15.5-6.29c-10.17,0-20.43,7.13-20.44,18.44l0,0v30.77h9.95V426.32h0c0-5.8,5.27-9.47,10.49-9.47s10.42,3.56,10.49,9.36v29.88h9.95V426.32h0c0-5.8,5.27-9.47,10.49-9.47s10.5,3.61,10.5,9.48h0v29.76h9.95V425.32h0C454.52,413.89,444.25,406.86,434.07,406.86Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M485.11,406.09c-13.78,0-23,10.17-23,25s9.23,25,23,25,23-10.13,23-25S498.9,406.09,485.11,406.09Zm0,39.36c-7.92,0-13.22-5.85-13.22-14.36s5.3-14.36,13.22-14.36,13.22,5.82,13.22,14.36S493,445.45,485.11,445.45Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M526,456.09V426.32h0c0-5.8,5.27-9.47,10.49-9.47s10.5,3.61,10.5,9.48h0v29.76H557V425.32h0c0-11.43-10.27-18.45-20.45-18.45S516.1,414,516.1,425.3l0,0v30.77Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M650.62,406.15l-9.75,36.4-.11.42a3.37,3.37,0,0,1-6.54,0l-.11-.42-9.75-36.4H614l10.47,39.07a13.17,13.17,0,0,0,25.93,0l10.47-39.07Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M588,406.09c-13.78,0-23,10.17-23,25s9.23,25,23,25,23-10.13,23-25S601.77,406.09,588,406.09Zm0,39.36c-7.92,0-13.22-5.85-13.22-14.36s5.3-14.36,13.22-14.36,13.22,5.82,13.22,14.36S595.9,445.45,588,445.45Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M686.41,406.09c-13.78,0-23,10.17-23,25s9.23,25,23,25,23-10.13,23-25S700.2,406.09,686.41,406.09Zm0,39.36c-7.92,0-13.22-5.85-13.22-14.36s5.3-14.36,13.22-14.36,13.22,5.82,13.22,14.36S694.33,445.45,686.41,445.45Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M749.5,440.9a12.55,12.55,0,0,1-10.05,4.55c-7.92,0-13.22-5.85-13.22-14.36s5.3-14.36,13.22-14.36a12.57,12.57,0,0,1,9.94,4.41l7.38-7.38c-4-4.84-10-7.66-17.32-7.66-13.78,0-23,10.17-23,25s9.23,25,23,25c7.34,0,13.39-2.87,17.44-7.8Z" transform="translate(-382.67 -406.09)"/>
      <path class="cls-1" d="M794.93,440.88a13.18,13.18,0,0,1-22.67-5.1h35.29a33.26,33.26,0,0,0,.33-4.7c0-14.87-9.23-25-23-25s-23,10.17-23,25,9.23,25,23,25c7.35,0,13.4-2.88,17.45-7.82Zm-10.06-24.16a12.47,12.47,0,0,1,12.45,9.11H772.42A12.49,12.49,0,0,1,784.86,416.73Z" transform="translate(-382.67 -406.09)"/>
    </g>
</svg>

 	</a>';
 do_action( 'genesis_site_title' );
 do_action( 'genesis_site_description' );
 
 genesis_markup( array(
 'close' => '</div></div>',
 'context' => 'title-area',
 ) );
 if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
 genesis_markup( array(
 'open' => '<div %s>' . genesis_sidebar_title( 'header-right' ),
 'context' => 'header-widget-area',
 ) );
 do_action( 'genesis_header_right' );
 add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 dynamic_sidebar( 'header-right' );
 remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 genesis_markup( array(
 'close' => '</div>',
 'context' => 'header-widget-area',
 ) );
 }
}