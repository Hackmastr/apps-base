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