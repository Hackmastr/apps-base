<?php
/**
 * Base app specific functions
 */

/**
 * Manage forms
 */
function get_manage_form($area, $action) {

	global $db;
	
	// Which form which we display for $area?
	switch ($area) {
		
		case 'locations':
			
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
					
					if ($action == 'view') {
						echo '<input type="submit" name="update" value="Submit" />
						<input type="submit" name="delete" value="Delete" />';
					} else {
						echo '<input type="submit" name="add" value="Submit" />';
					}
					
				echo '</li>
			</ul>
		
		</form>';
			
			break;
		
	}
	
}