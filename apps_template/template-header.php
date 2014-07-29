<!DOCTYPE html>
<html>
<head>
	<title><?php echo $template->get_page_title() .' - '. $template->get_option('site_title'); ?></title>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" type="text/css" href="<?php echo $template->get_option('site_url'); ?>/apps_template/global.css" />
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?php echo $template->get_option('site_url'); ?>/apps_template/js/ventura-apps.js"></script>
	
	<?php apps_head(); ?>
	
</head>
<body>

<div id="apps_site_wrap">

	<header id="apps_site_header" class="clear">
		
		<h1 id="apps_site_logo"><a href="<?php echo $template->get_option('site_url'); ?>"><img src="<?php echo $template->get_option('site_url'); ?>/apps_template/images/logo.png" alt="'. SITE_TITLE .'" /></a></h1>
	
		<nav id="apps_site_nav">
			<?php get_nav_menu(); ?>
		</nav>
		
	</header>
	
	<main id="apps_main_container" class="grid">
