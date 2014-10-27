<?php

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