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
 * Display locations list
 */
function template_display_locations() {

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
	
		echo '<ul class="apps_data_list">
			<li class="apps_data_list_header">
				<dl>
					<dd class="location_name">Name</dd>
					<dd class="location_country">Country</dd>
					<dd class="location_state">State</dd>
					<dd class="location_city">City</dd>
					<dd class="location_street">Street</dd>
					<dd class="location_zip">ZIP</dd>
				</dl>
			</li>
			<li>
				<dl>';
				
				foreach($page['db_result'] as $location) {
				
					echo '<dd class="location_name"><a href="'. get_page_url() .'&view='. $location->id .'">'. $location->name .'</a></dd>
					<dd class="location_country">'. $location->country .'</dd>
					<dd class="location_state">'. $location->state .'</dd>
					<dd class="location_city">'. $location->city .'</dd>
					<dd class="location_street">'. $location->street .'</dd>
					<dd class="location_zip">'. $location->zip .'</dd>';
					
				}
				
				echo '</dl>
			</li>
		</ul>';
		
	echo '</div>';

}

/**
 * Add new location form
 */
function template_add_location() {
	
	global $page, $db;
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>

	<div class="apps_content right">
	
		<h1>'. get_page_title() .'</h1>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		} else {
	
			echo '<form class="apps_form" method="post" action="'. get_page_url() .'">
				<ul>
					<li>
						<label for="name">Location Name</label>
						<input type="text" id="name" name="location_name" value="'. $db->get_value('location_name') .'" />
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
						<input type="text" id="state" name="location_state" value="'. $db->get_value('location_state') .'" />
					</li>
					<li>
						<label for="city">City</label>
						<input type="text" id="city" name="location_city" value="'. $db->get_value('location_city') .'" />
					</li>
					<li>
						<label for="address">Street Address</label>
						<input type="text" id="street" name="location_street" value="'. $db->get_value('location_street') .'" />
					</li>
					<li>
						<label for="zip">Zip Code</label>
						<input type="text" id="zip" name="location_zip" value="'. $db->get_value('location_zip') .'" />
					</li>
					<li>';
						if ($page['action'] == 'view') {
							echo '<input type="submit" name="update" value="Submit" />
							<input type="submit" name="delete" value="Delete" />';
						} else {
							echo '<input type="submit" name="add" value="Submit" />';
						}
					echo '</li>
				</ul>
			</form>';
	
		}
		
	echo '</div>';
		
}

/**
 * Display divisions list
 */
function template_display_divisions() {

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
	
		echo '<ul class="apps_data_list">
			<li class="apps_data_list_header">
				<dl>
					<dd class="division_name">Name</dd>
				</dl>
			</li>
			<li>
				<dl>';
				
				foreach($page['db_result'] as $division) {
				
					echo '<dd class="division_name"><a href="'. get_page_url() .'&view='. $division->id .'">'. $division->name .'</a></dd>';
					
				}
				
				echo '</dl>
			</li>
		</ul>';
		
	echo '</div>';

}

/**
 * Display cells list
 */
function template_display_cells() {

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
	
		echo '<ul class="apps_data_list">
			<li class="apps_data_list_header">
				<dl>
					<dd class="cell_name">Name</dd>
					<dd class="cell_number">Number</dd>
					<dd class="cell_division">Division</dd>
					<dd class="cell_location">Location</dd>
					<dd class="cell_iq_connector">IQ Connector</dd>
					<dd class="cell_status">Status</dd>
				</dl>
			</li>
			<li>
				<dl>';
				
				foreach($page['db_result'] as $cell) {
				
					echo '<dd class="cell_name"><a href="'. get_page_url() .'&view='. $cell->id .'">'. $cell->name .'</a></dd>
					<dd class="cell_number">'. $cell->number .'</dd>
					<dd class="cell_division">'. $cell->division .'</dd>
					<dd class="cell_location">'. $cell->location .'</dd>
					<dd class="cell_iq_connector">'. $cell->iq_connector .'</dd>
					<dd class="cell_status">'. $cell->status .'</dd>';
					
				}
				
				echo '</dl>
			</li>
		</ul>';
		
	echo '</div>';

}