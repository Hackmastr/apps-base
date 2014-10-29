<?php get_header(); ?>
	
	<div class="row">
	
		<div class="col-sm-4 col-md-3 sidebar">
			<?php echo $template->subnav(); ?>
		</div>
		
		<div class="col-sm-8 col-md-9">
		
			<div class="page-header">
	
				<h1><?php echo $template->page_title; ?></h1>
				
			</div>
	
			<?php get_message(); ?>
		
			<div class="row dashboard-links">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=locations">
						<i class="fa fa-globe"></i>
						<h4>Locations</h4>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=divisions">
						<i class="fa fa-sitemap"></i>
						<h4>Divisions</h4>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=cells">
						<i class="fa fa-cubes"></i>
						<h4>Cells</h4>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=links">
						<i class="fa fa-link"></i>
						<h4>Links</h4>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=roles">
						<i class="fa fa-trophy"></i>
						<h4>Roles</h4>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php $app->url; ?>?area=users">
						<i class="fa fa-users"></i>
						<h4>Users</h4>
					</a>
				</div>
			</div>
		</div>
	
	</div>

<?php get_footer(); ?>