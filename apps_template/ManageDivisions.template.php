<?php

/**
 * Main divisions template
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
		
		if ($page['db_result']) {
	
			echo '<ul class="apps_data_list">
				<li class="apps_data_list_header">
					<dl>
						<dd class="division_name">Name</dd>
					</dl>
				</li>
				<li>
					<dl>';
					
					foreach($page['db_result'] as $division) {
					
						echo '<dd class="division_name"><a href="'. get_page_url() .'&view='. $division['id'] .'">'. $division['name'] .'</a></dd>';
						
					}
					
					echo '</dl>
				</li>
			</ul>';
			
		}
		
	echo '</div>';

}

/**
 * Display single division
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
						<label for="division_name">Division Name</label>
						<input type="text" id="division_name" name="division_name" value="'. get_db_result_val('name') .'" />
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