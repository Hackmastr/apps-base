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
		
		$dashboard_link_list .= '<li>
			<a class="dashboard_link link_'. $link->id .'" href="'. $link->link_url .'">
				<i style="color: '. $link->link_bg_color .'" class="fa '. $link->link_icon_class .'"></i>
				<h4>'. $link->link_name .'</h4>
				<span>'. $link->link_description .'</span>
			</a></li>';
		
	}
	
	$dashboard_link_list .= '</ul>';
	
	// Print dashboard link list
	echo $dashboard_link_list;
	
}

/**
 * Innolunch Menu
 */
function get_innolunch_menu() {
	
	global $innolunch, $template;
	
	$menu = '<h2>Lunch Schedule</h2>
	<ul>';
	
	foreach ($innolunch->getData() as $lunch) {
		$menu .= '<li>
		
			<p class="day">'. $lunch->innolunch_day .'</p>
			<p class="item">'. $lunch->innolunch_item .'</p>
			<p class="price">'. $lunch->innolunch_price .'</p>
			
		</li>';
	}
	
		$menu .= '</ul>';
	
	echo $menu;
	
}