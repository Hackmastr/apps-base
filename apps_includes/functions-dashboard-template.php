<?php
/**
 * Dashboard template functions
 */

/**
 * Displays dashboard links
 */
function get_dashboard_links() {
	
	global $links, $template;
	
	$dashboard_link_list = '';
	
	foreach($links->getData() as $link) {
		
		$dashboard_link_list .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			<a class="thumbnail link_'. $link->id .'" href="'. $link->link_url .'">
				<i style="color: '. $link->link_bg_color .'" class="fa '. $link->link_icon_class .'"></i>
				<h4>'. $link->link_name .'</h4>
				<span>'. $link->link_description .'</span>
			</a>
		</div>';
		
	}
	
	// Print dashboard link list
	echo $dashboard_link_list;
	
}

/**
 * Innolunch Menu
 */
function get_innolunch_menu() {
	
	global $innolunch, $template;
	
	$menu = '<h2>Lunch Schedule</h2>
	<table class="table table-bordered">
		<thead>
			<tr>';
				foreach ($innolunch->getData() as $lunch) {
					$menu .= '<th>'. $lunch->innolunch_day .'</th>';
				}
			$menu .= '</tr>
		</thead>
		<tbody>
			<tr>';
	
				foreach ($innolunch->getData() as $lunch) {
					$menu .= '<td>
							<p class="item">'. $lunch->innolunch_item .'</p>
							<p class="price">'. $lunch->innolunch_price .'</p>
						</td>';
				}
	
				$menu .= '</tr>
			</tbody>
		</table>';
	
	echo $menu;
	
}