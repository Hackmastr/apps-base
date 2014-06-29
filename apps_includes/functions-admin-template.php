<?php

/**
 * Administration areas
 */
function get_sidebar() {
	
	global $template;
	
	echo '<ul>
		<li '. (empty(get_var('area')) == 'locations' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php">Dashboard</a></li>
		<li '. (get_var('area') == 'locations' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=locations">Locations</a></li>
		<li '. (get_var('area') == 'divisions' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=divisions">Divisions</a></li>
		<li '. (get_var('area') == 'cells' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=cells">Cells</a></li>
		<li '. (get_var('area') == 'links' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=links">Links</a></li>
	</ul>';
	
}

/**
 * Displays admin locations form
 */
function get_admin_locations_form() {
	
	global $locations, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
		$form = '<form class="apps_form" method="post" action="'. get_page_url() .'">
			<ul>
				<li>
					<label for="name">Location Name</label>
					<input type="text" id="name" name="location_name" value="'. $locations->getValue('location_name') .'" />
				</li>
				<li>
					<label for="country">Country</label>
					<select id="country" name="location_country">
						<option '. ($locations->getValue('location_country') == 'us' ? 'selected="selected"' : '') .' value="us">United States</option>
						<option '. ($locations->getValue('location_country') == 'mexico' ? 'selected="selected"' : '') .' value="mexico">Mexico</option>
						<option '. ($locations->getValue('location_country') == 'hungary' ? 'selected="selected"' : '') .' value="hungary">Hungary</option>
					</select>
				</li>
				<li>
					<label for="state">State/Province:</label>
					<input type="text" id="state" name="location_state" value="'. $locations->getValue('location_state') .'" />
				</li>
				<li>
					<label for="city">City</label>
					<input type="text" id="city" name="location_city" value="'. $locations->getValue('location_city') .'" />
				</li>
				<li>
					<label for="address">Street Address</label>
					<input type="text" id="street" name="location_street" value="'. $locations->getValue('location_street') .'" />
				</li>
				<li>
					<label for="zip">Zip Code</label>
					<input type="text" id="zip" name="location_zip" value="'. $locations->getValue('location_zip') .'" />
				</li>
				<li>
					<input type="submit" name="submit" value="Submit" />
				</li>
			</ul>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<ul class="table_action_buttons buttons">
			<li><a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a></li>
		</ul>
		
		<table class="apps_list_table">
			<tr>
				<th class="app_list_header app_list_title">Title</th>
			</tr>';
		
		foreach ($locations->getData() as $location) {
			
			$table .= '<tr>
				<td class="app_list_data app_list_title">
					<a href="'. $template->get_option('site_url') .'/admin.php?area=locations&id='. $location->id .'&action=edit">'. $location->location_name .'</a>
					<span class="link-delete"><a href="'. $template->get_option('site_url') .'/admin.php?area=locations&id='. $location->id .'&action=delete">Delete</a></span>
				</td>
			</tr>';
			
		}
		
		$table .= '</table>';
		
		// Print table
		echo $table;
			
	}
	
}

/**
 * Displays admin divisions form
 */
function get_admin_divisions_form() {
	
	global $divisions, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
		$form = '<form class="apps_form" method="post" action="'. get_page_url() .'">
			<ul>
				<li>
					<label for="division_name">Division Name</label>
					<input type="text" id="division_name" name="division_name" value="'. $divisions->getValue('division_name') .'" />
				</li>
				<li>
					<input type="submit" name="submit" value="Submit" />
				</li>
			</ul>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<ul class="table_action_buttons buttons">
			<li><a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a></li>
		</ul>	
	
		<table class="apps_list_table">
			<tr>
				<th class="app_list_header app_list_title">Title</th>
			</tr>';
		
		foreach ($divisions->getData() as $division) {
			
			$table .= '<tr>
				<td class="app_list_data app_list_title">
					<a href="'. $template->get_option('site_url') .'/admin.php?area=divisions&id='. $division->id .'&action=edit">'. $division->division_name .'</a>
					<span class="link-delete"><a href="'. $template->get_option('site_url') .'/admin.php?area=divisions&id='. $division->id .'&action=delete">Delete</a></span>
				</td>
			</tr>';
			
		}
		
		$table .= '</table>';
		
		// Print table
		echo $table;
			
	}
	
}

/**
 * Displays admin cells form
 */
