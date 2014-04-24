<!DOCTYPE html>
<html>
<head>
	<title><?php get_page_title(); ?></title>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" type="text/css" href="<?php get_option('site_url'); ?>/apps_templates/style.css" />
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php apps_head(); ?>
	
</head>
<body>

<header id="apps_site_header">

	<div class="apps_site_wrap">

		<a href="<?php get_option('site_url'); ?>"><img src="<?php get_option('site_url'); ?>/apps_templates/images/logo.png" alt="<?php get_option('site_title'); ?>" /></a>
	
		<nav id="apps_site_nav">
			<ul>
				<li><a href="<?php get_option('site_url'); ?>">Home</a></li>
				<li>
					<a href="#">Apps</a>
					<ul>
						<li><a href="<?php get_option('site_url'); ?>/a/monthly">Monthly</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Tools</a>
					<ul>
						<li><a href="<?php get_option('site_url'); ?>/index.php?action=manage">Manage</a></li>
					</ul>
				</li>
			</ul>
		</nav>

	</div>
</header>

<div id="apps_main_content">