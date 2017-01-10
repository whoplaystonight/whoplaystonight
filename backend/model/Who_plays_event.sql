CREATE DATABASE  IF NOT EXISTS `Who_plays` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Who_plays`;
-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: plastmagysl.com    Database: Who_plays
-- ------------------------------------------------------
-- Server version	5.5.53-0+deb8u1

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `event_id` varchar(11) NOT NULL,
  `band_id` varchar(11) DEFAULT NULL,
  `band_name` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type_event` varchar(30) DEFAULT NULL,
  `n_participants` varchar(3) DEFAULT NULL,
  `date_event` varchar(10) DEFAULT NULL,
  `type_access` varchar(20) DEFAULT NULL,
  `date_ticket` varchar(10) DEFAULT NULL,
  `openning` varchar(5) DEFAULT NULL,
  `start` varchar(5) DEFAULT NULL,
  `end` varchar(5) DEFAULT NULL,
  `poster` varchar(200) DEFAULT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `uniq1` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES ('E0000000000','B0000000000','Metronomy','qwertyuioasdfghjklÃ±zxcvbnmqwertyqwertyAQUARIUS','Performance','5','31/10/2016','Ticket,Invitation','31/10/2016','19:00','22:00','23:00','media/default-avatar.png',41.4034,2.17403,NULL,NULL,NULL),('E0000000002','B0000000002','test2','21321321354546645889879879','presentation','250','31/01/2017','Ticket','11/01/2017','01:00','04:00','12:00','media/default-avatar.png',0,0,'AL','default_province','default_town'),('E0000000003','B0000000003','TEST3','21213213554654687879545461132','presentation','250','31/01/2017','Ticket','10/01/2017','03:00','06:00','16:00','media/default-avatar.png',0,0,'ES','13','Alcubillas'),('E1234567890','B1234567890','Banda','Concierto de presentciÃ³n','Concierto','4','31/11/2016','Ticket','31/10/2016','22:00','23:00','02:00','media/default-avatar.png',39.335,-0.545851,NULL,NULL,NULL),('E1234567895','B1234567895','Banda2','Concierto de presentacion','Concierto','4','31/11/2016','Ticket','31/10/2016','22:00','23:00','02:00','media/default-avatar.png',38.8104,-0.603906,NULL,NULL,NULL),('E4646464642','B4646464642','ASDFASDF','ASFASDFASDFASDFASDFAGDGDAGSDG','concert','6','23/01/2017','Ticket','15/01/2017','04:00','06:00','07:00','media/default-avatar.png',0,0,'AO','default_province','default_town'),('E7894561230','B1234567890','Eagles of Death Metal','032154687945613254687','presentation','123','24/10/2016','Array','24/10/2016','18:00','21:00','22:00','media/default-avatar.png',40.0603,-2.1309,NULL,NULL,NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-09 21:47:07
