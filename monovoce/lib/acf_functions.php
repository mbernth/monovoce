<?php

/*
Advanced custom fields functionality
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
*/

//* Scripts for ACF functions
add_action( 'wp_enqueue_scripts', 'acf_scripts' );
function acf_scripts() {

	// Flip script
	wp_enqueue_script( 'mono-flip-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-flip', get_bloginfo( 'stylesheet_directory' ) . '/js/mono_flip.js', array( 'jquery' ), '1.0.0' );
	// Timeline script
	wp_enqueue_script( 'moono-timeline', get_bloginfo( 'stylesheet_directory' ) . '/js/timeline.js', array( 'jquery' ), '1.0.0' );
	// Countdown script
	wp_enqueue_script( 'countdown', get_stylesheet_directory_uri() . '/js/countdown.js', array( 'jquery' ), '1.0.0' );
	// Quotes scripts
	wp_enqueue_script( 'quotes', get_stylesheet_directory_uri() . '/js/quotes.js', array( 'jquery' ), '1.0.0' , true);
	wp_enqueue_script( 'quote_action', get_stylesheet_directory_uri() . '/js/quote_action.js', array( 'jquery' ), '1.0.0' , true);
	// Split slider
	wp_enqueue_script( 'ba-cond', get_stylesheet_directory_uri() . '/js/jquery.ba-cond.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'slitslider', get_stylesheet_directory_uri() . '/js/jquery.slitslider.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'slide-nav', get_stylesheet_directory_uri() . '/js/slide.nav.js', array( 'jquery' ), '1.0.0', true );
	// Flickity
	wp_enqueue_script( 'flickity', get_stylesheet_directory_uri() . '/js/flickity.pkgd.min.js', array( 'jquery' ), '1.0.0', true );

}

