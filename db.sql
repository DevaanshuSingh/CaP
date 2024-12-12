create database chatApp;
 
use chatApp;

create table users(
id bigint primary key auto_increment,
name varchar(255) NOT NULL,
userPassword varchar (255) NOT NULL,
profile blob
);