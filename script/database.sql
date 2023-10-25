create database dprueba;

use dprueba;

create table gender (
id int primary key auto_increment,
name varchar(100) unique 
);

create table user (
id int primary key auto_increment,
name varchar(100),
email varchar(100) unique,
gender_id int,
foreign key (gender_id) references gender(id),
password varchar(200)
);
