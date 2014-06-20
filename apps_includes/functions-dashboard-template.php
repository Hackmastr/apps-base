<?php
/**
 * Dashboard template functions
 */

/**
 * Displays dashboard links
 */
function get_dashboard_links() {
	
	global $links, $template;
	
	$dashboard_link_list = '<ul>';
	
	foreach($links->getData() as $link) {
		
		$dashboard_link_list .= '<li><a style="border-top: 3px solid '. $link->link_bg_color .';" class="dashboard_link link_'. $link->id .'" href="'. $link->link_url .'">'. $link->link_name .' <span>'. $link->link_description .'</span></a></li>';
		
	}
	
	$dashboard_link_list .= '</ul>';
	
	// Print dashboard link list
	echo $dashboard_link_list;
	
}