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
					$cell_id = get_var('id');
			
					$cell = ($cell_id ? Cell::getCell($cell_id) : false);
					$cell_name = ($cell ? $cell->getName() : '');
					$cell_number = ($cell ? $cell->getNumber() : '');
					$app_division_id = ($cell ? $cell->getDivisionID() : '');
					$app_location_id = ($cell ? $cell->getLocationID() : '');
					$cell_iq_connector = ($cell ? $cell->getIQConnector() : '');
					$cell_status = ($cell ? $cell->getStatus() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$cell) : ?>
				
					<?php create_message('danger', 'Cell does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="name">Cell Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="name" name="cell_name" value="<?php echo $cell_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="cell_number">Cell Number</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="cell_number" name="cell_number" value="<?php echo $cell_number; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="app_division_id">Division</label>
							<div class="col-sm-9">
								<select class="form-control" name="app_division_id">
									<?php foreach (Division::getAllDivisions() as $division) : ?>
										<option <?php echo ($app_division_id == $division->getID() ? 'selected="selected"' : ''); ?> value="<?php echo $division->getID(); ?>"><?php echo $division->getName(); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="app_location_id">Location</label>
							<div class="col-sm-9">
								<select class="form-control" name="app_location_id">
									<?php foreach (Location::getAllLocations() as $location) : ?>
										<option <?php echo ($app_location_id == $location->getID() ? 'selected="selected"' : ''); ?> value="<?php echo $location->getID(); ?>"><?php echo $location->getName(); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="cell_iq_connector">Cell IQ Connector</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="cell_iq_connector" name="cell_iq_connector" value="<?php echo $cell_iq_connector; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="cell_status">Cell Status</label>
							<div class="col-sm-9">
								<select class="form-control" name="cell_status">
									<option <?php echo ($cell_status == 'active' ? 'selected="selected"' : ''); ?> value="active">Active</option>
									<option <?php echo ($cell_status == 'service' ? 'selected="selected"' : ''); ?> value="service">Service</option>
									<option <?php echo ($cell_status == 'discontinued' ? 'selected="selected"' : ''); ?> value="discontinued">Discontinued</option>
								</select>
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
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=cells&action=add">Add New</a>
		
				<?php if (Cell::getAllCells()) : ?>
		
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
							
						<?php foreach (Cell::getAllCells() as $cell) : ?>
							<tr>
								<td><a href="<?php echo $app->url; ?>/admin.php?area=cells&action=view&id=<?php echo $cell->getID(); ?>"><?php echo $cell->getName(); ?></a></li></td>
							</tr>
						<?php endforeach; ?>
			
						</tbody>
					</table>
					
				<?php endif; ?>
			
			<?php endif; ?>			
			
		</div>
	
	</div>

<?php get_footer(); ?>