-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE `stagiaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `stagiaire` (`id`, `created_at`, `name`, `phone`, `birthday`) VALUES
(1,	'2021-02-03 15:51:19',	'Olga',	'1234567890',	'2021-04-14'),
(2,	'2018-04-03 15:53:29',	'Andjelija',	'0987654321',	'1999-03-04');

-- 2021-02-03 13:18:31
