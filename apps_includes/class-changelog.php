<?php

class Changelog {
	
	private $entries;
	
	function entries($entries_array) {
		$this->entries = $entries_array;
	}
	
	function getLog() {
		
		$log = '';
		
		foreach ($this->entries as $entry) {
			
			$log .= '<div class="entry '. $entry['type'] .'">
			
				<h2>'. ($entry['type'] == 'hotfix' ? '[Hotfix] ' : '') .'Changes as of <em>'. $entry['weekof'] .'</em></h2>
				
				<ul>';
				
					foreach($entry['items'] as $item) {
						$log .= '<li>'. $item .'</li>';
					}
				
				$log .= '</ul>
					
			</div>';
			
		}
		
		echo $log;
	}
	
}