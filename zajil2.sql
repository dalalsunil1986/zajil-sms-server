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
