<?php
/**
 * Main theme functions
 */

/**
 * Site header
 */
function get_header() {
	
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="'. SITE_URL .'/apps_assets/css/style.css" />
		
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	
	<header id="apps_site_header">
	
		<div class="apps_site_wrap">
	
			<a href="'. SITE_URL .'"><img src="'. SITE_URL .'/apps_assets/img/logo.png" alt="'. SITE_TITLE .'" /></a>';
		
			get_main_nav();
	
		echo '</div>
	</header>';
		
	
}

/**
 * Site footer
 */
function get_footer() {
	
	echo '</body>
	</html>';
	
}

/**
 * Site main navigation
 */
function get_main_nav() {
	
	// Go to database
	echo 'Navbar';
	
}