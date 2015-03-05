<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>

	<div class="row dashboard-links">
		<?php if (Link::getAllLinks()) : foreach(Link::getAllLinks() as $link) : ?>

			<div class="col-lg-3 col-md-4 col-xs-6">
				<a class="thumbnail" href="<?php echo $link->getURL(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $link->getDescription(); ?>">
					<i style="color: <?php echo $link->getBGColor(); ?>" class="fa <?php echo $link->getIconClass(); ?>"></i>
					<h4><?php echo $link->getName(); ?></h4>
				</a>
			</div>

		<?php endforeach; else : create_message('info', 'No links exist.', true); endif; ?>
	</div>

	<div class="row webex-host-links">
		<div class="col-lg-12">
			<h1>WebEx</h1>

			<a class="btn btn-lg btn-primary" href="https://venturamfg.webex.com/mw0401lsp12/mywebex/login/login.do?siteurl=venturamfg&login_return_url=%2Fmc0901lsp12%2Fmeetingcenter%2Fframe%2Fexpandurl.do%3Fsiteurl%3Dventuramfg">Host a Meeting</a>
			<a class="btn btn-lg btn-primary" href="<?php echo $options['site_url']; ?>/conferencerooms.php">Join a Meeting</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<h1>Apps</h1>

			<div class="dashboard-links">
				<?php foreach($options['mainnav']['apps']['children'] as $app) : ?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<a class="thumbnail" href="<?php echo $options['site_url'] .'/'. $app['url']; ?>" data-toggle="tooltip">
							<i class="fa <?php echo $app['icon']; ?>"></i>
							<h4><?php echo $app['title']; ?></h4>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
			$('.thumbnail').tooltip();
		});
	</script>

<?php get_footer(); ?>
