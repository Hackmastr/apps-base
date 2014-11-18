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
					$division_id = get_var('id');
			
					$division = ($division_id ? Division::getDivision($division_id) : false);
					$division_name = ($division ? $division->getName() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$division) : ?>
				
					<?php create_message('danger', 'Division does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="name">Division Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="name" name="division_name" value="<?php echo $division_name; ?>" />
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
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=divisions&action=add">Add New</a>
		
				<?php if (Division::getAllDivisions()) : ?>
		
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
							
						<?php foreach (Division::getAllDivisions() as $division) : ?>
							<tr>
								<td><a href="<?php echo $app->url; ?>/admin.php?area=divisions&action=view&id=<?php echo $division->getID(); ?>"><?php echo $division->getName(); ?></a></li></td>
							</tr>
						<?php endforeach; ?>
			
						</tbody>
					</table>
					
				<?php endif; ?>
			
			<?php endif; ?>
		
		</div>
		
	</div>

<?php get_footer(); ?>