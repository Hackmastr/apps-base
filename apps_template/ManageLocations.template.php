<?php
/**
 * Template file for managing locations
 */

/**
 * Main template function
 */
function template_main() {
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>
		<a href="'. get_page_url() .'&action=add">Add New Location</a>
		
	</div>';
	
}

/**
 * Form for adding new location
 */
function template_add() {
	
	echo '<div class="apps_sidebar">';
		get_sub_nav();
	echo '</div>';

	echo '<div class="apps_content right">
		<h1>'. get_page_title() .'</h1>
		
		<form method="post" action="'. get_page_url() .'">
			<ul>
				<li>
					<label for="name">Location Name (e.g. Roosevelt):</label>
					<input type="text" id="name" name="name" />
				</li>
				<li>
					<label for="country">Country:</label>
					<select id="country">
						<option value="us">United States</option>
						<option value="mexico">Mexico</option>
						<option value="hungary">Hungary</option>
					</select>
				</li>
				<li>
					<label for="state">State/Province:</label>
					<input type="text" id="state" name="state" />
				</li>
				<li>
					<label for="city">City:</label>
					<input type="text" id="city" name="city" />
				</li>
				<li>
					<label for="name">Address:</label>
					<input type="text" id="address" name="address" />
				</li>
				<li>
					<label for="name">Zip Code:</label>
					<input type="text" id="zip" name="zip" />
				</li>
				<li>
					<input type="submit" />
				</li>
			</ul>
		
		</form>
		
	</div>';
	
}