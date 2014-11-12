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
					$user_id = get_var('id');
					
					$user = ($user_id ? User::getUser($user_id) : false);
					$user_name = ($user ? $user->getName() : '');
					$user_role_id = ($user ? $user->getRoleID() : '');
					$user_division_id = ($user ? $user->getDivisionID() : '');
					$user_shift = ($user ? $user->getShift() : '');
					$user_email_address = ($user ? $user->getEmailAddress() : '');
					$user_notification_threshold = ($user ? $user->getNotificationThreshold() : '');
					$user_is_cell_lead = ($user ? $user->getIsCellLead() : '');
					$user_password = ($user ? $user->getPassword() : '');
					$user_is_admin = ($user ? $user->isAdmin() : '');
				?>
				
				<?php if (get_var('action') != 'add' && !$user) : ?>
				
					<?php create_message('danger', 'User does not exist!', true); ?>
					
				<?php else : ?>
				
					<form class="form-horizontal" method="post" action="<?php echo get_page_url(); ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="user_name">Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="app_roles_id">Role</label>
							<div class="col-sm-9">
								<select class="form-control" name="app_roles_id">
									<option <?php echo ($user_role_id == '' ? 'selected="selected"' : ''); ?> value="">--</option>
									<?php if (Role::getAllRoles()) : foreach(Role::getAllRoles() as $role) : ?>
										<option <?php echo ($user_role_id == $role->getID() ? 'selected="selected"' : ''); ?> value="<?php echo $role->getID(); ?>"><?php echo $role->getName(); ?></option>
									<?php endforeach; endif; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="app_divisions_id">Division</label>
							<div class="col-sm-9">
								<select class="form-control" name="app_divisions_id">
									<option <?php echo ($user_division_id == '' ? 'selected="selected"' : ''); ?> value="">--</option>
									<?php if (Division::getAllDivisions()) : foreach(Division::getAllDivisions() as $division) : ?>
										<option <?php echo ($user_division_id == $division->getID() ? 'selected="selected"' : ''); ?> value="<?php echo $division->getID(); ?>"><?php echo $division->getName(); ?></option>
									<?php endforeach; endif; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Select cells user assigned to</label>
							<div class="col-sm-9">
								<div class="checkbox">
									<label><input type="checkbox" class="checkall" /> (Select All)</label>
								</div>
								<div class="checkbox checkmultiple">
									<?php if (Cell::getAllCells()) : foreach(Cell::getAllCells() as $cell) : ?>
										<?php User::inCell($user_id, $cell->getID()); ?>
										<div class="checkbox">
											<label><input <?php echo (User::inCell($user_id, $cell->getID()) ? 'checked="checked"' : ''); ?> type="checkbox" name="user_cells[]" value="<?php echo $cell->getID(); ?>" /> <?php echo $cell->getName(); ?></label>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="user_shift">Shift</label>
							<div class="col-sm-9">
								<select class="form-control" name="user_shift">
									<option value="">--</option>
									<option <?php echo ($user_shift == 'first' ? 'selected="selected"' : ''); ?> value="first">First</option>
									<option <?php echo ($user_shift == 'second' ? 'selected="selected"' : ''); ?> value="second">Second</option>
									<option <?php echo ($user_shift== 'third' ? 'selected="selected"' : ''); ?> value="third">third</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="user_email_address">Email Address</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="user_email_address" name="user_email_address" value="<?php echo $user_email_address; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="user_notification_threshold">Notification Threshold</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" id="user_notification_threshold" name="user_notification_threshold" value="<?php echo $user_notification_threshold; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Is this user a cell lead?</label>
							<div class="col-sm-9">
								<div class="radio">
									<label><input <?php echo ($user_is_cell_lead ? 'checked="checked"' : ''); ?> type="radio" name="user_is_cell_lead" value="1" /> Yes</label>
								</div>
								<div class="radio">
									<label><input <?php echo (!$user_is_cell_lead ? 'checked="checked"' : ''); ?> type="radio" name="user_is_cell_lead" value="0" /> No</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="user_password">Password (optional)</label>
							<div class="col-sm-9">
								<input class="form-control" type="password" id="user_password" name="user_password" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Is admin</label>
							<div class="col-sm-9">
								<div class="radio">
									<label><input <?php echo ($user_is_admin ? 'checked="checked"' : ''); ?> type="radio" name="user_is_admin" value="1" /> Yes</label>
								</div>
								<div class="radio">
									<label><input <?php echo (!$user_is_admin ? 'checked="checked"' : ''); ?> type="radio" name="user_is_admin" value="0" /> No</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button class="btn btn-default" type="submit" name="submit">Submit</button>
								<button class="btn btn-danger pull-right" type="submit" name="delete">Delete</button>
							</div>
						</div>
					</form>
					
				<?php endif; ?>
				
			<?php else : ?>
			
				<a class="btn btn-primary" href="<?php echo $app->url; ?>/admin.php?area=users&action=add">Add New</a>
				
				<?php if (User::getAllUsers()) : ?>
				
					<table class="table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
				
							<?php foreach(User::getAllUsers() as $user) : ?>
							
								<tr>
									<td>
										<a href="<?php echo $app->url; ?>/admin.php?area=users&action=view&id=<?php echo $user->getID(); ?>"><?php echo $user->getName(); ?></a>
									</td>
								</tr>			
	
							<?php endforeach; ?>
							
						</tbody>
					</table>
							
				<?php else : ?>
	
					<?php create_message('info', 'No users have been created yet.', true); ?>
		
				<?php endif; ?>
			
			<?php endif; ?>
			
		</div>
	
	</div>

<?php get_footer(); ?>