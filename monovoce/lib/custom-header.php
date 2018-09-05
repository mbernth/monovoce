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

      <svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 50">
        <title>monovoce - future friendly design</title>
        <g id="logotype">
          <path id="e" d="M387.82,33a12.4,12.4,0,0,1-21.33-4.8h33.2a31.61,31.61,0,0,0,.31-4.42c0-14-8.68-23.52-21.65-23.52s-21.64,9.57-21.64,23.52,8.68,23.52,21.64,23.52c6.91,0,12.61-2.71,16.42-7.35Zm-9.47-22.73a11.72,11.72,0,0,1,11.71,8.57H366.65A11.74,11.74,0,0,1,378.35,10.22Z" transform="translate(0 -0.21)"/>
          <path id="c" d="M345.08,33a11.79,11.79,0,0,1-9.45,4.28c-7.45,0-12.44-5.5-12.44-13.51s5-13.51,12.44-13.51A11.81,11.81,0,0,1,345,14.37l6.95-6.95c-3.81-4.55-9.46-7.21-16.3-7.21C322.66.21,314,9.78,314,23.73s8.68,23.52,21.64,23.52c6.91,0,12.6-2.7,16.41-7.34Z" transform="translate(0 -0.21)"/>
          <path id="o" d="M285.73.21c-13,0-21.64,9.57-21.64,23.52s8.68,23.52,21.64,23.52,21.65-9.53,21.65-23.52S298.7.21,285.73.21Zm0,37c-7.45,0-12.44-5.5-12.44-13.51s5-13.51,12.44-13.51,12.43,5.47,12.43,13.51S293.19,37.24,285.74,37.24Z" transform="translate(0 -0.21)"/>
          <path id="v" d="M252.06.27l-9.17,34.24-.11.4a3.17,3.17,0,0,1-6.15,0l-.11-.4L227.34.27h-9.68L227.51,37a12.38,12.38,0,0,0,24.39,0L261.75.27Z" transform="translate(0 -0.21)"/>
          <path id="o-2" data-name="o" d="M193.14.21c-13,0-21.64,9.57-21.64,23.52s8.68,23.52,21.64,23.52,21.65-9.53,21.65-23.52S206.11.21,193.14.21Zm0,37c-7.45,0-12.43-5.5-12.43-13.51s5-13.51,12.43-13.51,12.44,5.47,12.44,13.51S200.59,37.24,193.14,37.24Z" transform="translate(0 -0.21)"/>
          <path id="n" d="M134.86,47.25v-28h0c0-5.46,5-8.9,9.87-8.9s9.88,3.39,9.88,8.91h0v28H164V18.3h0C164,7.55,154.32,1,144.74,1s-19.22,6.71-19.22,17.34h0v29Z" transform="translate(0 -0.21)"/>
          <path id="o-3" data-name="o" d="M96.37.21c-13,0-21.65,9.57-21.65,23.52S83.4,47.25,96.37,47.25,118,37.72,118,23.73,109.34.21,96.37.21Zm0,37c-7.45,0-12.44-5.5-12.44-13.51s5-13.51,12.44-13.51,12.43,5.47,12.43,13.51S103.82,37.24,96.37,37.24Z" transform="translate(0 -0.21)"/>
          <path id="m" d="M48.35,1A20.58,20.58,0,0,0,33.82,6.86,20.63,20.63,0,0,0,19.24,1C9.67,1,0,7.66,0,18.29H0v29H9.36v-28h0c0-5.46,5-8.9,9.87-8.9s9.81,3.35,9.87,8.8V47.25h9.36v-28h0c0-5.46,5-8.9,9.87-8.9s9.88,3.39,9.88,8.91h0v28h9.35V18.3h0C67.59,7.55,57.93,1,48.35,1Z" transform="translate(0 -0.21)"/>
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