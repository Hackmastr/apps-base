<?php

// Get our locations class
$locations = Bootstrap::Locations();

echo '<table class="apps_list_table">
	<tr>
		<th class="app_list_header app_list_title">Title</th>
	</tr>';

foreach ($locations->get_locations_list() as $location) {
	
	echo '<tr>
		<td class="app_list_data app_list_title">
			<a href="'. $template->get_option('site_url') .'/admin/index.php?tab=locations&id='. $location->id .'&action=edit">'. $location->name .'</a>
		</td>
	</tr>';
	
}

echo '</table>';