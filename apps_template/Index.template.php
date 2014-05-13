<?php
/**
 * Main index template file
 */

/**
 * Site header
 */
function template_header() {
	
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>'. get_page_title() .' - '. SITE_TITLE .'</title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="'. SITE_URL .'/apps_template/global.css" />
		
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	<body>
	
	<header id="apps_site_header">
	
		<div class="apps_site_wrap">
	
			<a id="apps_site_logo" href="'. SITE_URL .'"><img src="'. SITE_URL .'/apps_template/images/logo.png" alt="'. SITE_TITLE .'" /></a>
		
			<nav id="apps_site_nav">
				<ul>
					<li>
						<a href="'. SITE_URL .'">Home</a>
					</li>
					<li>
						<a href="#">Apps</a>
						<ul>
							<li><a href="'. SITE_URL .'/a/monthly">Monthly</a></li>
						</ul>
					</li>
					<li>
						<li><a href="'. SITE_URL .'/index.php?p=manage">Manage</a></li>
					</li>
				</ul>
			</nav>
	
		</div>
	</header>
	
	<main id="apps_main_container">
		<div class="apps_site_wrap">';
		
}

/**
 * Site footer
 */
function template_footer() {

		echo '</div>
	</main>

	</body>
	</html>';

}