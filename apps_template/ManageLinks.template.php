<?php

/**
 * Main links template
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
						<dd class="link_name">Name</dd>
						<dd class="link_description">Description</dd>
						<dd class="link_url">URL</dd>
						<dd class="link_order">Order</dd>
					</dl>
				</li>
				<li>
					<dl>';
					
					foreach($page['db_result'] as $link) {
					
						echo '<dd class="link_name"><a href="'. get_page_url() .'&view='. $link['id'] .'">'. $link['name'] .'</a></dd>
						<dd class="link_description">'. $link['description'] .'</dd>
						<dd class="link_url">'. $link['url'] .'</dd>
						<dd class="link_order">'. $link['link_order'] .'</dd>';
						
					}
					
					echo '</dl>
				</li>
			</ul>';
			
		}
		
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
						<label for="name">Link Name</label>
						<input type="text" id="name" name="link_name" value="'. get_db_result_val('name') .'" />
					</li>
					<li>
						<label for="description">Description:</label>
						<input type="text" id="description" name="link_description" value="'. get_db_result_val('description') .'" />
					</li>
					<li>
						<label for="url">URL</label>
						<input type="text" id="url" name="link_url" value="'. get_db_result_val('url') .'" />
					</li>
					<li>
						<label for="bg_color">Background Color</label>
						<input type="text" id="bg_color" name="link_bg_color" value="'. get_db_result_val('bg_color') .'" />
					</li>
					<li>
						<label for="address">Order</label>
						<input type="text" id="order" name="link_order" value="'. get_db_result_val('link_order') .'" />
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