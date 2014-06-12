<?php
/**
 * Locations sub templates
 */

/**
 * Displays list of locations
 */
function main() {

	global $template, $locations;

	echo '<table class="apps_list_table">
		<tr>
			<th class="app_list_header app_list_title">Title</th>
		</tr>';
	
	foreach ($locations->getLocationsList() as $location) {
		
		echo '<tr>
			<td class="app_list_data app_list_title">
				<a href="'. $template->get_option('site_url') .'/admin/index.php?tab=locations&id='. $location->id .'&action=edit">'. $location->name .'</a>
			</td>
		</tr>';
		
	}
	
	echo '</table>';
	
}

/**
 * Form for adding and editing locations
 */
function edit() {
	
	global $template, $locations;
	
	echo '<h3>'. $template->get_tab_page_title() .' Location</h3>';

	echo '<form class="apps_form" method="post" action="'. $template->get_option('site_url') .'/admin/index.php?tab=locations&id='. $template->get_var('id') .'&action=edit">
		<ul>
			<li>
				<label for="name">Location Name</label>
				<input type="text" id="name" name="location_name" value="'. $locations->getLocation('name') .'" />
			</li>
			<li>
				<label for="country">Country</label>
				<select id="country" name="location_country">
					<option '. ($locations->getLocation('country') == 'us' ? 'selected="selected"' : '') .' value="us">United States</option>
					<option '. ($locations->getLocation('country') == 'mexico' ? 'selected="selected"' : '') .' value="mexico">Mexico</option>
					<option '. ($locations->getLocation('country') == 'hungary' ? 'selected="selected"' : '') .' value="hungary">Hungary</option>
				</select>
			</li>
			<li>
				<label for="state">State/Province:</label>
				<input type="text" id="state" name="location_state" value="'. $locations->getLocation('state') .'" />
			</li>
			<li>
				<label for="city">City</label>
				<input type="text" id="city" name="location_city" value="'. $locations->getLocation('city') .'" />
			</li>
			<li>
				<label for="address">Street Address</label>
				<input type="text" id="street" name="location_street" value="'. $locations->getLocation('street') .'" />
			</li>
			<li>
				<label for="zip">Zip Code</label>
				<input type="text" id="zip" name="location_zip" value="'. $locations->getLocation('zip') .'" />
			</li>
			<li>
				<input type="submit" name="'. $template->get_var('action') .'" value="Submit" />
			</li>
		</ul>
	</form>';
		
}