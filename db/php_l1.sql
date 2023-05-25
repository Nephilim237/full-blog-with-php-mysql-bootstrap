-- Adminer 4.8.0 MySQL 5.5.5-10.5.9-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` set('super','admin','modo') NOT NULL DEFAULT 'modo',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `firstname`, `email`, `password`, `created_at`, `role`, `active`) VALUES
(2,	'Coding',	'City',	'codingcity9014@gmail.com',	'$argon2i$v=19$m=65536,t=4,p=1$Um9kMEsycFNpaHliU09lWA$mhNesLhwhNcac7PXi3a0B1xOun9ZTMvpsC4R3KtBCvE',	'2021-05-10 18:09:21',	'super',	'1'),
(6,	'hack',	'Meta',	'hackmeta5@gmail.com',	'$argon2i$v=19$m=65536,t=4,p=1$eGFCaE9MZkZlY3JiL3VjSA$uQIpMSheq2OU2C1urOvd5UrjQeo2xwPtvaKBWTr0B3w',	'2021-05-17 22:34:01',	'modo',	'1');

DROP TABLE IF EXISTS `user_add`;
CREATE TABLE `user_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `born_at` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'assets/img/default.png',
  `other` tinytext DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_add` (`id`, `born_at`, `gender`, `adress`, `phone`, `image`, `other`, `user_id`) VALUES
(3,	NULL,	NULL,	NULL,	NULL,	'assets/img/default.png',	NULL,	6);

-- 2021-05-17 22:19:53
