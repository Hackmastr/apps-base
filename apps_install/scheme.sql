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
	cell_status VARCHAR(20) NOT NULL DEFAULT 'active',
	PRIMARY KEY (id)	
);

CREATE TABLE app_links (
	id bigint(20) unsigned NOT NULL auto_increment,
	link_name VARCHAR(30) NOT NULL,
	link_description VARCHAR(100) NOT NULL,
	link_url VARCHAR(100) NOT NULL,
	link_bg_color VARCHAR(10),
	link_order int NOT NULL,
	PRIMARY KEY (id)
);