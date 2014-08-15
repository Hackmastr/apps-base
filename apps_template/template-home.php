<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->get_page_title(); ?></h1>
	</div>
	
	<section id="home_dashboard_links">
		<?php get_dashboard_links(); ?>
	</section>
	
	<section id="innolunch">
		<?php get_innolunch_menu(); ?>
	</section>

<?php get_footer(); ?>