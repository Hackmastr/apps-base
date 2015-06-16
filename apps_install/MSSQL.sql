CREATE TABLE app_locations (
	id bigint check (id > 0) NOT NULL identity,
	location_name VARCHAR(200) NOT NULL,
	location_country VARCHAR(200) NOT NULL,
	location_state VARCHAR(200) NOT NULL,
	location_city VARCHAR(200) NOT NULL,
	location_street VARCHAR(200) NOT NULL,
	location_zip VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_divisions (
	id bigint check (id > 0) NOT NULL identity,
	division_name VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_cells (
	id bigint check (id > 0) NOT NULL identity,
	cell_name VARCHAR(100) NOT NULL,
	cell_number decimal(38) NOT NULL,
	app_division_id bigint NOT NULL,
	app_location_id bigint NOT NULL,
	cell_iq_connector VARCHAR(100) NOT NULL,
	cell_status VARCHAR(20) NOT NULL DEFAULT 'active',
	cell_order decimal(38) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_links (
	id bigint check (id > 0) NOT NULL identity,
	link_name VARCHAR(30) NOT NULL,
	link_description VARCHAR(100) NOT NULL,
	link_url VARCHAR(255) NOT NULL,
	link_bg_color VARCHAR(10),
	link_order decimal(38) NOT NULL,
	link_icon_class VARCHAR(30) NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_innolunch_week (
	id bigint check (id > 0) NOT NULL identity,
	innolunch_week VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO app_innolunch_week (innolunch_week) VALUES ('00/00/0000');

CREATE TABLE app_innolunch (
	id bigint check (id > 0) NOT NULL identity,
	innolunch_day VARCHAR(200) NOT NULL,
	innolunch_item VARCHAR(200) NOT NULL,
	innolunch_price VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO app_innolunch (innolunch_day, innolunch_item, innolunch_price) VALUES ('Monday', 'Item 1', '$3.00');
INSERT INTO app_innolunch (innolunch_day, innolunch_item, innolunch_price) VALUES ('Tuesday', 'Item 2', '$3.00');
INSERT INTO app_innolunch (innolunch_day, innolunch_item, innolunch_price) VALUES ('Wednesday', 'Item 3', '$3.00');
INSERT INTO app_innolunch (innolunch_day, innolunch_item, innolunch_price) VALUES ('Thursday', 'Item 4', '$3.00');
INSERT INTO app_innolunch (innolunch_day, innolunch_item, innolunch_price) VALUES ('Friday', 'Item 5', '$3.00');

CREATE TABLE app_roles (
	id bigint check (id > 0) NOT NULL identity,
	role_name VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE app_users (
	id bigint check (id > 0) NOT NULL identity,
	app_roles_id bigint,
	app_divisions_id bigint,
	user_name VARCHAR(100) NOT NULL,
	user_email_address VARCHAR(100) NOT NULL,
	user_shift VARCHAR(100),
	user_notification_threshold decimal(38),
	user_is_cell_lead decimal(38) NOT NULL,
	user_password VARCHAR(255),
	user_is_admin decimal(38) NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO app_users (user_name, user_email_address, user_is_cell_lead, user_password, user_is_admin) VALUES ('administrator', 'apps@venturamfg.com', 0, '$2y$10$vpXWDBir4QScr0GS63mKienYquM.hrTKwtV1rjYfrzXFxO/yzC7C.', 1);

CREATE TABLE app_users_cells (
	id bigint check (id > 0) NOT NULL identity,
	app_users_id bigint NOT NULL,
	app_cells_id bigint NOT NULL,
	PRIMARY KEY (id)
);