function get_admin_cells_form() {
	
	global $cells, $divisions, $locations, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
			$form = '<form class="apps_form" method="post" action="'. get_page_url() .'">
				<ul>
					<li>
						<label for="cell_name">Cell Name</label>
						<input type="text" id="cell_name" name="cell_name" value="'. $cells->getValue('cell_name') .'" />
					</li>
					<li>
						<label for="cell_number">Cell Number</label>
						<input type="text" id="cell_number" name="cell_number" value="'. $cells->getValue('cell_number') .'" />
					</li>
					<li>
						<label for="app_division_id">Division</label>
						<select name="app_division_id">';
						
							// Retrieve divisions list
							foreach ($divisions->getData() as $division) {
								$form .= '<option '. ($cells->getValue('app_division_id') == $division->id ? 'selected="selected"' : '') .' value="'. $division->id .'">'. $division->division_name .'</option>';
							}
						
					$form .= '</select>
					</li>
					<li>
						<label for="app_location_id">Location</label>
						<select name="app_location_id">';
						
							// Retrieve locations list
							foreach ($locations->getData() as $location) {
								$form .= '<option '. ($cells->getValue('app_location_id') == $location->id ? 'selected="selected"' : '') .' value="'. $location->id .'">'. $location->location_name .'</option>';
							}
						
					$form .= '</select>
					<li>
						<label for="cell_iq_connector">Cell IQ Connector</label>
						<input type="text" id="cell_iq_connector" name="cell_iq_connector" value="'. $cells->getValue('cell_iq_connector') .'" />
					</li>
					<li>
						<label for="cell_status">Cell Status</label>
						<select name="cell_status">
							<option '. ($cells->getValue('cell_status') == 'active' ? 'selected="selected"' : '') .' value="active">Active</option>
							<option '. ($cells->getValue('cell_status') == 'service' ? 'selected="selected"' : '') .' value="service">Service</option>
							<option '. ($cells->getValue('cell_status') == 'discontinued' ? 'selected="selected"' : '') .' value="discontinued">Discontinued</option>
						</select>
					</li>
					<li><input type="submit" name="submit" value="Submit" /></li>
				</ul>
			</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<ul class="table_action_buttons buttons">
			<li><a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a></li>
		</ul>	
	
		<table class="apps_list_table">
			<tr>
				<th class="app_list_header app_list_title">Title</th>
			</tr>';
		
		foreach ($cells->getData() as $cell) {
			
			$table .= '<tr>
				<td class="app_list_data app_list_title">
					<a href="'. $template->get_option('site_url') .'/admin.php?area=cells&id='. $cell->id .'&action=edit">'. $cell->cell_name .'</a>
					<span class="link-delete"><a href="'. $template->get_option('site_url') .'/admin.php?area=cells&id='. $cell->id .'&action=delete">Delete</a></span>
				</td>
			</tr>';
			
		}
		
		$table .= '</table>';
		
		// Print table
		echo $table;
			
	}
	
}

/**
 * Displays admin links form
 */
function get_admin_links_form() {
	
	global $links, $divisions, $locations, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
			$form = '<form class="apps_form" method="post" action="'. get_page_url() .'">
				<ul>
					<li>
						<label for="name">Link Name</label>
						<input type="text" id="name" name="link_name" value="'. $links->getValue('link_name') .'" />
					</li>
					<li>
						<label for="description">Description:</label>
						<input type="text" id="description" name="link_description" value="'. $links->getValue('link_description') .'" />
					</li>
					<li>
						<label for="url">URL</label>
						<input type="text" id="url" name="link_url" value="'. $links->getValue('link_url') .'" />
					</li>
					<li>
						<label for="bg_color">Background Color</label>
						<input type="text" id="bg_color" name="link_bg_color" value="'. $links->getValue('link_bg_color') .'" />
					</li>
					<li>
						<label for="address">Order</label>
						<input type="text" id="order" name="link_order" value="'. $links->getValue('link_order') .'" />
					</li>
					<li>
						<label for="address">Icon Class</label>
						<input type="text" id="class" name="link_icon_class" value="'. $links->getValue('link_icon_class') .'" />
					</li>
					<li><input type="submit" name="submit" value="Submit" /></li>
				</ul>
			</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<ul class="table_action_buttons buttons">
			<li><a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a></li>
		</ul>		
		
		<table class="apps_list_table">
			<tr>
				<th class="app_list_header app_list_title">Title</th>
			</tr>';
		
		foreach ($links->getData() as $link) {
			
			$table .= '<tr>
				<td class="app_list_data app_list_title">
					<a href="'. $template->get_option('site_url') .'/admin.php?area=links&id='. $link->id .'&action=edit">'. $link->link_name .'</a>
					<span class="link-delete"><a href="'. $template->get_option('site_url') .'/admin.php?area=links&id='. $link->id .'&action=delete">Delete</a></span>
				</td>
			</tr>';
			
		}
		
		$table .= '</table>';
		
		// Print table
		echo $table;
			
	}
	
}