# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: instagallery
# Generation Time: 2013-11-14 19:48:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table hashdetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hashdetail`;

CREATE TABLE `hashdetail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hash` varchar(10) DEFAULT NULL,
  `site_value` varchar(255) DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  `image_full` varchar(255) DEFAULT NULL,
  `image_thumb` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`),
  KEY `image_full` (`image_full`),
  CONSTRAINT `hashdetail_ibfk_1` FOREIGN KEY (`hash`) REFERENCES `hashtag` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hashdetail` WRITE;
/*!40000 ALTER TABLE `hashdetail` DISABLE KEYS */;

INSERT INTO `hashdetail` (`id`, `hash`, `site_value`, `approved`, `image_full`, `image_thumb`, `username`, `text`)
VALUES
	(1,'SAM_1234','sam1234',2,'http://distilleryimage8.s3.amazonaws.com/20b4b9844cc511e39f620ac472ead80b_8.jpg','http://distilleryimage8.s3.amazonaws.com/20b4b9844cc511e39f620ac472ead80b_5.jpg',NULL,NULL),
	(2,'SAM_1234','sam1234',1,'http://distilleryimage2.s3.amazonaws.com/88d2f7164cc411e3b246127664f558c0_8.jpg','http://distilleryimage2.s3.amazonaws.com/88d2f7164cc411e3b246127664f558c0_5.jpg',NULL,NULL),
	(3,'SAM_1234','sam1234',1,'http://distilleryimage5.s3.amazonaws.com/3d8c7e1a4d5711e38fe4125be5bdf6a9_8.jpg','http://distilleryimage5.s3.amazonaws.com/3d8c7e1a4d5711e38fe4125be5bdf6a9_5.jpg',NULL,NULL),
	(4,'SAM_1234','sam1234',1,'http://distilleryimage5.s3.amazonaws.com/9f1626004d5b11e3b14a12e478479d96_8.jpg','http://distilleryimage5.s3.amazonaws.com/9f1626004d5b11e3b14a12e478479d96_5.jpg',NULL,NULL),
	(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `hashdetail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hashtag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hashtag`;

CREATE TABLE `hashtag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hash` varchar(15) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `site_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hashtag` WRITE;
/*!40000 ALTER TABLE `hashtag` DISABLE KEYS */;

INSERT INTO `hashtag` (`id`, `hash`, `lastupdate`, `site_value`)
VALUES
	(1,'SAM_1234','2013-11-13 16:13:28','sam1234');

/*!40000 ALTER TABLE `hashtag` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
