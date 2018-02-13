<?php

add_action( 'genesis_entry_content', 'mono_palettes', 15 );
function mono_palettes() {

	$show_array = get_field( 'show' );
	$black = get_field( 'black_colour' );
	$black_rgb = get_field( 'black_colour_rgb' );
	$white = get_field( 'white_colour' );
	$white_rgb = get_field( 'white_colour_rgb' );
	$primary = get_field( 'primary_colour' );
	$primary_rgb = get_field( 'primary_colour_rgb' );
	$secondary = get_field( 'secondary_colour' );
	$secondary_rgb = get_field( 'secondary_colour_rgb' );
	$active = get_field( 'active_colour' );
	$active_rgb = get_field( 'active_colour_rgb' );
	$accent_one = get_field( 'accent_1_colour' );
	$accent_one_rgb = get_field( 'accent_1_colour_rgb' );
	$accent_two = get_field( 'accent_2_colour' );
	$accent_two_rgb = get_field( 'accent_2_colour_rgb' );
	$accent_three = get_field( 'accent_3_colour' );
	$accent_three_rgb = get_field( 'accent_3_colour_rgb' );

    if ( $show_array ){
        echo '
		<section class="category">
		<h1 class="category_headline">Color palette</h1>
        <section class="primary_swatches">
        <ul class="swatch-primary">
           <li class="swatch-row-one"></li>
           <li class="swatch-row-one"><p>#'.$primary.'</p></li>

           <li class="swatch-row-one"></li>
           <li class="swatch-row-one"></li>
           <li class="swatch-row-one"></li>
           <li class="swatch-row-one"></li>

           <li class="swatch-row-two"></li>
           <li class="swatch-row-two"></li>
           <li class="swatch-row-two"></li>
           <li class="swatch-row-two"></li>
	   </ul>
	   <ul class="swatch-secondary">
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"><p>#'.$secondary.'</p></li>
	   
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>

	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   </ul>
	   <ul class="swatch-active">
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"><p>#'.$active.'</p></li>
	   
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>

	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   </ul>
	   <ul class="swatch-black">
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"><p>#'.$black.'</p></li>
	   
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>
	   		<li class="swatch-row-one"></li>

	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   		<li class="swatch-row-two"></li>
	   </ul>
	   </section>
	   <section class="secondary_swatches">
	   		<span></span>
	   		<span></span>
	   		<span></span>
	   		<span></span>
	   		<span></span>
   	   </section>
       </section>
        ';
	}else{
		
    }
    /*
	if ( $show_array ){
		echo '
		<section class="category">
		<h1 class="category_headline">Color palette</h1>
		<div class="swatches">
		<ul class="swatch-black">
			<li class="swatch-row-one"><h6>Black</h6>HEX: #'.$black.'<br>RGB: '.$black_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-white">
			<li class="swatch-row-one"><h6>White</h6>HEX: #'.$white.'<br>RGB: '.$white_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-primary">
			<li class="swatch-row-one"><h6>Primary</h6>HEX: #'.$primary.'<br>RGB: '.$primary_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-secondary">
			<li class="swatch-row-one"><h6>Secondary</h6>HEX: #'.$secondary.'<br>RGB: '.$secondary_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-active">
			<li class="swatch-row-one"><h6>Active</h6><p><em>Active/Focuced</em></p>HEX: #'.$active.'<br>RGB: '.$active_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		
		
		<ul class="swatch-accent-one">
			<li class="swatch-row-one"><h6>Accent 1</h6><p><em>Succes</em></p>HEX: #'.$accent_one.'<br>RGB: '.$accent_one_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-accent-two">
			<li class="swatch-row-one"><h6>Accent 2</h6><p><em>Warning</em></p>HEX: #'.$accent_two.'<br>RGB: '.$accent_two_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		
		<ul class="swatch-accent-three">
			<li class="swatch-row-one"><h6>Accent 3</h6><p><em>Error/Alert</em></p>HEX: #'.$accent_three.'<br>RGB: '.$accent_three_rgb.'</li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			<li class="swatch-row-one"></li>
			
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
			<li class="swatch-row-two"></li>
		</ul>
		</div>
		</section>
		';
	}else{
		echo 'Add some color to your palette';
	}
    */
	
}