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
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				// Add row headline
				if ($headline){
					echo '<h2 class="row_headline"><span>' . $headline . '</span></h2>';
				}
				
				
				echo '<div class="wrap">';
					$selected = get_sub_field('background_colour');
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
										echo '<h2 class="entry-title"><span>' . $headline . '</span></h2>';
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
								$btn = get_sub_field ( 'image_button' );
								
								if( get_sub_field('content') && $selected == 'non' || $selected == 'non light' || $selected == 'non medium' || $selected == 'non dark' || $selected == 'non') {
									// Full field images
									echo '<section class="backimage" style="background-image: url('.$image['url'].');"></section>';
									
									}else{
										
									echo '<section>';
										if ($btn['page_link']){
											echo '<a href="' . $btn['page_link']. '"><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}elseif($btn['url_link']){
											echo '<a href="' . $btn['url_link']. '" target="_blank""><img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" /></a>';
										}else{
											echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" />';
										}
									echo '</section>';
										
								}
							}
							
							
							// Video fields
							if (get_sub_field('video_embeding_code')){
							echo '<section>';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}

							// Widget fields
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
												echo '<figure><a href="'.$post->guid.'"><img src=" '.$work_image['url'].' " alt=" '.$work_image['alt'].' " /></a></figure>';
											echo '</div>';
										}

										echo '<div class="featured_widget_preview">';

											echo '<h2><a href="'.$post->guid.'">'.$post->post_title.'</a></h2>';
											// echo '<h3>'.$post->post_title.'</h3>';

        									$terms = get_the_terms( $post->ID , 'work_category' );
											if ($terms) :
											echo '<ul>';
											foreach ( $terms as $term ) {
												$term_link = get_term_link( $term, 'work_category' );
												if( is_wp_error( $term_link ) )
                									continue;
													echo '<li><a href="' . $term_link . '">'.$term->name.'</a></li>';
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
			
			
			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}