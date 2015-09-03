<?php get_header(); ?>

	<div class="page-header">
		<h1><?php echo $template->page_title; ?></h1>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					-- --, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>Prevent financial images from getting cached.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					July 31st, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>Refactored how presentation mode graphs are generated for cells.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					July 16th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>Fixed metric forecast display order.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					June 24th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>General</h4>
					<ul>
						<li>Bootstrap updated to latest release.</li>
					</ul>
					<h4>Base</h4>
					<ul>
						<li>Added "Cell Display Order" options to cells.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Added corporate rollup configuration screen so now individual metrics can be included in the corporate rollup per division.</li>
						<li>Corporate rollup no longer requires the end-user to configure it on the setup screen.</li>
						<li>Removed slide title from finacial slides.</li>
						<li>Unwanted characters (commas, percent signs, etc) now get automatically stripped from input when metric data is submitted.</li>
						<li>The presentation order of cells can now be changed.</li>
						<li>The maximum/minimum display values for graphs can now be configured on the manage metric page.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					June 8th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>Added "Questions?" slide to the end of each cell, division, and corporate rollup.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					June 5th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>General</h4>
					<ul>
						<li>Disabled SMTPAuth for PHPMailer. This is no longer needed with Office 365.</li>
					</ul>
					<h4>Base</h4>
					<ul>
						<li>Increased character limit for dashboard links URLs to 255.</li>
						<li>Added General 1 WebEx room to Conference Rooms page.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Fixed issue with presentation mode setup where if you choose to present cells for one division, cells for every division would display.</li>
						<li>Added padding to .presentation_body.</li>
						<li>Added exporting options to graphs.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					May 13th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>Order cell metrics by month in presentation mode.</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					May 12th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Monthly</h4>
					<ul>
						<li>More impovements to Presentation Mode:
							<ul>
								<li>Added percent signs to actuals when data type is percent.</li>
								<li>Adjusted scale of graphs for specific metrics.</li>
								<li>Metrics that weren't calculated that had percent data type defined weren't getting converted from decimal in graphs.</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					May 8th, 2015
				</div>
				<div class="panel-body update-notes">
					<h4>Base</h4>
					<ul>
						<li>A banner will now display if the user's web browser is out of date.</li>
						<li>Simplified look of updates page.</li>
					</ul>
					<h4>Monthly</h4>
					<ul>
						<li>Various impovements to Presentation Mode:
							<ul>
								<li>Added option to metrics to display whether or not it gets included in corporate overview.</li>
								<li>Added option to metrics to manage display order.</li>
								<li>Added option to include which divisions get included into corporate rollup.</li>
								<li>Added data labels to column graphs.</li>
								<li>Changed way corporate rollup is calculated so now it displays correct results.</li>
								<li>Corporate Metrics management page now only displays metrics that are in corporate rollup.</li>
								<li>Improved setup page.</li>
								<li>Improved error checking after submitting Setup page.</li>
							</ul>
						</li>
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
