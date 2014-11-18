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
					$location_id = get_var('id');
			
					$location = ($location_id ? Location::getLocation($location_id) : false);
					$location_name = ($location ? $location->getName() : '');
					$location_country = ($location ? $location->getCountry() : '');
					$location_state = ($location ? $location->getState() : '');
					$location_city = ($location ? $location->getCity() : '');
					$location_street = ($location ? $location->getStreet() : '');
					$location_zip = ($location ? $location->getZip() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$location) : ?>
				
					<?php create_message('danger', 'Location does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="name">Location Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="name" name="location_name" value="<?php echo $location_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="country">Country</label>
							<div class="col-sm-9">
								<select class="form-control" id="country" name="location_country">
									<option <?php echo ($location_country == 'us' ? 'selected="selected"' : ''); ?> value="us">United States</option>
									<option <?php echo ($location_country == 'mexico' ? 'selected="selected"' : ''); ?> value="mexico">Mexico</option>
									<option <?php echo ($location_country == 'hungary' ? 'selected="selected"' : ''); ?> value="hungary">Hungary</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="state">State/Province:</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="state" name="location_state" value="<?php echo $location_state; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="city">City</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="city" name="location_city" value="<?php echo $location_city; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="address">Street Address</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="street" name="location_street" value="<?php echo $location_street; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="zip">Zip Code</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="zip" name="location_zip" value="<?php echo $location_zip; ?>" />
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
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=locations&action=add">Add New</a>
		
				<?php if (Location::getAllLocations()) : ?>
		
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
							
						<?php foreach (Location::getAllLocations() as $location) : ?>
							<tr>
								<td><a href="<?php echo $app->url; ?>/admin.php?area=locations&action=view&id=<?php echo $location->getID(); ?>"><?php echo $location->getName(); ?></a></li></td>
							</tr>
						<?php endforeach; ?>
			
						</tbody>
					</table>
					
				<?php endif; ?>
			
			<?php endif; ?>
			
		</div>
	
	</div>

<?php get_footer(); ?>