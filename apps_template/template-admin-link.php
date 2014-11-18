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
			
			<?php if (is_single()) : ?>
			
				<?php
					$link_id = get_var('id');
			
					$link = ($link_id ? Link::getLink($link_id) : false);
					$link_name = ($link ? $link->getName() : '');
					$link_description = ($link ? $link->getDescription() : '');
					$link_url = ($link ? $link->getURL() : '');
					$link_bg_color = ($link ? $link->getBGColor() : '');
					$link_order = ($link ? $link->getOrder() : '');
					$link_icon_class = ($link ? $link->getIconClass() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$link) : ?>
				
					<?php create_message('danger', 'Link does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="name">Link Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="name" name="link_name" value="<?php echo $link_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="description">Description:</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="description" name="link_description" value="<?php echo $link_description; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="url">URL</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="url" name="link_url" value="<?php echo $link_url; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="bg_color">Background Color</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="bg_color" name="link_bg_color" value="<?php echo $link_bg_color; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="address">Order</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="order" name="link_order" value="<?php echo $link_order; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="address">Icon Class</label>
							<div class="col-sm-9">	
								<input class="form-control" type="text" id="class" name="link_icon_class" value="<?php echo $link_icon_class; ?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button class="btn btn-default" type="submit" name="submit">Submit</button>
								<?php if (get_var('action') == 'view') : ?>
									<button class="btn btn-default btn-danger pull-right" type="submit" name="delete">Delete</button>
								<?php endif; ?>
							</div>
						</div>
					</form>
				
				<?php endif; ?>
				
			<?php else : ?>
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=links&action=add">Add New</a>
		
				<?php if (Link::getAllLinks()) : ?>
		
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
							
						<?php foreach (Link::getAllLinks() as $link) : ?>
							<tr>
								<td><a href="<?php echo $app->url; ?>/admin.php?area=links&action=view&id=<?php echo $link->getID(); ?>"><?php echo $link->getName(); ?></a></li></td>
							</tr>
						<?php endforeach; ?>
			
						</tbody>
					</table>
					
				<?php endif; ?>
			
			<?php endif; ?>
			
		</div>
	
	</div>

<?php get_footer(); ?>