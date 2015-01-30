<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>
	
	<div id="innolunch">
		
		<?php echo (get_var('menu') == 'edit' ? '<form class="form-horizontal" method="post" action="'. get_page_url() .'">' : ''); ?>
		
		<h4>Week of <?php echo (get_var('menu') == 'edit' ? '<input name="innolunch_week" type="text" value="'. Innolunch::getWeek() .'" />' : Innolunch::getWeek()); ?> <span class="pull-right"><?php echo (get_var('menu') == 'edit' ? '<a class="btn btn-default btn-xs" href="'. $options['site_url'] .'/index.php?p=zeelunch#innolunch">Cancel</a> <button class="btn btn-primary btn-xs" type="submit" name="save">Save</button>' : '<a href="'. get_page_url() .'&menu=edit#innolunch">Edit</a>'); ?></span></h4>
		
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
	
	<script type="text/javascript">
		$(function() {
			$('.thumbnail').tooltip();
		});
	</script>

<?php get_footer(); ?>