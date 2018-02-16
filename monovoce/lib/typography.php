<?php

add_action( 'genesis_entry_content', 'mono_typography', 15 );
function mono_typography() {
	$show_typography_array = get_field( 'show_typography' );
	$bodytext = get_field( 'body_font_type' );
	$headlinetext = get_field( 'headline_font_type' );
	$show_ui_array = get_field( 'forms' );
	
	if ( $show_typography_array ){
		echo '
		<section class="category">
		<h1 class="category_headline">Typography</h1>

		<section class="two_col">
		<div class="headlines">
			<p class="description">
			<strong>Header font</strong><br>
			'.$headlinetext.'
			</p>
			<span>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</span>
		</div>
		<div class="bodytext">
			<p class="description">
			<strong>Body font</strong><br>
			'.$bodytext.'
			</p>
			A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?
		</div>
		<div class="headings">
			<p class="description">
			<strong>Header font</strong><br>
			'.$headlinetext.'
			</p>
			<H1>Headlind size 1</H1>
			<h2>Headline size 2</h2>
			<h3>Headline size 3</h3>
			<h4>Headline size 4</h4>
			<h5>Headline size 5</h5>
			<h6>Headline size 6</h6>
		</div>
		<div class="headings">
			<p class="description">
			<strong>Header font linked</strong><br>
			'.$headlinetext.'
			</p>
			<H1><a href="#">Headlind size 1</a></H1>
			<h2><a href="#">Headline size 2</a></h2>
			<h3><a href="#">Headline size 3</a></h3>
			<h4><a href="#">Headline size 4</a></h4>
			<h5><a href="#">Headline size 5</a></h5>
			<h6><a href="#">Headline size 6</a></h6>
		</div>
		<div class="paragraphs">
			<p class="description">
			<strong>Paragraph</strong><br>
			'.$bodytext.'
			</p>
			<p>A paragraph (from the Greek paragraphos, “to write beside” or “written beside”) is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of formal writing, used to organize longer prose.</p>
			<p>In word processing and desktop publishing, a hard return or paragraph break indicates a new paragraph, to be distinguished from the soft return at the end of a line internal to a paragraph.</p>
		</div>
		<div class="paragraphs">
			<p class="description">
			<strong>Inline text elements</strong><br>
			'.$bodytext.'
			</p>
			<p>Donec volutpat <strong>bold</strong> odio, sed <em>italic</em> nisl gravida et. Donec <mark>mark</mark> volutpat mi sed rutrum. Proin eu purus <sub>sub</sub> lacus pulvinar <sup>sup</sup> egestas eget ac velit. Aliquam nec <a href="#">internal link</a> in erat <a href="http://www.monovoce.dk/" target="_blank">external link</a> elementum. <a href="/uploads/docs/comp.pdf" target="_blank">Link to a document, pdf, doc etc</a>. Sed tempor tortor eget metus adipiscing pulvinar at eget risus. Donec rutrum elit id ligula blandit non aliquet arcu ultricies.</p>
		</div>
		<div class="paragraphs">
			<p class="description">
			<strong>Unordered list</strong>
			</p>
			<ul>
			<li>Aliquam nec nisi in erat rhoncus elementum
			<ul>
				<li>Maecenas ultricies accumsan odio</li>
			</ul>
			</li>
			<li>Sed tempor tortor eget metus adipiscing pulvinar at eget risus</li>
			</ul>
		</div>
		<div class="paragraphs">
			<p class="description">
			<strong>Ordered list</strong>
			</p>
			<ol>
			<li>Donec ultrices volutpat mi sed rutrum</li>
			<li>Proin eu purus id lacus pulvinar egestas eget ac velit
				<ol>
					<li>Aliquam nec nisi in erat rhoncus elementum. Maecenas ultricies accumsan odio</li>
				</ol>
			</li>
			<li>Sed tempor tortor eget metus adipiscing pulvinar at eget risus.</li>
			</ol>
		</div>
		<div class="paragraphs">
			<p class="description">
			<strong>Block qoute</strong>
			</p>
			<blockquote>Quotations are used for a variety of reasons: to illuminate the meaning or to support the arguments of the work in which it is being quoted, to provide direct information about the work being quoted, to pay homage to the original work or author, to make the user of the quotation seem well-read, and/or to comply with copyright law.</blockquote>
			<cite>Wikipedia</cite>
		</div>
		</section>
		</section>

		<section class="category">
			<h1 class="category_headline">UI elements</h1>
			<p class="description">
			<strong>Light background color</strong>
			</p>
			<section class="background-color-light">
			<div class="UI_content buttons">
				<div>
				<p class="description">
					<strong>Default buttons</strong>
				</p>
				<p class="ui-elements-buttons">
					<button>Button</button>
					<a class="button" href="http://www.dba.dk/">Anchor</a>
					<input value="Submit" type="submit">
					<button class="disabled" href="#">Default disabled</button>
				</p>
				</div>
				<div>
				<p class="description">
					<strong>Primary buttons</strong>
				</p>
				<p class="ui-elements-buttons">
					<button class="button-primary">Button</button>
					<a class="button button-primary" href="http://www.dba.dk/">Anchor</a>
					<input class="button-primary" value="Submit" type="submit">
					<button class="disabled" href="#">Default disabled</button>
				</p>
				</div>
				<div>
				<p class="description">
					<strong>Info buttons</strong>
				</p>
				<p class="ui-elements-buttons">
					<button class="button-info">Button</button>
					<a class="button button-info" href="http://www.dba.dk/">Anchor</a>
					<input class="button-info" value="Submit" type="submit">
					<button class="disabled" href="#">Default disabled</button>
				</p>
				</div>
				<div>
				<p class="description">
					<strong>Alert buttons</strong>
				</p>
				<p class="ui-elements-buttons">
					<button class="button-alert">Button</button> 
					<a class="button button-alert" href="http://www.dba.dk/">Anchor</a> 
					<input class="button-alert" value="Submit" type="submit"> 
					<button class="disabled" href="#">Default disabled</button>
				</p>
				</div>
				<div>
				<p class="description">
				<strong>Forms</strong>
				</p>
				'.$show_ui_array.'
				</div>
			</div>
			</section>
		</section>
		';
		}else{
	}
}
/*
add_action( 'genesis_entry_content', 'mono_ui_elements', 15 );
function mono_ui_elements() {
	$show_ui_array = get_field( 'forms' );

	if ( $show_ui_array ){
		echo '
			<p class="description">
			<strong>Forms</strong>
			</p>
			'.$show_ui_array.'
		';
	}
}
*/