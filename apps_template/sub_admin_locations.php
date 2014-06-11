<?php

// Get our locations class
$locations = Bootstrap::Locations();

echo '<ol>';

foreach ($locations->get_locations_list() as $location) {
	
	echo '<li>'. $location->name .'</li>';
	
}

echo '</ol>';