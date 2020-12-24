-- MySQL dump 10.13  Distrib 5.7.23, for macos10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: xpro
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020_09_11_042024_create_new_invoice',1),(2,'2020_09_17_234738_create_invoice_setting_table',2),(3,'2020_09_18_064607_create_smtp_setting_table',3),(5,'2020_09_21_094851_create_email_template_table',4),(6,'2020_09_24_022708_create_company_setting_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_activity`
--

DROP TABLE IF EXISTS `x_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_activity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_work_order` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_work_order` (`id_work_order`),
  CONSTRAINT `x_activity_ibfk_1` FOREIGN KEY (`id_work_order`) REFERENCES `x_work_orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_activity`
--

LOCK TABLES `x_activity` WRITE;
/*!40000 ALTER TABLE `x_activity` DISABLE KEYS */;
INSERT INTO `x_activity` VALUES (1,4,'sd','sd',NULL,'2020-08-05 00:00:00','2020-08-15 00:00:00','2020-07-20 21:09:44',NULL,NULL),(2,4,'sd','sd',NULL,'2020-08-05 00:00:00','2020-08-15 00:00:00','2020-07-20 21:10:02',NULL,NULL),(3,4,'tes','asdas',NULL,'1212-12-12 00:00:00','1212-12-12 00:00:00','2020-07-21 20:16:03',NULL,NULL),(4,4,'sanjiit satishan','sa',NULL,'2020-08-07 00:00:00','2020-08-08 00:00:00','2020-07-22 06:53:06',NULL,NULL),(5,11,'test222','test deskripsi',NULL,'2020-08-04 00:00:00','2020-08-14 00:00:00','2020-07-28 20:43:07',NULL,NULL);
/*!40000 ALTER TABLE `x_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_appointments`
--

DROP TABLE IF EXISTS `x_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_appointments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `recurring_frequency` varchar(200) DEFAULT NULL,
  `recurring_end_date` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_staff` (`id_staff`),
  CONSTRAINT `x_appointments_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  CONSTRAINT `x_appointments_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_appointments`
--

LOCK TABLES `x_appointments` WRITE;
/*!40000 ALTER TABLE `x_appointments` DISABLE KEYS */;
INSERT INTO `x_appointments` VALUES (1,62,57,'2020-08-23 11:18:59','Meeting','tes','Weekly','2020-08-22','Accept','2020-08-09 03:24:52',NULL,NULL),(2,62,57,'2020-08-25 00:00:00','Meeting','tes','Weekly','2020-08-22','Pending','2020-08-24 12:33:58',NULL,'2020-08-24 12:40:00'),(3,62,55,'2020-08-25 00:00:00','sadwdsd',NULL,'Weekly',NULL,'Pending','2020-08-24 19:15:30',NULL,'2020-08-31 18:55:49'),(4,14,54,'2020-08-31 00:00:00','tes','tes','Weekly','2020-08-17',NULL,'2020-08-31 08:47:05','2020-08-31 18:56:22','2020-08-31 18:56:22');
/*!40000 ALTER TABLE `x_appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_clients`
--

DROP TABLE IF EXISTS `x_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `business_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_client` int(11) DEFAULT NULL,
  `logo_clients` varchar(200) DEFAULT NULL,
  `secondary_address1` varchar(200) DEFAULT NULL,
  `secondary_address2` varchar(200) DEFAULT NULL,
  `secondary_city` varchar(200) DEFAULT NULL,
  `secondary_state` varchar(200) DEFAULT NULL,
  `secondary_postal` varchar(200) DEFAULT NULL,
  `secondary_country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_clients`
--

LOCK TABLES `x_clients` WRITE;
/*!40000 ALTER TABLE `x_clients` DISABLE KEYS */;
INSERT INTO `x_clients` VALUES (14,'ikhsanul','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Indonesia','2020-08-26 21:52:31',1,'',NULL,NULL,NULL,NULL,NULL,NULL),(16,'sahtia','individual',NULL,'sahtia@gmail.com','metro 1','Jakarta','DKI Jakarta','89898999','089812938192','Indonesia','2020-07-20 20:28:40',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(17,'tes','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-06-30 14:41:27',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(18,'sanjit','individual',NULL,'sanjitsatishan55@gmail.com','4 gardiner street','banksia','nsw','0411086022','0411086022','Country','2020-07-20 20:28:47',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(19,'testttt','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-06-29 07:13:04',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(20,'teste','individual',NULL,'tesDelete@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Indonesia','2020-06-29 14:14:26',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(21,'sahtia2','individual',NULL,'sahtiamurti@gmail.com','metro permata 1 blok j5 no.30','tangerang','Banten','085939753687','085939753687','Country','2020-07-05 11:36:50',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(22,'last3',NULL,NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-10 21:52:41',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(23,'testlogo','individual',NULL,'teslogo@gmail.com','asd','Kota Jakarta Pusat','Prov. D.K.I. Jakarta','8123456780','0812345678','Country','2020-07-16 23:36:53',0,'941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png',NULL,NULL,NULL,NULL,NULL,NULL),(24,'testlogo','individual',NULL,'teslogo@gmail.com','asd','Kota Jakarta Pusat','Prov. D.K.I. Jakarta','8123456780','0812345678','Country','2020-07-16 23:36:53',0,'941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png',NULL,NULL,NULL,NULL,NULL,NULL),(25,'ikhsan@gmail.com','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:53',0,'Untitled-2.png',NULL,NULL,NULL,NULL,NULL,NULL),(26,'wa','individual',NULL,'wada@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 21:32:33',0,'',NULL,NULL,NULL,NULL,NULL,NULL),(48,'tes@gmail.com','individual',NULL,'tes@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:53',0,'/tmp/phpUTUBLL',NULL,NULL,NULL,NULL,NULL,NULL),(49,'ngetes','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:53',0,'poto3.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(50,'ngetes','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:53',0,'/tmp/phpQfN5jI',NULL,NULL,NULL,NULL,NULL,NULL),(51,'ngetes','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:53',0,'poto3.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(52,'logo3','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-16 23:36:29',0,'poto.png',NULL,NULL,NULL,NULL,NULL,NULL),(53,'try5','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-17 00:00:59',0,'/tmp/phpSK9zuq',NULL,NULL,NULL,NULL,NULL,NULL),(54,'try5','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-17 00:00:59',0,'/tmp/phpWsQ5nU',NULL,NULL,NULL,NULL,NULL,NULL),(55,'keeptry','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-17 00:00:46',0,'poto.png',NULL,NULL,NULL,NULL,NULL,NULL),(56,'bisa','individual',NULL,'tes@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-17 00:29:03',0,'garuda.png',NULL,NULL,NULL,NULL,NULL,NULL),(59,'nyoba','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Country','2020-07-20 20:28:52',0,'garuda.png',NULL,NULL,NULL,NULL,NULL,NULL),(60,'sanjit','individual',NULL,'sanjitsatishan55@gmail.com','sa','sa','sa','5444646','2665656','Country','2020-07-20 20:28:52',0,'Customer 1.jpeg',NULL,NULL,NULL,NULL,NULL,NULL),(61,'Ikhsan','individual',NULL,'ikhsanngeteh@gmail.com','jalan rahasia','jakarta','jakarta','081383341293','081383341293','Indonesia','2020-07-21 11:42:44',0,'IMG_20191206_200308.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(62,'ikhsan','individual',NULL,'ikhsan@gmail.com','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','081383341293','081383341293','Indonesia','2020-07-23 12:29:32',1,'garuda.png',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `x_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_company_setting`
--

DROP TABLE IF EXISTS `x_company_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_company_setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_company_setting`
--

LOCK TABLES `x_company_setting` WRITE;
/*!40000 ALTER TABLE `x_company_setting` DISABLE KEYS */;
INSERT INTO `x_company_setting` VALUES (1,3,'X PRO','Blitar Jawa Timur','081293188223','xpro@gmail.com','2020-09-23 19:59:25','2020-09-23 19:59:25');
/*!40000 ALTER TABLE `x_company_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_config`
--

DROP TABLE IF EXISTS `x_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `var` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `var` (`var`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_config`
--

LOCK TABLES `x_config` WRITE;
/*!40000 ALTER TABLE `x_config` DISABLE KEYS */;
INSERT INTO `x_config` VALUES (1,'APP_NAME','X PRO','application name','2020-02-15 06:55:37','2020-02-15 09:07:19',NULL),(2,'APP_VERSION','1.0.0','aplication version','2020-02-15 06:56:10','2020-02-15 09:07:19',NULL),(3,'LOGIN_SIGNATURE','_!XPRO!_','signature for login account','2020-02-15 09:06:54','2020-02-15 09:06:54',NULL);
/*!40000 ALTER TABLE `x_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_credit_note`
--

DROP TABLE IF EXISTS `x_credit_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_credit_note` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_clients` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `x_credit_note_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  CONSTRAINT `x_credit_note_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_credit_note`
--

LOCK TABLES `x_credit_note` WRITE;
/*!40000 ALTER TABLE `x_credit_note` DISABLE KEYS */;
INSERT INTO `x_credit_note` VALUES (1,62,1,'2020-08-10','2020-08-13','1','1',NULL,1,NULL,'2020-07-28 15:36:38',NULL,NULL);
/*!40000 ALTER TABLE `x_credit_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_customers`
--

DROP TABLE IF EXISTS `x_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_customers`
--

LOCK TABLES `x_customers` WRITE;
/*!40000 ALTER TABLE `x_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `x_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_email_queue`
--

DROP TABLE IF EXISTS `x_email_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_email_queue` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `from` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `cc` varchar(200) DEFAULT NULL,
  `bcc` varchar(200) DEFAULT NULL,
  `log` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_email_queue`
--

LOCK TABLES `x_email_queue` WRITE;
/*!40000 ALTER TABLE `x_email_queue` DISABLE KEYS */;
INSERT INTO `x_email_queue` VALUES (1,'tes','tess',NULL,'sanjitsatishan17@gmail.com','sanjitsatishan55@gmail.com',NULL,NULL,NULL,'2020-07-10 06:29:20',NULL,NULL),(6,'tes4','tes5',NULL,'sanjitsatishan17@gmail.com','sanjitsatishan55@gmail.com',NULL,NULL,NULL,'2020-07-10 06:53:28',NULL,NULL),(7,'test7','test7',NULL,'sanjitsatishan17@gmail.com','sanjitsatishan55@gmail.com',NULL,NULL,NULL,'2020-07-10 06:58:31',NULL,NULL),(8,'test7','test7',NULL,'sanjitsatishan17@gmail.com','sanjitsatishan55@gmail.com',NULL,NULL,NULL,'2020-07-10 07:00:55',NULL,NULL),(9,'test7','test7',NULL,'sanjitsatishan17@gmail.com','sanjitsatishan55@gmail.com',NULL,NULL,NULL,'2020-07-10 07:01:13',NULL,NULL),(11,'Account Information XPRO','\'Username : \'.Login2@gmail.com\n                          \'Password : \' .wYRlqKYg',NULL,'XPRO@gmail.com','Login2@gmail.com',NULL,NULL,NULL,'2020-07-14 15:02:48',NULL,NULL),(12,'Account Information XPRO','\'Username : Login3@gmail.com\n                          \'Password : R4yDnVXX',NULL,'XPRO@gmail.com','Login3@gmail.com',NULL,NULL,NULL,'2020-07-14 15:03:52',NULL,NULL),(13,'Account Information XPRO','Username : testcoba@gmail.com\n                          Password : EKfvEvOf',NULL,'XPRO@gmail.com','testcoba@gmail.com',NULL,NULL,NULL,'2020-07-15 04:44:11',NULL,NULL),(14,'Account Information XPRO','Username : one@gmail.com\n                          Password : VtXWyx3U',NULL,'XPRO@gmail.com','one@gmail.com',NULL,NULL,NULL,'2020-07-15 04:47:06',NULL,NULL),(15,'Account Information XPRO','Username : sanjitsatishan17@gmail.com\n                          Password : EDKYMAuD',NULL,'XPRO@gmail.com','sanjitsatishan17@gmail.com',NULL,NULL,NULL,'2020-07-20 19:58:03',NULL,NULL),(16,'Account Information XPRO','Username : test1@gmail.com\n                          Password : 8IOdErwl',NULL,'XPRO@gmail.com','test1@gmail.com',NULL,NULL,NULL,'2020-07-20 19:59:11',NULL,NULL),(17,'Account Information XPRO','Username : ikhsan11@gmail.com\n                          Password : XteR1gnI',NULL,'XPRO@gmail.com','ikhsan11@gmail.com',NULL,NULL,NULL,'2020-07-20 20:00:38',NULL,NULL),(18,'Account Information XPRO','Username : sahtiatest@gmail.com\n                          Password : qrSmNato',NULL,'XPRO@gmail.com','sahtiatest@gmail.com',NULL,NULL,NULL,'2020-07-25 04:30:47',NULL,NULL);
/*!40000 ALTER TABLE `x_email_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_email_template`
--

DROP TABLE IF EXISTS `x_email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_email_template` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_new_invoice` text COLLATE utf8mb4_unicode_ci,
  `body_new_invoice` text COLLATE utf8mb4_unicode_ci,
  `subject_payment_received` text COLLATE utf8mb4_unicode_ci,
  `body_payment_received` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_email_template`
--

LOCK TABLES `x_email_template` WRITE;
/*!40000 ALTER TABLE `x_email_template` DISABLE KEYS */;
INSERT INTO `x_email_template` VALUES (1,3,'{invoice_number} invoice created','<p>Dear {customer_name},</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We have prepared the following invoice for you:&nbsp;<strong>{invoice_number}</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can see the invoice details and proceed with the payment from the following link:&nbsp;<a href=\"https://app.akaunting.com/settings/%7Binvoice_guest_link%7D\" target=\"_blank\">{invoice_number}</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Feel free to contact us for any question.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards,</p>\r\n\r\n<p>{company_name}</p>','Payment received for {invoice_number} invoice','<p>Dear {customer_name},</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thank you for the payment. Find the payment details below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-------------------------------------------------</p>\r\n\r\n<p>Amount:&nbsp;<strong>{transaction_total}</strong></p>\r\n\r\n<p>Date:&nbsp;<strong>{transaction_paid_date}</strong></p>\r\n\r\n<p>Invoice Number:&nbsp;<strong>{invoice_number}</strong></p>\r\n\r\n<p>-------------------------------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can always see the invoice details from the following link:&nbsp;<a href=\"https://app.akaunting.com/settings/%7Binvoice_guest_link%7D\" target=\"_blank\">{invoice_number}</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Feel free to contact us for any question.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards,</p>\r\n\r\n<p>{company_name}</p>','2020-09-21 03:00:41','2020-09-21 04:02:36');
/*!40000 ALTER TABLE `x_email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_estimates`
--

DROP TABLE IF EXISTS `x_estimates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_estimates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_clients` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `estimates_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `x_estimates_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  CONSTRAINT `x_estimates_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_estimates`
--

LOCK TABLES `x_estimates` WRITE;
/*!40000 ALTER TABLE `x_estimates` DISABLE KEYS */;
INSERT INTO `x_estimates` VALUES (1,62,1,'2020-08-04','2020-08-11','11','1',NULL,'2020-07-27 21:11:39','2020-07-27 21:58:35','2020-07-27 21:58:35',1),(2,62,3,'2020-08-02','2020-08-11','1','1',NULL,'2020-07-27 21:59:12',NULL,NULL,1);
/*!40000 ALTER TABLE `x_estimates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_expenses`
--

DROP TABLE IF EXISTS `x_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_expenses`
--

LOCK TABLES `x_expenses` WRITE;
/*!40000 ALTER TABLE `x_expenses` DISABLE KEYS */;
INSERT INTO `x_expenses` VALUES (1,'x_expenses','test','-','2020-08-06',1,'2020-07-22 16:27:49',NULL,NULL),(2,'x_expenses','test','-','2020-08-06',1,'2020-07-22 16:31:40',NULL,NULL),(3,'sanjiit satishan','sa','expenses_1595437601.jpeg','2020-08-05',1,'2020-07-22 17:06:41',NULL,NULL),(4,'sa','sa','expenses_1595438326.jpeg','2020-08-05',1,'2020-07-22 17:18:46',NULL,NULL),(5,'add','dsa','expenses_1595438388.jpeg','2020-08-06',1,'2020-07-22 17:19:48',NULL,NULL);
/*!40000 ALTER TABLE `x_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_invoice`
--

DROP TABLE IF EXISTS `x_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_invoice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `issue_date` date NOT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `notes_raw` varchar(200) DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:pending|1:paid',
  `paid_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_invoice`
--

LOCK TABLES `x_invoice` WRITE;
/*!40000 ALTER TABLE `x_invoice` DISABLE KEYS */;
INSERT INTO `x_invoice` VALUES (7,'2020-08-26','2020-08-26','30',NULL,NULL,277.2,0,NULL,'2020-08-26 02:13:29','2020-08-26 02:15:05',NULL),(8,'2020-08-25','2020-08-27','2',NULL,NULL,120,0,NULL,'2020-08-26 16:42:01','2020-08-26 16:42:01',NULL),(9,'2020-08-25','2020-08-27','2',NULL,NULL,120,0,NULL,'2020-08-26 16:42:49','2020-08-26 16:42:49',NULL),(10,'2020-08-25','2020-08-27','2',NULL,NULL,48,0,NULL,'2020-08-26 17:17:27','2020-08-26 17:17:27',NULL),(11,'2020-08-25','2020-08-27','2',NULL,NULL,48,1,NULL,'2020-08-26 17:21:55','2020-08-26 17:21:55',NULL),(12,'2020-08-25','2020-08-27','2',NULL,NULL,48,0,NULL,'2020-08-26 17:22:24','2020-08-26 17:22:24',NULL),(13,'2020-08-25','2020-08-31','2',NULL,NULL,22,0,NULL,'2020-08-26 21:54:25','2020-08-26 21:54:25','2020-08-26 22:18:40');
/*!40000 ALTER TABLE `x_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_invoice_batch`
--

DROP TABLE IF EXISTS `x_invoice_batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_invoice_batch` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_invoice_product_client` bigint(20) NOT NULL,
  `id_invoice` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_invoice_product_client` (`id_invoice_product_client`),
  KEY `id_invoice` (`id_invoice`),
  CONSTRAINT `x_invoice_batch_ibfk_1` FOREIGN KEY (`id_invoice_product_client`) REFERENCES `x_invoice_product_client` (`id`),
  CONSTRAINT `x_invoice_batch_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `x_invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_invoice_batch`
--

LOCK TABLES `x_invoice_batch` WRITE;
/*!40000 ALTER TABLE `x_invoice_batch` DISABLE KEYS */;
INSERT INTO `x_invoice_batch` VALUES (1,2,7,1,'2020-08-26 02:24:57','0000-00-00 00:00:00',NULL),(2,3,7,1,'2020-08-26 02:24:57','0000-00-00 00:00:00',NULL),(3,4,7,1,'2020-08-26 02:24:57','0000-00-00 00:00:00',NULL),(4,22,12,1,'2020-08-26 17:22:24','2020-08-26 17:22:24',NULL),(5,23,13,1,'2020-08-26 21:54:25','2020-08-26 21:54:25',NULL);
/*!40000 ALTER TABLE `x_invoice_batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_invoice_product_client`
--

DROP TABLE IF EXISTS `x_invoice_product_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_invoice_product_client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` bigint(20) NOT NULL,
  `id_client` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `subtotal` double NOT NULL DEFAULT '0',
  `id_tax` bigint(20) unsigned NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_tax` (`id_tax`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `x_invoice_product_client_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `x_product_service` (`id`),
  CONSTRAINT `x_invoice_product_client_ibfk_3` FOREIGN KEY (`id_tax`) REFERENCES `x_tax` (`id`),
  CONSTRAINT `x_invoice_product_client_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `x_clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_invoice_product_client`
--

LOCK TABLES `x_invoice_product_client` WRITE;
/*!40000 ALTER TABLE `x_invoice_product_client` DISABLE KEYS */;
INSERT INTO `x_invoice_product_client` VALUES (2,1,16,1,20,1,2.2,'2020-08-28 18:45:16','2020-08-28 18:45:16',NULL),(3,3,16,5,250,1,275,'2020-08-26 22:27:18','2020-08-26 22:27:18',NULL),(4,4,16,3,102,1,0,'2020-08-27 21:19:22','2020-08-27 21:19:22',NULL),(5,3,62,2,0,2,0,'2020-08-26 16:09:31','2020-08-26 16:09:31',NULL),(6,3,62,2,0,2,0,'2020-08-26 16:11:16','2020-08-26 16:11:16',NULL),(7,3,62,2,0,2,0,'2020-08-26 16:14:19','2020-08-26 16:14:19',NULL),(8,3,62,2,0,2,0,'2020-08-26 16:18:04','2020-08-26 16:18:04',NULL),(9,3,62,2,0,2,0,'2020-08-26 16:18:30','2020-08-26 16:18:30',NULL),(10,3,62,2,0,2,0,'2020-08-26 16:19:08','2020-08-26 16:19:08',NULL),(11,3,62,2,0,2,0,'2020-08-26 16:19:54','2020-08-26 16:19:54',NULL),(12,3,62,2,0,2,0,'2020-08-26 16:20:53','2020-08-26 16:20:53',NULL),(13,3,62,1,0,1,0,'2020-08-26 16:21:56','2020-08-26 16:21:56',NULL),(14,3,62,1,0,1,0,'2020-08-26 16:27:01','2020-08-26 16:27:01',NULL),(15,3,62,1,0,1,0,'2020-08-26 16:27:38','2020-08-26 16:27:38',NULL),(16,3,62,2,0,2,0,'2020-08-26 16:42:01','2020-08-26 16:42:01',NULL),(17,3,62,2,0,2,0,'2020-08-26 16:42:49','2020-08-26 16:42:49',NULL),(18,3,62,2,0,2,0,'2020-08-26 17:16:57','2020-08-26 17:16:57',NULL),(19,1,62,2,0,2,0,'2020-08-26 17:17:27','2020-08-26 17:17:27',NULL),(20,1,62,2,0,2,0,'2020-08-26 17:19:51','2020-08-26 17:19:51',NULL),(21,1,62,2,0,2,0,'2020-08-26 17:21:55','2020-08-26 17:21:55',NULL),(22,1,62,2,0,2,0,'2020-08-26 17:22:24','2020-08-26 17:22:24',NULL),(23,1,14,1,20,1,22,'2020-08-26 21:54:25','2020-08-26 21:54:25',NULL);
/*!40000 ALTER TABLE `x_invoice_product_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_invoice_setting`
--

DROP TABLE IF EXISTS `x_invoice_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_invoice_setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `number_digit` int(11) DEFAULT NULL,
  `number_prefix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_number` int(11) DEFAULT NULL,
  `disable_invoice_item_edit` tinyint(1) NOT NULL DEFAULT '0',
  `disable_estimates_module` tinyint(1) NOT NULL DEFAULT '0',
  `enable_invoice_manual_status` tinyint(1) NOT NULL DEFAULT '0',
  `disable_shipping_option` tinyint(1) NOT NULL DEFAULT '0',
  `enable_maximum_discount` tinyint(1) NOT NULL DEFAULT '0',
  `disable_footer` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_invoice_setting`
--

LOCK TABLES `x_invoice_setting` WRITE;
/*!40000 ALTER TABLE `x_invoice_setting` DISABLE KEYS */;
INSERT INTO `x_invoice_setting` VALUES (2,3,4,'INV-',1,0,0,0,0,0,1,'2020-09-17 18:02:58','2020-09-22 22:54:48');
/*!40000 ALTER TABLE `x_invoice_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_menu`
--

DROP TABLE IF EXISTS `x_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0:nonactive,  1:active-child-dropdown, 2:active-parent-dropdown, 3:single',
  `icon` varchar(255) DEFAULT NULL,
  `reorder` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `name` (`name`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_menu`
--

LOCK TABLES `x_menu` WRITE;
/*!40000 ALTER TABLE `x_menu` DISABLE KEYS */;
INSERT INTO `x_menu` VALUES (1,'sales','sales','Sales',2,'',1,'2020-02-15 08:37:20','2020-02-22 03:51:17',NULL),(3,'sales','recurring_invoices','Recurring Invoices',1,NULL,6,'2020-02-15 08:39:00','2020-02-16 09:42:08',NULL),(4,'sales','client_payment','Client Payment',1,NULL,7,'2020-02-15 08:39:48','2020-02-16 09:42:08',NULL),(5,'work_orders-p','work_orders-p','Work Orders',2,NULL,2,'2020-02-15 08:43:42','2020-02-22 03:51:36',NULL),(6,'inventory','inventory','Inventory',2,NULL,4,'2020-02-15 13:31:20','2020-02-22 03:51:58',NULL),(7,'inventory','manage_purchase_orders','Manage Purchase Orders',1,NULL,2,'2020-02-15 13:32:00','2020-02-22 01:05:04',NULL),(8,'inventory','warehouses','Warehouses',1,NULL,6,'2020-02-15 13:32:12','2020-02-22 01:01:30',NULL),(9,'sales','credit_notes','Credit Notes',1,NULL,4,'2020-02-16 08:10:28','2020-02-16 09:40:39',NULL),(10,'sales','refund_receipts','Refund Receipts',1,NULL,5,'2020-02-16 08:13:20','2020-02-16 09:40:39',NULL),(11,'sales','manage_invoice','Manage Invoice',1,NULL,1,'2020-02-16 09:05:52','2020-02-16 09:55:29',NULL),(12,'sales','estimates','Estimates',1,NULL,3,'2020-02-16 09:29:35','2020-02-16 09:40:22',NULL),(13,'sales','create_invoice','Create Invoice',1,NULL,2,'2020-02-16 09:35:46','2020-02-16 09:40:22',NULL),(17,'clients','clients','Clients',2,NULL,3,'2020-02-17 12:25:33','2020-02-22 03:51:47',NULL),(18,'clients','manage_client','Manage Client',1,NULL,1,'2020-02-17 12:46:34','2020-07-20 11:14:05',NULL),(19,'work_orders-p','work_orders','Work Orders',1,NULL,1,'2020-02-17 12:48:34','2020-02-17 12:55:03',NULL),(22,'clients','add_new_client','Add New Client',1,NULL,2,'2020-02-22 00:42:32','2020-07-20 11:14:11',NULL),(23,'clients','appointments','Appointments',1,NULL,4,'2020-02-22 00:44:30','2020-07-20 11:16:57',NULL),(24,'clients','add_contact_list','Contact List',1,NULL,3,'2020-02-22 00:46:26','2020-07-20 11:16:57',NULL),(25,'inventory','products_&_services','Product & Services',1,NULL,1,'2020-02-22 00:56:01','2020-02-22 00:56:01',NULL),(26,'inventory','purchase_refunds','Purchase Refunds',1,NULL,3,'2020-02-22 00:56:51','2020-02-22 01:01:06',NULL),(27,'inventory','manage_suppliers','Manage Suppliers',1,NULL,4,'2020-02-22 00:58:00','2020-02-22 01:03:46',NULL),(28,'inventory','client_price_group','Client Price Group',1,NULL,5,'2020-02-22 01:02:22','2020-02-22 01:02:22',NULL),(29,'work_orders-p','add_work_order','Add Work Order',1,NULL,2,'2020-02-22 01:06:35','2020-02-22 01:09:43',NULL),(30,'work_orders-p','work_order_settings','Work Order Settings',1,NULL,3,'2020-02-22 01:07:15','2020-02-22 01:09:49',NULL),(31,'job_management-p','job_management-p','Job Management',2,NULL,5,'2020-02-22 01:12:20','2020-05-06 17:40:50',NULL),(32,'job_management-p','job_management','Job Management',1,NULL,1,'2020-02-22 01:15:58','2020-05-06 17:28:18',NULL),(33,'job_management-p','time_tracking','Time Sheet',1,NULL,2,'2020-02-22 01:16:37','2020-05-24 03:02:08',NULL),(34,'job_management-p','staff_tracking','Staff Tracking',1,NULL,3,'2020-02-22 01:17:24','2020-05-06 17:30:57',NULL),(35,'finance','finance','Finance',2,NULL,6,'2020-02-22 01:19:40','2020-02-22 03:52:25',NULL),(36,'finance','expenses','Expenses',1,NULL,1,'2020-02-22 01:21:40','2020-02-22 01:21:40',NULL),(37,'finance','incomes','Incomes',1,NULL,2,'2020-02-22 01:22:26','2020-02-22 01:22:26',NULL),(38,'finance','treasuries_bank_account','Treasuries & Bank Account',1,NULL,3,'2020-02-22 01:23:09','2020-04-30 15:37:29',NULL),(39,'finance','journals','Journals',1,NULL,4,'2020-02-22 01:23:24','2020-02-22 01:25:21',NULL),(40,'finance','chart_of_account','Chart Of Account',1,NULL,5,'2020-02-22 01:24:09','2020-02-22 01:24:09',NULL),(41,'finance','assets','Assets',1,NULL,6,'2020-02-22 01:24:34','2020-02-22 01:24:34',NULL),(42,'finance','cost_centers','Cost Centers',1,NULL,7,'2020-02-22 01:24:59','2020-02-22 01:25:11',NULL),(43,'staff','staff','Staff',2,NULL,7,'2020-02-22 03:45:35','2020-02-22 03:53:44',NULL),(44,'staff','manage_staff_members','Manage Staff Members',1,NULL,1,'2020-02-22 03:46:52','2020-02-22 03:46:52',NULL),(45,'staff','add_staff_member','Add Staff Member',1,NULL,2,'2020-02-22 03:47:23','2020-02-22 03:47:23',NULL),(46,'staff','manage_staff_roles','Manage Staff Roles',1,NULL,3,'2020-02-22 03:47:54','2020-02-22 03:47:54',NULL),(47,'settings','settings','Settings',2,NULL,8,'2020-02-22 04:02:16','2020-09-28 08:07:13',NULL),(62,'profile','profile','Profile',2,NULL,1,'2020-03-16 11:48:09','2020-03-16 11:49:00',NULL),(63,'reports','reports','Reports',3,NULL,1,'2020-04-27 17:14:04','2020-04-27 17:19:38',NULL),(64,'sales','test_menu','Test Menu 1',1,NULL,7,'2020-05-06 13:58:14','2020-05-24 03:43:29','2020-05-24 03:43:29'),(65,'job_management-p','staff_tracking_settings','Staff Tracking Settings',1,NULL,4,'2020-05-06 17:34:10','2020-05-06 17:39:57',NULL);
/*!40000 ALTER TABLE `x_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_menu_role`
--

DROP TABLE IF EXISTS `x_menu_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_menu_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `x_menu_role_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `x_menu` (`id`),
  CONSTRAINT `x_menu_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_menu_role`
--

LOCK TABLES `x_menu_role` WRITE;
/*!40000 ALTER TABLE `x_menu_role` DISABLE KEYS */;
INSERT INTO `x_menu_role` VALUES (1,1,1,'2020-02-15 08:59:22','2020-02-15 08:59:22',NULL),(2,3,1,'2020-02-15 08:59:26','2020-02-15 08:59:26',NULL),(3,4,1,'2020-02-15 08:59:28','2020-02-15 08:59:28',NULL),(4,5,1,'2020-02-15 08:59:32','2020-02-15 08:59:32',NULL),(5,6,1,'2020-02-15 13:32:39','2020-02-15 13:32:39',NULL),(6,7,1,'2020-02-15 13:32:46','2020-02-15 13:32:46',NULL),(7,8,1,'2020-02-15 13:32:54','2020-02-15 13:32:54',NULL),(8,10,1,'2020-02-16 08:15:11','2020-02-16 08:15:11',NULL),(10,12,1,'2020-02-16 09:30:40','2020-02-16 09:30:40',NULL),(11,11,1,'2020-02-16 09:31:46','2020-02-16 09:33:25',NULL),(12,13,1,'2020-02-16 09:36:06','2020-02-16 09:36:06',NULL),(13,9,1,'2020-02-16 09:45:17','2020-02-16 09:45:17',NULL),(14,17,1,'2020-02-17 12:44:44','2020-02-17 12:44:57',NULL),(15,18,1,'2020-02-17 12:46:45','2020-02-17 12:47:17',NULL),(27,19,1,'2020-02-15 08:59:32','2020-02-15 08:59:32',NULL),(28,22,1,'2020-02-22 00:42:53','2020-02-22 00:42:53',NULL),(29,23,1,'2020-02-22 00:44:40','2020-02-22 00:44:40',NULL),(30,24,1,'2020-02-22 00:46:39','2020-02-22 00:46:48',NULL),(31,25,1,'2020-02-22 00:56:15','2020-02-22 00:56:15',NULL),(32,26,1,'2020-02-22 01:02:56','2020-02-22 01:02:56',NULL),(33,27,1,'2020-02-22 01:03:02','2020-02-22 01:03:02',NULL),(34,28,1,'2020-02-22 01:03:11','2020-02-22 01:03:11',NULL),(35,29,1,'2020-02-22 01:07:58','2020-02-22 01:07:58',NULL),(36,30,1,'2020-02-22 01:08:02','2020-05-24 03:32:21','2020-05-24 03:32:21'),(37,31,1,'2020-02-22 01:18:04','2020-02-22 01:18:04',NULL),(38,32,1,'2020-02-22 01:18:10','2020-02-22 01:18:10',NULL),(39,33,1,'2020-02-22 01:18:13','2020-02-22 01:18:13',NULL),(40,34,1,'2020-02-22 01:18:22','2020-02-22 01:18:22',NULL),(41,35,1,'2020-02-22 01:25:31','2020-02-22 01:25:31',NULL),(42,36,1,'2020-02-22 01:25:36','2020-02-22 01:25:36',NULL),(43,37,1,'2020-02-22 01:25:40','2020-02-22 01:25:40',NULL),(44,38,1,'2020-02-22 01:25:44','2020-02-22 01:25:44',NULL),(45,39,1,'2020-02-22 01:25:49','2020-02-22 01:25:49',NULL),(46,40,1,'2020-02-22 01:25:54','2020-02-22 01:25:54',NULL),(49,41,1,'2020-02-22 01:26:08','2020-02-22 01:26:08',NULL),(50,42,1,'2020-02-22 01:26:13','2020-02-22 01:26:13',NULL),(51,43,1,'2020-02-22 03:48:11','2020-02-22 03:48:11',NULL),(52,44,1,'2020-02-22 03:48:19','2020-02-22 03:48:19',NULL),(53,45,1,'2020-02-22 03:48:28','2020-02-22 03:48:28',NULL),(54,46,1,'2020-02-22 03:48:33','2020-02-22 03:48:33',NULL),(55,47,1,'2020-02-22 04:13:57','2020-02-22 04:13:57',NULL),(78,63,1,'2020-04-27 17:14:59','2020-04-27 17:14:59',NULL),(79,64,1,'2020-05-06 13:59:10','2020-05-06 13:59:10',NULL),(80,65,1,'2020-05-06 17:36:59','2020-05-06 17:36:59',NULL),(206,63,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(207,1,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(208,11,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(209,13,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(210,5,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(211,19,31,'2020-07-16 00:34:31','2020-07-16 00:34:31',NULL),(212,1,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(213,11,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(214,13,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(215,12,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(216,9,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(217,10,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(218,3,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(219,4,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(220,5,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(221,19,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(222,29,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(223,17,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(224,18,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(225,22,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(226,24,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(227,23,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(228,6,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(229,25,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(230,7,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(231,26,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(232,27,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(233,28,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL),(234,8,3,'2020-07-20 20:04:59','2020-07-20 20:04:59',NULL);
/*!40000 ALTER TABLE `x_menu_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_new_invoice`
--

DROP TABLE IF EXISTS `x_new_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_new_invoice` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `inv_number` bigint(20) unsigned NOT NULL,
  `invoice_date` date NOT NULL,
  `issue_data` datetime NOT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_raw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `paid_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_new_invoice`
--

LOCK TABLES `x_new_invoice` WRITE;
/*!40000 ALTER TABLE `x_new_invoice` DISABLE KEYS */;
INSERT INTO `x_new_invoice` VALUES (1,2,14,100,'2020-09-14','2020-09-14 15:20:02','1','test','test','1000',3,'2020-09-14','2020-09-14 03:41:47','2020-09-22 23:01:46'),(6,2,14,101,'2020-09-14','2020-09-18 15:20:02','1','test','test','1000',3,'2020-09-14','2020-09-14 03:41:47',NULL),(7,2,14,102,'2020-09-14','2020-09-15 15:20:02','1','test','test','1000',3,'2020-09-15','2020-09-14 03:41:47',NULL),(8,2,14,103,'2020-09-14','2020-09-14 15:20:02','1','test','test','1000',3,'2020-09-14','2020-09-14 03:41:47',NULL),(9,2,14,104,'2020-09-14','2020-09-14 15:20:02','1','test','test','1000',3,'2020-09-14','2020-09-14 03:41:47',NULL),(10,2,14,105,'2020-09-14','2020-09-20 15:20:02','1','test','test','1000',1,'2020-09-14','2020-09-14 03:41:47',NULL);
/*!40000 ALTER TABLE `x_new_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_product_service`
--

DROP TABLE IF EXISTS `x_product_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_product_service` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_product_service`
--

LOCK TABLES `x_product_service` WRITE;
/*!40000 ALTER TABLE `x_product_service` DISABLE KEYS */;
INSERT INTO `x_product_service` VALUES (1,'tes','tes',2,20,1,'2020-07-09 22:33:04',NULL,NULL),(2,'tes','barang 1',5,50,0,'2020-07-09 22:59:06',NULL,NULL),(3,'Office','Table Office',8,50,1,'2020-07-09 23:01:47',NULL,NULL),(4,'Dsf','Ygd',10,34,0,'2020-07-21 09:40:25','2020-09-04 01:03:50',NULL),(5,'Dsf','Ygd',11,34,0,'2020-07-21 09:40:26','2020-09-04 01:03:36',NULL),(6,'Pengaman Motor','amankan motor kamu',10,10000,3,'2020-09-14 03:42:58','2020-09-14 10:25:07','0000-00-00 00:00:00'),(7,'Dexacon','claim',10,1000,1,'2020-09-15 07:16:35','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Setaples','ini setaples',5,35,1,'2020-09-16 03:30:52','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `x_product_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_rc`
--

DROP TABLE IF EXISTS `x_rc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_rc` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `merchant` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0:nonactive | 1:active',
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `merchant_code` (`merchant`,`code`),
  KEY `merchant` (`merchant`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_rc`
--

LOCK TABLES `x_rc` WRITE;
/*!40000 ALTER TABLE `x_rc` DISABLE KEYS */;
INSERT INTO `x_rc` VALUES (1,'XPRO_ANDROID',0,'Success Response',1,NULL),(2,'XPRO_ANDROID',99,'Invalid Request',1,NULL),(3,'DEFAULT',999,'Invalid RC',1,NULL),(4,'XPRO_ANDROID',98,'Invalid Signature',1,NULL),(5,'XPRO_ANDROID',97,'Authentication Failed',1,NULL),(6,'XPRO_ANDROID',96,'Invalid Token',1,NULL);
/*!40000 ALTER TABLE `x_rc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_role`
--

DROP TABLE IF EXISTS `x_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name_role`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_role`
--

LOCK TABLES `x_role` WRITE;
/*!40000 ALTER TABLE `x_role` DISABLE KEYS */;
INSERT INTO `x_role` VALUES (1,'SUPER_ADMIN','2020-02-15 08:58:53','2020-05-16 17:14:22',NULL),(2,'Manager','2020-05-08 06:07:24','2020-05-18 23:34:54','2020-05-18 23:34:54'),(3,'Staff','2020-05-08 06:54:55','2020-07-28 17:16:29',NULL),(17,'tes','2020-05-19 01:05:24','2020-05-19 03:57:17','2020-05-19 03:57:17'),(20,'Test 11','2020-05-19 02:56:38','2020-05-27 19:30:49','2020-05-27 19:30:49'),(22,'Test 12','2020-05-19 02:58:17','2020-05-22 16:48:50','2020-05-22 16:48:50'),(23,'tesss','2020-05-19 04:15:24','2020-05-19 05:10:49','2020-05-19 05:10:49'),(27,'Tessss','2020-05-19 17:46:54','2020-05-19 19:09:53','2020-05-19 19:09:53'),(29,'last','2020-05-22 16:51:31','2020-05-27 19:30:45','2020-05-27 19:30:45'),(30,'coba','2020-07-15 04:01:49','2020-07-16 00:39:03','2020-07-16 00:39:03'),(31,'tess33','2020-07-16 00:03:13','2020-07-16 00:03:13',NULL);
/*!40000 ALTER TABLE `x_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_smtp_setting`
--

DROP TABLE IF EXISTS `x_smtp_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_smtp_setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_smtp_setting`
--

LOCK TABLES `x_smtp_setting` WRITE;
/*!40000 ALTER TABLE `x_smtp_setting` DISABLE KEYS */;
INSERT INTO `x_smtp_setting` VALUES (1,3,'support@zuwinda.com','email-smtp.ap-southeast-1.amazonaws.com','587','','','tls',0,'2020-09-18 00:07:11','2020-09-22 22:43:18');
/*!40000 ALTER TABLE `x_smtp_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_staff`
--

DROP TABLE IF EXISTS `x_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_staff` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `notes` text,
  `role_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0:not active | 1:active',
  `rate_per_hour` decimal(10,0) NOT NULL DEFAULT '0',
  `rate_currency` varchar(255) NOT NULL DEFAULT 'AUD',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `x_staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_staff`
--

LOCK TABLES `x_staff` WRITE;
/*!40000 ALTER TABLE `x_staff` DISABLE KEYS */;
INSERT INTO `x_staff` VALUES (1,'ikhsanul','ikhsan@gmail.com','2020-05-08 06:25:58','081383341293','0123','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','15147','1',NULL,1,0,90,'AUD'),(2,'ikhsanul','tessLogin@gmail.com','2020-07-14 14:28:22','081383341293','081383341293','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','15147','1',NULL,3,0,90,'AUD Australian Dollar'),(44,'sanjiit satishan','sanjitsatishan55@gmail.com','2020-06-29 00:11:57','0411086022','0411086022','4 gardiner avenue','banksia','nsw','2216','1',NULL,2,0,45,'AUD Australian Dollar'),(45,'none','none','2020-06-30 15:58:24','none','none','none','none','none','none','none','none',1,0,0,'AUD'),(54,'sanjiit satishan','sanjitsatishan17@gmail.com','2020-07-20 19:58:03','0411086022','0411086022','4 gardiner avenue','banksia','nsw','2216','1',NULL,1,1,125,'AUD Australian Dollar'),(55,'sa','test1@gmail.com','2020-07-20 19:59:11','0411086022','0411086022','4 gardiner avenue','banksia','nsw','2216','1','sa',3,1,35,'AUD Australian Dollar'),(56,'tes','ikhsan11@gmail.com','2020-07-20 20:00:38','081383341293','081383341293','JL.PULO INDAH ASRI 2','Kota Jakarta Barat','Prov. D.K.I. Jakarta','15147','1','ad',3,0,21,'AUD Australian Dollar'),(57,'Sahtia','sahtiamurti@gmail.com','2020-07-25 04:30:28','Tes','085939753687','metro permata 1 blok j5 no.30','tangerang','Banten','15157','1','testing',3,1,120,'AUD Australian Dollar'),(58,'Sahtia','sahtiatest@gmail.com','2020-07-25 04:30:47','Tes','085939753687','metro permata 1 blok j5 no.30','tangerang','Banten','15157','1','testing',3,1,120,'AUD Australian Dollar');
/*!40000 ALTER TABLE `x_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_supplier`
--

DROP TABLE IF EXISTS `x_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_supplier` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `opening_balance` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `business_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_supplier`
--

LOCK TABLES `x_supplier` WRITE;
/*!40000 ALTER TABLE `x_supplier` DISABLE KEYS */;
INSERT INTO `x_supplier` VALUES (1,'ikhsanul','fahmi','02154318575','081383341293','jl pulo indah asri 2','jl pulo indah asri 3','jakarta barat','dki jakarta','1922','Indonesia','AUD',24,'ikhsan@gmail.com','tes','tess','Active','2020-09-07 00:00:59',NULL,NULL);
/*!40000 ALTER TABLE `x_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_tax`
--

DROP TABLE IF EXISTS `x_tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_tax` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0:nonactive|1:active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_tax`
--

LOCK TABLES `x_tax` WRITE;
/*!40000 ALTER TABLE `x_tax` DISABLE KEYS */;
INSERT INTO `x_tax` VALUES (1,'GST','10',NULL,1,NULL,NULL),(2,'PPN','20',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `x_tax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_users_login`
--

DROP TABLE IF EXISTS `x_users_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_users_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `x_users_login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `x_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_users_login`
--

LOCK TABLES `x_users_login` WRITE;
/*!40000 ALTER TABLE `x_users_login` DISABLE KEYS */;
INSERT INTO `x_users_login` VALUES (2,'sahtiamurti@gmail.com','$2y$10$7v1oX04lI9UWa/zD/uFwd.GbEtISrPpwsOQWNBXpFjcABBOjeRZF6',NULL,1,'2020-02-15 10:08:48','2020-08-28 17:56:46',NULL),(3,'sarwen@gmail.com','$2y$10$uoHzEM7vWEj6f4vLYrRa9Ok2UkKTKhC8U9Mp7D4HpaKGZeq68QJuy','$2y$10$K9WHZPnvWTd5TUq1g8vF0uNddKIv0gGebR1UEjAvrrroFl0pEeKv2',1,'2020-02-16 08:30:17','2020-09-30 14:56:21',NULL),(8,'ikhsan@gmail.com','$2y$10$ekGdduVBtRhP3X1KIevtFeHF1behO6iPEk1.WTDvuSFtFwlVHyYxe','$2y$10$cdXHqpGPtsdT.uToyhYnUeG/07c9dLNnwe1DCwzRvPFlEq72kG7cW',1,'2020-04-22 08:23:31','2020-09-07 06:59:12',NULL),(15,'sanjitsatishan17@gmail.com','$2y$10$1NzeR6gdj5jQJkZwRaWs0ueG3CSovqYX5nM27/nOQgFR4uO5XI2yO',NULL,3,'2020-07-20 19:58:03','2020-07-20 20:05:48',NULL),(16,'test1@gmail.com','$2y$10$dIZ0bOSeFODqE5w3H/YWwu6rbrLoOIkdRkcWTHN1dR8eflFiRsPjO','$2y$10$7wXP86ocarWSC18qiD7z6O/rs5bWr0peY/qV3T6T6S.ZazQ2wZuMi',3,'2020-07-20 19:59:11','2020-08-26 02:37:37',NULL),(17,'ikhsan11@gmail.com','$2y$10$lBr1tFFff41r0.GiZbweb.z5Ke9wnP3Fi7wnZBP9XPW05bfq96xU6',NULL,3,'2020-07-20 20:00:38','2020-07-20 20:00:38',NULL),(19,'sahtiatest@gmail.com','$2y$10$D9u7hcyE/NVSpnH0ldWol.cF.drAK3ghJrJypvn.oNwzytSba89xG','$2y$10$Ovf3C4rHjdQ2PW1YoTItV.qKw4cM.Udxe4ukWlCbsdIKArFGiFsYO',3,'2020-07-25 04:30:47','2020-08-26 16:55:53',NULL);
/*!40000 ALTER TABLE `x_users_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_work_orders`
--

DROP TABLE IF EXISTS `x_work_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_work_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_clients` bigint(20) NOT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) NOT NULL,
  `status` int(10) NOT NULL,
  `status_wo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_staff` (`id_staff`),
  CONSTRAINT `x_work_orders_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  CONSTRAINT `x_work_orders_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_work_orders`
--

LOCK TABLES `x_work_orders` WRITE;
/*!40000 ALTER TABLE `x_work_orders` DISABLE KEYS */;
INSERT INTO `x_work_orders` VALUES (1,14,1,'try','1','2020-08-05 05:20:00','2020-07-12 00:00:00','ad','tes',12,0,0,'open'),(2,16,45,'test','2','2020-07-10 00:00:00','2020-07-12 00:00:00','coba','testt',12,0,0,'open'),(3,18,44,'Install cameras','01210','2020-07-11 00:00:00','2020-07-18 00:00:00','Install 2x cameras','Redfern PS',700,0,0,'open'),(4,14,NULL,'tryyyy','21','2020-07-13 00:00:00','2020-07-15 00:00:00','q','testt',15,0,1,'open'),(5,14,45,'awd','1','2020-07-13 00:00:00','2020-07-15 00:00:00','ad','tess',13,0,0,'open'),(6,14,45,'tes3','2','2020-07-20 00:00:00','2020-07-22 00:00:00','re','wer',11,0,0,'Open'),(7,14,44,'data real','123123','2020-07-18 00:00:00','2020-07-31 00:00:00','test','123123',1232,0,0,'Open'),(8,14,45,'tes3','3','2020-07-16 00:00:00','2020-07-15 00:00:00','sad','awd',22,0,0,'Open'),(9,14,45,'test8','8','2020-07-21 00:00:00','2020-07-24 00:00:00','tesssssssssssssssss','jk',12,60,0,'Open'),(10,62,58,'test','005','2020-08-02 00:00:00','2020-08-16 00:00:00','Testing Work ORder','testt',10,15,0,'Open'),(11,62,58,'Test Work Order 33','123123','2020-08-06 00:00:00','2020-08-31 00:00:00','Create Data Backup for 2020 and 2019','Important',12000,50,0,'Open'),(12,62,58,'Work in home','9','2020-08-25 00:00:00','2020-08-31 00:00:00','Testing Work Order sahtia','Test',1200,120,1,'Open'),(13,62,45,'tes datetime','1','2020-08-06 05:43:00','2020-08-03 09:47:00','ad','datetime',12,12,0,'Open'),(14,62,57,'Development Website','122','2020-08-21 16:15:00','2020-08-31 20:00:00','Make Static Website','Engineer',100,20,1,'Open');
/*!40000 ALTER TABLE `x_work_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `x_work_orders_draft`
--

DROP TABLE IF EXISTS `x_work_orders_draft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `x_work_orders_draft` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_clients` bigint(20) DEFAULT NULL,
  `id_staff` bigint(20) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `order_number` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `budget` int(200) DEFAULT NULL,
  `hourly_rate` decimal(10,0) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `status_wo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_staff` (`id_staff`),
  CONSTRAINT `x_work_orders_draft_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `x_clients` (`id`),
  CONSTRAINT `x_work_orders_draft_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `x_staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `x_work_orders_draft`
--

LOCK TABLES `x_work_orders_draft` WRITE;
/*!40000 ALTER TABLE `x_work_orders_draft` DISABLE KEYS */;
INSERT INTO `x_work_orders_draft` VALUES (1,14,45,'hg','8','2020-07-11','2020-07-12','jhh','uu',NULL,NULL,0,'draft'),(15,NULL,45,'draft data','11241','2020-07-16','2020-07-30','test draft',NULL,NULL,NULL,0,'draft'),(16,NULL,45,'coba',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(17,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Draft');
/*!40000 ALTER TABLE `x_work_orders_draft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'xpro'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-01  7:42:21
