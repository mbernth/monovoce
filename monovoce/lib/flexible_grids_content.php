<?php


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
			$animate_row = get_sub_field('animate_row');
			$featured = get_sub_field( 'featured' );
			$wide_row = get_sub_field( 'wide_row' );
			$selected = get_sub_field('background_colour');

        	if( get_row_layout() == 'row_setup' ):
			
			// This will hide a whole row
			if (get_sub_field('hide_row')){
				
				}else{
				// Add background color and ID if needed
				echo '<article class="gridcontainer  ';
						the_sub_field('background_colour');
						echo ' coll' . $coll . '';
					if ($animate_row){
						foreach ( $animate_row as $animate_row_item ):
							echo ' '. $animate_row_item.' ';
					   endforeach;
					}
					if ($featured){
						echo ' featured ';
					}
					if ($wide_row){
						if( ($selected == 'non dark' || $selected == 'non medium' || $selected == 'non light' || $selected == 'non')){
						}else{
							echo ' wide ';
						}
					}
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				// Add row headline
				if ($headline){
					echo '<h2 lang="en" class="row_headline">' . $headline . '</h2>';
				}
				
				
				echo '<div class="wrap">';
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							// Column fields
							if (get_sub_field('content')){
								$colbtn = get_sub_field('column_content_button');
								$large_font_size = get_sub_field( 'large_font_size' );

								if ($large_font_size){
									echo '<section class="wysiwyg large_font_size">';
								}else{
									echo '<section class="wysiwyg">';
								}
									
									if( ($selected == 'non dark' || $selected == 'non medium' || $selected == 'non light' || $selected == 'non')){
										if($headline){
										echo '<h2 lang="en" class="entry-title">' . $headline . '</h2>';
										}
									}
									
									the_sub_field('content');
									// Column botton
									if ($colbtn['button_text']){
									echo '<div class="column-button">';
										if ($colbtn['page_link']){
										echo '<a class="button" href="' . $colbtn['page_link']. '"><span>';
										}else{
										echo '<a class="button" href="' . $colbtn['url_link']. '""><span>';
										}
										echo '' . $colbtn['button_text']. '';
										echo '</span></a>';
									echo '</div>';
									}
								echo '</section>';
							}
							
							
							// Image fields
							if (get_sub_field('image_link')){
								// Image Array
								$image =  get_sub_field('image_link');
								$caption = $image['caption'];
								$btn = get_sub_field ( 'image_button' );
								
								if( get_sub_field('content') && $selected == 'non' || $selected == 'non light' || $selected == 'non medium' || $selected == 'non dark' || $selected == 'non') {
									// Full field images
									//echo '<section class="backimage" style="background-image: url('.$image['url'].');"></section>';
									echo '<section class="backimage">';
										echo '<figure>';
											echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'" />';
											if ($caption){
												echo '<figcaption>'.$caption.'</figcaption>';
											}
										echo '</figure>';
									echo '</section>';
									
									}else{
										
									echo '<section>';
										echo '<figure>';
										if ($btn['page_link']){
											echo '<a href="' . $btn['page_link']. '"><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}elseif($btn['url_link']){
											echo '<a href="' . $btn['url_link']. '" target="_blank""><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}else{
											echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage_uncheck" />';
										}
										if($caption){
											echo '<figcaption>'.$caption.'</figcaption>';
										}
										echo '</figure>';
									echo '</section>';
										
								}
							}
							
							
							// Video fields
							if (get_sub_field('video_embeding_code')){
							echo '<section>';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}

							// Featured works
							if ( get_row_layout() == 'featured_work' ){
								echo '<section class="featured_widget">';
									$post_objects = get_sub_field( 'work' );
									$work_image = get_sub_field( 'work_image' );

									if ( $post_objects ) :
									$post = $post_objects;
									setup_postdata( $post );
									
									// echo '<a href="'.$post->guid.'"><span>';
									echo '<div class="featured_widget_thumb">';
										if ( $work_image ) {
											echo '<div class="featured_widget_image">';
												// echo '<figure><a href="'.$post->guid.'"><img src=" '.$work_image['url'].' " alt=" '.$work_image['alt'].' " /></a></figure>';
												echo '<figure><a href="';
													the_permalink($post);
												echo '"><img src=" '.$work_image['url'].' " alt=" '.$work_image['alt'].' " /></a></figure>';
											echo '</div>';
										}

										echo '<div class="featured_widget_preview">';

											// echo '<h4 lang="en"><a href="'.$post->guid.'">'.$post->post_title.'</a></h4>';
											echo '<h4 lang="en"><a href="';
												the_permalink($post);
											echo '">'.$post->post_title.'</a></h4>';

        									$terms = get_the_terms( $post->ID , 'work_category' );
											if ($terms) :
											echo '<ul>';
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term, 'work_category' );
												if( is_wp_error( $term_link ) )
                									continue;
													// echo '<li><a href="' . $term_link . '">'.$term->name.'</a></li>';
													echo '<li>'.$term->name.'</li>';
											}
											echo '</li>';
											endif;

										echo '</div>'; // Preview section end

									echo '</div>'; // Thumb section end
									// echo '</span></a>';
									wp_reset_postdata();
									endif;

								echo '</section>';
							}

							// References
							if ( get_row_layout() == 'references' ) :
								if ( have_rows( 'references', 'option' ) ) :
									echo '<section class="references">';
									echo '<ul>';
									while ( have_rows( 'references', 'option' ) ) : the_row();
										$reference = get_sub_field( 'company_name' );
										echo '<li>'.$reference.'</li>';
										// the_sub_field( 'company_name' );
									endwhile;
									echo '</ul>';
									echo '</section>';
								else :
									// no rows found
								endif;
							endif;
							
					endwhile;
				
				echo '</div>';
				
				// Row button field
				if ($rowtext['button_text']){
					echo '<div class="row-button-area">';
						if ($rowtext['page_link']){
							echo '<a class="button button-primary" href="' . $rowtext['page_link']. '">';
							}else{
							echo '<a class="button button-primary" href="' . $rowtext['url_link']. '" target="_blank"">';
						}
							echo '' . $rowtext['button_text']. '';
							echo '</a>';
					echo '</div>';
				}
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			
			if ( get_row_layout() == 'service_row' ) :
				// hide_service_row ( value )
				$hide_service_row_array = get_sub_field( 'hide_service_row' );
				$service_button = get_sub_field('service_link_button');
				if ( $hide_service_row_array ):
					else :
						if ( have_rows( 'service_group' ) ) :
							echo '<article class="gridcontainer services">';
							while ( have_rows( 'service_group' ) ) : the_row();
								$service_group_name = get_sub_field( 'service_group_name' );
								$service_background_color = get_sub_field( 'service_background_color' );
								$service_group_text = get_sub_field( 'service_group_text' );
								echo '<h3 lang="en" class="row_headline">' . $service_group_name . '</h3>';
								if ($service_group_text){
									echo '<section class="service_group_text">'.$service_group_text.'</section>';
								}
								echo '<div class="wrap '.$service_background_color.'">';
								if ( have_rows( 'services' ) ):
									while ( have_rows( 'services' ) ) : the_row();
										$service_name = get_sub_field( 'service_name' );
										if ( get_row_layout() == 'service' ) :
											echo '<section>';
												echo '<p><span class="service_group_name">'.$service_group_name.'</span>';
												echo '<span class="service_name">'.$service_name.'</span></p>';
											echo '</section>';
										endif;
									endwhile;
								else:
								// no layouts found
								endif;
								echo '</div>';
								
							endwhile;
							// Row button field
							if ($service_button['button_text']){
								echo '<div class="row-button-area">';
									if ($service_button['page_link']){
										echo '<a class="button button-primary" href="' . $service_button['page_link']. '">';
										}else{
										echo '<a class="button button-primary" href="' . $service_button['url_link']. '" >';
									}
									echo '' . $service_button['button_text']. '';
									echo '</a>';
									
								echo '</div>';
							}
							echo '</article>';
						else :
						// no rows found
						endif;
				endif;
			endif;

			// Featured
			if ( get_row_layout() == 'featured' ) :
				$posts = get_sub_field( 'selected_features' );
				$hide = get_sub_field( 'hide' );
				$headline = get_sub_field( 'headline' );
			if ($hide){

			}else{
			
			echo '<article class="gridcontainer featured_cases">';
				if ($headline){
					echo '<h2 lang="en" class="row_headline">' . $headline . '</h2>';
				}
				echo '<div class="wrap">';
				if ( $posts ):
					
					// Call global $posts variable
					global $post;
					foreach ( $posts as $post ): 
						setup_postdata ( $post );
						$work_thumbnail = get_field( 'featured_work_image' );
						echo '<section>';

						if ( $work_thumbnail ) {
							echo '<figure><a href="';
								the_permalink($post);
							echo '"><img src="'.$work_thumbnail['url'].'" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
						}
						
						echo '<div><h4 lang="en"><a href="';
							the_permalink($post);
						echo '">'.$post->post_title.'</a></h4>';
						echo '<p><a href="';
							the_permalink($post);
						echo '">See the case</a></p></div>';

						echo '</section>';
					endforeach;
					
					wp_reset_postdata();

				endif;
				echo '</div>';
			echo '</article>';
			}
			endif;
			
		endwhile;
		
	
	else :

    // no layouts found

	endif;
	
	}

}