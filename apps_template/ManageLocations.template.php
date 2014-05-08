<?php

/**
 * Main locations template
 */
function template_main() {
	
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
				
					echo '<dd class="location_name"><a href="'. get_page_url() .'&view='. $location['id'] .'">'. $location['name'] .'</a></dd>
					<dd class="location_country">'. $location['country'] .'</dd>
					<dd class="location_state">'. $location['state'] .'</dd>
					<dd class="location_city">'. $location['city'] .'</dd>
					<dd class="location_street">'. $location['street'] .'</dd>
					<dd class="location_zip">'. $location['zip'] .'</dd>';
					
				}
				
				echo '</dl>
			</li>
		</ul>';
		
	echo '</div>';
	
}

/**
 * Display single location
 */
function template_display() {
	
	global $page;
	
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
						<input type="text" id="name" name="location_name" value="'. get_db_result_val('name') .'" />
					</li>
					<li>
						<label for="country">Country</label>
						<select id="country" name="location_country">
							<option '. (get_db_result_val('country') == 'us' ? 'selected="selected"' : '') .' value="us">United States</option>
							<option '. (get_db_result_val('country') == 'mexico' ? 'selected="selected"' : '') .' value="mexico">Mexico</option>
							<option '. (get_db_result_val('country') == 'hungary' ? 'selected="selected"' : '') .' value="hungary">Hungary</option>
						</select>
					</li>
					<li>
						<label for="state">State/Province:</label>
						<input type="text" id="state" name="location_state" value="'. get_db_result_val('state') .'" />
					</li>
					<li>
						<label for="city">City</label>
						<input type="text" id="city" name="location_city" value="'. get_db_result_val('city') .'" />
					</li>
					<li>
						<label for="address">Street Address</label>
						<input type="text" id="street" name="location_street" value="'. get_db_result_val('street') .'" />
					</li>
					<li>
						<label for="zip">Zip Code</label>
						<input type="text" id="zip" name="location_zip" value="'. get_db_result_val('zip') .'" />
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