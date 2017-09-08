<?php

add_action( 'genesis_entry_content', 'mono_typography', 15 );
function mono_typography() {
	$show_typography_array = get_field( 'show_typography' );
	$bodytext = get_field( 'body_font_type' );
	$headlinetext = get_field( 'headline_font_type' );
	
	if ( $show_typography_array ){
		
		echo '
			
			<div class="style_type">
			
			<h2>Basic typography</h2><h2></h2>
			
			<div class="style_body">
			<h3>Body typography</h3>
			<h4>Primary font: "'.$bodytext.'"</h4>
			<p>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</p>
			
			<h4>Primary font italic: "'.$bodytext.'"</h4>
			<p><em>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</em></p>
			
			<h4>Primary font bold: "'.$bodytext.'"</h4>
			<p><strong>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</strong></p>
			</div>
			
			<div class="style_headline">
			<h3>Headline typography</h3>
			<h4>Primary font: "'.$headlinetext.'"</h4>
			<p>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</p>
			
			<h4>Primary font italic: "'.$headlinetext.'"</h4>
			<p><em>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</em></p>
			
			<h4>Primary font bold: "'.$headlinetext.'"</h4>
			<p><strong>A B C D E F G H I J K L M N O P Q R T S U V W X Y Z Æ Å Ø<br>
			a b c d e f g h i j k l m n o p q r s t u v w x y z æ ø å<br>
			1 2 3 4 5 6 7 8 9 0 ! # € % &amp; / ( ) $ § ?</strong></p>
			</div>
			
			<div class="style_headlings">
			<h2>Headings</h2>
			<h1>Headline 1</h1>
			<h2>Headline 2</h2>
			<h3>Headline 3</h3>
			<h4>Headline 4</h4>
			<h5>Headline 5</h5>
			<h6>Headline 6</h6>
			
			<h2>Linked headings</h2>
			<h1><a href="#">Headline 1</a></h1>
			<h2><a href="#">Headline 2</a></h2>
			<h3><a href="#">Headline 3</a></h3>
			<h4><a href="#">Headline 4</a></h4>
			<h5><a href="#">Headline 5</a></h5>
			<h6><a href="#">Headline 6</a></h6>
			</div>
			
			<div class="style_paragraphs">
			<h2>Paragraphs</h2>
			<h3>Normal paragraph</h3>
			<p>A paragraph (from the Greek paragraphos, "to write beside" or "written beside") is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of formal writing, used to organize longer prose.</p>

			<p>In word processing and desktop publishing, a hard return or paragraph break indicates a new paragraph, to be distinguished from the soft return at the end of a line internal to a paragraph.<br>
			This distinction allows word wrap to automatically re-flow text as it is edited, without losing paragraph breaks. The software may apply vertical whitespace or indenting at paragraph breaks, depending on the selected style.</p>

			<p>How such documented are actually stored depends on the file format. For example, HTML uses the p tag as a paragraph container. In plaintext files, there are two common formats. Pre-formatted text will have a newline at the end of every physical line, and two newlines at the end of a paragraph, creating a blank line. An alternative is to only put newlines at the end of each paragraph, and leave word wrapping up to the application that displays or processes the text (if it is even necessary).</p>
			
			<h4>Inline text elements</h4>
			<p>Donec volutpat <strong>bold</strong> odio, sed <em>italic</em> nisl gravida et. Donec <mark>mark</mark> volutpat mi sed rutrum. Proin eu purus <sub>sub</sub> lacus pulvinar <sup>sup</sup> egestas eget ac velit. Aliquam nec <a href="#">internal link</a> in erat <a href="http://www.monovoce.dk/" target="_blank">external link</a> elementum. <a href="/uploads/docs/comp.pdf" target="_blank">Link to a document, pdf, doc etc</a>. Sed tempor tortor eget metus adipiscing pulvinar at eget risus. Donec rutrum elit id ligula blandit non aliquet arcu ultricies.</p>
			</div>
			
			<div class="style_lists">
			<h2>Lists</h2>
			<h3>List bullits</h3>
			<ul>
 				<li>Aliquam nec nisi in erat rhoncus elementum
					<ul>
 						<li>Maecenas ultricies accumsan odio</li>
					</ul>
				</li>
 				<li>Sed tempor tortor eget metus adipiscing pulvinar at eget risus</li>
			</ul>
			
			<h3>List numbers</h3>
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
			
			<div class="style_quotes">
			<h2>Quotations</h2>
			<blockquote>Quotations are used for a variety of reasons: to illuminate the meaning or to support the arguments of the work in which it is being quoted, to provide direct information about the work being quoted(whether in order to discuss it, positively or negatively), to pay homage to the original work or author, to make the user of the quotation seem well-read, and/or to comply with copyright law. Quotations are also commonly printed as a means of inspiration and to invoke philosophical thoughts from the reader.</blockquote>
			</div>
			
			</div>
		';
	
	}else{
	
	}
}