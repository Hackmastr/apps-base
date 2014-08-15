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
		
			<?php get_admin_divisions_form(); ?>
		
		</div>
		
	</div>

<?php get_footer(); ?>