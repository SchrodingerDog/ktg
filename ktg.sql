-- MySQL dump 10.11
--
-- Host: localhost    Database: ktg
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL auto_increment,
  `zdjecie` text collate latin1_general_cs NOT NULL,
  `imie` text collate latin1_general_cs NOT NULL,
  `nazwisko` text collate latin1_general_cs NOT NULL,
  `opis` text collate latin1_general_cs NOT NULL,
  `super_user` tinyint(1) NOT NULL,
  `login` text collate latin1_general_cs NOT NULL,
  `thumb` text collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'member_photos/lbpvXmZ.jpg','Kamil','Pro?ciewicz','Kreator Strony, murzyn korporacyjny',1,'kampro512','member_photos/thumbs/lbpvXmZ.jpg'),(2,'member_photos/blank_user.gif','Dorota','Tyralik','aaaaaa Plaseholder',1,'dortyr67','member_photos/blank_user.gif'),(3,'member_photos/blank_user.gif','Adam','Kowalski','bbbbbbbbb',0,'','member_photos/blank_user.gif'),(4,'member_photos/911850_378291288968779_1616483127_n.jpg','Adam','Mickiewicz','testing testing',0,'','member_photos/blank_user.gif'),(5,'member_photos/Squirrel-nice-wallpaper.jpg','Wiewiórka','Ruda','Lol',0,'wierud104','member_photos/thumbs/Squirrel-nice-wallpaper.jpg'),(6,'member_photos/1187510-subzero_black_flash.jpg','Zero','Sub','Mróz',0,'zersub43','member_photos/thumbs/1187510-subzero_black_flash.jpg'),(7,'member_photos/blank_user.gif','Kondrad','Wallenrod','Przeto ksiaze zmuszony umiec poslugiwac sie dobrze natura zwierzat, powinien wsrod nich wziac na wzor lisa i lwa.',0,'konwal79','member_photos/blank_user.gif'),(8,'member_photos/Zima.jpg','Zima','Zimna','Nananaa',0,'zimzim45','member_photos/thumbs/Zima.jpg'),(9,'member_photos/blank_user.gif','Bezio','Imienny','Kidy ummiera nadzieja jedyna tarcza wojownika jest jego honor.',0,'bezimi57','member_photos/blank_user.gif');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tytul` text collate latin1_general_cs NOT NULL,
  `tresc` text collate latin1_general_cs NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Tytul1','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        \r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        \r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        \r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        \r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        \r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2013-10-20'),(2,'Tytul2','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        \r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        \r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        \r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        \r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        \r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2013-10-20'),(3,'Tytul3','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        \r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        \r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        \r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        \r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        \r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2013-10-20'),(4,'Tytul4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        \r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        \r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        \r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        \r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        \r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2013-10-20'),(7,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(9,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(10,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(11,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(12,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(13,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(14,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(15,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(16,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(17,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(18,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(19,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(20,'Tytul Paginacja','Tresc Paginacja','2013-10-27'),(21,'Gleboki cytat','Tak gesty welon mitu spowija Paula Muad\\\' Diba, Imperatore i jego siostre Alie, ze trudno dojrzec ludzi z krwi i kosci poza ta zaslona','2013-11-04'),(22,'Gleboki cytat','adsf\\\'\\\'asdff','2013-11-04'),(23,'asdf\\\\\\\\\\\\\\\\/////','adsfaafggasdasdas___\\\\\\\\\\\\\\\\/////*-','2013-11-04');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wyprawy`
--

DROP TABLE IF EXISTS `wyprawy`;
CREATE TABLE `wyprawy` (
  `id` int(11) NOT NULL auto_increment,
  `cel` varchar(100) collate latin1_general_cs NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `wyprawy`
--

LOCK TABLES `wyprawy` WRITE;
/*!40000 ALTER TABLE `wyprawy` DISABLE KEYS */;
INSERT INTO `wyprawy` VALUES (1,'Wa?brzych','2013-10-31'),(2,'Kraków','2013-10-31'),(3,'B?dzin','2013-10-31'),(4,'Nibylandia','2013-10-31');
/*!40000 ALTER TABLE `wyprawy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wyprawy_czlonkowie`
--

DROP TABLE IF EXISTS `wyprawy_czlonkowie`;
CREATE TABLE `wyprawy_czlonkowie` (
  `wyprawa_id` int(11) NOT NULL,
  `czlonek_id` int(11) NOT NULL,
  KEY `wyprawa_id` (`wyprawa_id`,`czlonek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `wyprawy_czlonkowie`
--

LOCK TABLES `wyprawy_czlonkowie` WRITE;
/*!40000 ALTER TABLE `wyprawy_czlonkowie` DISABLE KEYS */;
INSERT INTO `wyprawy_czlonkowie` VALUES (1,1),(1,2),(1,3),(1,4),(2,1),(2,4),(3,2),(3,3),(4,1),(4,5),(4,6);
/*!40000 ALTER TABLE `wyprawy_czlonkowie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-04 14:24:52
