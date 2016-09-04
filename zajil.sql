-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: zajil
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb7u1

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

-- Dumping data for table `buffet_packages`
--

LOCK TABLES `buffet_packages` WRITE;
/*!40000 ALTER TABLE `buffet_packages` DISABLE KEYS */;
INSERT INTO `buffet_packages` VALUES (1,1,'٣٠٠ شخص و ١٥٠ مجاناً وطبخ قعود او اربع خرفان + مهراجه وخدمة القهوه والشاي والعصاير ١٧ عامل ومشرف',750.00);
/*!40000 ALTER TABLE `buffet_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buffets`
--
--
-- Dumping data for table `buffets`
--

LOCK TABLES `buffets` WRITE;
/*!40000 ALTER TABLE `buffets` DISABLE KEYS */;
INSERT INTO `buffets` VALUES (1,'بوفيه الوطنية','',NULL,'');
/*!40000 ALTER TABLE `buffets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_services`
--

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

LOCK TABLES `light_services` WRITE;
/*!40000 ALTER TABLE `light_services` DISABLE KEYS */;
INSERT INTO `light_services` VALUES (1,'خدمة الإضاءة',250.00),(2,'جهة وحدة',25.00),(3,'جهتين',50.00),(4,'ثلاث جهات',75.00);
/*!40000 ALTER TABLE `light_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--
--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,'عجمان العاشرة',120.00,10000),(3,'زاجل خدمة الرقم - ارسال رسائل بدون اسم الشركة',90.00,0),(4,'زاجل خدمة الرقم - صفحتين ١٤٠ حرف',180.00,0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'zal','z4ls@live.com','97978803',NULL,3,NULL,1,3,2,2,2,'2016-07-15 05:14:35','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-25 22:30:00','dgtkypcpnww21obac4r5m6lxr7efj8zulib3s0wckz1xa6vfgvi','999.99','pending','2016-07-15 08:15:43','2016-07-15 08:15:43'),(2,'zal','z4ls@live.com','97978803',NULL,3,NULL,1,3,2,2,2,'2016-07-15 05:14:35','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-26 22:30:00','2016-07-25 22:30:00','stecumg5e1948sitdbqbmx6r0jt1jm6o5yepn8akkkw4l07ldi','999.99','pending','2016-07-15 08:17:18','2016-07-15 08:17:18'),(3,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,3,NULL,NULL,NULL,'2016-07-15 05:36:52','2016-07-15 05:36:57','2016-07-26 22:30:00',NULL,NULL,NULL,'unldzhr3ncquagwyq1gtit3xre1e7erggg2466nes1wx0qkt9','999.99','pending','2016-07-15 08:37:25','2016-07-15 08:37:25'),(4,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-15 05:36:52','2016-07-15 05:36:57',NULL,NULL,NULL,NULL,'pkpiu0884kmpyiqn1qo20529dy0v6vukcebdtltfu3lbx1or','870.00','pending','2016-07-15 08:38:03','2016-07-15 08:38:03'),(5,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,2,NULL,NULL,NULL,'2016-07-15 05:36:52','2016-07-15 05:36:57','2016-07-15 05:44:03',NULL,NULL,NULL,'eojbarar7n8kfrmkaxkfadzpviwykb5e8twg25nwx5kz3dcayvi','1320','pending','2016-07-15 08:52:25','2016-07-15 08:52:25'),(6,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-23 04:55:39','2016-07-23 04:55:44',NULL,NULL,NULL,NULL,'zzm3buymlol4ovc76izlhn','870','pending','2016-07-23 07:56:17','2016-07-23 07:56:17'),(7,'zal','z4ls@live.com','97978803',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-23 04:56:24',NULL,NULL,NULL,NULL,NULL,'dykaq4qx48lszjh8lkblkm','120','pending','2016-07-23 07:56:29','2016-07-23 07:56:29'),(8,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-28 22:30:00','2016-07-28 22:30:00',NULL,NULL,NULL,NULL,'3sw65h46qaq2oksogwzns1','870','pending','2016-07-23 08:16:04','2016-07-23 08:16:04'),(9,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-28 22:30:00','2016-07-28 22:30:00',NULL,NULL,NULL,NULL,'q02ewpk82q3fnr7dftstp','870','pending','2016-07-23 08:18:33','2016-07-23 08:18:33'),(10,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-28 22:30:00','2016-07-28 22:30:00',NULL,NULL,NULL,NULL,'jjegzdj9k9hcr5sxpa6ou','870','pending','2016-07-23 08:24:05','2016-07-23 08:24:05'),(11,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-28 22:30:00','2016-07-28 22:30:00',NULL,NULL,NULL,NULL,'uyop2q07k3b6tok2jgyi8','870','pending','2016-07-23 08:27:41','2016-07-23 08:27:41'),(12,'zal','z4ls@live.com','97978803',NULL,2,NULL,1,NULL,NULL,NULL,NULL,'2016-07-28 22:30:00','2016-07-28 22:30:00',NULL,NULL,NULL,NULL,'4fuq1bthsr9q2rf60eo4n','870','pending','2016-07-23 08:27:55','2016-07-23 08:27:55'),(13,'zal','z4ls@live.com','97978803',NULL,4,NULL,1,NULL,2,2,NULL,'2016-07-23 08:57:22','2016-07-27 22:30:00',NULL,'2016-07-26 22:30:00','2016-07-23 08:56:42',NULL,'2yx63ouq71rh2ae8xukuu','1530','pending','2016-07-23 11:57:35','2016-07-23 11:57:35'),(14,'zal','z4ls@live.com','97978803',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-23 14:28:04',NULL,NULL,NULL,NULL,NULL,'h38mop3n0vjdd0ag3odtwr','120','pending','2016-07-23 17:28:10','2016-07-23 17:28:10'),(15,'zal','z4ls@live.com','97978803',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'2016-07-27 14:52:24',NULL,NULL,NULL,NULL,NULL,'b5qibb7cx79c7gbo5kco26','120','pending','2016-07-27 17:52:33','2016-07-27 17:52:33'),(16,'zal','z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL,NULL,'2016-07-27 16:12:25','2016-07-27 16:12:18',NULL,'tvthbsqh1qrgawe5zguyf','600','pending','2016-07-27 19:12:32','2016-07-27 19:12:32'),(17,'zal','z4ls@live.com','97978803',NULL,2,NULL,NULL,NULL,NULL,2,NULL,'2016-07-28 13:26:34',NULL,NULL,NULL,'2016-07-28 13:26:43',NULL,'yhgx98h7akuc3hdokkt0ggb9dcjvttrpextq3j562866sf9a4i','570','pending','2016-07-28 16:26:59','2016-07-28 16:26:59'),(18,'zal','z4ls@live.com','97978803',NULL,2,NULL,NULL,NULL,NULL,2,NULL,'2016-07-28 13:26:34',NULL,NULL,NULL,'2016-07-28 13:26:43',NULL,'x61sh41cipgjcek5zzm48ia4ir7dkfctybx4nn0afhg218xgvi','570','pending','2016-07-28 16:27:49','2016-07-28 16:27:49'),(19,'Zal','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-07-28 13:32:22',NULL,'w0vjgpawjeku7e7mz9y1wz5mia0u6cywox7pxhnkqav399newmi','450','pending','2016-07-28 16:33:54','2016-07-28 16:33:54'),(20,'Zal','Z4ls@live.com','97978803',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'2016-07-28 13:32:22',NULL,'3f8posq5gyc4efou6td11w0zfrx5v2q3673c1vc749o70ysyvi','450','pending','2016-07-28 16:36:15','2016-07-28 16:36:15'),(21,'Hh hh ','','',NULL,4,NULL,NULL,NULL,NULL,2,NULL,'2016-08-30 22:30:00',NULL,NULL,NULL,'2016-08-24 22:30:00',NULL,'5co9ijows8grxo91r3ablr','630','pending','2016-08-01 09:25:17','2016-08-01 09:25:17'),(22,'Hh hh ','','',NULL,4,NULL,NULL,NULL,NULL,2,NULL,'2016-08-30 22:30:00',NULL,NULL,NULL,'2016-08-24 22:30:00',NULL,'8jroscxt8howor44tdwjkh','630','pending','2016-08-01 09:25:23','2016-08-01 09:25:23'),(23,'','','',NULL,4,NULL,NULL,NULL,NULL,2,NULL,'2016-08-30 22:30:00',NULL,NULL,NULL,'2016-08-24 22:30:00',NULL,'eyg0127trhhqbqlfmd4ivi','630','pending','2016-08-01 09:25:41','2016-08-01 09:25:41'),(24,'','','',NULL,2,NULL,1,3,3,2,3,'2016-08-03 16:54:43','2016-08-03 16:55:10','2016-08-03 16:54:48','2016-08-24 22:30:00','2016-08-03 16:54:56','2016-08-03 16:55:16','m9vm717gx5ekqif6lkh9e','1970','pending','2016-08-03 19:55:34','2016-08-03 19:55:34'),(25,'Afza','Gaa@live.com','',NULL,2,NULL,1,3,3,2,3,'2016-08-03 16:54:43','2016-08-03 16:55:10','2016-08-03 16:54:48','2016-08-24 22:30:00','2016-08-03 16:54:56','2016-08-03 16:55:16','bwf7k8a3ncd9msogwc8fe7','1970','pending','2016-08-03 19:56:03','2016-08-03 19:56:03'),(26,'Sffcc','Z4ls@live.con','9889907',NULL,2,NULL,1,3,2,2,3,'2016-08-30 22:30:00','2016-08-30 22:30:00','2016-08-30 22:30:00','2016-08-30 22:30:00','2016-08-30 22:30:00','2016-08-30 22:30:00','g0rez7n6juarlsaj5plo5','1970','pending','2016-08-06 08:45:36','2016-08-06 08:45:36'),(27,'','','',NULL,NULL,NULL,1,3,NULL,NULL,3,NULL,'2016-08-24 22:30:00','2016-08-30 22:30:00',NULL,NULL,'2016-09-27 22:30:00','sx7oz4tyqpxpc1eimgu1i','1250','pending','2016-08-10 14:10:02','2016-08-10 14:10:02'),(28,'','','',NULL,2,NULL,1,3,2,NULL,NULL,'2016-08-24 22:30:00','2016-08-11 20:06:32','2016-08-24 22:30:00','2016-08-25 22:30:00',NULL,NULL,'rgz3dim904glxvl5arwv1','1470','pending','2016-08-12 11:52:11','2016-08-12 11:52:11'),(29,'Afzal','Z4ls@live.com','97878803',NULL,2,NULL,1,3,2,NULL,NULL,'2016-08-24 22:30:00','2016-08-11 20:06:32','2016-08-24 22:30:00','2016-08-25 22:30:00',NULL,NULL,'a4ni7nk36viupcjapfhw7i','1470','pending','2016-08-12 11:52:44','2016-08-12 11:52:44'),(30,'','','',NULL,NULL,NULL,NULL,3,NULL,2,NULL,NULL,NULL,'2016-08-13 16:58:56',NULL,'2016-10-26 22:30:00',NULL,'d36vamjx6t575q0j271bxi','900','pending','2016-08-13 19:59:20','2016-08-13 19:59:20');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

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

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Darrion Hagenes','admin@test.com','$2y$10$cHStnXjm0EBr.CT0dCSx2e41iPaOJWwSB8Z.7XYTEkQrTUKzfcPsG','unde',1,'JCs1sCjNx8','2016-07-12 08:36:38','2016-07-12 08:36:38');
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

-- Dump completed on 2016-08-13 13:43:54
