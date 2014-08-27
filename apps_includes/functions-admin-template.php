<?php

/**
 * Administration areas
 */
function get_sidebar() {
	
	global $template;
	
	echo '<ul class="nav nav-sidebar">
		<li '. (empty(get_var('area')) == 'locations' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php">Dashboard</a></li>
		<li '. (get_var('area') == 'locations' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=locations">Locations</a></li>
		<li '. (get_var('area') == 'divisions' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=divisions">Divisions</a></li>
		<li '. (get_var('area') == 'cells' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=cells">Cells</a></li>
		<li '. (get_var('area') == 'links' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=links">Links</a></li>
		<li '. (get_var('area') == 'roles' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=roles">Roles</a></li>
		<li '. (get_var('area') == 'users' ? 'class="active"' : '') .'><a href="'. $template->get_option('site_url') .'/admin.php?area=users">Users</a></li>
	</ul>';
	
}

/**
 * Displays admin locations form
 */
function get_admin_locations_form() {
	
	global $locations, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
		$form = '<form class="form-horizontal" method="post" action="'. get_page_url() .'">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="name">Location Name</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="name" name="location_name" value="'. $locations->getValue('location_name') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="country">Country</label>
				<div class="col-sm-9">
					<select class="form-control" id="country" name="location_country">
						<option '. ($locations->getValue('location_country') == 'us' ? 'selected="selected"' : '') .' value="us">United States</option>
						<option '. ($locations->getValue('location_country') == 'mexico' ? 'selected="selected"' : '') .' value="mexico">Mexico</option>
						<option '. ($locations->getValue('location_country') == 'hungary' ? 'selected="selected"' : '') .' value="hungary">Hungary</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="state">State/Province:</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="state" name="location_state" value="'. $locations->getValue('location_state') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="city">City</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="city" name="location_city" value="'. $locations->getValue('location_city') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="address">Street Address</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="street" name="location_street" value="'. $locations->getValue('location_street') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="zip">Zip Code</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="zip" name="location_zip" value="'. $locations->getValue('location_zip') .'" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="btn btn-default" type="submit" name="submit">Submit</button>
				</div>
			</div>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>
		
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($locations->getData() as $location) {
			
			$table .= '<tr>
					<td>
						<a href="'. $template->get_option('site_url') .'/admin.php?area=locations&id='. $location->id .'&action=edit">'. $location->location_name .'</a>
						
						<a class="btn btn-danger btn-xs pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area=locations&id='. $location->id .'&action=delete">Delete</a></li>
					</td>
				</tr>';
			
		}
		
			$table .= '</tbody>
		</table>';
		
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
		
		$form = '<form class="form-horizontal" role="form" method="post" action="'. get_page_url() .'">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="division_name">Division Name</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="division_name" name="division_name" value="'. $divisions->getValue('division_name') .'" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="btn btn-default" type="submit" name="submit">Submit</button>
				</div>
			</div>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>
	
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($divisions->getData() as $division) {
			
				$table .= '<tr>
					<td>
						<a href="'. $template->get_option('site_url') .'/admin.php?area=divisions&id='. $division->id .'&action=edit">'. $division->division_name .'</a>
						
						<a class="btn btn-xs btn-danger pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area=divisions&id='. $division->id .'&action=delete">Delete</a>
					</td>
				</tr>';
			
		}
		
			$table .= '</tbody>
		</table>';
		
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
		
			$form = '<form class="form-horizontal" role="form" method="post" action="'. get_page_url() .'">
				<div class="form-group">
					<label class="col-sm-3 control-label" for="cell_name">Cell Name</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="cell_name" name="cell_name" value="'. $cells->getValue('cell_name') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="cell_number">Cell Number</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="cell_number" name="cell_number" value="'. $cells->getValue('cell_number') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="app_division_id">Division</label>
					<div class="col-sm-9">
						<select class="form-control" name="app_division_id">';
						
							// Retrieve divisions list
							foreach ($divisions->getData() as $division) {
								$form .= '<option '. ($cells->getValue('app_division_id') == $division->id ? 'selected="selected"' : '') .' value="'. $division->id .'">'. $division->division_name .'</option>';
							}
						
						$form .= '</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="app_location_id">Location</label>
					<div class="col-sm-9">
						<select class="form-control" name="app_location_id">';
						
							// Retrieve locations list
							foreach ($locations->getData() as $location) {
								$form .= '<option '. ($cells->getValue('app_location_id') == $location->id ? 'selected="selected"' : '') .' value="'. $location->id .'">'. $location->location_name .'</option>';
							}
						
						$form .= '</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="cell_iq_connector">Cell IQ Connector</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="cell_iq_connector" name="cell_iq_connector" value="'. $cells->getValue('cell_iq_connector') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="cell_status">Cell Status</label>
					<div class="col-sm-9">
						<select class="form-control" name="cell_status">
							<option '. ($cells->getValue('cell_status') == 'active' ? 'selected="selected"' : '') .' value="active">Active</option>
							<option '. ($cells->getValue('cell_status') == 'service' ? 'selected="selected"' : '') .' value="service">Service</option>
							<option '. ($cells->getValue('cell_status') == 'discontinued' ? 'selected="selected"' : '') .' value="discontinued">Discontinued</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button class="btn btn-default" type="submit" name="submit">Submit</button>
					</div>
				</div>
			</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>
	
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($cells->getData() as $cell) {
			
				$table .= '<tr>
					<td>
						<a href="'. $template->get_option('site_url') .'/admin.php?area=cells&id='. $cell->id .'&action=edit">'. $cell->cell_name .'</a>
						
						<a class="btn btn-danger btn-xs pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area=cells&id='. $cell->id .'&action=delete">Delete</a>
					</td>
				</tr>';
			
		}
		
			$table .= '</tbody>
		</table>';
		
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
		
			$form = '<form class="form-horizontal" method="post" action="'. get_page_url() .'">
				<div class="form-group">
					<label class="col-sm-3 control-label" for="name">Link Name</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="name" name="link_name" value="'. $links->getValue('link_name') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="description">Description:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="description" name="link_description" value="'. $links->getValue('link_description') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="url">URL</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="url" name="link_url" value="'. $links->getValue('link_url') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="bg_color">Background Color</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="bg_color" name="link_bg_color" value="'. $links->getValue('link_bg_color') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="address">Order</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="order" name="link_order" value="'. $links->getValue('link_order') .'" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="address">Icon Class</label>
					<div class="col-sm-9">	
						<input class="form-control" type="text" id="class" name="link_icon_class" value="'. $links->getValue('link_icon_class') .'" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input class="btn btn-default" type="submit" name="submit" value="Submit" />
					</div>
				</div>
			</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>		
		
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($links->getData() as $link) {
			
				$table .= '<tr>
					<td class="app_list_data app_list_title">
						<a href="'. $template->get_option('site_url') .'/admin.php?area=links&id='. $link->id .'&action=edit">'. $link->link_name .'</a>
						
						<a class="btn btn-danger btn-xs pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area=links&id='. $link->id .'&action=delete">Delete</a>
					</td>
				</tr>';
			
		}
		
			$table .= '</tbody>
		</table>';
		
		// Print table
		echo $table;
			
	}
	
}

