create database chatApp;
 
use chatApp;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `profile` blob DEFAULT NULL,
  PRIMARY KEY (`id`)
);