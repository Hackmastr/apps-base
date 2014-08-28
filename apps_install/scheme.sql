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
	link_icon_class VARCHAR(30) NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_innolunch_week (
	id bigint(20) unsigned NOT NULL auto_increment,
	innolunch_week VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO app_innolunch_week (innolunch_week) VALUES ('00/00/0000');

CREATE TABLE app_innolunch (
	id bigint(20) unsigned NOT NULL auto_increment,
	innolunch_week_id BIGINT(20) NOT NULL DEFAULT 1,
	innolunch_day VARCHAR(200) NOT NULL,
	innolunch_item VARCHAR(200) NOT NULL,
	innolunch_price VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)	
);
INSERT INTO app_innolunch (innolunch_week_id, innolunch_day, innolunch_item, innolunch_price) VALUES (1, 'Monday', 'Item 1', '$3.00');
INSERT INTO app_innolunch (innolunch_week_id, innolunch_day, innolunch_item, innolunch_price) VALUES (1, 'Tuesday', 'Item 2', '$3.00');
INSERT INTO app_innolunch (innolunch_week_id, innolunch_day, innolunch_item, innolunch_price) VALUES (1, 'Wednesday', 'Item 3', '$3.00');
INSERT INTO app_innolunch (innolunch_week_id, innolunch_day, innolunch_item, innolunch_price) VALUES (1, 'Thursday', 'Item 4', '$3.00');
INSERT INTO app_innolunch (innolunch_week_id, innolunch_day, innolunch_item, innolunch_price) VALUES (1, 'Friday', 'Item 5', '$3.00');

CREATE TABLE app_roles (
	id bigint(20) unsigned NOT NULL auto_increment,
	role_name VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_users (
	id bigint(20) unsigned NOT NULL auto_increment,
	app_roles_id bigint(20) NOT NULL,
	app_divisions_id bigint(20),
	user_name VARCHAR(100) NOT NULL,
	user_email_address VARCHAR(100) NOT NULL,
	user_shift VARCHAR(100) NOT NULL,
	user_notification_threshold int,
	user_is_cell_lead int NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_users_cells (
	id bigint(20) unsigned NOT NULL auto_increment,
	app_users_id bigint(20) NOT NULL,
	app_cells_id bigint(20) NOT NULL,
	PRIMARY KEY (id)
);