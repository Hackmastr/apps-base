<?php get_header(); ?>

	<h2><?php echo $template->get_page_title(); ?></h2>
	
	<section class="apps_tabbed_container">
	
		<nav class="apps_tabbed_nav">
			<ul>
				<li><a href="<?php echo $template->get_option('site_url'); ?>/admin/index.php?tab=locations">Locations</a></li>
				<li><a href="<?php echo $template->get_option('site_url'); ?>/admin/index.php?tab=divisions">Divisions</a></li>
				<li><a href="<?php echo $template->get_option('site_url'); ?>/admin/index.php?tab=cells">Cells</a></li>
				<li><a href="<?php echo $template->get_option('site_url'); ?>/admin/index.php?tab=links">Links</a></li>
			</ul>
			<ul class="tabbed_nav_right button">
				<li><a href="<?php echo $template->get_option('site_url'); ?>/admin/index.php?tab=<?php echo $template->get_var('tab') ?>&action=add">Add New</a></li>
			</ul>
		</nav>
		
		<div class="apps_tabbed_content">
		
			<?php load_template_subs(); ?>
		
		</div>
	
	</section>

<?php get_footer(); ?>