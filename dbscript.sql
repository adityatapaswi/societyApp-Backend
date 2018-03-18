CREATE DATABASE  IF NOT EXISTS `societydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `societydb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: societydb
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Temporary view structure for view `anniversaries`
--

DROP TABLE IF EXISTS `anniversaries`;
/*!50001 DROP VIEW IF EXISTS `anniversaries`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `anniversaries` AS SELECT 
 1 AS `name`,
 1 AS `sid`,
 1 AS `date`,
 1 AS `days_remaining`,
 1 AS `age`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `birthdays`
--

DROP TABLE IF EXISTS `birthdays`;
/*!50001 DROP VIEW IF EXISTS `birthdays`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `birthdays` AS SELECT 
 1 AS `name`,
 1 AS `sid`,
 1 AS `date`,
 1 AS `days_remaining`,
 1 AS `age`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `bna`
--

DROP TABLE IF EXISTS `bna`;
/*!50001 DROP VIEW IF EXISTS `bna`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `bna` AS SELECT 
 1 AS `name`,
 1 AS `sid`,
 1 AS `date`,
 1 AS `days_remaining`,
 1 AS `age`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) DEFAULT NULL,
  `by` int(11) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (1,'Water Leakage',10,'2018-03-15 22:46:55',10),(2,'New Discussion',7,'2018-03-15 23:02:28',10),(3,'New Discussion 1',7,'2018-03-15 23:04:56',10),(4,'Nd',7,'2018-03-15 23:05:16',10),(5,'Tria',7,'2018-03-15 23:05:49',10),(6,'test',14,'2018-03-18 17:24:35',14);
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disscussion_messages`
--

DROP TABLE IF EXISTS `disscussion_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disscussion_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) DEFAULT NULL,
  `message` varchar(4000) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disscussion_messages`
--

LOCK TABLES `disscussion_messages` WRITE;
/*!40000 ALTER TABLE `disscussion_messages` DISABLE KEYS */;
INSERT INTO `disscussion_messages` VALUES (1,1,'Water wastage due to leakage in parking','2018-03-15 22:46:55'),(2,2,'First Message','2018-03-15 23:02:28'),(3,3,'First Message','2018-03-15 23:04:56'),(4,4,'Fm','2018-03-15 23:05:17'),(5,5,'Traial Message','2018-03-15 23:05:50'),(6,6,'hi','2018-03-18 17:24:36');
/*!40000 ALTER TABLE `disscussion_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_register`
--

DROP TABLE IF EXISTS `event_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(450) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_register`
--

LOCK TABLES `event_register` WRITE;
/*!40000 ALTER TABLE `event_register` DISABLE KEYS */;
INSERT INTO `event_register` VALUES (3,'New Event','New Desc','02 Mar 2018','2018-03-02 00:00:00','09:00 PM',10),(4,'New Event','New Desc','03 Mar 2018','2018-03-03 00:00:00','09:00 PM',10),(5,'New Event 2','New Desc','03 Mar 2018','2018-03-03 00:00:00','09:00 PM',10),(13,'New Event 9','New Desc','02 Mar 2018','2018-03-02 00:00:00','09:00 PM',10),(17,'asda','asd\nasd\nads\na','23 Mar 2018','2018-03-23 00:00:00','12:01 PM',10),(18,'New Event','Fancy Dress Competition','12 Mar 2018','2018-03-12 00:00:00','09:00 PM',13),(19,'test','checking','19 Mar 2018','2018-03-19 00:00:00','05:00 PM',14);
/*!40000 ALTER TABLE `event_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `events`
--

DROP TABLE IF EXISTS `events`;
/*!50001 DROP VIEW IF EXISTS `events`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `events` AS SELECT 
 1 AS `id`,
 1 AS `title`,
 1 AS `description`,
 1 AS `date`,
 1 AS `date_date`,
 1 AS `time`,
 1 AS `sid`,
 1 AS `days_remaining`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!50001 DROP VIEW IF EXISTS `gallery_images`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `gallery_images` AS SELECT 
 1 AS `id`,
 1 AS `image_url`,
 1 AS `title`,
 1 AS `description`,
 1 AS `uploaded_on`,
 1 AS `date_date`,
 1 AS `sid`,
 1 AS `by`,
 1 AS `uploader`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `image_gallery`
--

DROP TABLE IF EXISTS `image_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(450) DEFAULT NULL,
  `title` varchar(450) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `uploaded_on` varchar(45) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_gallery`
--

LOCK TABLES `image_gallery` WRITE;
/*!40000 ALTER TABLE `image_gallery` DISABLE KEYS */;
INSERT INTO `image_gallery` VALUES (5,'/uploads/f96a836401bd5a727448e3dd7a43fd2238769123.png','this is title','this is dessc','26 Feb 2018','2018-02-26 00:00:00',10,10),(6,'/uploads/f96a836401bd5a727448e3dd7a43fd2238769123.png','My First Photo','Hello Desc','26 Feb 2018','2018-02-26 00:00:00',10,10),(7,'/uploads/782d57bd669c99298ec591b0bd4937315471d4d6.jpg','Ronaldoooooooooo','Ronaldo Is The Best Player Ever!!!!','26 Feb 2018','2018-02-26 00:00:00',10,10),(9,'/uploads/782d57bd669c99298ec591b0bd4937315471d4d6.jpg','First Photo','This is First Photo Of this society','10 Mar 2018','2018-03-10 00:00:00',13,11),(10,'/uploads/782d57bd669c99298ec591b0bd4937315471d4d6.jpg','rohan','test photo','18 Mar 2018','2018-03-18 00:00:00',14,14),(11,'/uploads/1422aa385b519ce722b11a196bda644920f5e9b5.jpg','latest','testetst','18 Mar 2018','2018-03-18 00:00:00',14,14);
/*!40000 ALTER TABLE `image_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `society_register`
--

DROP TABLE IF EXISTS `society_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `society_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `society_name` varchar(450) DEFAULT NULL,
  `address` varchar(450) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society_register`
--

LOCK TABLES `society_register` WRITE;
/*!40000 ALTER TABLE `society_register` DISABLE KEYS */;
INSERT INTO `society_register` VALUES (1,'Prasad Society','Gawade Colony Opp Tata Motors, Chinchwad','Pune','Maharashtra',411033),(2,'Prasad Residency Society','Gawade Colony Opp Tata Motors, Chinchwad','Pune','Maharashtra',411033),(3,'Ravideep Residency Society','Gawade Colony Opp Tata Motors, Chinchwad','Pune','Maharashtra',411033),(7,'Benkar Housing Society','Gawade Colony','Pune','Maharashtra',411033),(10,'Adarsh','KSB Tech Pvt. Ltd, Godrej Castlemaine, 2nd Floor,\nBund Garden Road, next to Ruby Hall Clinic','Pune','Maharashtra',411001),(11,'Manik Baug','KSB Tech Pvt. Ltd, Godrej Castlemaine, 2nd Floor,\nBund Garden Road, next to Ruby Hall Clinic','Pune','Maharashtra',411001),(12,'Mira Baugh','asd asdasdasd asljfhsdov bshaer8gge','Pune','Maharashtra',411001),(13,'Goyal Society','Chinchwad','Pune','Maharashtra',411033),(14,'goyal garima','chinchwad, pune-33','PUNE','MAHARASHTRA',411033);
/*!40000 ALTER TABLE `society_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_register`
--

DROP TABLE IF EXISTS `transaction_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) DEFAULT NULL,
  `by` int(11) DEFAULT NULL,
  `amt` float DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_register`
--

LOCK TABLES `transaction_register` WRITE;
/*!40000 ALTER TABLE `transaction_register` DISABLE KEYS */;
INSERT INTO `transaction_register` VALUES (1,'Building Compound Maintainance',10,1000,'10 Mar 2018','2018-03-10 00:00:00','DB',10),(2,'Building Compound Maintainance',10,1000,'10 Mar 2018','2018-03-10 00:00:00','CR',10),(3,'Building Compound Maintainance',10,1000,'10 Mar 2018','2018-03-10 00:00:00','CR',10),(4,'Building Compound Maintainance',10,1000,'10 Mar 2018','2018-03-10 00:00:00','DB',10),(5,'Building Compound Maintainance',10,1000,'10 Mar 2018','2018-03-10 00:00:00','CR',10),(6,'Monthly Maintainance By Aditya',10,5000,'10 Mar 2018','2018-03-10 00:00:00','CR',10),(7,'Building Wall Paint',10,6000,'10 Mar 2018','2018-03-10 00:00:00','DB',10),(8,'Monthly maintainance',11,1000,'10 Mar 2018','2018-03-10 00:00:00','CR',13),(9,'General Monthly Maintainance Expenses',11,500,'10 Mar 2018','2018-03-10 00:00:00','DB',13),(10,'Priyanka CHindi ni 100 rs dile',7,100,'18 Mar 2018','2018-03-18 00:00:00','CR',10);
/*!40000 ALTER TABLE `transaction_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!50001 DROP VIEW IF EXISTS `transactions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `transactions` AS SELECT 
 1 AS `id`,
 1 AS `description`,
 1 AS `by`,
 1 AS `amt`,
 1 AS `date`,
 1 AS `date_date`,
 1 AS `type`,
 1 AS `sid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `dob_date` datetime DEFAULT NULL,
  `doa` varchar(45) DEFAULT NULL,
  `doa_date` datetime DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_register`
--

LOCK TABLES `user_register` WRITE;
/*!40000 ALTER TABLE `user_register` DISABLE KEYS */;
INSERT INTO `user_register` VALUES (1,'Aditya','9021280829','aditya@gmail.com','aditya123','chairman','21 Jan 1994','1994-03-03 00:00:00','',NULL,1),(2,'Sudhanshu','984658754','sud@gmail.com','sud123','chairman','27 Nov 1994','1987-03-07 00:00:00','17 Dec 2012','2012-03-06 00:00:00',3),(3,'Aditya','9021280828','adi123@gmail.com','adi123','chairman','21 Jan 1994','1994-03-03 00:00:00','',NULL,7),(4,'Aditya','9021280827','adi13@gmail.com','adi123','member','21 Jan 1994','1994-01-21 00:00:00','',NULL,7),(7,'Snehal Avachat','+918390558180','snehal@gmail.com','Passw0rd','chairman','2 Feb 1994','1994-03-02 00:00:00','',NULL,10),(8,'Sonali','7897895645','sonali@gmail.com','Password','chairman','2 Dec 1988','1994-03-03 00:00:00','',NULL,11),(9,'Rohan Purkar','907875457','rohan@gmail.com','Password ','chairman','5 Apr 1996','1996-04-05 00:00:00','',NULL,12),(10,'Aditya Tapaswi','8979845648','a213@gmail.com','Password','member','21 Jan 1994','1994-03-03 00:00:00','','1994-03-03 00:00:00',10),(11,'Rohan Purkar','8485040322','yogesh@gmail.com','Password','chairman','11 Mar 1996','1996-03-11 00:00:00','',NULL,13),(12,'Yogesh','1234566541','yys@gmail.com','Password','member','17 Mar 1996','1996-03-17 00:00:00','',NULL,13),(13,'Sudhanshu Tapaswi','+918390558188','sud@sud.com','Password','member','20 Mar 1987','1987-03-20 00:00:00','',NULL,10),(14,'rohan','8888888888','rohan@test.com','qwerty','chairman','03 Sep 1996','1996-09-03 00:00:00','',NULL,14),(15,'yogesh','9999999999','yogesh@test.com','asdfgh','member','21 Mar 1998','1998-03-21 00:00:00','',NULL,14);
/*!40000 ALTER TABLE `user_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wall`
--

DROP TABLE IF EXISTS `wall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(450) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `by` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `date_date` datetime DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wall`
--

LOCK TABLES `wall` WRITE;
/*!40000 ALTER TABLE `wall` DISABLE KEYS */;
INSERT INTO `wall` VALUES (1,'Title','Description',10,'News','28 Feb 2018','2018-02-28 00:00:00',10),(2,'Title 2','Desc2',10,'News','28 Feb 2018','2018-02-28 00:00:00',10),(3,'Notice','No Water Tommorow',10,'Notice','28 Feb 2018','2018-02-28 00:00:00',10),(4,'New Post','Society Innauguration',11,'News','10 Mar 2018','2018-03-10 00:00:00',13),(5,'New','Hello All',7,'Notice','18 Mar 2018','2018-03-18 00:00:00',10),(6,'new post','notice',14,'News','18 Mar 2018','2018-03-18 00:00:00',14);
/*!40000 ALTER TABLE `wall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `wall_posts`
--

DROP TABLE IF EXISTS `wall_posts`;
/*!50001 DROP VIEW IF EXISTS `wall_posts`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `wall_posts` AS SELECT 
 1 AS `id`,
 1 AS `title`,
 1 AS `description`,
 1 AS `by`,
 1 AS `type`,
 1 AS `date`,
 1 AS `date_date`,
 1 AS `sid`,
 1 AS `posted_by`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'societydb'
--
/*!50003 DROP PROCEDURE IF EXISTS `add_photo_to_gallery` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_photo_to_gallery`(in url varchar(450),in ti varchar(450),in des varchar(1000),in upd varchar(45), in dte datetime,in sidi int,in byi int)
BEGIN
if exists(select * from image_gallery where title=ti and sid=sidi) then
select 'Image With this title already exists' as error ;
else
INSERT INTO `societydb`.`image_gallery`
(`image_url`,
`title`,
`description`,
`uploaded_on`,
`date_date`,
`sid`,
`by`)
VALUES
(url,
ti,
des,
upd,
dte,
sidi,
byi);
select 'Uploaded Success' as reply;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_wall_post` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_wall_post`(in ti varchar(450),in des varchar(1000), in byi int, in typ varchar(45), in dte varchar(45), in date_date datetime,in sidi int)
BEGIN
if exists(select * from wall where title=ti and sid=sidi and date=dte) then
select 'Post Already Exist' as reply;
else
INSERT INTO `societydb`.`wall`
(`title`,
`description`,
`by`,
`type`,
`date`,
`date_date`,
`sid`)
VALUES
(ti,
des,
byi,
typ,
dte,
date_date,
sidi);

select 'Posted Successfully' as reply;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkExists` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkExists`(in emaili varchar(100), in phonei varchar(45))
BEGIN
if exists (select * from user_register where email=emaili or phone= phonei) then
select 'true' as reply;
else
select 'false' as reply;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_disscussion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_disscussion`(in dname varchar(450),in byi int,in sidi int,in first_message varchar(4000))
BEGIN
if exists(select * from discussions where sid=sidi and name=dname) then
select 'Discussion Already Exists' as reply;
else
INSERT INTO `societydb`.`discussions`
(`name`,
`by`,
`date_date`,
`sid`)
VALUES
(dname,
byi,
now(),
sidi);

INSERT INTO `societydb`.`disscussion_messages`
(`did`,
`message`,
`date_date`)
VALUES
((select id from discussions where name=dname and sid=sidi),
first_message,
now());
select 'Discussion Created Successfully' as reply;

end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_event` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_event`(in ti varchar(450), in des varchar(1000),in dte varchar(45),in dte_date datetime, in tim varchar(45),in si int)
BEGIN
if exists (select * from event_register where title=ti and date_date=dte_date and sid=si) then
select 'Event Already Exists' as reply;
elseif(SELECT  dte_date>= CURDATE()=false)  then
select 'Event Date Should Be Greater Than Today' as reply;
else
INSERT INTO `societydb`.`event_register`
(`title`,
`description`,
`date`,
`date_date`,
`time`,
`sid`)
VALUES
(ti,
des,
dte,
dte_date,
tim,
si);
select 'Event Created Succesfully' as reply;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_member` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_member`(in namei varchar(450),in phonei varchar(45),in emaili varchar(100),in passwordi varchar(100), in typei varchar(45),in dob varchar(45), in dob_date datetime, in doa varchar(45),in doa_date datetime, in sid int)
BEGIN
if exists(select * from user_register where email=emaili or phone=phonei) then
select 'Email Or Phone Already Exists' as reply;
else
INSERT INTO `societydb`.`user_register`
(`name`,
`phone`,
`email`,
`password`,
`type`,
`dob`,
`dob_date`,
`doa`,
`doa_date`,
`sid`)
VALUES
(namei,
phonei,
emaili,
passwordi,
typei,
dob,
dob_date,
doa,
doa_date,
sid);
select 'Registration Success' as reply; 
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getBalanceSummary` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBalanceSummary`(in sidi int)
BEGIN
select ((select ifnull(sum(amt),0) from transaction_register where type='CR' and sid=sidi)-(select ifnull(sum(amt),0) from transaction_register where type='DB' and sid=sidi)) as amt ,'Balance' as type
union all 
select ifnull(sum(amt),0) as amt, 'Expenses' as type from transaction_register where type='DB' and sid=sidi
union all
select ifnull(sum(amt),0) as amt, 'Deposites' as type from transaction_register where type='CR' and sid=sidi;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registerSociety` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registerSociety`(in sname varchar(450),in address varchar(450),in ci varchar(100), in si varchar(100),in zi int)
BEGIN
if exists(select * from society_register where society_name=sname) then
select 'Society with this name already exists' as reply;
else
INSERT INTO `societydb`.`society_register`
(`society_name`,
`address`,
`city`,
`state`,
`zip`)
VALUES
(sname,
address,
ci,
si,
zi);
select 'Registration Success' as reply, id from society_register where society_name=sname;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `register_transaction` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_transaction`(in des varchar(1000),in byi int,in am int,in dte varchar(45), in dte_date datetime,in typ varchar(45),in sidi int)
BEGIN
if(typ='DB') then
if((select IFNULL(sum(amt),0) from transaction_register where type='CR' and sid=sidi)-(select IFNULL(sum(amt),0) from transaction_register where type='DB' and sid=sidi)-am<0) then
select 'You Dont Have Balance to Do This Transaction' as reply;
else
INSERT INTO `societydb`.`transaction_register`
(`description`,
`by`,
`amt`,
`date`,
`date_date`,
`type`,
`sid`)
VALUES
(des,
byi,
am,
dte,
dte_date,
typ,
sidi);
select 'Transaction Registered Successfully' as reply;
end if;
else
INSERT INTO `societydb`.`transaction_register`
(`description`,
`by`,
`amt`,
`date`,
`date_date`,
`type`,
`sid`)
VALUES
(des,
byi,
am,
dte,
dte_date,
typ,
sidi);

select 'Transaction Registered Successfully' as reply;

end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `anniversaries`
--

/*!50001 DROP VIEW IF EXISTS `anniversaries`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `anniversaries` AS select `user_register`.`name` AS `name`,`user_register`.`sid` AS `sid`,`user_register`.`doa` AS `date`,(to_days((`user_register`.`doa_date` + interval (year(curdate()) - year(`user_register`.`doa_date`)) year)) - to_days(curdate())) AS `days_remaining`,(year(curdate()) - year(`user_register`.`doa_date`)) AS `age`,'anniversary' AS `type` from `user_register` where ((to_days((`user_register`.`doa_date` + interval (year(curdate()) - year(`user_register`.`doa_date`)) year)) - to_days(curdate())) between 0 and 7) order by (to_days((`user_register`.`doa_date` + interval (year(curdate()) - year(`user_register`.`doa_date`)) year)) - to_days(curdate())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `birthdays`
--

/*!50001 DROP VIEW IF EXISTS `birthdays`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `birthdays` AS select `user_register`.`name` AS `name`,`user_register`.`sid` AS `sid`,`user_register`.`dob` AS `date`,(to_days((`user_register`.`dob_date` + interval (year(curdate()) - year(`user_register`.`dob_date`)) year)) - to_days(curdate())) AS `days_remaining`,(year(curdate()) - year(`user_register`.`dob_date`)) AS `age`,'birthday' AS `type` from `user_register` where ((to_days((`user_register`.`dob_date` + interval (year(curdate()) - year(`user_register`.`dob_date`)) year)) - to_days(curdate())) between 0 and 7) order by (to_days((`user_register`.`dob_date` + interval (year(curdate()) - year(`user_register`.`dob_date`)) year)) - to_days(curdate())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `bna`
--

/*!50001 DROP VIEW IF EXISTS `bna`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `bna` AS select `birthdays`.`name` AS `name`,`birthdays`.`sid` AS `sid`,`birthdays`.`date` AS `date`,`birthdays`.`days_remaining` AS `days_remaining`,`birthdays`.`age` AS `age`,`birthdays`.`type` AS `type` from `birthdays` union all select `anniversaries`.`name` AS `name`,`anniversaries`.`sid` AS `sid`,`anniversaries`.`date` AS `date`,`anniversaries`.`days_remaining` AS `days_remaining`,`anniversaries`.`age` AS `age`,`anniversaries`.`type` AS `type` from `anniversaries` order by `days_remaining` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `events`
--

/*!50001 DROP VIEW IF EXISTS `events`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `events` AS select `event_register`.`id` AS `id`,`event_register`.`title` AS `title`,`event_register`.`description` AS `description`,`event_register`.`date` AS `date`,`event_register`.`date_date` AS `date_date`,`event_register`.`time` AS `time`,`event_register`.`sid` AS `sid`,(to_days(`event_register`.`date_date`) - to_days(curdate())) AS `days_remaining` from `event_register` where ((to_days(`event_register`.`date_date`) - to_days(curdate())) >= 0) order by (to_days(`event_register`.`date_date`) - to_days(curdate())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gallery_images`
--

/*!50001 DROP VIEW IF EXISTS `gallery_images`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gallery_images` AS select `a`.`id` AS `id`,`a`.`image_url` AS `image_url`,`a`.`title` AS `title`,`a`.`description` AS `description`,`a`.`uploaded_on` AS `uploaded_on`,`a`.`date_date` AS `date_date`,`a`.`sid` AS `sid`,`a`.`by` AS `by`,`b`.`name` AS `uploader` from (`image_gallery` `a` join `user_register` `b`) where (`a`.`by` = `b`.`id`) order by `a`.`date_date` desc,`a`.`id` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `transactions`
--

/*!50001 DROP VIEW IF EXISTS `transactions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `transactions` AS select `transaction_register`.`id` AS `id`,`transaction_register`.`description` AS `description`,`transaction_register`.`by` AS `by`,`transaction_register`.`amt` AS `amt`,`transaction_register`.`date` AS `date`,`transaction_register`.`date_date` AS `date_date`,`transaction_register`.`type` AS `type`,`transaction_register`.`sid` AS `sid` from `transaction_register` order by `transaction_register`.`date_date` desc,`transaction_register`.`id` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `wall_posts`
--

/*!50001 DROP VIEW IF EXISTS `wall_posts`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `wall_posts` AS select `a`.`id` AS `id`,`a`.`title` AS `title`,`a`.`description` AS `description`,`a`.`by` AS `by`,`a`.`type` AS `type`,`a`.`date` AS `date`,`a`.`date_date` AS `date_date`,`a`.`sid` AS `sid`,`b`.`name` AS `posted_by` from (`wall` `a` join `user_register` `b`) where (`a`.`by` = `b`.`id`) order by `a`.`date_date` desc,`a`.`id` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-18 17:55:53
