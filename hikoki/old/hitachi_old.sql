use hitachi;
CREATE TABLE `users` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE banner_index (
	ID int NOT NULL AUTO_INCREMENT,
    admin_path varchar(100) not null,
    image_path varchar(100) not null,
    image_link varchar(200),
    status varchar(10),
    primary key(id)
);
use hitachi;
create table middle_row_social (
	ID int not null auto_increment,
    image_admin_path varchar(100) not null,
    image_user_path varchar(100) not null,
    image_link varchar(200),
    primary key(id)
);

CREATE TABLE POWER_TOOLS_TYPE(
	id int not null auto_increment,
    type_name_en varchar(200) not null,
    type_name_th varchar(200) not null,
    order_id int, 
    admin_image_dir varchar(200),
    user_image_dir varchar (200),
    primary key(id)
);

CREATE TABLE POWER_TOOLS(
	id int not null auto_increment,
    product_name varchar(200) not null,
    short_description_en varchar(200),
    short_description_th varchar(200),
    specification_en text,
    specification_th text,
    admin_image_dir varchar(200),
    user_image_dir varchar(200),
    admin_file_dir varchar(200),
    user_file_dir varchar(200),
    is_new_product boolean,
    power_tools_type_id int not null,
    primary key(id),
    FOREIGN KEY (power_tools_type_id) REFERENCES POWER_TOOLS_TYPE(id)
);


CREATE TABLE OUTDOOR_POWER_TYPE(
	id int not null auto_increment,
    type_name_en varchar(200) not null,
    type_name_th varchar(200) not null,
    order_id int, 
    admin_image_dir varchar(200),
    user_image_dir varchar (200),
    primary key(id)
);

CREATE TABLE OUTDOOR_POWER(
	id int not null auto_increment,
    product_name varchar(200) not null,
    short_description_en varchar(200),
    short_description_th varchar(200),
    specification_en text,
    specification_th text,
    admin_image_dir varchar(200),
    user_image_dir varchar(200),
    admin_file_dir varchar(200),
    user_file_dir varchar(200),
    is_new_product boolean,
    outdoor_power_type_id int not null,
    primary key(id),
    FOREIGN KEY (outdoor_power_type_id) REFERENCES OUTDOOR_POWER_TYPE(id)
);

CREATE TABLE ABOUT(
	id int not null auto_increment,
    description_en text,
    description_th text,
    admin_image_dir varchar(200),
    user_image_dir varchar(200),
    primary key(id)
);

CREATE TABLE NEWS(
	id int not null auto_increment,
    news_en text,
    news_th text,
    news_date date,
    admin_image_dir varchar(200),
    user_image_dir varchar(200),
    primary key(id)
);

select * from users;
select * from BANNER_INDEX;
select * from middle_row_social;
select * from POWER_TOOLS_TYPE order by order_id desc;
insert into banner_index (image_path, status) values("sfsdfdf", "active");
select * from POWER_TOOLS;

select * from ABOUT limit 1;
select * from news order by news_date desc;