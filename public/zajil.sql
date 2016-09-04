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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buffet_packages`
--

LOCK TABLES `buffet_packages` WRITE;
/*!40000 ALTER TABLE `buffet_packages` DISABLE KEYS */;
INSERT INTO `buffet_packages` VALUES (2,2,'عربون ',150.00),(3,2,'الدفع كامل ',750.00);
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
INSERT INTO `buffets` VALUES (2,'بوفيه الوطنيه','٣٠٠ شخص و ١٥٠ مجاناً وطبخ قعود او اربع خرفان + مهراجة وخدمة القهوه والعصاير ١٧ عامل ومشرف',NULL,'');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_services`
--

LOCK TABLES `guest_services` WRITE;
/*!40000 ALTER TABLE `guest_services` DISABLE KEYS */;
INSERT INTO `guest_services` VALUES (2,'شركة السيف',450.00);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halls`
--

LOCK TABLES `halls` WRITE;
/*!40000 ALTER TABLE `halls` DISABLE KEYS */;
INSERT INTO `halls` VALUES (2,'قاعة الثريا رقم 1',' تقع في جنوب الصباحية',' تقع في جنوب الصباحية',450.00),(3,'قاعة الثريا رقم 2','تقع في جنوب الصباحية','تقع في جنوب الصباحية',450.00);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `light_services`
--

LOCK TABLES `light_services` WRITE;
/*!40000 ALTER TABLE `light_services` DISABLE KEYS */;
INSERT INTO `light_services` VALUES (2,'جهة وحدة',25.00),(3,'جهتين',50.00),(4,'ثلاث جهات',75.00);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,'عجمان العاشرة صفحة واحدة',120.00,10000),(7,'عجمان العاشرة صفحتين',240.00,10000),(8,'خدمة الرقم صفحة واحدة',90.00,10000),(9,'خدمة الرقم صفحتين',180.00,10000);
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_04_23_150805_create_messages_table',1),('2016_04_23_150838_create_buffets_table',1),('2016_04_23_150909_create_buffet_packages_table',1),('2016_04_23_150940_create_halls_table',1),('2016_04_23_151130_create_photographers_table',1),('2016_04_23_151301_create_guest_services_table',1),('2016_04_23_151334_create_light_services_table',1),('2016_04_23_151533_create_orders_table',1),('2016_04_23_153011_create_hall_bookings_table',1),('2016_07_15_042843_update_order_table',2),('2016_09_02_083037_insert_active_column_to_users_table',3),('2016_09_02_192313_insert_transaction_id_column_to_orders_table',4),('2016_09_03_092421_insert_deleted_at_column_to_orders_table',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,'حسن','hassn@hotmail.com','97776644',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-24 17:21:36',NULL,'75gza5onfjlv20gj9qlk3','450','pending','2016-08-24 20:22:51','2016-08-24 20:22:51',NULL),(3,'فالح مشوط','Faleh_88@hotmail.com','55144650',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-24 17:25:12',NULL,'fp1tqelxxlbvmovv9ah9q','450','pending','2016-08-24 20:25:52','2016-08-24 20:25:52',NULL),(4,'فالح ','Faleh_88@hotmail.com','55144650',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-24 17:28:16','laj0y0x7lr731ecr0dg59','25','pending','2016-08-24 20:28:59','2016-08-24 20:28:59',NULL),(5,'Hdksks','Hdkskskd@hotmail.com','64946916',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2016-08-08 01:00:00',NULL,NULL,NULL,NULL,'5udvqc946sjieyv7f37if9','750','pending','2016-08-24 21:29:46','2016-08-24 21:29:46',NULL),(6,'نينيتبمقتق','Jdjks@hotmail.com','61989642',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2016-08-08 01:00:00',NULL,NULL,NULL,NULL,'670gdfv4kulppgnkh3u9','750','pending','2016-08-24 21:37:42','2016-08-24 21:37:42',NULL),(7,'فالح','Faleh@hotmail.con','5580494',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-08-25 04:28:56',NULL,NULL,NULL,NULL,NULL,'fkz0acgsqtlmwoekq9qjm','120','pending','2016-08-25 07:29:29','2016-08-25 07:29:29',NULL),(8,'محمد','Nsnnsnssj@hotmail.com','551619184',NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2016-08-27 22:28:42',NULL,NULL,NULL,NULL,'3tk03mebi7x84wdvlaw4l7','750','pending','2016-08-28 01:29:37','2016-08-28 01:29:37',NULL),(9,'تجربة','hhshshs@hotmil.com','5757575',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-28 23:23:20',NULL,'9u6anafe1x65gifode23u','450','pending','2016-08-29 02:23:54','2016-08-29 02:23:54',NULL),(10,'تجربة','hhshshs@hotmil.com','5757575',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-28 23:23:20',NULL,'26b1bvcukvd9yq4lvkxxi','450','pending','2016-08-29 02:25:15','2016-08-29 02:25:15',NULL),(11,'تجربة','Hahdhd@hotmail.com','97646465',NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,'2016-08-29 19:44:49','yqmq5nlrpqec5osmwrdvjh','75','pending','2016-08-29 22:45:56','2016-08-29 22:45:56',NULL),(12,'عبدالعزيز عبدالله العجمي','W9mm@hotmail.com','97776298',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-20 01:00:00','1yu26i2uk5xtr6muuroucb','25','pending','2016-08-30 00:22:39','2016-08-30 00:22:39',NULL),(13,'عبدالعزيز عبدالله العجمي','W9mm@hotmail.com','97776298',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-08-20 01:00:00','q1bj7wixasbe98wk52juu','25','pending','2016-08-30 00:24:47','2016-08-30 00:24:47',NULL),(34,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','4y4l6bgsw7euiizjy9ahxr','1995','pending','2016-09-03 13:55:19','2016-09-03 13:55:19',NULL),(35,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','cfav2qbkx3ud6keejk7wkt','1995','pending','2016-09-03 13:56:04','2016-09-03 13:56:04',NULL),(36,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','20xmewgqv6usrraq5533cg','1995','pending','2016-09-03 13:57:08','2016-09-03 13:57:08',NULL),(37,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','kntoi5tqbdb87jru04zda7','1995','pending','2016-09-03 13:57:56','2016-09-03 13:57:56',NULL),(38,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','50rmzkh6icwyene3ysb45','1995','pending','2016-09-03 13:58:59','2016-09-03 13:58:59',NULL),(39,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','bin0oykoo7xvsbfxvw9k','1995','pending','2016-09-03 14:01:26','2016-09-03 14:01:26',NULL),(40,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','eskre2ba6xrz7poqx5cxkf','1995','pending','2016-09-03 14:02:20','2016-09-03 14:02:20',NULL),(41,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','1h62av53n58i0vs03qf9ahbc','1995','pending','2016-09-03 14:06:23','2016-09-03 14:06:23',NULL),(42,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','z0zalcvpsmlslgubnq30u','1995','pending','2016-09-03 14:08:01','2016-09-03 14:08:01',NULL),(43,'أفضل عبد القادر','Z4ls@live.com','97978803',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','z74c1k40pxikko8lig81b','1995','pending','2016-09-03 14:10:02','2016-09-03 14:10:02',NULL),(44,'Zayan abbas','Z4ls@live.com','97978803',NULL,3,NULL,1,2,2,3,2,'2016-09-03 10:10:27','2016-09-29 22:30:00','2016-09-29 22:30:00','2016-09-29 22:30:00','2016-09-28 22:30:00','2016-09-20 22:30:00','ge6tbx9fv48lylkc1w28adcxrbk3bytb17gy3zle3c0l14cayvi','200','pending','2016-09-03 14:17:26','2016-09-03 14:17:26',NULL),(45,'Zap	','','97977',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-28 22:30:00',NULL,'bbeiieqns55oy81csibjegsyviaxnu8bcqhu3m32gsjovszto6r','450','pending','2016-09-03 14:18:17','2016-09-03 14:18:17',NULL),(46,'أفضل ','A.b@c.com','6464',NULL,2,NULL,3,3,3,2,4,'2016-09-28 22:30:00','2016-10-27 22:30:00','2016-09-02 17:25:15','2016-09-20 22:30:00','2016-09-28 22:30:00','2016-09-27 22:30:00','62fzvsps5wqmh0owkezjya','1995','pending','2016-09-03 14:56:16','2016-09-03 14:56:16',NULL),(47,'محمد','Aansn@hotmail.com','665566556',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2016-09-03 17:04:03','djjp2mcpm9qoiwq2nbvg2f','50','pending','2016-09-03 20:04:53','2016-09-03 20:04:53',NULL),(48,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'1ndec1f0c5uvmsl92hqxzk','450','','2016-09-03 21:08:52','2016-09-03 21:08:55',NULL),(49,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'yp7giialxwpca45ee1dbx','450','','2016-09-03 21:09:15','2016-09-03 21:09:16',NULL),(50,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'2fki4c42alu01g73gcpdbr1','450','','2016-09-03 21:09:58','2016-09-03 21:09:59',NULL),(51,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'uzdht31laldphnoz8x142','450','','2016-09-03 21:11:31','2016-09-03 21:11:32',NULL),(52,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'u19fv8dyne16kplizqxgc','450','','2016-09-03 21:11:38','2016-09-03 21:11:39',NULL),(53,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'qht5fg69obh4aulr416703','450','','2016-09-03 21:12:39','2016-09-03 21:12:40',NULL),(54,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'izln2d7gy7jvtl5fodh5u','450','','2016-09-03 21:12:39','2016-09-03 21:12:40',NULL),(55,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'hjvj3s7aw3hrfwpzoov9on','450','','2016-09-03 21:13:43','2016-09-03 21:13:44',NULL),(56,'Hamdhan','','67979484',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'w9zvgb10vjiht1i91r92gg','450','','2016-09-03 21:14:08','2016-09-03 21:14:08',NULL),(57,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'yw2pu1lnb2c5u600nqwwup','450','','2016-09-03 21:15:32','2016-09-03 21:15:33',NULL),(58,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'msgywuorywdtfrtm1vvn8','450','','2016-09-03 21:16:13','2016-09-03 21:16:14',NULL),(59,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'w6jjfyxyt7f7tdwq912z6l','450','','2016-09-03 21:20:09','2016-09-03 21:20:10',NULL),(60,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'gafbxjyn42590f0alq5dou','450','','2016-09-03 21:20:38','2016-09-03 21:20:38',NULL),(61,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'zszdzjxpipxcs1r135ou','450','','2016-09-03 21:21:11','2016-09-03 21:21:12',NULL),(62,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'n9ah42kog9s9jbnnezewvl','450','pending','2016-09-03 21:23:26','2016-09-03 21:23:26',NULL),(63,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'a74vz25vxumxdn535y4ym','450','pending','2016-09-03 21:23:56','2016-09-03 21:23:56',NULL),(64,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'123zal','450','','2016-09-03 21:25:14','2016-09-03 21:29:34',NULL),(65,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'123zal','450','pending','2016-09-03 21:25:21','2016-09-03 21:25:21',NULL),(66,'Zal','','9797880',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00',NULL,'123zal','450','pending','2016-09-03 21:27:43','2016-09-03 21:27:43',NULL),(67,'Z','','99',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00','2016-09-03 18:28:23',NULL,'123zal','150','pending','2016-09-03 21:29:28','2016-09-03 21:29:28',NULL),(68,'Z','','99',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-29 22:30:00','2016-09-03 18:28:23',NULL,'ngai4ksel3d1z91dhlxtuik9epeb958t7q6xp2axkmhvq85mi','150','success','2016-09-03 21:34:05','2016-09-03 21:34:54',NULL),(69,'Test','','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-03 18:38:53',NULL,'9eqmipsf73nxax9ye1hs3f','450','','2016-09-03 21:39:20','2016-09-03 21:39:21',NULL),(70,'تجربه','','66444550',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-04 05:18:04',NULL,NULL,NULL,NULL,NULL,'1xkuadn4ypk1vh2pu9owflk','120','','2016-09-04 08:19:16','2016-09-04 08:19:18',NULL),(71,'Amra','','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-28 22:30:00',NULL,'e484d97jq2t4r3kcdwjsgu8fr16vjuy1p47n93yn9lyrb2o6r','450','','2016-09-04 13:52:50','2016-09-04 13:52:55',NULL),(72,'Amra','','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-28 22:30:00',NULL,'30eoibudrfz29rb57nyps98uxrmfo46qykijayx74qcvezsemi','450','success','2016-09-04 13:53:20','2016-09-04 13:55:31',NULL),(73,'Amra 111','','9999999',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-27 22:30:00',NULL,'37n1ibfri9vn44htv6c0jp2e29q2bgwpj8g0zjf2dpwwd8to6r','450','success','2016-09-04 14:00:13','2016-09-04 14:00:39',NULL),(74,'Zal','','9797777',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-09-04 12:06:36',NULL,'gmby7lp4cd7222tkak3vm42t9nwwf2fap0odnyamxog49ozuxr','450','','2016-09-04 15:07:14','2016-09-04 15:07:17',NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographers`
--

LOCK TABLES `photographers` WRITE;
/*!40000 ALTER TABLE `photographers` DISABLE KEYS */;
INSERT INTO `photographers` VALUES (1,'نادر الانصاري',150.00),(2,'مصور الفرسان',150.00),(3,'شركة تشريف',150.00);
/*!40000 ALTER TABLE `photographers` ENABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Darrion Hagenes','admin@test.com','$2y$10$cHStnXjm0EBr.CT0dCSx2e41iPaOJWwSB8Z.7XYTEkQrTUKzfcPsG','unde',1,'JCs1sCjNx8','2016-07-12 08:36:38','2016-07-12 08:36:38',1);
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

-- Dump completed on 2016-09-04  4:45:41
