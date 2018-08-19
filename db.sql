Create table product
(
	id int primary key auto_increment,
	category_id int not null,
	name varchar(200) not null,
	image varchar(200) null,
	price float null default '0',
	sale_price float null default '0',
	content text null,
	status tinyint null default '1',
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp,
	foreign key (category_id) references category(id)
);