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
	
	<div id="innolunch">
		
		<?php echo (get_var('menu') == 'edit' ? '<form class="form-horizontal" method="post" action="'. get_page_url() .'">' : ''); ?>
		
		<h2>Innolunch  - <?php echo (get_var('menu') == 'edit' ? '<input name="innolunch_week" type="text" value="'. Innolunch::getWeek() .'" />' : Innolunch::getWeek()); ?> <span class="pull-right"><?php echo (get_var('menu') == 'edit' ? '<button class="btn btn-primary btn-xs" type="submit" name="save">Save</button>' : '<a href="'. get_page_url() .'/index.php?menu=edit#innolunch">Edit</a>'); ?></span></h2>
		
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Day</th>
					<th>Item</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach (Innolunch::getMenu() as $menu) : ?>
					<tr>
						<td width="20%">
							<?php echo $menu->getDay(); ?>
						</td>
						<td width="70%'">
							<?php echo (get_var('menu') == 'edit' ? '<input class="form-control" name="innolunch_item_'. $menu->getID() .'" type="text" value="'. $menu->getItem() .'" />' : $menu->getItem()); ?>		
						</td>
						<td width="10%">
							<?php echo (get_var('menu') == 'edit' ? '<input class="form-control" name="innolunch_price_'. $menu->getID() .'" type="text" value="'. $menu->getPrice() .'" />' : $menu->getPrice()); ?>		
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		<?php echo (get_var('menu') == 'edit' ? '</form>' : ''); ?>
		
	</div>

<?php get_footer(); ?>