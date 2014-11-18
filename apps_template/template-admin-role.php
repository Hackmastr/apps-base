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
					$role_id = get_var('id');
					
					$role = ($role_id ? Role::getRole($role_id) : false);
					$role_name = ($role ? $role->getName() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$role) : ?>
				
					<?php create_message('danger', 'Role does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="role_name">Role Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="role_name" name="role_name" value="<?php echo $role_name; ?>" />
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
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=roles&action=add">Add New</a>
	
				<?php if (Role::getAllRoles()) : ?>
				
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
						
						<?php foreach (Role::getAllRoles() as $role) : ?>
							<tr>
								<td class="app_list_data app_list_title">
									<a href="<?php echo $app->url; ?>/admin.php?area=roles&action=view&id=<?php echo $role->getID(); ?>"><?php echo $role->getName(); ?></a>
								</td>
							</tr>
						<?php endforeach; ?>
			
						</tbody>
					</table>
					
				<?php else : ?>
				
					<?php create_message('info', 'No roles have been created yet.', true); ?>
					
				<?php endif; ?>
			
			<?php endif; ?>
			
		</div>
	
	</div>

<?php get_footer(); ?>