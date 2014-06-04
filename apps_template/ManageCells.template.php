<?php

/**
 * Main cells template
 */
function template_main() {

	global $page, $db;
	
	echo '<div class="apps_sidebar">
		'. get_sub_nav() .'
	</div>

	<div class="apps_content right">
	
		<h2>'. get_page_title() .'</h2>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		}
		
		echo '<p><a href="'. get_page_url() .'&add=new">Add New</a></p>';
		
		if ($page['db_result']) {
	
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
					
						echo '<dd class="cell_name"><a href="'. get_page_url() .'&view='. $cell['id'] .'">'. $cell['name'] .'</a></dd>
						<dd class="cell_number">'. $cell['number'] .'</dd>
						<dd class="cell_division">'. $cell['division'] .'</dd>
						<dd class="cell_location">'. $cell['location'] .'</dd>
						<dd class="cell_iq_connector">'. $cell['iq_connector'] .'</dd>
						<dd class="cell_status">'. $cell['status'] .'</dd>';
						
					}
					
					echo '</dl>
				</li>
			</ul>';
			
		}
		
	echo '</div>';

}

/**
 * Display single cell
 */
function template_display() {
	
	global $page;
	
	echo '<div class="apps_sidebar">
		'. get_sub_nav() .'
	</div>

	<div class="apps_content right">
	
		<h2>'. get_page_title() .'</h2>';
		
		// Do we have a message to show?
		if ($page['has_message']) {
			echo $page['the_message'];
		} else {
	
			echo '<form class="apps_form" method="post" action="'. get_page_url() .'">
				<ul>
				</li>
				<li>
					<label for="cell_name">Cell Name</label>
					<input type="text" id="cell_name" name="cell_name" value="'. get_db_result_val('name') .'" />
				</li>
				<li>
					<label for="cell_number">Cell Number</label>
					<input type="text" id="cell_number" name="cell_number" value="'. get_db_result_val('number') .'" />
				</li>
				<li>
					<label for="app_division_id">Division</label>
					<select name="app_division_id">';
					
						// Retrieve divisions list
						foreach ($page['divisions'] as $division) {
							
							echo '<option value="'. $division['id'] .'">'. $division['name'] .'</option>';
							
						}
					
				echo '</select>
				</li>
				<li>
					<label for="app_location_id">Location</label>
					<select name="app_location_id">';
					
						// Retrieve locations list
						foreach ($page['locations'] as $location) {
							
							echo '<option value="'. $location['id'] .'">'. $location['name'] .'</option>';
							
						}
					
				echo '</select>
				<li>
					<label for="cell_iq_connector">Cell IQ Connector</label>
					<input type="text" id="cell_iq_connector" name="cell_iq_connector" value="'. get_db_result_val('iq_connector') .'" />
				</li>
				<li>
					<label for="cell_status">Cell Status</label>
					<select name="cell_status">
						<option '. (get_db_result_val('status') == 'active' ? 'selected="selected"' : '') .' value="active">Active</option>
						<option '. (get_db_result_val('status') == 'service' ? 'selected="selected"' : '') .' value="service">Service</option>
						<option '. (get_db_result_val('status') == 'discontinued' ? 'selected="selected"' : '') .' value="discontinued">Discontinued</option>
					</select>
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