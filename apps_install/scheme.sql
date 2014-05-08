CREATE TABLE app_locations (
	id bigint(20) unsigned NOT NULL auto_increment,
	location_name VARCHAR(200) NOT NULL,
	location_country VARCHAR(200) NOT NULL,
	location_state VARCHAR(200) NOT NULL,
	location_city VARCHAR(200) NOT NULL,
	location_street VARCHAR(200) NOT NULL,
	location_zip VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_divisions (
	id bigint(20) unsigned NOT NULL auto_increment,
	division_name VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)	
);

CREATE TABLE app_cells (
	id bigint(20) unsigned NOT NULL auto_increment,
	cell_name VARCHAR(100) NOT NULL,
	cell_number int(4) NOT NULL,
	app_division_id bigint(20) NOT NULL,
	app_location_id bigint(20) NOT NULL,
	cell_iq_connector VARCHAR(100) NOT NULL,
	cell_status VARCHAR(10) NOT NULL DEFAULT 'active',
	PRIMARY KEY (id)	
);