/**
 * Displays admin roles form
 */
function get_admin_roles_form() {
	
	global $roles, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
		$form = '<form class="form-horizontal" method="post" action="'. get_page_url() .'">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="role_name">Role Name</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="role_name" name="role_name" value="'. $roles->getValue('role_name') .'" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="btn btn-default" type="submit" name="submit">Submit</button>
				</div>
			</div>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>
	
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($roles->getData() as $role) {
			
				$table .= '<tr>
					<td class="app_list_data app_list_title">
						<a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&id='. $role->id .'&action=edit">'. $role->role_name .'</a>
						
						<a class="btn btn-danger btn-xs pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&id='. $role->id .'&action=delete">Delete</a>
					</td>
				</tr>';
			
		}
		
			$table .= '</tbody>
		</table>';
		
		// Print table
		echo $table;
			
	}
	
}

/**
 * Displays admin users form
 */
function get_admin_users_form() {
	
	global $roles, $users, $userCells, $divisions, $cells, $template;
	
	if (get_var('action') && get_var('action') == 'add' || get_var('action') == 'edit') {
		
		$form = '<form class="form-horizontal" method="post" action="'. get_page_url() .'">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="user_name">Name</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="user_name" name="user_name" value="'. $users->getValue('user_name') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="app_roles_id">Role</label>
				<div class="col-sm-9">
					<select class="form-control" name="app_roles_id">';
					
						$form .= '<option '. ($roles->getValue('app_roles_id') == '' ? 'selected="selected"' : '') .' value="">--</option>';
					
						// Retrieve roles list
						foreach ($roles->getData() as $role) {
							$form .= '<option '. ($roles->getValue('app_roles_id') == $role->id ? 'selected="selected"' : '') .' value="'. $role->id .'">'. $role->role_name .'</option>';
						}
					
					$form .= '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="app_divisions_id">Division</label>
				<div class="col-sm-9">
					<select class="form-control" name="app_divisions_id">';
					
						$form .= '<option '. ($users->getValue('app_divisions_id') == '' ? 'selected="selected"' : '') .' value="">--</option>';
					
						// Retrieve divisions list
						foreach ($divisions->getData() as $division) {
							$form .= '<option '. ($users->getValue('app_divisions_id') == $division->id ? 'selected="selected"' : '') .' value="'. $division->id .'">'. $division->division_name .'</option>';
						}
					
					$form .= '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Select cells user assigned to</label>
				<div class="col-sm-9">
					<div class="checkbox">
						<label><input type="checkbox" class="checkall" /> (Select All)</label>
					</div>
					<div class="checkbox">';
					
						// Get assigned cells for this user, if any
						$user_cells_assigned = array();
						
						if (get_var('action') == 'edit') {
						
							$filter = array(
								'where' => 'app_users_id = '. get_var('id')
							);
						
							if ($userCells->getData($filter)) {
								foreach($userCells->getData($filter) as $user_cells_data) {
									array_push($user_cells_assigned, $user_cells_data->app_cells_id);
								}
							}
						}
			
						// Get all cells
						foreach ($cells->getData() as $cell) {
		
							$form .= '<div class="checkbox">
								<label><input '. (!empty($user_cells_assigned) && in_array($cell->id, $user_cells_assigned) ? 'checked="checked"' : 'no') .' type="checkbox" name="user_cells[]" value="'. $cell->id .'" /> '. $cell->cell_name .'</label>
							</div>';
		
						}
				
					$form .= '</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="user_shift">Shift</label>
				<div class="col-sm-9">
					<select class="form-control" name="user_shift">';
					
						$form .= '<option '. ($users->getValue('user_shift') == '' ? 'selected="selected"' : '') .' value="">--</option>';
						$form .= '<option '. ($users->getValue('user_shift') == 'first' ? 'selected="selected"' : '') .' value="first">First</option>';
						$form .= '<option '. ($users->getValue('user_shift') == 'second' ? 'selected="selected"' : '') .' value="second">Second</option>';
						$form .= '<option '. ($users->getValue('user_shift') == 'third' ? 'selected="selected"' : '') .' value="third">third</option>';
					
					$form .= '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="user_email_address">Email Address</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="user_email_address" name="user_email_address" value="'. $users->getValue('user_email_address') .'" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="user_notification_threshold">Notification Threshold</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="user_notification_threshold" name="user_notification_threshold" value="'. $users->getValue('user_notification_threshold') .'" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="btn btn-default" type="submit" name="submit">Submit</button>
				</div>
			</div>
		</form>';
		
		// Print form
		echo $form;
		
	} else {
	
		$table = '<a class="btn btn-primary" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&action=add">Add New</a>
	
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>';
		
			if ($users->getData()) {
				foreach ($users->getData() as $user) {
					
					$table .= '<tr>
						<td class="app_list_data app_list_title">
							<a href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&id='. $user->id .'&action=edit">'. $user->user_name .'</a>
							
							<a class="btn btn-danger btn-xs pull-right delete-button" href="'. $template->get_option('site_url') .'/admin.php?area='. get_var('area') .'&id='. $user->id .'&action=delete">Delete</a>
						</td>
					</tr>';
					
				}
			} else {
			
				$table .= '<tr>
					<td>No users exist yet.</td>
				</tr>';
				
			}
		
			$table .= '</tbody>
		</table>';
		
		// Print table
		echo $table;
			
	}
	
}