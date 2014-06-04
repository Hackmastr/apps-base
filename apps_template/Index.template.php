<?php
/**
 * Main index template file
 */

/**
 * Site header
 */
function template_header() {

	global $page;
	
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>'. get_page_title() .' - '. SITE_TITLE .'</title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="'. SITE_URL .'/apps_template/global.css" />';
		
		if (!empty($page['stylesheets'])) {
			foreach($page['stylesheets'] as $stylesheet) {
				echo '<link rel="stylesheet" type="text/css" href="'. $stylesheet .'" />';
			}
		}
		
		echo '<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css" />
		
	</head>
	<body>
	
	<div id="apps_site_wrap">
	
		<header id="apps_site_header">
			
			<h1 id="apps_site_logo"><a href="'. SITE_URL .'"><img src="'. SITE_URL .'/apps_template/images/logo.png" alt="'. SITE_TITLE .'" /></a></h1>
		
			<nav id="apps_site_nav">
				<ul>
					<li '. ($page['parent'] == 'home' ? 'class="current-menu-item"' : '') .'>
						<a href="'. SITE_URL .'">Home</a>
					</li>
					<li '. ($page['parent'] == 'apps' ? 'class="current-menu-item"' : '') .'>
						<a href="'. SITE_URL .'/index.php?p=apps">Apps</a>
						<ul>
							<li><a href="'. SITE_URL .'/a/monthly">Monthly</a></li>
						</ul>
					</li>
					<li '. ($page['parent'] == 'manage' ? 'class="current-menu-item"' : '') .'>
						<a href="'. SITE_URL .'/index.php?p=manage">Manage</a>
					</li>
				</ul>
			</nav>
		</header>
		
		<main id="apps_main_container">';
		
}

/**
 * Site footer
 */
function template_footer() {

		echo '</main>
	</div>

	</body>
	</html>';

}