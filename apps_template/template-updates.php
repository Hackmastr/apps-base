<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>

		<div class="updatenotes-legend">
			<span class="updatenotes-legend-added">Added</span><span class="updatenotes-legend-removed">Removed</span><span class="updatenotes-legend-fixed">Fixed</span><span class="updatenotes-legend-improved">Improved</span>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					--
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li class="improved">Added option to include metrics in corporate overview. Metrics that are not get filtered from the presentation mode.</li>
					</ul>
					<h4>Base</h4>
					<ul>
						<li class="improved">A banner will now display if the user's web browser is out of date.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					April 20th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li class="added">Forecasts can now be entered per division and corporate.</li>
						<li class="added">New "Presentation Mode".</li>
						<li class="improved">Empty fields now default to "0" if nothing has been entered.</li>
						<li class="improved">Limit hits/misses to 125 characters.</li>
						<li class="fixed">Calculate button now works in Internet Explorer.</li>
						<li class="fixed">Fixed quoted words from disappearing in hits/misses.</li>
					</ul>
					<h4>Base</h4>
					<ul>
						<li class="improved">Dashboard links order now display on the Manage Links list page.</li>
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
						<li class="improved">Refactored hits/misses so there's only one save button per metric input page (instead of 4).</li>
						<li class="improved">Added "Goal" to forecast column header description.</li>
						<li class="improved">Added Percent and Dollars to metric data type options.</li>
						<li class="improved">Highlight reported metrics on Manage Metrics page.</li>
						<li class="improved">Display percent numbers instead of decimals for metric.</li>
						<li class="improved">Display data type sign in front/behind input box.</li>
						<li class="fixed">Fixed categories from being unable to be saved or modified.</li>
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
						<li class="improved">Selected period now defaults to previous month.</li>
						<li class="improved">Rephrased period selection submit button from "Submit" to "Select Period" to differentiate it from the Save Metrics button.</li>
						<li class="improved">Added border to bottom of period selection form to separate it from metric input panels.</li>
						<li class="improved">Added selected month name to page title.</li>
						<li class="improved">Login is now required to manage metrics and categories.</li>
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
