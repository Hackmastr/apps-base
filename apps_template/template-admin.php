<?php get_header(); ?>
	
	<div class="row">
	
		<div class="col-sm-4 col-md-3 sidebar">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="col-sm-8 col-md-9">
		
			<div class="page-header">
	
				<h1><?php echo $template->get_page_title(); ?></h1>
				
			</div>
	
			<?php get_message(); ?>
		
			<section id="admin_dashboard_links">
				<ul class="apps_dashboard_links">
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=locations">
							<i class="fa fa-globe"></i>
							<h4>Locations</h4>
						</a>
					</li>
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=divisions">
							<i class="fa fa-sitemap"></i>
							<h4>Divisions</h4>
						</a>
					</li>
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=cells">
							<i class="fa fa-cubes"></i>
							<h4>Cells</h4>
						</a>
					</li>
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=links">
							<i class="fa fa-link"></i>
							<h4>Links</h4>
						</a>
					</li>
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=roles">
							<i class="fa fa-trophy"></i>
							<h4>Roles</h4>
						</a>
					</li>
					<li>
						<a href="<?php $template->get_option('site_url'); ?>?area=users">
							<i class="fa fa-users"></i>
							<h4>Users</h4>
						</a>
					</li>
				</ul>
			</section>
		
		</div>

<?php get_footer(); ?>