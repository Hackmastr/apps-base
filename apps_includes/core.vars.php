<?php
/**
 * Core variables
 */
$vars = array(
	'db_columns' => array(
		'locations' => array(
			'Name' => 'location_name',
			'Country' => 'location_country',
			'State' => 'location_state',
			'City' => 'location_city',
			'Street' => 'location_street',
			'ZIP' => 'location_zip'
		),
		'divisions' => array(
			'Name' => 'division_name'
		),
		'cells' => array(
			'Division' => 'app_division_id',
			'Location' => 'app_location_id',
			'Number' => 'cell_number',
			'Name' => 'cell_name',
			'IQ Connector' => 'cell_iq_connector',
			'Status' => 'cell_status'
		),
	),
);