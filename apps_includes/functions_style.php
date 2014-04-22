<?php
/**
 * Main style/theme functions
 */

/**
 * Page header
 */
get_header() {
	
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" type="text/css" href="'. ABS_PATH .'/style.css" />
		
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>';
		
	
}

/**
 * Page footer
 */
get_footer() {
	
	echo '</body>
	</html>';
	
}