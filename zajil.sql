-- MySQL dump 10.13  Distrib 5.6.27, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: zajil
-- ------------------------------------------------------
-- Server version	5.6.27-0ubuntu1

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
-- Table structure for table `blocked_dates`
--

DROP TABLE IF EXISTS `blocked_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocked_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `service_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocked_dates_service_id_service_type_index` (`service_id`,`service_type`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocked_dates`
--

LOCK TABLES `blocked_dates` WRITE;
/*!40000 ALTER TABLE `blocked_dates` DISABLE KEYS */;
INSERT INTO `blocked_dates` VALUES (1,1,'2016-11-24 05:00:00',1,'photographers',NULL,NULL),(2,1,'2016-11-08 05:00:00',5,'guestServices',NULL,NULL),(3,1,'2016-12-08 05:00:00',1,'photographers',NULL,NULL),(4,1,'2016-11-10 05:00:00',1,'photographers',NULL,NULL),(5,1,'2016-11-08 05:00:00',1,'photographers',NULL,NULL),(6,1,'2016-11-30 05:00:00',1,'photographers',NULL,NULL),(7,1,'2016-11-30 05:00:00',5,'guestServices',NULL,NULL),(8,1,'2016-11-30 05:00:00',2,'halls',NULL,NULL),(9,1,'2016-11-30 05:00:00',4,'buffetPackages',NULL,NULL),(10,1,'2016-11-30 05:00:00',5,'buffetPackages',NULL,NULL),(11,1,'2016-11-10 05:00:00',4,'buffetPackages',NULL,NULL),(12,1,'2016-11-30 05:00:00',2,'lightServices',NULL,NULL),(13,18,'2016-12-19 05:00:00',3,'guestServices',NULL,NULL),(14,18,'2016-11-19 05:00:00',3,'guestServices',NULL,NULL),(15,16,'2016-11-27 05:00:00',5,'guestServices',NULL,NULL),(16,16,'2016-12-02 05:00:00',5,'guestServices',NULL,NULL),(17,16,'2017-01-16 05:00:00',5,'guestServices',NULL,NULL),(18,16,'2017-03-12 05:00:00',5,'guestServices',NULL,NULL),(19,1,'2016-12-29 05:00:00',4,'photographers',NULL,NULL);
/*!40000 ALTER TABLE `blocked_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buffet_packages`
--

DROP TABLE IF EXISTS `buffet_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buffet_packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `buffet_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buffet_packages`
--

LOCK TABLES `buffet_packages` WRITE;
/*!40000 ALTER TABLE `buffet_packages` DISABLE KEYS */;
INSERT INTO `buffet_packages` VALUES (4,2,'عربون',120.00,1),(5,2,'الدفع كامل ',620.00,1);
/*!40000 ALTER TABLE `buffet_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buffets`
--

DROP TABLE IF EXISTS `buffets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buffets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buffets`
--

LOCK TABLES `buffets` WRITE;
/*!40000 ALTER TABLE `buffets` DISABLE KEYS */;
INSERT INTO `buffets` VALUES (2,'بوفيه تراحيب','بوفيه ٣٠٠ + ١٥٠ مجانا و٢٠ خدمة قهوة وشاي و عصائر و مهراجا عطور وطبخ ٥ خرفان او قعود و خروفين و٢ محمل متحرك و واحد ثابت',NULL,'');
/*!40000 ALTER TABLE `buffets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_services`
--

DROP TABLE IF EXISTS `guest_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_services`
--

LOCK TABLES `guest_services` WRITE;
/*!40000 ALTER TABLE `guest_services` DISABLE KEYS */;
INSERT INTO `guest_services` VALUES (3,'شركة الكيف الكلاسيك ( عربون ) ',130.00,1,'630 دك شامل الوجار وطاولة التقديم القهوه و6 انواع شاي و4 انواع حليب و3 انواع كوفي و8 اصناف حلويات فاخره و 6 انواع فطاير فاخره 4 اواني تمريه و7 عمال خدمة داخل الوجار فقط ومشرف'),(4,'شركة تراحيب VIP ( عربون )',150.00,1,'550 دك شامل الوجار و ٤ اصناف شاي و٣ اصناف قهوة و٢ انواع حليب وقهوة عربية و١٠ اصناف فطاير و١٠ اصناف حلو وتمر وتمرية و٨ اصناف عصائر عدد مفتوح و٢ محمل متنقل وخدمة ١٢عامل'),(5,'شركة بيت الشاذليه ( عربون )',150.00,1,'350 دك شامل الوجار وطاولات التقديم والقهوه العربيه و8 انواع من الشاي والقهوه الفاخره و2 انواع حليب والكرك و4 اطباق فطاير 2 طبق كبب وورق عنب و3 انواع تمور فاخره بحشوات مختلفه و12 نوع حلا بلجيكي وبيتفيور وبسبوسه ونافورة الككاو مع فواكة ومارشملو ومسكرات وخدمة 8 عمال ومشرف');
/*!40000 ALTER TABLE `guest_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hall_bookings`
--

DROP TABLE IF EXISTS `hall_bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hall_bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hall_bookings`
--

LOCK TABLES `hall_bookings` WRITE;
/*!40000 ALTER TABLE `hall_bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `hall_bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `halls`
--

DROP TABLE IF EXISTS `halls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `halls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `price` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halls`
--

LOCK TABLES `halls` WRITE;
/*!40000 ALTER TABLE `halls` DISABLE KEYS */;
INSERT INTO `halls` VALUES (2,'قاعة الثريا رقم 1',' تقع في جنوب الصباحية',' تقع في جنوب الصباحية',450.00,0);
/*!40000 ALTER TABLE `halls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `light_services`
--

DROP TABLE IF EXISTS `light_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `light_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `light_services`
--

LOCK TABLES `light_services` WRITE;
/*!40000 ALTER TABLE `light_services` DISABLE KEYS */;
INSERT INTO `light_services` VALUES (2,'جهة وحدة',27.00,1,''),(3,'جهتين',52.00,1,''),(4,'ثلاث جهات',77.00,1,'');
/*!40000 ALTER TABLE `light_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `recepient_count` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,'عجمان العاشرة صفحة واحدة',150.00,20000,1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_23_150805_create_messages_table',1),('2016_04_23_150838_create_buffets_table',1),('2016_04_23_150909_create_buffet_packages_table',1),('2016_04_23_150940_create_halls_table',1),('2016_04_23_151130_create_photographers_table',1),('2016_04_23_151301_create_guest_services_table',1),('2016_04_23_151334_create_light_services_table',1),('2016_04_23_151533_create_orders_table',1),('2016_04_23_153011_create_hall_bookings_table',1),('2016_09_23_091139_create_service_users_table',2),('2016_09_26_105357_insert_active_cloumn_to_photographers_table',3),('2016_09_26_110613_insert_active_cloumn_to_guest_services_table',3),('2016_10_19_115925_insert_active_to_halls_table',4),('2016_10_19_115940_insert_active_to_light_service_table',4),('2016_10_19_115948_insert_active_to_messages_table',4),('2016_10_19_115953_insert_active_to_buffets_table',4),('2016_10_24_062634_insert_description_column_to_photographers_table',5),('2016_10_24_062754_insert_description_column_to_guest_services_table',5),('2016_10_24_062852_insert_description_column_to_light_services_table',5),('2016_10_24_072421_create_table_blocked_dates',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `message_id` int(11) DEFAULT NULL,
  `message_text` text COLLATE utf8_unicode_ci,
  `buffet_package_id` int(11) DEFAULT NULL,
  `hall_id` int(11) DEFAULT NULL,
  `photographer_id` int(11) DEFAULT NULL,
  `guest_service_id` int(11) DEFAULT NULL,
  `light_service_id` int(11) DEFAULT NULL,
  `message_date` timestamp NULL DEFAULT NULL,
  `buffet_date` timestamp NULL DEFAULT NULL,
  `hall_date` timestamp NULL DEFAULT NULL,
  `photographer_date` timestamp NULL DEFAULT NULL,
  `guest_service_date` timestamp NULL DEFAULT NULL,
  `light_service_date` timestamp NULL DEFAULT NULL,
  `secret_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('pending','failed','success') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'57cbe37a78a47','Zal','','9797777',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-04 12:06:36',NULL,'1gx8eku5m0kkdqrflvm42t9qvfbhxorfz6iiaj85bqd26gvi','450','success','2016-09-04 16:03:51','2016-10-04 14:57:13','2016-10-04 14:57:13'),(2,'57cbedf588d5c','تجربه','Z4ls@live.com','97978803',NULL,4,NULL,1,3,3,2,4,'2016-09-29 22:30:00','2016-09-04 13:47:48','2016-09-29 22:30:00','2016-09-29 22:30:00','2016-09-29 22:30:00','2016-09-28 22:30:00','uq4qjcylo1nzi5t3vdsxv','2055','success','2016-09-04 16:48:36','2016-10-04 15:20:38','2016-10-04 15:20:38'),(3,'57cbf3a94f6ef','Ddgy','Jhhhhh@hotmail.con','56855666',NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2016-09-04 14:12:23',NULL,NULL,'gs1obo8f61ktqg4fnmqz6','150','success','2016-09-04 17:12:56','2016-09-04 17:13:13',NULL),(4,NULL,'افضل','Z4ls@live.com','97978803',NULL,NULL,NULL,3,2,3,2,3,NULL,'2016-09-28 22:30:00','2016-09-28 22:30:00','2016-09-05 11:54:13','2016-09-05 11:52:22','2016-09-27 22:30:00','doz1bel0nux2nsiewm36m','2300','','2016-09-05 14:55:08','2016-10-04 15:25:28','2016-10-04 15:25:28'),(5,'57cd281ccdeef','افضل','Z4ls@live.com','97978803',NULL,3,NULL,3,2,3,2,3,'2016-09-05 11:52:31','2016-09-28 22:30:00','2016-09-28 22:30:00','2016-09-05 11:54:13','2016-09-05 11:52:22','2016-09-27 22:30:00','hkztspmd2n7zr3rq8hy77s','2540','success','2016-09-05 15:08:59','2016-10-04 15:25:36','2016-10-04 15:25:36'),(6,NULL,'تجربه','','97776644',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-05 13:46:38',NULL,NULL,NULL,NULL,NULL,'4m6q6iksw0ab2l1z5b81im','120','','2016-09-05 16:47:33','2016-10-05 12:01:58','2016-10-05 12:01:58'),(7,'57cdb81739d87','مبارك','','98824010',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-15 01:00:00',NULL,NULL,'kpq0ldugi7lhaknpk7y7o','150','success','2016-09-06 01:23:18','2016-09-06 01:33:55','2016-09-06 01:33:55'),(8,'57cdb8b2cefd9','تجربة','','54545',NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2016-09-19 01:00:00',NULL,NULL,NULL,NULL,'1025694z6vj52sadjzess8','750','success','2016-09-06 01:25:53','2016-09-06 01:33:44','2016-09-06 01:33:44'),(9,'57ce767081b77','تجربة','','9764646',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-06 11:55:06','qdyryavtd4mcznoipuozme','25','success','2016-09-06 14:55:27','2016-10-05 12:02:06','2016-10-05 12:02:06'),(10,NULL,'تجربه','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-28 22:30:00',NULL,'2ey4wd32jdlr7o8phtx4b9','450','','2016-09-07 00:12:41','2016-10-05 12:02:02','2016-10-05 12:02:02'),(11,NULL,'Hgsb','Njsj@hotnail.con','88865589',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-08 01:57:36',NULL,NULL,NULL,NULL,NULL,'knygntvvzvbaoyq3l2x3','120','','2016-09-08 04:58:23','2016-10-04 15:25:54','2016-10-04 15:25:54'),(12,NULL,'تجربة','','97776644',NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2016-09-08 04:17:12',NULL,NULL,NULL,NULL,'w936ylogn8kiu3yneprtl','750','','2016-09-08 07:17:33','2016-09-08 13:45:16','2016-09-08 13:45:16'),(13,NULL,'Najakak','Hshsjsj@hotmail.fom','64654546',NULL,NULL,NULL,2,2,NULL,2,NULL,NULL,'2016-09-10 23:59:11','2016-09-26 02:00:00',NULL,'2016-09-10 23:59:32',NULL,'5gw9kjztkljvr2knhb2er','1050','','2016-09-11 03:00:03','2016-10-05 12:01:53','2016-10-05 12:01:53'),(14,NULL,'ااااا','','555866555',NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,'2016-09-15 17:35:50','cs9cor92v9tplbxso3nyah','75','','2016-09-15 20:36:07','2016-10-05 12:01:47','2016-10-05 12:01:47'),(15,NULL,'الللل','','676466446',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-27 06:04:46',NULL,NULL,NULL,NULL,'kyq1nskg9qvab5og5x9f','150','','2016-09-27 09:05:11','2016-10-05 12:01:43','2016-10-05 12:01:43'),(16,NULL,'الللل','','676466446',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-27 06:04:46',NULL,NULL,NULL,NULL,'315fxgkrnwwl1yglfwg3yo','150','','2016-09-27 09:05:19','2016-10-05 12:01:39','2016-10-05 12:01:39'),(17,NULL,'Jjkss','','88494664',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 03:25:48',NULL,'knj6lsdcu594978gmt0lax','450','','2016-09-29 06:26:06','2016-10-05 12:01:35','2016-10-05 12:01:35'),(18,NULL,'Jjkss','','88494664',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 03:25:48',NULL,'m1ub14e31ho0xuqab459p','450','','2016-09-29 06:26:17','2016-10-05 12:01:30','2016-10-05 12:01:30'),(19,NULL,'Jjkss','','88494664',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 03:25:48',NULL,'ud67ums09ffc88jokjqkhv','450','','2016-09-29 06:26:18','2016-10-05 12:01:25','2016-10-05 12:01:25'),(20,NULL,'Sal','Z@b.com','8488484',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'le7klp7aemgaabqakxg0j','-180','','2016-10-08 15:56:37','2016-11-24 19:42:50',NULL),(21,NULL,'شسs','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mt928oy0tf1s3kg5engj02j4iga2rjc0qpbaydwsqmpy6tj4i','0','','2016-10-08 16:53:05','2016-10-12 14:34:30',NULL),(22,NULL,'Z','Aa@a.com','111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9mdy77qtvwj29hdtgkr2otj4ir5jo1370k9jyznyy1hpqilik9','0','','2016-10-08 16:54:35','2016-10-12 14:34:26',NULL),(23,NULL,'Zal','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ujqsb1mo0yfekjrrephlkh','0','pending','2016-10-09 07:53:30','2016-10-30 20:34:11',NULL),(24,NULL,'Zal','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-10-24 22:30:00',NULL,NULL,'cx3f5gghgupi5usw2pbyo9','150','','2016-10-09 07:53:30','2016-10-30 20:34:05',NULL),(25,NULL,'Zal','Z@b.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-31 11:55:22',NULL,NULL,'l3h3zau8q1w6792harxj','500','','2016-10-31 15:01:23','2016-12-01 03:38:07',NULL),(26,NULL,'Zal','Z@b.com','97978803','Hhhh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-10-31 11:55:22',NULL,NULL,'ip1hrb1zrd9g5llyin0sv','500','','2016-10-31 15:02:41','2016-12-01 03:38:10',NULL),(27,NULL,'فالح','Faleh_88@hotmail.com','55144650',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-01 21:19:54','2016-11-01 21:19:04',NULL,'2016-11-01 21:19:47','5s4fu36xu0eby0af52yd1','0','','2016-11-02 00:20:38','2016-11-24 19:43:01',NULL),(28,NULL,'غلات','Aaa@hotmail.com','55666556',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-03 20:15:09',NULL,NULL,NULL,NULL,'a61bjsyud5jk7fubcdciz','0','','2016-11-03 23:16:33','2016-11-28 14:48:37',NULL),(29,NULL,'حسن','','97776644',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nwax4hkb9xk6yikkpxfgl9','0','','2016-11-05 03:56:04','2016-11-24 19:42:35',NULL),(30,'583bcd6fb7e64','محمد علي العجمي ','Abu3li_aj@hotmail.com','55954155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'sjrmxyn4avcm9n5g30g2e','0','success','2016-11-28 14:23:42','2016-11-28 14:33:26',NULL),(31,NULL,'Zak','Z@b.com','97978803',NULL,2,NULL,NULL,NULL,4,NULL,NULL,'2016-12-30 05:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','2016-12-29 05:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','fitaxgqu7l5oswtypbe9f','250','','2016-12-01 16:31:53','2016-12-01 16:31:54',NULL),(32,NULL,'خميس','D_1k@hotmail.com','98088881',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-10 05:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','n4e5so4o5r8xglnpw1cws','150','','2016-12-10 19:26:12','2016-12-10 19:26:13',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photographers`
--

DROP TABLE IF EXISTS `photographers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photographers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographers`
--

LOCK TABLES `photographers` WRITE;
/*!40000 ALTER TABLE `photographers` DISABLE KEYS */;
INSERT INTO `photographers` VALUES (1,'نادر الانصاري ( عربون )',130.00,1,'330 دك شامل عدد 2 كاميرا مع كرين و2 شاشة عرض 50 بوصه وحواجز بالاضافة الى عدد 300 صوره فوتغراف وكاميرا الاوزمو والتي يتميز بها نادري الانصاري بلقطات العرضه وتنزيلها باليوتيوب والانستغرام لايف مباشر '),(4,'نادر الانصاري 2 ( عربون )',100.00,1,'170 دك شامل عدد 2 كاميرا وشاشة بلازما وحواجز بالاضافة الى 200 صوره فوتغراف ');
/*!40000 ALTER TABLE `photographers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_users`
--

DROP TABLE IF EXISTS `service_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `service_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_users_service_id_service_type_index` (`service_id`,`service_type`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_users`
--

LOCK TABLES `service_users` WRITE;
/*!40000 ALTER TABLE `service_users` DISABLE KEYS */;
INSERT INTO `service_users` VALUES (1,2,1,'photographers',NULL,NULL),(2,1,1,'photographers',NULL,NULL),(3,3,2,'photographers',NULL,NULL),(4,8,2,'guestServices',NULL,NULL),(5,1,2,'photographers',NULL,NULL),(6,1,2,'guestServices',NULL,NULL),(7,9,3,'photographers',NULL,NULL),(8,1,2,'messages',NULL,NULL),(9,1,2,'halls',NULL,NULL),(10,1,1,'buffets',NULL,NULL),(11,1,4,'lightServices',NULL,NULL),(12,1,2,'buffets',NULL,NULL),(13,1,4,'messages',NULL,NULL),(14,1,3,'halls',NULL,NULL),(15,1,2,'lightServices',NULL,NULL),(17,1,3,'photographers',NULL,NULL),(18,1,5,'guestServices',NULL,NULL),(19,11,5,'guestServices',NULL,NULL),(20,12,3,'guestServices',NULL,NULL),(21,13,1,'photographers',NULL,NULL),(22,16,5,'guestServices',NULL,NULL),(23,15,4,'guestServices',NULL,NULL),(24,17,1,'photographers',NULL,NULL),(25,17,4,'photographers',NULL,NULL),(26,15,2,'buffets',NULL,NULL),(27,18,3,'guestServices',NULL,NULL);
/*!40000 ALTER TABLE `service_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Duane Crist','admin@test.com','$2y$10$HxTS/Tnewsqhb.2zcENN7eOUb8lADMF.J5IFJWGhKAi.WYCCwKC/q','repudiandae',1,NULL,1,'un1gcLkfseQh5NVzkTjykKRSeE8StbpB5tRlsyb8Y77ZOS70LnV2GKPboXdt','2016-09-04 16:02:54','2016-11-29 19:08:13'),(15,'تراحيب','taheebkwt@gmail.com','$2y$10$8/gWRCabEmyNWAZy1hHdnOjPi2pBYmu.pRe75EcrlPyjt7os96hv2','MF6k6pUNdHFx',0,NULL,1,'dHW7C2i9Vb59Ou15ZkzPUTIdehPPOOEpYUWBaGkHZ3AQnX51mCT16qALP9Og','2016-11-24 16:58:54','2016-12-07 08:59:07'),(16,'الشاذلية','alhreesh@yahoo.com','$2y$10$4GsO8ZxuEli3j7wNjVe0HOR4m5MYISoFXbkkFqWlFNCiJmdrtQXpm','ehMM5ZPfOcIE',0,NULL,1,'hB93UQb01rZ9vwSbNIGJu5Z5IyynNBf8BpRYf15kRGMCx0P8Ac0epytHH2er','2016-11-24 16:59:55','2016-11-28 14:51:04'),(17,'نادر الانصاري','nader7860@hotmail.com','$2y$10$ucLJYvwtUium/x3dfXggBeg8YsMDOJlgH/4p.Sv0KEsUJri1KCoxm','ibsKPBdP5iRN',0,NULL,1,'FNtCSAa1RfFRxM2CQ0tE0ttfXhihY5EBbuA15EX51YJhp7DXk6ONADrtJeGe','2016-11-24 17:04:59','2016-11-30 13:27:54'),(18,'الكيف','nawaf-salem@hotmail.com','$2y$10$sGV4VUxw/1TAhIaei.aNRO8vvQ22b/mJWd.dwLtnMiAnmGKUQEWt.','LrbKl1W74Hqy',0,NULL,1,'LTLnhumuIoCi2oMfoG1cqxh8KVG0UlYRbHIgD0Wt5QZW7yDdCuQIsdhlCMnV','2016-11-25 20:23:45','2016-11-28 14:50:20'),(19,'Zal','z4ls@live.com','$2y$10$Yn7k.GK.YG.aPxx59ytgT.J9f6PwKzfghIukQbpsn1BJzq6638yEG','I870osnCqnyU',0,NULL,1,'Nk8EdSvAsbhyA8YmJMJMWnRkdgj4u1ny4ftt5WhLL4yblNuzaegO9uxs4vqQ','2016-11-25 21:04:12','2016-11-29 01:30:02');
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

-- Dump completed on 2016-12-17  7:06:44
