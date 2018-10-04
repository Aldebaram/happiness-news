-- MySQL dump 10.13  Distrib 8.0.12, for Linux (x86_64)
--
-- Host: localhost    Database:
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!50606 SET @OLD_INNODB_STATS_AUTO_RECALC=@@INNODB_STATS_AUTO_RECALC */;
/*!50606 SET GLOBAL INNODB_STATS_AUTO_RECALC=OFF */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `julio_tables`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `julio_tables` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `julio_tables`;

--
-- Table structure for table `julio_noticias`
--

DROP TABLE IF EXISTS `julio_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `julio_noticias` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(6) unsigned DEFAULT NULL,
  `titulo` varchar(40) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `conteudo` varchar(2500) NOT NULL,
  `dataHora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `julio_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `julio_noticias`
--

LOCK TABLES `julio_noticias` WRITE;
/*!40000 ALTER TABLE `julio_noticias` DISABLE KEYS */;
INSERT INTO `julio_noticias` VALUES (1,1,'Lorem ipsum dolor sit amet, consectetuer','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies','Lorem ipsum dolor sit amet, consectetuer adipiscin','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa..','2018-10-04 21:37:01'),(2,1,'Happy News!','Happy news is a simple newspaper website','Happy news is a simple newspaper website made on PHP, using the CSS framework Materialize and it is adaptative to mobile devices!','happy, news, admin','<br>\r\n<div class=\"container\">\r\n<br>\r\n<h5>Happy news post content supports HTML tags and materialize components!</h5>\r\n<br>\r\n<div class=\"row center\">\r\n    <div class=\"col s12 m6\">\r\n      <div
class=\"card blue-grey darken-1\">\r\n        <div class=\"card-content white-text\">\r\n          <span class=\"card-title\">Card</span>\r\n          <p>Like this card here.</p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n<a class=\"black-text\"> so it is pretty easy to create some very nice posts!</a>\r\n<br>\r\n  <img class=\"responsive-img\" src=\"http://aetleds.com.br/wp-content/uploads/2017/01/koala-windows-7-vista-and-xp-picks-27753235-1024-768-933x700-1.jpg\" />\r\n<a class=\"black-text\">Windows 7 Koala!</a>\r\n<br>\r\n</div>','2018-10-04 21:46:34');
/*!40000 ALTER TABLE `julio_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `julio_users`
--

DROP TABLE IF EXISTS `julio_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `julio_users` (
  `user_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `avatar` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `julio_users`
--

LOCK TABLES `julio_users` WRITE;
/*!40000 ALTER TABLE `julio_users` DISABLE KEYS */;
INSERT INTO `julio_users` VALUES (1,'Admin','admin','https://i.imgur.com/was9230.png');
/*!40000 ALTER TABLE `julio_users` ENABLE KEYS */;
UNLOCK TABLES;
