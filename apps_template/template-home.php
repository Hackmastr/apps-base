<?php get_header(); ?>

	<h2><?php echo $template->get_page_title(); ?></h2>
	
	<section id="home_dashboard_links">
		<?php get_dashboard_links(); ?>
	</section>
	
	<section id="innolunch">
		<?php get_innolunch_menu(); ?>
	</section>

<?php get_footer(); ?>