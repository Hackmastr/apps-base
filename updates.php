<?php require 'apps-core.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		
		<title>Updates</title>
		
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/k.css" rel="stylesheet" media="screen" />
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/updates.css" rel="stylesheet" media="screen" />
	
	</head>
	<body>
		
		<header id="cl-head">
			<h1><strong>[Base App]</strong> Update Notes</h1>
			<span class="legend legend-added">Added</span><span class="legend legend-removed">Removed</span><span class="legend legend-fixed">Fixed</span><span class="legend legend-improved">Improved</span>
		</header>
		
		<div id="cl-content">
		
			<div class="entry">
				<h2>&lt;date&gt;</h2>
				<ul>
					<li class="added">Item added.</li>
					<li class="removed">Item removed.</li>
					<li class="fixed">Item fixed.</li>
					<li class="improved">Item improved.</li>
				</ul>
			</div>
			
		</div>
		
	</body>
</html>