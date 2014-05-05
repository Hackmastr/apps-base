<?php
/**
 * Template file for managing locations
 */

/**
 * Main template function
 */
function template_main() {
	
	global $manage;
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>
		<a href="'. get_page_url() .'&action=add">Add New Location</a>';
		
		$manage->display();
		
	echo '</div>';
	
}

/**
 * Form for adding new location
 */
function template_add_location() {

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
					<label for="name">Location Name</label>
					<input type="text" id="name" name="location_name" />
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
					<input type="text" id="state" name="location_state" />
				</li>
				<li>
					<label for="city">City</label>
					<input type="text" id="city" name="location_city" />
				</li>
				<li>
					<label for="address">Street Address</label>
					<input type="text" id="street" name="location_street" />
				</li>
				<li>
					<label for="zip">Zip Code</label>
					<input type="text" id="zip" name="location_zip" />
				</li>
				<li>
					<input type="submit" name="add_location" value="Add Location" />
				</li>
			</ul>
		
		</form>
		
	</div>';
	
}