//* Flexible grids
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_grids', 15 );
function mono_flexible_grids() {
	
	if ( is_single() || is_page() ) {
	
	$loopCount = 0;
	
	
	
	if( have_rows('content_row') ):
	
		
	
		// loop through the rows of data
    	while ( have_rows('content_row') ) : the_row();
		
			$headline = 	get_sub_field('row_headline');
			$rowbutton = get_sub_field('row_button');
			$rowbuttonmanual = get_sub_field('row_button_manual_url');
			$rowtext = 	get_sub_field('row_button_clone');
			$coll = get_sub_field('columns_no');

        	if( get_row_layout() == 'row_setup' ):
				
			if (get_sub_field('hide_row')){
				
				}else{
				
				echo '<article class="gridcontainer  ';
						the_sub_field('background_colour');
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				
				if ($headline){
					echo '<h1 class="row_headline">' . $headline . '</h1>';
				}
				
				
				
				echo '<div class="wrap">';
					
					
					
					$selected = get_sub_field('background_colour');
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							// Column fields
							if (get_sub_field('content')){
							$colbtn = get_sub_field('column_content_button');
							
							echo '<section class="coll' . $coll . ' wysiwyg">';
							
								the_sub_field('content');
								
								if ($colbtn['button_text']){
									if ($colbtn['page_link']){
									echo '<a class="button" href="' . $colbtn['page_link']. '"><span>';
									}else{
									echo '<a class="button" href="' . $colbtn['url_link']. '" target="_blank""><span>';
									}
									echo '' . $colbtn['button_text']. '';
									echo '</span></a>';
								}
								
							echo '</section>';
							}
							
							// Widget fields
							if (get_sub_field('widget_content')){
							echo '<section class="coll' . $coll. '">';
								the_sub_field('widget_content');
							echo '</section>';
							}
							
							// Timeline fields
							if (get_row_layout() == 'timeline'){
							echo '<section id="cd-timeline" class="coll' . $coll. ' cd-container">';
									$items = get_field( 'timeline_item', 'option' );
									
									
									if($items) {
										
										foreach($items as $item) {
											
											$itembtn = $item['item_button_link'];
											
											if ($item['hide_timeline_item']){
				
											}else{
											
												echo '
       												 <div class="cd-timeline-block">
													 	<div class="cd-timeline-img cd-picture"></div>
														<div class="cd-timeline-content">
															<h2>' . $item['item_headline'] .'</h2>
															<p><strong>' . $item['item_source'] .'</strong> / ' . $item['item_category'] .'</p>
															' . $item['item_text'] .'';
																											
															if ($itembtn['button_text']){
																if ($itembtn['page_link']){
																	echo '<a class="button" href="' . $itembtn['page_link']. '"><span>';
																}else{
																	echo '<a class="button" href="' . $itembtn['url_link']. '" target="_blank""><span>';
																}
																echo '' . $itembtn['button_text']. '';
																echo '</span></a>';
															}
								
												echo '		<span class="cd-date">' . $item['item_date'] .'</span>
														</div>
													</div>';
											}
											
										}
									}
									
							echo '</section>';
							}
							
							// Image fields 
							if (get_sub_field('image_link')){
								
								if( get_sub_field('content') && $selected == 'non'  || $selected == 'non black'  || $selected == 'non grey') {
									
									echo '<section class="coll' . $coll. ' backimage" style="background-image: url(';
										the_sub_field('image_link');
									echo ');">';
									echo '</section>';
									
									}else{
										
									echo '<section class="coll' . $coll. '">';
										echo '<img src="';
											the_sub_field('image_link');
										echo '">';
									echo '</section>';
										
								}
								
							}
							
							// Video fields
							if (get_sub_field('video_embeding_code')){
							echo '<section class="coll' . $coll. '">';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}
							
							// Push content fields
							if (get_sub_field('push_article')){
							echo '<section class="coll' . $coll. '">';
								the_sub_field('push_article');
								echo '<button id="trigger-overlay" type="button"><span>';
									the_sub_field('push_button_text');
								echo '</span></button>';
							echo '</section>';
							}
							
							// Google map fields
							if (get_sub_field('google_map')){
								
								$location = get_sub_field('google_map');
								
								echo '<section class="coll' . $coll. '">';
								echo '<div class="acf-map">
		 								<div class="marker" data-lat="'.$location['lat'].'" data-lng="'.$location['lng'].'"></div>
		 							  </div>';
								echo '</section>';
							}
							
							// Press preview fields
							if (get_sub_field('case_name')){
								$btn = get_sub_field ( 'case_link' );
								$thumb = get_sub_field('case_thumbnail');
								
								echo '<section class="coll' . $coll. '">';
									
									
									echo '<div class="entry-content" itemprop="text">
											<header class="entry-header">
											<h2 class="entry-title" itemprop="headline">';
												the_sub_field('case_name');
									echo '  </h2></header>';
									
									echo '	<p><strong>';
												the_sub_field('article_date');
									echo '	</strong> / ';
												the_sub_field('case_client');
									echo ', ';
												the_sub_field('artikel_kategori');
									echo '</p>';
									
									if ($thumb){
										echo '<div class="thumb-image">';
											echo '<img src="'. $thumb . '">';
										echo '</div>';
									}
									
									
												
												the_sub_field('article_text');
												
												if ($btn){
		
													if ($btn['page_link']){
														echo '<a class="button" href="' . $btn['page_link']. '"><span>';
													}else{
														echo '<a class="button" href="' . $btn['url_link']. '" target="_blank""><span>';
													}
													echo '' . $btn['button_text']. '';
													echo '</span></a>';
		
												}
												
									echo '</div>';
									
								
								echo '</section>';
								
							}
					
					endwhile;
				
				echo '</div>';
				
				// Row button field
				if ($rowtext['button_text']){
					if ($rowtext['page_link']){
						echo '<a class="button" href="' . $rowtext['page_link']. '"><span>';
						}else{
						echo '<a class="button" href="' . $rowtext['url_link']. '" target="_blank""><span>';
					}
						echo '' . $rowtext['button_text']. '';
						echo '</span></a>';
				}
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			
			// Full screen image fields
			if( get_row_layout() == 'full_screen_image' ):
				$btn = get_sub_field ( 'full_screen_button' );
						
				echo '<article class="gridcontainer fullscreen Black">
					<div class="featured-section" style="background-image:url('; 
					the_sub_field('full_screen_back_image');
					echo');"><div class="image-section">';
					
						echo '<div class="slide_content animation-moveUp">';
						echo '<h1>';
							the_sub_field('full_screen_headline');
						echo '</h1>';
							the_sub_field('full_screen_content');
						
						if ($btn){
							if ($btn['page_link']){
								echo '<a class="button" href="' . $btn['page_link']. '"><span>';
							}else{
								echo '<a class="button" href="' . $btn['url_link']. '" target="_blank""><span>';
							}
							echo '' . $btn['button_text']. '';
							echo '</span></a>';
						}
					
				echo '</div></div></div></article>';
			endif;
			
			/* 
			if( get_row_layout() == 'blog_posts' ):
				$term = get_field('blog_posts');
				
				echo '<article class="gridcontainer White"><div class="wrap"><div class="coll1">';
					echo '<h1>Hello world!</h1>';
					
					if( $term ):

				echo ''. $term['name'] .'';
				echo '' . $term['description'] . '';

				endif;
					
				echo '</div></div></article>';
			endif;
			*/
			/*
			if( get_row_layout() == 'bindslev_team' ):
				$teamheadline = get_field( 'team_headline', 'option' );
				$rows = get_field( 'team', 'option' );
				$partners = get_field( 'associated_partners', 'option' );
				$partnersheadline = get_field( 'associated_partners_headline', 'option' );
				
				
				if($rows) {
					echo '<article class="gridcontainer White team">';
						
						if (	get_field( 'team_headline', 'option' )){
							echo '<h1 class="row_headline">' . $teamheadline .'</h1>';
							echo '<div class="wrap">';
						}else{
							echo '<div class="wrap">';
						}
						
						foreach($rows as $row) {	
						
						if ($row['hide_team_member']){
				
							}else{
											
						echo '<div class="coll3 column">
            					<div class="caption caption-5">
									<div class="profile">
										<div class="team-image">
											<img src="' . $row['picture'] .'" title="' . $row['name']. ', ' . $row['title']. '" alt="' . $row['name']. ', ' . $row['title']. '">
										</div>
										<div class="team-info">
											<h3>' . $row['name']. '</h3>
											<p><em>' . $row['title']. '</em></p>
										</div>
									</div>
									<div class="info">
										' . $row['profile_text']. '
										<div class="team-info">
											<a href="mailto:' . $row['email']. '" class="btn"><svg class="icon-mail"><use xlink:href="#icon-mail"></use></svg> ' . $row['email']. '</a>
											<a href="tel:' . $row['telephone']. '" class="btn"><svg class="icon-mobile"><use xlink:href="#icon-mobile"></use></svg> ' . $row['telephone']. '</a>
											<a href="' . $row['linkedin']. '" class="btn" target="_blank"><svg class="icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg> Linkedin</a>
										</div>
									</div>
            					</div>  
						</div>';
						}
						
						}
			
					echo '</div></article>';

				}
				
				if($partners) {
					echo '<article class="gridcontainer White partner team">';
					
						if (	get_field( 'associated_partners_headline', 'option' )){
							echo '<h1 class="row_headline">' . $partnersheadline .'</h1>';
							echo '<div class="wrap">';
						}else{
							echo '<div class="wrap">';
						}
			
						foreach($partners as $partner) {	
						
						echo '<div class="coll3 column">
            					<div class="caption caption-5">
									<div class="profile">
										<div class="team-image">
											<img src="' . $partner['picture'] .'" title="' . $partner['name']. ', ' . $partner['title']. '" alt="' . $partner['name']. ', ' . $partner['title']. '">
										</div>
										<div class="team-info">
											<h3>' . $partner['name']. '</h3>
											<p><em>' . $partner['title']. '</em></p>
										</div>
									</div>
									<div class="info">
										' . $partner['profile_text']. '
										<div class="team-info">
											<a href="mailto:' . $partner['email']. '" class="btn"><svg class="icon-mail"><use xlink:href="#icon-mail"></use></svg> ' . $partner['email']. '</a>
											<a href="tel:' . $partner['telephone']. '" class="btn"><svg class="icon-mobile"><use xlink:href="#icon-mobile"></use></svg> ' . $partner['telephone']. '</a>
											<a href="' . $partner['linkedin']. '" class="btn" target="_blank"><svg class="icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg> Linkedin</a>
										</div>
									</div>
            					</div>  
						</div>';
						
					}
			
					echo '</div></article>';

				}
				
			endif;
			*/
			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}
// =====================================================================================================================


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
	$push = get_sub_field( 'push_content' );  //this is the ACF instruction to get everything in the repeater field
		
	if( have_rows('content_row') ):
	while ( have_rows('content_row') ) : the_row();
		if( get_row_layout() == 'row_setup' ){
		while ( have_rows('column') ) : the_row();
		if (get_sub_field('push_article')){
			wp_enqueue_script( 'push-modernizr-script', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.custom.push.js', array( 'jquery' ), '1.0.0' );
			wp_enqueue_script( 'classie-push-script', get_bloginfo( 'stylesheet_directory' ) . '/js/classie.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'push-script-jquery', get_stylesheet_directory_uri() . '/js/push.js', array( 'jquery' ), '1.0.0', true );
		}
		endwhile;
		}
	endwhile;
	endif;
}


//* Featured Image
// =====================================================================================================================


//* DISPLAY FULL WIDTH FEATURED IMAGE ON STATIC PAGES
add_action ( 'genesis_after_header', 'single_post_featured_image', 15 );
function single_post_featured_image() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
	
		$img = genesis_get_image( array( 'format' => 'src' ) );
		printf( '<div class="featured-section" style="background-image:url(%s);"><div class="image-section"></div></div>', $img );
		
		elseif( (! is_front_page()) ):
		printf( '<div class="image-section" style="background-color:#231f20;"></div>', $img );
		
		
	endif;
	
}

//* Post button
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_entry_content', 'mono_post_button', 15 );
function mono_post_button() {
	$btntype = get_field( 'button_type' );
	$btntext = get_field( 'button_text' );
	$btnpage = get_field( 'page_link' );
	$btnurl = get_field( 'url_link' );
	
	if ($btntype){
		
		if ($bntpage){
			echo '<a class="button" href="' .$bntpage. '"><span>';
		}else{
			echo '<a class="button" href="' .$btnurl. '" target="_blank""><span>';
		}
			echo '' .$btntext. '';
			echo '</span></a>';
		
	}
	
}

// =====================================================================================================================
