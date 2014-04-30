<?php
/**
 * Template file for managing divisions
 */

/**
 * Main template function
 */
function template_main() {
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>
		<a href="'. get_page_url() .'&action=add">Add New Division</a>
		
	</div>';
	
}

/**
 * Form for adding new location
 */
function template_add() {

	global $page;
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		}
		
		echo '<form class="apps_form" method="post" action="'. get_page_url() .'">
			<ul>
				<li>
					<label for="name">Division Name</label>
					<input type="text" id="name" name="name" />
				</li>
				<li>
					<input type="submit" name="add_location" value="Add Location" />
				</li>
			</ul>
		
		</form>
		
	</div>';
	
}