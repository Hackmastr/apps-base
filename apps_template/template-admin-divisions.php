<?php get_header(); ?>

	<div class="apps_sidebar">
		
		<?php get_sidebar(); ?>
	
	</div>
	
	<div class="apps_content right">
	
		<h2><?php echo $template->get_page_title(); ?></h2>
	
		<?php get_message(); ?>
	
		<?php get_admin_divisions_form(); ?>
	
	</div>

<?php get_footer(); ?>