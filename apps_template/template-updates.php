<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					--
				</div>
				<div class="panel-body update-notes">
					<h4>Base</h4>
					<ul>
						<li>A banner will now display if the user's web browser is out of date.</li>
						<li>Simplified look of updates page.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Added option to include metrics in corporate overview. Metrics that are not get filtered from the presentation mode.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					April 20th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Base</h4>
					<ul>
						<li>Dashboard links order now display on the Manage Links list page.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Forecasts can now be entered per division and corporate.</li>
						<li>New "Presentation Mode".</li>
						<li>Empty fields now default to "0" if nothing has been entered.</li>
						<li>Limit hits/misses to 125 characters.</li>
						<li>Calculate button now works in Internet Explorer.</li>
						<li>Fixed quoted words from disappearing in hits/misses.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					February 25th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Base</h4>
					<ul>
						<li class="added">Added conference room page.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Refactored hits/misses so there's only one save button per metric input page (instead of 4).</li>
						<li>Added "Goal" to forecast column header description.</li>
						<li>Added Percent and Dollars to metric data type options.</li>
						<li>Highlight reported metrics on Manage Metrics page.</li>
						<li>Display percent numbers instead of decimals for metric.</li>
						<li>Display data type sign in front/behind input box.</li>
						<li>Fixed categories from being unable to be saved or modified.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					February 7th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Base</h4>
					<ul>
						<li>Added Google Analytics.</li>
						<li>Added <a href="<?php echo $options['site_url']; ?>/docs">phpDocs</a>.</li>
						<li>If a template file doesn't exist in the app's template directory, fallback to the base template directory before failing completely.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Selected period now defaults to previous month.</li>
						<li>Rephrased period selection submit button from "Submit" to "Select Period" to differentiate it from the Save Metrics button.</li>
						<li>Added border to bottom of period selection form to separate it from metric input panels.</li>
						<li>Added selected month name to page title.</li>
						<li>Login is now required to manage metrics and categories.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					February 2nd, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>General</h4>
					<ul>
						<li>Initial release.</li>
					</ul>
				</div>
			</div>

		</div>
	</div>

<?php get_footer(); ?>
