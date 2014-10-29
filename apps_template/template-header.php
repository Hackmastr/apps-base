<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $template->page_title .' - '. $options['site_title']; ?></title>
		
		<!-- Device support -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		
		<!-- jQuery Validate -->
		<script src="<?php echo $options['site_url']; ?>/apps_template/js/jquery.validate.min.js"></script>
		
		<!-- Ventura Apps JavaScript -->
		<script src="<?php echo $options['site_url']; ?>/apps_template/js/ventura-apps.js"></script>

		<!-- Bootstrap CSS -->
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		
		<!-- Global CSS -->
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/apps-global.css" rel="stylesheet" media="screen" />

		<!-- HTML5 support for IE -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Font Awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

		<!-- Apps head -->
		<?php apps_head(); ?>	
	
	</head>
<body>
	
<div id="page-wrap">
	
	<div class="navbar navbar-inverse apps_main_nav" role="navigation">
		<div class="container-fluid">
		
		    <div class="navbar-header">
				
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
		      
				<a class="navbar-brand" href="<?php echo $options['site_url']; ?>">VenturaApps <sup>Beta</sup></a>
		    
		    </div>
			
			<div class="collapse navbar-collapse main-nav">
				<?php get_nav_menu(); ?>
			</div>
			
		</div><!-- /container -->
	</div><!-- /navbar -->
	
	<div class="container-fluid main-container">