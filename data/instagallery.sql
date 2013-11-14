-- MySQL dump 10.13  Distrib 5.5.17, for osx10.6 (i386)
--
-- Host: localhost    Database: instagallery
-- ------------------------------------------------------
-- Server version	5.5.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hashdetail`
--

DROP TABLE IF EXISTS `hashdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hashdetail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hash` varchar(10) DEFAULT NULL,
  `site_value` varchar(255) DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  `image_full` varchar(255) DEFAULT NULL,
  `image_thumb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`),
  CONSTRAINT `hashdetail_ibfk_1` FOREIGN KEY (`hash`) REFERENCES `hashtag` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hashdetail`
--

LOCK TABLES `hashdetail` WRITE;
/*!40000 ALTER TABLE `hashdetail` DISABLE KEYS */;
INSERT INTO `hashdetail` VALUES (1,'SAM_1234','sam1234',1,'http://distilleryimage6.ak.instagram.com/d2464e1a2aba11e3891a22000a9d0ec6_8.jpg','http://distilleryimage6.ak.instagram.com/d2464e1a2aba11e3891a22000a9d0ec6_5.jpg');
/*!40000 ALTER TABLE `hashdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hashtag`
--

DROP TABLE IF EXISTS `hashtag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hashtag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hash` varchar(15) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `site_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hashtag`
--

LOCK TABLES `hashtag` WRITE;
/*!40000 ALTER TABLE `hashtag` DISABLE KEYS */;
INSERT INTO `hashtag` VALUES (1,'SAM_1234','2013-11-13 16:13:28','sam1234');
/*!40000 ALTER TABLE `hashtag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-13 16:18:59
