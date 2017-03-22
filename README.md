# swedmarks
plain and simple bookmark manager written in PHP,JS and mySQL

## Create Database

```mysql
CREATE DATABASE `swedmarks` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE USER swedmarks@localhost IDENTIFIED BY 'xyz';
GRANT ALL PRIVILEGES ON swedmarks.* TO 'swedmarks'@'localhost';
FLUSH PRIVILEGES;

use `swedmarks`;

CREATE TABLE `user` (
  `username` varchar(256) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `admin` enum('0','1') NOT NULL DEFAULT '0',
  `token` varchar(32) NOT NULL DEFAULT '6',
  UNIQUE KEY `id` (`username`),
  UNIQUE KEY `token_UNIQUE` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `bookmark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(1024) NOT NULL DEFAULT '',
  `description` varchar(1024),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `childof` int NOT NULL DEFAULT '0',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `favicon` varchar(255) DEFAULT NULL,
  `screenshot_name` varchar(50) DEFAULT NULL,
  `screenshot_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`url`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `folder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `childof` int NOT NULL DEFAULT '0',
  `name` char(70) NOT NULL DEFAULT '',
  `user` char(20) NOT NULL DEFAULT '',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
```
