<?php get_header(); ?>

	<h2><?php echo $template->get_page_title(); ?></h2>
	
	<section id="apps">
		<ul class="apps_dashboard_links clear">
			<li>
				<a href="<?php echo $template->get_option('site_url'); ?>/a/monthly">
					<i class="fa fa-calendar"></i>
					<h4>Monthly</h4>
				</a>
			</li>
			<li>
				<a href="<?php echo $template->get_option('site_url'); ?>/a/pitchtracker">
					<i class="fa fa-bar-chart-o"></i>
					<h4>PitchTracker</h4>
				</a>
			</li>
		</ul>
	</section>

<?php get_footer(); ?>