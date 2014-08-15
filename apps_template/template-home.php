<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->get_page_title(); ?></h1>
	</div>
	
	<div class="row dashboard-links">
		<?php get_dashboard_links(); ?>
	</div>
	
	<div class="table-responsive">
		<?php get_innolunch_menu(); ?>
	</div>

<?php get_footer(); ?>