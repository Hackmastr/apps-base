<?php

/**
 * Main manage template
 */
function template_main() {

	echo '<div class="apps_sidebar">
		'. get_sub_nav() .'
	</div>

	<div class="apps_content right">
	
		<h2>'. get_page_title() .'</h2>
		
		<p>This is the main manage page. Perhaps a dashboard of some kind?</p>
		
	</div>';
	
}