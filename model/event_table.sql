CREATE DATABASE  IF NOT EXISTS `Who_plays` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Who_plays`;
-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: Who_plays
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
INSERT INTO `event` VALUES ('E0000000000','B0000000000','Metronomy','qwertyuioasdfghjklÃ±zxcvbnmqwertyqwertyAQUARIUS','Performance','5','31/10/2016','Ticket,Invitation','31/10/2016','19:00','22:00','23:00','media/default-avatar.png',NULL,NULL,NULL),('E0000000001','B0000000001','Tame Impala','02134579854621546879645214578','concert','4','31/10/2016','Ticket','24/10/2016','19:00','21:00','23:00','media/default-avatar.png','AU','default_province','default_town'),('E0000000002','B0000000002','Roosvelt','02135487964521021458795465454545454654','concert','4','31/10/2016','Ticket','24/10/2016','19:00','22:00','23:00','media/default-avatar.png','ES','46','Ontinyent'),('E0000000003','B0000000003','Muthemath','02136458795462154879546215468795462131221','concert','5','31/10/2016','Ticket','24/10/2016','11:00','18:00','19:00','media/default-avatar.png','GB','default_province','default_town'),('E0000000004','B0000000004','Royal Blood','021548754215478546214578','presentation','4','31/10/2016','Ticket','24/10/2016','18:00','20:00','22:00','media/default-avatar.png','GB','default_province','default_town'),('E0000000005','B0000000005','Kings of Lion','02134568796451324587954612478464651113','unplugged','3','31/10/2016','Invitation','24/10/2016','19:00','20:00','22:00','media/248877012-1025640568-flowers.png','US','default_province','default_town'),('E0000000006','B0000000006','TEST 6','213212135465468987954654621323','presentation','3','28/12/2016','Ticket','07/12/2016','15:00','16:00','22:00','media/default-avatar.png','AF','default_province','default_town'),('E0000000007','B0000000007','TEST 7','2132133125654654687997846554612312','presentation','2','28/12/2016','Ticket','15/12/2016','16:00','19:00','22:00','media/1458178167-flowers.png','BS','default_province','default_town'),('E0000000008','B0000000008','TEST 8','87798978645645421132312554698879','presentation','6','29/12/2016','Ticket','15/12/2016','18:00','22:00','23:00','media/default-avatar.png','AF','default_province','default_town'),('E0000000009','B0000000009','Banda 4','2121312565465688798975465465466455464656546451123312','concert','4','31/12/2016','Invitation','25/12/2016','20:00','22:00','23:00','media/default-avatar.png','ES','04','Alameda, La'),('E0000000010','B0000000010','Banda 5','2121312565465688798975465465466455464656546451123312','presentation','4','31/12/2016','Ticket','20/12/2016','20:00','22:00','23:00','media/default-avatar.png','AX','default_province','default_town'),('E0000000011','B0000000011','Test 11','2121332145546877985464651312','presentation','4','31/12/2016','Ticket','24/12/2016','18:00','20:00','23:00','media/924381202-flowers.png','CX','default_province','default_town'),('E0000000012','B0000000012','TEST 12','12132312454654568778946454564564511322112123464657878','presentation','4','31/12/2016','Ticket','21/12/2016','18:00','19:00','23:00','media/default-avatar.png','DZ','default_province','default_town'),('E0000000013','B0000000013','TEST 13','2132133215465468988987978988798798978798','presentation','5','29/12/2016','Ticket','22/12/2016','19:00','21:00','23:00','media/default-avatar.png','AL','default_province','default_town'),('E0000000014','B0000000014','TEST 14','212132135654654877895454212135465468794546312','presentation','2','31/01/2017','Ticket','04/01/2017','18:00','19:00','23:00','media/default-avatar.png','AF','default_province','default_town'),('E0000000015','B0000000015','TEST 15','21213213545445687978789','presentation','3','31/01/2017','Ticket','04/01/2017','16:00','17:00','19:00','media/default-avatar.png','DZ','default_province','default_town'),('E0000000016','B0000000016','TEST 16','21213123125454654654688778745546546','presentation','3','31/01/2017','Ticket','04/01/2017','14:00','15:00','21:00','media/default-avatar.png','AX','default_province','default_town'),('E0000000017','B0000000017','TEST 17','212132123155546897879454523213545489746512','presentation','999','31/01/2017','Ticket','04/01/2017','19:00','21:00','23:00','media/default-avatar.png','AX','default_province','default_town'),('E0000000018','B0000000018','TEST 18','211323125464655468787954654612132','presentation','999','31/01/2017','Ticket','04/01/2017','18:00','20:00','23:00','media/default-avatar.png','AX','default_province','default_town'),('E0000000019','B0000000019','TEST 19','213125465468797984655462113254546798465456','presentation','7','31/01/2017','Ticket','31/01/2017','18:00','21:00','22:00','media/default-avatar.png','AF','default_province','default_town'),('E0000000020','B0000000020','TEST 20','1231231256546548989754465213213132','presentation','22','31/01/2017','Ticket','04/01/2017','13:00','16:00','22:00','media/default-avatar.png','AU','default_province','default_town'),('E0000000021','B0000000021','TEST 21','2121354546456898794654561132123','presentation','5','31/01/2017','Ticket','04/01/2017','17:00','19:00','23:00','media/default-avatar.png','AS','default_province','default_town'),('E0000000022','B0000000022','TEST 22','112125454546877887778787878877877877778','presentation','4','31/01/2017','Ticket','04/01/2017','16:00','20:00','23:00','media/default-avatar.png','DZ','default_province','default_town'),('E0000000023','B0000000023','TEST 23','121321324546545787878877878787878','presentation','25','31/01/2017','Ticket','04/01/2017','15:00','18:00','23:00','media/default-avatar.png','AL','default_province','default_town'),('E0000000024','B0000000024','TEST 24','2112312544546587879874451231212545468787','presentation','2','31/01/2017','Ticket','04/01/2017','19:00','21:00','23:00','media/default-avatar.png','GN','default_province','default_town'),('E0000000025','B0000000025','TEST 25','1133125454687878794451123113123','presentation','999','31/01/2017','Ticket','31/01/2017','19:00','21:00','23:00','media/default-avatar.png','AL','default_province','default_town'),('E0000000026','B0000000026','TEST 26','12131544545877984545121211321','presentation','11','31/01/2017','Ticket','04/01/2017','15:00','17:00','19:00','media/default-avatar.png','AT','default_province','default_town'),('E0000000027','B0000000027','TEST 27','121231325445457879846545613212465478','presentation','10','31/01/2017','Ticket','04/01/2017','13:00','16:00','18:00','media/default-avatar.png','AM','default_province','default_town'),('E0000000028','B0000000028','TEST 28','111321124544455478778789789','presentation','250','31/01/2017','Ticket','04/01/2017','18:00','20:00','23:00','media/default-avatar.png','AI','default_province','default_town'),('E0000000029','B0000000029','TEST 29','111212122122121212121212121213213','presentation','10','25/01/2017','Invitation','04/01/2017','16:00','18:00','22:00','media/1561261647-flowers.png','ES','08','Badia Del Valles'),('E0000000030','B0000000030','TEST 30','232132213545465687878787954654621321354654687946554623235467465465546','presentation','34','31/01/2017','Ticket','11/01/2017','18:00','20:00','22:00','media/49211607-flowers.png','AL','default_province','default_town'),('E0000000031','B0000000031','TEST31','2121231545454654564887898795454611132','presentation','250','31/01/2017','Ticket','10/01/2017','18:00','19:00','22:00','media/default-avatar.png','AF','default_province','default_town'),('E0000000046','B0000000046','Black Keys','2132132132131322132131322132111233212132131323113213132132','presentation','4','28/12/2016','Ticket','30/11/2016','10:00','11:00','12:00','media/default-avatar.png','AD','default_province','default_town'),('E0000000200','B0000000200','bANDA3','2135468796453123212131212211331312','concert','5','30/11/2016','Ticket','16/11/2016','19:00','20:00','21:00','media/default-avatar.png','AD','default_province','default_town'),('E1234567890','B1234567890','Banda','Concierto de presentciÃ³n','Concierto','4','31/11/2016','Ticket','31/10/2016','22:00','23:00','02:00','media/default-avatar.png',NULL,NULL,NULL),('E1234567895','B1234567895','Banda2','Concierto de presentacion','Concierto','4','31/11/2016','Ticket','31/10/2016','22:00','23:00','02:00','media/default-avatar.png',NULL,NULL,NULL),('E7894561230','B1234567890','Eagles of Death Metal','032154687945613254687','presentation','123','24/10/2016','Array','24/10/2016','18:00','21:00','22:00','media/default-avatar.png',NULL,NULL,NULL),('E8888888888','B8888888888','1234456','2135687946532546879213546879465545454545','presentation','3','30/11/2016','Ticket','16/11/2016','19:00','20:00','23:00','media/default-avatar.png','ES','default_province','default_town');
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

-- Dump completed on 2017-01-09 14:08:47
