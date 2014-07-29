<?php get_header(); ?>

	<div class="col-1-4">
		
		<?php get_sidebar(); ?>
	
	</div>
	
	<div class="col-3-4">
	
		<h2><?php echo $template->get_page_title(); ?></h2>
	
		<?php get_message(); ?>
	
		<?php get_admin_links_form(); ?>
	
	</div>

<?php get_footer(); ?>