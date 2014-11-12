<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			
		<?php get_message(); ?>
		
		<?php if (!$usr->isLoggedIn()) : ?>
		
			<?php create_message('danger', 'You must log in.', true); ?>
				
			<?php get_login_form(); ?>
			
		<?php else : ?>
		
			<?php create_message('danger', 'You are already logged in!', true); ?>
			
		<?php endif; ?>
					
		</div>
	</div>

<?php get_footer(); ?>