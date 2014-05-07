<?php

/**
 * Main manage template
 */
function template_main() {

	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
	
		<h1>'. get_page_title() .'</h1>
		
		<p>This is the main manage page. Perhaps a dashboard of some kind?</p>
		
	</div>';
	
}

/**
 * Display
 */
function template_display() {

	global $page, $db;
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>

	<div class="apps_content right">
	
		<h1>'. get_page_title() .'</h1>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		}
		
		echo '<p><a href="'. get_page_url() .'&add=new">Add New</a></p>';
		
		$db->display();
		
	echo '</div>';

}

/**
 * Add new location
 */
function template_locations_form() {

	global $page, $db;

	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>

	<div class="apps_content right">
	
		<h1>'. get_page_title() .'</h1>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		}
		
		get_manage_form($db->area, $page['action']);
		
	echo '</div>';

}

/**
 * Add new division
 */
function template_divisions_form() {

	global $page;
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>

	<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		}
		
		echo '<form class="apps_form" method="post" action="'. get_page_url() .'">
			<ul>
				<li>
					<label for="division_name">Division Name</label>
					<input type="text" id="division_name" name="division_name" />
				</li>
				<li>
					<input type="submit" name="submit" value="Submit" />
					<input type="submit" name="delete" value="Delete" />
				</li>
			</ul>
		
		</form>
		
	</div>';

}