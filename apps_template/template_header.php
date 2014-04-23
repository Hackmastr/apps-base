<!DOCTYPE html>
<html>
<head>
	<title><?php get_page_title(); ?></title>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" type="text/css" href="<?php get_option('site_url'); ?>/apps_template/style.css" />
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php apps_head(); ?>
	
</head>
<body>

<header id="apps_site_header">

	<div class="apps_site_wrap">

		<a href="<?php get_option('site_url'); ?>"><img src="<?php get_option('site_url'); ?>/apps_template/images/logo.png" alt="<?php get_option('site_title'); ?>" /></a>
	
		<?php get_main_nav(); ?>

	</div>
</header>

<div id="apps_main_content">