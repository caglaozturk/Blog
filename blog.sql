-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: pr_pure_db_blog
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'PHP',1,NULL),(2,'JavaScript',1,NULL),(3,'Node',0,NULL),(4,'React',0,NULL),(5,'İngilizce',1,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_turkish_ci,
  `post_type` int(11) DEFAULT '1',
  `img_url` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `display_count` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'Title','Description',1,'_profile.png','video.mp4',1,NULL,1,NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `about_me` text COLLATE utf8_turkish_ci,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `profile_image_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Woman Developer','<p>Yazılım blog konuları ve web tasarım blog konularını okuyabileceğiniz, g&uuml;ncel yazılım ve web tasarım blog sayfama hoş geldiniz. T&uuml;m g&uuml;ncel yazılım konuları ve web tasarım konuları ile genel bilgi bloğu sizlerin yeni bilişim sekt&ouml;r&uuml; bilgilerinden haberdar olmanız i&ccedil;in planlanmış ve aktif edilmiştir.</p>\r\n','admin@admin.com','https://www.facebook.com/','https://twitter.com/','https://www.linkedin.com/','https://www.instagram.com/','5464763582','_profile.png',1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_position` int(11) DEFAULT NULL,
  `gender` enum('m','f','u') DEFAULT 'u',
  `join_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(11) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_uindex` (`email`),
  UNIQUE KEY `user_username_uindex` (`username`),
  KEY `user_address_id_fk` (`address_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Woman Developer','admin@admin.com','root','63A9F0EA7BB98050796B649E85481845',NULL,'u','2017-12-22 10:02:04',1,'profile.png');
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

-- Dump completed on 2020-12-08 18:42:41
