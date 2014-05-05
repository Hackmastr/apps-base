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

	global $page, $manage;
	
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
		
		$manage->display();
		
	echo '</div>';

}

/**
 * Add new location
 */
function template_locations_form() {

	global $page, $manage;

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
					<label for="name">Location Name</label>
					<input type="text" id="name" name="location_name" value="'. $manage->get_value('location_name') .'" />
				</li>
				<li>
					<label for="country">Country</label>
					<select id="country" name="location_country">
						<option value="us">United States</option>
						<option value="mexico">Mexico</option>
						<option value="hungary">Hungary</option>
					</select>
				</li>
				<li>
					<label for="state">State/Province:</label>
					<input type="text" id="state" name="location_state" value="'. $manage->get_value('location_state') .'" />
				</li>
				<li>
					<label for="city">City</label>
					<input type="text" id="city" name="location_city" value="'. $manage->get_value('location_city') .'" />
				</li>
				<li>
					<label for="address">Street Address</label>
					<input type="text" id="street" name="location_street" value="'. $manage->get_value('location_street') .'" />
				</li>
				<li>
					<label for="zip">Zip Code</label>
					<input type="text" id="zip" name="location_zip" value="'. $manage->get_value('location_zip') .'" />
				</li>
				<li>
					<input type="submit" name="submit" value="Submit" />
					<input type="submit" name="delete" value="Delete" />
				</li>
			</ul>
		
		</form>
		
	</div>';

}

/**
 * Add new division
 */
function template_add_divisions() {

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
					<input type="submit" name="add_division" value="Add Division" />
					<input type="submit" name="delete" value="Delete" />
				</li>
			</ul>
		
		</form>
		
	</div>';

}