<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>
	
	<div class="row dashboard-links">
		<?php if (Link::getAllLinks()) : foreach(Link::getAllLinks() as $link) : ?>
		
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<a class="thumbnail" href="<?php echo $link->getURL(); ?>">
					<i style="color: <?php echo $link->getBGColor(); ?>" class="fa <?php echo $link->getIconClass(); ?>"></i>
					<h4><?php echo $link->getName(); ?></h4>
					<span><?php echo $link->getDescription(); ?></span>
				</a>
			</div>			
		
		<?php endforeach; else : create_message('info', 'No links exist.', true); endif; ?>
	</div>

<?php get_footer(); ?>