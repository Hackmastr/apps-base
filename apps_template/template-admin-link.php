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
			
				<?php get_admin_links_form(); ?>
				
			</div>
			
		</div>
	
	</div>

<?php get_footer(); ?>