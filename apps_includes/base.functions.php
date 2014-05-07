<?php
/**
 * Base app specific functions
 */

/**
 * Manage forms
 */
function get_manage_form($area, $action) {

	global $db;
	
	// Begin the HTML form
	echo '<form class="apps_form" method="post" action="'. get_page_url() .'">
		<ul>';
	
	// Which form which we display for $area?
	switch ($area) {
		
		case 'locations':
		
				echo '<li>
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
				</li>';
			
			break;
		
		case 'divisions':
		
			echo '<li>
				<label for="division_name">Division Name</label>
				<input type="text" id="division_name" name="division_name" />
			</li>';
		
			break;
			
		case 'cells':
		
			echo '<li>
				<label for="app_division_id">Division</label>
				<select name="app_division_id">';
				
					// Retrieve divisions list
					$divisions = $db->query('SELECT id, division_name FROM app_divisions');
					foreach ($divisions as $division) {
						
						echo '<option value="'. $division->id .'">'. $division->division_name .'</option>';
						
					}
				
			echo '</select>
			</li>
			<li>
				<label for="app_location_id">Location</label>
				<select name="app_location_id">';
				
					// Retrieve divisions list
					$locations = $db->query('SELECT id, location_name FROM app_locations');
					foreach ($locations as $location) {
						
						echo '<option value="'. $location->id .'">'. $location->location_name .'</option>';
						
					}
				
			echo '</select>
			</li>
			<li>
				<label for="cell_name">Cell Number</label>
				<input type="text" id="cell_number" name="cell_number" />
			</li>
			<li>
				<label for="cell_name">Cell Name</label>
				<input type="text" id="cell_name" name="cell_name" />
			</li>
			<li>
				<label for="cell_iq_connector">Cell IQ Connector</label>
				<input type="text" id="cell_iq_connector" name="cell_iq_connector" />
			</li>
			<li>
				<label for="cell_status">Cell Status</label>
				<select name="cell_status">
					<option value="active">Active</option>
					<option value="service">Service</option>
					<option value="discontinued">Discontinued</option>
				</select>
			</li>';
		
			break;
			
		default:
			echo 'Form doesn\'t exist.';
		
		
	}
	
			// End the HTML form
			echo '<li>';
				
				if ($action == 'view') {
					echo '<input type="submit" name="update" value="Submit" />
					<input type="submit" name="delete" value="Delete" />';
				} else {
					echo '<input type="submit" name="add" value="Submit" />';
				}
				
			echo '</li>
		</ul>
	</form>';
	
}