-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: web_radio
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` VALUES (1,'aze',20,' '),(2,'azeazeaze',20,' '),(3,'teste',20,' '),(4,'qsdqsd',20,'gffd fsdfdg'),(5,'qsdqsdqsd',20,'gffd fsdfdg'),(6,'qsdqsdqsd',20,'gffd fsdfdg'),(7,'sdfsdfsdfsdfsdfsdfsdfsdf',20,'gffd fsdfdg');
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podcasts`
--

DROP TABLE IF EXISTS `podcasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture_file` varchar(255) NOT NULL DEFAULT 'default_picture.jpg',
  `sound_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podcasts`
--

LOCK TABLES `podcasts` WRITE;
/*!40000 ALTER TABLE `podcasts` DISABLE KEYS */;
INSERT INTO `podcasts` VALUES (1,'Donald Trump Président !','Donald Trump, né le 14 juin 1946 à New York, est un homme d\'affaires, animateur de télévision et homme d\'État américain. Il est le 45ᵉ président des États-Unis, depuis le 20 janvier 2017','2020-11-04 14:09:26','',''),(2,'Joe Biden','Joseph Biden, dit Joe Biden, né le 20 novembre 1942 à Scranton, est un homme d\'État américain. Il est notamment vice-président des États-Unis de 2009 à 2017','2020-11-04 14:09:26','',''),(3,'Brice','SUper président du monde et de la galaxie et de l\'au de la de la violacé ! !','2020-11-04 16:41:47','',''),(4,'mon titre','mon contenu super hyper mega top','2020-11-05 11:50:04','',''),(5,'Un autre super  titre','Hop hop je change de mon contenu super hyper mega top','2020-11-05 11:54:44','',''),(6,'fsqdf','fdfsd','2020-11-05 14:38:41','',''),(7,'Hello la news','hohoho la super news','2020-11-05 14:39:09','',''),(8,'hjgjh','jhgjh','2020-11-05 15:06:51','',''),(9,'cgvsgfXC','sqcxv','2020-11-05 15:23:52','',''),(10,'cwxxcw','xwcxwc','2020-11-05 15:34:55','',''),(12,'sdffs','ddfs','2020-11-05 15:44:00','',''),(13,'cxvv','xccwx','2020-11-05 15:45:56','',''),(15,'MA super nouvelle news','Qu\'elle est belle','2020-11-05 15:53:13','',''),(18,'qsd','qsd','2020-11-08 13:23:39','../img/picture_file/1604838219.jpg','../sound_file/1604838219.mp3'),(19,'test423','test42','2020-11-08 13:24:13','../img/picture_file/1604838253.jpg','../sound_file/1604838253.mp3'),(20,'azerteste','sdfsdfsdfsdfsdf','2020-11-08 15:27:09','../img/picture_file/1604845629.jpg','../sound_file/1604845629.mp3');
/*!40000 ALTER TABLE `podcasts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityZIp` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` enum('peon','moderateur','admin') NOT NULL DEFAULT 'peon',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Brice','Collilieux','collilieux.brice@mail.com','0636772614','ici et là','33700','Mérignac','lkjghkjgkjhg','default.png','peon'),(2,'Brice','Collilieux','collilieux.brice@mail.com','0636772614','ici et là','33700','Mérignac','lkjghkjgkjhg','default.png','peon'),(3,'fdgs+','gfaa','gqdfs@ggqd.fr','0123456789','frefr','12345','frfr','123','default.png','peon'),(4,'dsfds','dffs','fds@gr.fr','0123456789','ffr','12345','fds','$2y$10$/skcIvTCn2G3CWryTB1upuMRCjQqAJ5otP3OijXtUUNiuzqRH3Bdu','default.png','peon'),(5,'fdsf','dsf','dfsdfq@frf.fr','0123456789','fsfqs','01234','fdfq','$2y$10$JcSATyh3wxnY8PVKcTT5O.sVFGAy0hNBLpwZI9en1M6a4pt0jL996','default.png','peon'),(6,'dfsq','dsfas','fdfsq@frfr.fr','0123456789','frfra','12345','frfr','$2y$10$ITtcIxJyJoC3qGpOU.j5hO/EMk.pCZK/btiqk0ZJkE68NyKeqWSue','default.png','peon'),(7,'mfdsqljfqd','fdlkkj','dsfmjkhfqsd@fd.fr','0123456789','fdsqfs','12345','qfsdf','$2y$10$XNX2C7Hl3xZR90UukOB57uUtd1gzmNRFXcsoEB1TqRrnU7MvNu9ie','default.png','peon'),(8,'fdsq','dqf','fff@fff.fr','0123456789','dvsfd','12345','fsdfq','$2y$10$7f0zZHJ0KbxMoPTXVXWD2ehTBgYsgkg9wf0ld3xBIqJl.SnDCxbXe','default.png','peon'),(9,'gffd','fsdfdg','aaa@aaa.aa','0123456789','dsffsq','12345','fqdsfd','$2y$10$mJXxNZ12ER0/bQ0rVoc2C./cdpeHcuIuGjQ9ew3AvS1s/Z5gOwCcm','default.png','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-08 18:29:36
