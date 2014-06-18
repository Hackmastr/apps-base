<?php get_header(); ?>

	<h2><?php echo $template->get_page_title(); ?></h2>
	
	<section class="apps_tabbed_container">
	
		<nav class="apps_tabbed_nav">
			<?php get_admin_tabs(); ?>
		</nav>
		
		<div class="apps_tabbed_content">
		
			<?php if ($template->hasMessage()) { ?>
			<div class="msg_box <?php echo $template->getMessageType(); ?>">
				<?php echo $template->getMessage(); ?>
			</div>
			<?php } ?>
		
			<?php get_admin_divisions_form(); ?>
		
		</div>
	
	</section>

<?php get_footer(); ?>