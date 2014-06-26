<?php get_header(); ?>

	<h2><?php echo $template->get_page_title(); ?></h2>
	
	<section class="apps_tabbed_container">
	
		<nav class="apps_tabbed_nav">
			<?php get_admin_tabs(); ?>
		</nav>
		
		<div class="apps_tabbed_content">
		
			<?php get_message(); ?>
		
			<?php get_admin_cells_form(); ?>
		
		</div>
	
	</section>

<?php get_footer(); ?>