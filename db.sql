create database chatApp;
 
use chatApp;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `profile` blob DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `send_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fromUserId` bigint DEFAULT NULL,
  `toUserId` bigint DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
);