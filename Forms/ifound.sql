create database ifound;
use ifound;

create table user (
	id int auto_increment primary key not null,
    email varchar(250),
    nome varchar(250),
    senha varchar(50)
);

select * from user;