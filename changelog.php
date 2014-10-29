<?php

require 'apps-core.php';
$changelog = new Changelog();

$changelog->entries(array(
	array(
		'weekof' => 'mm.dd.yyyy',
		'type' => 'normal',
		'items' => array(
			''
		)
	)
));

?>

<!DOCTYPE html>
<html>
	<head>
		
		<title>Changelog - VenturaApps - Base</title>
		
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/k.css" rel="stylesheet" media="screen" />
		<link href="<?php echo $options['site_url']; ?>/apps_template/css/changelog.css" rel="stylesheet" media="screen" />
	
	</head>
	<body>
		
		<div id="cl-page-wrap">
			
			<h1>Changelog - Base</h1>
		
			<?php $changelog->getLog(); ?>
			
		</div>
		
	</body>
</html>