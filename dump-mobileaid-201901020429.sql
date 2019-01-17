-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: mobileaid
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `clientcases`
--

DROP TABLE IF EXISTS `clientcases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientcases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientcases_case_id_unique` (`case_id`),
  KEY `clientcases_client_email_foreign` (`client_email`),
  CONSTRAINT `clientcases_client_email_foreign` FOREIGN KEY (`client_email`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientcases`
--

LOCK TABLES `clientcases` WRITE;
/*!40000 ALTER TABLE `clientcases` DISABLE KEYS */;
INSERT INTO `clientcases` VALUES (8,'044vw','Emmanuel Paulo','BZWVW','ewebstech@gmail.com','08133918455','Diamond','closed','Active','X3Y10A','{\"id\":8,\"case_id\":\"044vw\",\"client_name\":\"Emmanuel Paulo\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"044vw\\\",\\\"client_name\\\":\\\"Emmanuel Paulo\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-28 08:04:16\",\"updated_at\":\"2018-12-28 08:04:16\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"044vw\"}}','2018-12-28 07:04:16','2018-12-30 14:21:27'),(12,'DAB1z','Emmanuel PaulGuy','BZWVW','ewebstech@gmail.com','08133918455','Diamond','closed','Active','X3Y10A','{\"id\":12,\"case_id\":\"DAB1z\",\"client_name\":\"Emmanuel PaulGuy\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"client_id\\\":\\\"BZWVW\\\",\\\"phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"DAB1z\\\",\\\"client_name\\\":\\\"Emmanuel PaulGuy\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-30 20:29:51\",\"updated_at\":\"2018-12-30 20:29:51\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"DAB1z\"}}','2018-12-30 19:29:51','2018-12-30 19:31:42'),(13,'z0z02','Emmanuel PaulGuy','BZWVW','ewebstech@gmail.com','08133918455','Diamond','closed','Active','X3Y10A','{\"id\":13,\"case_id\":\"z0z02\",\"client_name\":\"Emmanuel PaulGuy\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"z0z02\\\",\\\"client_name\\\":\\\"Emmanuel PaulGuy\\\",\\\"avatar\\\":\\\"http:\\\\\\/\\\\\\/res.cloudinary.com\\\\\\/ewebstech\\\\\\/image\\\\\\/upload\\\\\\/v1545001015\\\\\\/mobileaid\\\\\\/profile\\\\\\/08133918455\\\\\\/2018121610565231280\\\\\\/santa.png.png\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-30 20:32:19\",\"updated_at\":\"2018-12-30 20:32:19\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"z0z02\"}}','2018-12-30 19:32:19','2018-12-30 19:32:50');
/*!40000 ALTER TABLE `clientcases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Emmanuel paul','08133918455','ewebstech@gmail.com','read','Test Notifs','Our Office Location\r\nGRA, Ikeja, Lagos\r\n\r\nContact Number\r\n+234-814-990-6511',NULL,'2018-12-10 14:56:15','2018-12-27 14:00:06');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_doc_email_foreign` (`doc_email`),
  CONSTRAINT `doctors_doc_email_foreign` FOREIGN KEY (`doc_email`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'X3Y10A','doc01@mobilemedicalaid.com','offline','2018-12-22 17:11:23','2018-12-22 17:17:00');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `errors`
--

DROP TABLE IF EXISTS `errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `errors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `errors`
--

LOCK TABLES `errors` WRITE;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
INSERT INTO `errors` VALUES (14,'{\"error_code\":0,\"error_line\":140,\"error_message\":\"Undefined variable: rdata\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-18 19:35:45','2018-12-18 19:35:45'),(15,'{\"error_code\":0,\"error_line\":179,\"error_message\":\"\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-18 19:40:18','2018-12-18 19:40:18'),(16,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:58:54','2018-12-19 12:58:54'),(17,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:59:12','2018-12-19 12:59:12'),(18,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:59:34','2018-12-19 12:59:34'),(19,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:59:40','2018-12-19 12:59:40'),(20,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:59:57','2018-12-19 12:59:57'),(21,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Undefined index: PreviousUrl\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 12:59:58','2018-12-19 12:59:58'),(22,'{\"error_code\":0,\"error_line\":21,\"error_message\":\"Undefined index: HTTP_REFERER\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 13:00:27','2018-12-19 13:00:27'),(23,'{\"error_code\":0,\"error_line\":32,\"error_message\":\"Undefined index: content\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 14:45:05','2018-12-19 14:45:05'),(24,'{\"error_code\":0,\"error_line\":79,\"error_message\":\"json_decode() expects parameter 1 to be string, array given\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 14:45:38','2018-12-19 14:45:38'),(25,'{\"error_code\":0,\"error_line\":34,\"error_message\":\"Undefined index: content\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 14:47:42','2018-12-19 14:47:42'),(26,'{\"error_code\":0,\"error_line\":44,\"error_message\":\"Undefined index: package (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/client\\/viewcases.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 15:23:16','2018-12-19 15:23:16'),(27,'{\"error_code\":0,\"error_line\":560,\"error_message\":\"htmlspecialchars() expects parameter 1 to be string, array given (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/client\\/dashboard.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 15:55:02','2018-12-19 15:55:02'),(28,'{\"error_code\":0,\"error_line\":41,\"error_message\":\"Invalid argument supplied for foreach() (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/doctors.blade.php)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 16:18:02','2018-12-19 16:18:02'),(29,'{\"error_code\":0,\"error_line\":41,\"error_message\":\"Invalid argument supplied for foreach() (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/doctors.blade.php)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 16:19:24','2018-12-19 16:19:24'),(30,'{\"error_code\":0,\"error_line\":41,\"error_message\":\"Invalid argument supplied for foreach() (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/doctors.blade.php)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 16:19:44','2018-12-19 16:19:44'),(31,'{\"error_code\":0,\"error_line\":401,\"error_message\":\"The Response content must be a string or object implementing __toString(), \\\"boolean\\\" given.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 16:22:36','2018-12-19 16:22:36'),(32,'{\"error_code\":0,\"error_line\":401,\"error_message\":\"The Response content must be a string or object implementing __toString(), \\\"boolean\\\" given.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-19 16:24:11','2018-12-19 16:24:11'),(33,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined index: client_id\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:12:36','2018-12-19 17:12:36'),(34,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: i\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:12:45','2018-12-19 17:12:45'),(35,'{\"error_code\":0,\"error_line\":40,\"error_message\":\"Undefined variable: ContactMessages (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/archive.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:13:49','2018-12-19 17:13:49'),(36,'{\"error_code\":0,\"error_line\":40,\"error_message\":\"Undefined variable: ContactMessages (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/archive.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:14:27','2018-12-19 17:14:27'),(37,'{\"error_code\":0,\"error_line\":42,\"error_message\":\"Undefined index: case_id (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/opencases.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:16:10','2018-12-19 17:16:10'),(38,'{\"error_code\":0,\"error_line\":42,\"error_message\":\"Undefined index: case_id (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/opencases.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:20:41','2018-12-19 17:20:41'),(39,'{\"error_code\":0,\"error_line\":64,\"error_message\":\"syntax error, unexpected \';\', expecting \',\' or \')\'\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:24:35','2018-12-19 17:24:35'),(40,'{\"error_code\":0,\"error_line\":42,\"error_message\":\"Undefined index: case_id (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/opencases.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:25:48','2018-12-19 17:25:48'),(41,'{\"error_code\":0,\"error_line\":68,\"error_message\":\"Method App\\\\Http\\\\Controllers\\\\AdminController::viewClosedCases does not exist.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:58:44','2018-12-19 17:58:44'),(42,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: caseInf\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 17:59:13','2018-12-19 17:59:13'),(43,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: caseInf\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:00:15','2018-12-19 18:00:15'),(44,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: caseInf\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:00:43','2018-12-19 18:00:43'),(45,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: caseInf\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:01:35','2018-12-19 18:01:35'),(46,'{\"error_code\":0,\"error_line\":46,\"error_message\":\"Undefined variable: caseInf\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:01:36','2018-12-19 18:01:36'),(47,'{\"error_code\":0,\"error_line\":60,\"error_message\":\"count(): Parameter must be an array or an object that implements Countable\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:02:23','2018-12-19 18:02:23'),(48,'{\"error_code\":0,\"error_line\":69,\"error_message\":\"Undefined variable: package\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:21:40','2018-12-19 18:21:40'),(49,'{\"error_code\":0,\"error_line\":68,\"error_message\":\"Method App\\\\Http\\\\Controllers\\\\SubscriptionController::getUsersByPackage does not exist.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:21:58','2018-12-19 18:21:58'),(50,'{\"error_code\":0,\"error_line\":374,\"error_message\":\"Route [closedCases] not defined. (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/dashboard.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:40:16','2018-12-19 18:40:16'),(51,'{\"error_code\":0,\"error_line\":43,\"error_message\":\"Undefined index: avatar (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:41:03','2018-12-19 18:41:03'),(52,'{\"error_code\":0,\"error_line\":42,\"error_message\":\"Undefined index: firstname (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:42:26','2018-12-19 18:42:26'),(53,'{\"error_code\":0,\"error_line\":93,\"error_message\":\"Undefined index: content\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:46:24','2018-12-19 18:46:24'),(54,'{\"error_code\":0,\"error_line\":43,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:47:51','2018-12-19 18:47:51'),(55,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:49:38','2018-12-19 18:49:38'),(56,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:49:56','2018-12-19 18:49:56'),(57,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:28','2018-12-19 18:51:28'),(58,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:28','2018-12-19 18:51:28'),(59,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:28','2018-12-19 18:51:28'),(60,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:28','2018-12-19 18:51:28'),(61,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: email (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:34','2018-12-19 18:51:34'),(62,'{\"error_code\":0,\"error_line\":49,\"error_message\":\"Undefined index: ClientId (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/subscribers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:51:56','2018-12-19 18:51:56'),(63,'{\"error_code\":0,\"error_line\":96,\"error_message\":\"Undefined variable: data\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 18:53:44','2018-12-19 18:53:44'),(64,'{\"error_code\":0,\"error_line\":43,\"error_message\":\"Undefined index: avatar (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/admin\\/activeusers.blade.php)\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 19:07:58','2018-12-19 19:07:58'),(65,'{\"error_code\":0,\"error_line\":61,\"error_message\":\"This password does not use the Bcrypt algorithm.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"POST\"}','2018-12-19 19:17:49','2018-12-19 19:17:49'),(66,'{\"error_code\":0,\"error_line\":61,\"error_message\":\"This password does not use the Bcrypt algorithm.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"POST\"}','2018-12-19 19:18:05','2018-12-19 19:18:05'),(67,'{\"error_code\":0,\"error_line\":61,\"error_message\":\"This password does not use the Bcrypt algorithm.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"POST\"}','2018-12-19 22:46:24','2018-12-19 22:46:24'),(68,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.admin.choosesub] not found.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 22:56:30','2018-12-19 22:56:30'),(69,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.admin.choosesub] not found.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 22:56:41','2018-12-19 22:56:41'),(70,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.admin.choosesub] not found.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 22:56:48','2018-12-19 22:56:48'),(71,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.admin.choosesub] not found.\",\"ip_address\":\"192.168.173.1\",\"request_type\":\"GET\"}','2018-12-19 22:56:55','2018-12-19 22:56:55'),(72,'{\"error_code\":0,\"error_line\":74,\"error_message\":\"Use of undefined constant LateAttendanceSummaryLabel - assumed \'LateAttendanceSummaryLabel\' (this will throw an Error in a future version of PHP) (View: \\/home\\/emmanuel\\/Trials\\/mobileaid\\/resources\\/views\\/doctor\\/dashboard.blade.php)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-20 10:27:44','2018-12-20 10:27:44'),(73,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.doctor.choosesub] not found.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-22 14:00:35','2018-12-22 14:00:35'),(74,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.doctor.opencases] not found.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-22 14:01:03','2018-12-22 14:01:03'),(75,'{\"error_code\":\"42S22\",\"error_line\":664,\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'client_phonenumber\' in \'where clause\' (SQL: select * from `users` where `client_phonenumber` = asd limit 1)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 14:56:23','2018-12-22 14:56:23'),(76,'{\"error_code\":0,\"error_line\":177,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\Reports\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 16:06:00','2018-12-22 16:06:00'),(77,'{\"error_code\":0,\"error_line\":27,\"error_message\":\"Call to undefined method Illuminate\\\\Validation\\\\Validator::make()\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:03:50','2018-12-22 17:03:50'),(78,'{\"error_code\":0,\"error_line\":27,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\RequestRules\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:04:26','2018-12-22 17:04:26'),(79,'{\"error_code\":0,\"error_line\":36,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\HttpStatusCodes\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:04:40','2018-12-22 17:04:40'),(80,'{\"error_code\":0,\"error_line\":45,\"error_message\":\"Undefined variable: userDetails\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:08:47','2018-12-22 17:08:47'),(81,'{\"error_code\":0,\"error_line\":17,\"error_message\":\"Undefined index: case_id\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:09:12','2018-12-22 17:09:12'),(82,'{\"error_code\":0,\"error_line\":31,\"error_message\":\"Undefined index: client_id\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:11:23','2018-12-22 17:11:23'),(83,'{\"error_code\":0,\"error_line\":32,\"error_message\":\"Class \'App\\\\Model\\\\User\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:12:39','2018-12-22 17:12:39'),(84,'{\"error_code\":0,\"error_line\":32,\"error_message\":\"Undefined index: user\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:14:27','2018-12-22 17:14:27'),(85,'{\"error_code\":0,\"error_line\":32,\"error_message\":\"Undefined index: user\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-22 17:15:09','2018-12-22 17:15:09'),(86,'{\"error_code\":0,\"error_line\":68,\"error_message\":\"Method App\\\\Http\\\\Controllers\\\\CaseController::getUserDetailsById does not exist.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-22 17:23:43','2018-12-22 17:23:43'),(87,'{\"error_code\":0,\"error_line\":68,\"error_message\":\"Method App\\\\Http\\\\Controllers\\\\CaseController::getUserDetailsById does not exist.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-22 17:25:29','2018-12-22 17:25:29'),(88,'{\"error_code\":0,\"error_line\":103,\"error_message\":\"Illegal string offset \'avatar\'\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-26 08:57:33','2018-12-26 08:57:33'),(89,'{\"error_code\":0,\"error_line\":137,\"error_message\":\"View [.doctor.opencases] not found.\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-27 10:30:20','2018-12-27 10:30:20'),(90,'{\"error_code\":0,\"error_line\":180,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\Transactions\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 11:27:57','2018-12-27 11:27:57'),(91,'{\"error_code\":0,\"error_line\":205,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\Subscriptions\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 11:51:03','2018-12-27 11:51:03'),(92,'{\"error_code\":-1,\"error_line\":767,\"error_message\":\"Class App\\\\Http\\\\Controllers\\\\DoctorsController does not exist\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-27 13:53:36','2018-12-27 13:53:36'),(93,'{\"error_code\":0,\"error_line\":29,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\ClientCases\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:16:59','2018-12-27 16:16:59'),(94,'{\"error_code\":0,\"error_line\":31,\"error_message\":\"Undefined index: case_id\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:17:24','2018-12-27 16:17:24'),(95,'{\"error_code\":0,\"error_line\":35,\"error_message\":\"Undefined index: xdata\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:17:48','2018-12-27 16:17:48'),(96,'{\"error_code\":0,\"error_line\":39,\"error_message\":\"Class \'App\\\\Http\\\\Controllers\\\\Reports\' not found\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:24:12','2018-12-27 16:24:12'),(97,'{\"error_code\":\"42S22\",\"error_line\":664,\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'case_status\' in \'field list\' (SQL: update `reports` set `case_id` = y0wvv, `client_email` = ewebstech@gmail.com, `case_status` = closed, `content` = {\\\"id\\\":3,\\\"case_id\\\":\\\"y0wvv\\\",\\\"client_name\\\":\\\"Emmanuel Paulo\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"closed\\\",\\\"sub_status\\\":\\\"Active\\\",\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"content\\\":\\\"{\\\\\\\"id\\\\\\\":3,\\\\\\\"case_id\\\\\\\":\\\\\\\"y0wvv\\\\\\\",\\\\\\\"client_name\\\\\\\":\\\\\\\"Emmanuel Paulo\\\\\\\",\\\\\\\"client_id\\\\\\\":\\\\\\\"BZWVW\\\\\\\",\\\\\\\"client_email\\\\\\\":\\\\\\\"ewebstech@gmail.com\\\\\\\",\\\\\\\"client_phonenumber\\\\\\\":\\\\\\\"08133918455\\\\\\\",\\\\\\\"client_package\\\\\\\":\\\\\\\"Diamond\\\\\\\",\\\\\\\"case_status\\\\\\\":\\\\\\\"closed\\\\\\\",\\\\\\\"sub_status\\\\\\\":\\\\\\\"Active\\\\\\\",\\\\\\\"doctor_id\\\\\\\":\\\\\\\"X3Y10A\\\\\\\",\\\\\\\"content\\\\\\\":\\\\\\\"{\\\\\\\\\\\\\\\"client_id\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"BZWVW\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"phonenumber\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"08133918455\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"case_id\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"y0wvv\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_name\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Emmanuel Paulo\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_email\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"ewebstech@gmail.com\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_phonenumber\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"08133918455\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_package\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Diamond\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"case_status\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"initiated\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"sub_status\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Active\\\\\\\\\\\\\\\"}\\\\\\\",\\\\\\\"created_at\\\\\\\":\\\\\\\"2018-12-18 15:04:53\\\\\\\",\\\\\\\"updated_at\\\\\\\":\\\\\\\"2018-12-18 15:04:53\\\\\\\",\\\\\\\"call_info\\\\\\\":{\\\\\\\"doctor_id\\\\\\\":\\\\\\\"X3Y10A\\\\\\\",\\\\\\\"client_phonenumber\\\\\\\":\\\\\\\"08133918455\\\\\\\",\\\\\\\"case_id\\\\\\\":\\\\\\\"y0wvv\\\\\\\"}}\\\",\\\"created_at\\\":\\\"2018-12-18 15:04:53\\\",\\\"updated_at\\\":\\\"2018-12-22 17:06:32\\\",\\\"report\\\":\\\"<p><em>Lorem ipsum<\\\\\\/em>, or&nbsp;<em>lipsum<\\\\\\/em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. <strong>The passage is <\\\\\\/strong>attributed to an unknown t<strong>ypesetter in the 15<\\\\\\/strong>th centur<u>y who is though<\\\\\\/u>t to have scrambled parts of Cicero&#39;s<u>&nbsp;<em>De Finibus Bonorum et Malorum<\\\\\\/em>&nbsp;f<\\\\\\/u>or use in a type specimen book. It usually begins with:<\\\\\\/p>\\\"}, `updated_at` = 2018-12-27 17:29:40 where `case_id` = y0wvv and `client_email` = ewebstech@gmail.com)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:29:40','2018-12-27 16:29:40'),(98,'{\"error_code\":\"42S22\",\"error_line\":664,\"error_message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'case_status\' in \'field list\' (SQL: update `reports` set `case_id` = y0wvv, `client_email` = ewebstech@gmail.com, `case_status` = closed, `content` = {\\\"id\\\":3,\\\"case_id\\\":\\\"y0wvv\\\",\\\"client_name\\\":\\\"Emmanuel Paulo\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"closed\\\",\\\"sub_status\\\":\\\"Active\\\",\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"content\\\":\\\"{\\\\\\\"id\\\\\\\":3,\\\\\\\"case_id\\\\\\\":\\\\\\\"y0wvv\\\\\\\",\\\\\\\"client_name\\\\\\\":\\\\\\\"Emmanuel Paulo\\\\\\\",\\\\\\\"client_id\\\\\\\":\\\\\\\"BZWVW\\\\\\\",\\\\\\\"client_email\\\\\\\":\\\\\\\"ewebstech@gmail.com\\\\\\\",\\\\\\\"client_phonenumber\\\\\\\":\\\\\\\"08133918455\\\\\\\",\\\\\\\"client_package\\\\\\\":\\\\\\\"Diamond\\\\\\\",\\\\\\\"case_status\\\\\\\":\\\\\\\"closed\\\\\\\",\\\\\\\"sub_status\\\\\\\":\\\\\\\"Active\\\\\\\",\\\\\\\"doctor_id\\\\\\\":\\\\\\\"X3Y10A\\\\\\\",\\\\\\\"content\\\\\\\":\\\\\\\"{\\\\\\\\\\\\\\\"client_id\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"BZWVW\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"phonenumber\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"08133918455\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"case_id\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"y0wvv\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_name\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Emmanuel Paulo\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_email\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"ewebstech@gmail.com\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_phonenumber\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"08133918455\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"client_package\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Diamond\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"case_status\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"initiated\\\\\\\\\\\\\\\",\\\\\\\\\\\\\\\"sub_status\\\\\\\\\\\\\\\":\\\\\\\\\\\\\\\"Active\\\\\\\\\\\\\\\"}\\\\\\\",\\\\\\\"created_at\\\\\\\":\\\\\\\"2018-12-18 15:04:53\\\\\\\",\\\\\\\"updated_at\\\\\\\":\\\\\\\"2018-12-18 15:04:53\\\\\\\",\\\\\\\"call_info\\\\\\\":{\\\\\\\"doctor_id\\\\\\\":\\\\\\\"X3Y10A\\\\\\\",\\\\\\\"client_phonenumber\\\\\\\":\\\\\\\"08133918455\\\\\\\",\\\\\\\"case_id\\\\\\\":\\\\\\\"y0wvv\\\\\\\"}}\\\",\\\"created_at\\\":\\\"2018-12-18 15:04:53\\\",\\\"updated_at\\\":\\\"2018-12-22 17:06:32\\\",\\\"report\\\":\\\"<p><em>Lorem ipsum<\\\\\\/em>, or&nbsp;<em>lipsum<\\\\\\/em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. <strong>The passage is <\\\\\\/strong>attributed to an unknown t<strong>ypesetter in the 15<\\\\\\/strong>th centur<u>y who is though<\\\\\\/u>t to have scrambled parts of Cicero&#39;s<u>&nbsp;<em>De Finibus Bonorum et Malorum<\\\\\\/em>&nbsp;f<\\\\\\/u>or use in a type specimen book. It usually begins with:<\\\\\\/p>\\\"}, `updated_at` = 2018-12-27 17:29:46 where `case_id` = y0wvv and `client_email` = ewebstech@gmail.com)\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-27 16:29:46','2018-12-27 16:29:46'),(99,'{\"error_code\":0,\"error_line\":48,\"error_message\":\"Undefined offset: 0\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"GET\"}','2018-12-27 16:42:49','2018-12-27 16:42:49'),(100,'{\"error_code\":0,\"error_line\":171,\"error_message\":\"Undefined index: phonenumber\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-28 00:17:09','2018-12-28 00:17:09'),(101,'{\"error_code\":0,\"error_line\":175,\"error_message\":\"Undefined index: phonenumber\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-28 00:17:53','2018-12-28 00:17:53'),(102,'{\"error_code\":0,\"error_line\":379,\"error_message\":\"Undefined index: xdata\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-30 15:34:22','2018-12-30 15:34:22'),(103,'{\"error_code\":0,\"error_line\":379,\"error_message\":\"Undefined index: xdata\",\"ip_address\":\"127.0.0.1\",\"request_type\":\"POST\"}','2018-12-30 15:34:32','2018-12-30 15:34:32');
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'2014_10_12_000000_create_users_table',3),(7,'2014_10_12_100000_create_password_resets_table',3),(11,'2018_12_05_132704_create_contacts_table',5),(14,'2018_12_13_140536_create_transactions_table',6),(16,'2018_12_08_153009_create_subscriptions_table',7),(17,'2018_12_18_114510_create_client_cases_table',8),(19,'2018_12_18_194306_create_errors_table',9),(22,'2018_12_22_161317_create_reports_table',10),(23,'2018_12_22_172431_create_doctors_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_case_id_foreign` (`case_id`),
  KEY `reports_client_email_foreign` (`client_email`),
  CONSTRAINT `reports_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `clientcases` (`case_id`) ON DELETE CASCADE,
  CONSTRAINT `reports_client_email_foreign` FOREIGN KEY (`client_email`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,'044vw','ewebstech@gmail.com','{\"id\":8,\"case_id\":\"044vw\",\"client_name\":\"Emmanuel Paulo\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"044vw\\\",\\\"client_name\\\":\\\"Emmanuel Paulo\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-28 08:04:16\",\"updated_at\":\"2018-12-28 08:04:16\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"044vw\"}}','2018-12-30 14:21:27','2018-12-30 14:21:27'),(2,'DAB1z','ewebstech@gmail.com','{\"id\":12,\"case_id\":\"DAB1z\",\"client_name\":\"Emmanuel PaulGuy\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"client_id\\\":\\\"BZWVW\\\",\\\"phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"DAB1z\\\",\\\"client_name\\\":\\\"Emmanuel PaulGuy\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-30 20:29:51\",\"updated_at\":\"2018-12-30 20:29:51\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"DAB1z\"}}','2018-12-30 19:31:42','2018-12-30 19:31:42'),(3,'z0z02','ewebstech@gmail.com','{\"id\":13,\"case_id\":\"z0z02\",\"client_name\":\"Emmanuel PaulGuy\",\"client_id\":\"BZWVW\",\"client_email\":\"ewebstech@gmail.com\",\"client_phonenumber\":\"08133918455\",\"client_package\":\"Diamond\",\"case_status\":\"closed\",\"sub_status\":\"Active\",\"doctor_id\":\"X3Y10A\",\"content\":\"{\\\"doctor_id\\\":\\\"X3Y10A\\\",\\\"client_phonenumber\\\":\\\"08133918455\\\",\\\"case_id\\\":\\\"z0z02\\\",\\\"client_name\\\":\\\"Emmanuel PaulGuy\\\",\\\"avatar\\\":\\\"http:\\\\\\/\\\\\\/res.cloudinary.com\\\\\\/ewebstech\\\\\\/image\\\\\\/upload\\\\\\/v1545001015\\\\\\/mobileaid\\\\\\/profile\\\\\\/08133918455\\\\\\/2018121610565231280\\\\\\/santa.png.png\\\",\\\"client_id\\\":\\\"BZWVW\\\",\\\"client_email\\\":\\\"ewebstech@gmail.com\\\",\\\"client_package\\\":\\\"Diamond\\\",\\\"case_status\\\":\\\"open\\\",\\\"sub_status\\\":\\\"Active\\\"}\",\"created_at\":\"2018-12-30 20:32:19\",\"updated_at\":\"2018-12-30 20:32:19\",\"call_info\":{\"doctor_id\":\"X3Y10A\",\"client_phonenumber\":\"08133918455\",\"case_id\":\"z0z02\"}}','2018-12-30 19:32:50','2018-12-30 19:32:50');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calls` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_user_unique` (`user`),
  CONSTRAINT `subscriptions_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (4,'ewebstech@gmail.com','08133918455','Diamond','Active','46','{\"Kyc\":{\"city\":\"Lagos\",\"role\":\"client\",\"view\":\"1\",\"email\":\"ewebstech@gmail.com\",\"_token\":\"r0ly5FSoWbuKz8TjjfcAB91pyGU1YSKmVwxbPBFd\",\"country\":\"Nigeria\",\"lastname\":\"Paulo\",\"firstname\":\"Emmanuel\",\"phonenumber\":\"08133918455\",\"postal_code\":\"90202\",\"contact_address\":\"12, Agodi Lane, Abaka, Lagos\",\"hmo_information\":null,\"treatment_status\":null,\"emergency_contact_num_1\":null,\"emergency_contact_num_2\":null,\"emergency_contact_name_1\":null,\"emergency_contact_name_2\":null,\"medical_condition_details\":\"My Medical Info\"},\"Role\":\"client\",\"role\":\"client\",\"user\":\"ewebstech@gmail.com\",\"view\":null,\"calls\":46,\"email\":\"ewebstech@gmail.com\",\"_token\":\"PEK7rprH8JAKswCv4ilVKdyKkn7FkXj3lpbTkIVS\",\"amount\":\"65000\",\"avatar\":\"http:\\/\\/res.cloudinary.com\\/ewebstech\\/image\\/upload\\/v1545001015\\/mobileaid\\/profile\\/08133918455\\/2018121610565231280\\/santa.png.png\",\"gender\":\"Male\",\"status\":\"Active\",\"package\":\"Diamond\",\"ClientId\":\"BZWVW\",\"lastname\":\"Paulo\",\"client_id\":\"BZWVW\",\"firstname\":\"Emmanuel\",\"refnumber\":\"09053872296\",\"phonenumber\":\"08133918455\",\"form_botcheck\":null}','2018-12-17 12:32:38','2018-12-30 19:32:50'),(5,'ewebsorg@gmail.com','09053782296','Gold','InActive','0','{\"role\":\"client\",\"email\":\"ewebsorg@gmail.com\",\"_token\":\"00KI8zJ0UmtMFnHMsGlUbentH1X4EZR9mmiBxYbm\",\"gender\":\"Male\",\"lastname\":\"Losman\",\"firstname\":\"Matthew\",\"refnumber\":\"08133918455\",\"phonenumber\":\"09053782296\",\"form_botcheck\":null,\"ClientId\":\"2C3XWC\",\"avatar\":\"\\/images\\/male_avatar.png\",\"package\":\"Gold\",\"amount\":\"5000\",\"client_id\":\"2C3XWC\",\"view\":\"1\",\"calls\":\"0\",\"status\":\"InActive\",\"user\":\"ewebsorg@gmail.com\"}','2018-12-19 12:24:45','2018-12-19 12:24:45');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_transref_unique` (`transref`),
  KEY `transactions_email_foreign` (`email`),
  CONSTRAINT `transactions_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (51,'BZWVW','ewebstech@gmail.com','success','Silver','1522','NGN','A7Xb6G7lb9QjNogX9NTk9N2Q6','{\"id\":83131346,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"A7Xb6G7lb9QjNogX9NTk9N2Q6\",\"amount\":152200,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2018-12-17T10:49:48.000Z\",\"created_at\":\"2018-12-17T10:49:34.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"41.219.185.164\",\"metadata\":{\"custom_fields\":[{\"package\":\"Silver\",\"client_id\":\"BZWVW\"}]},\"log\":{\"start_time\":1545043776,\"time_spent\":13,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"open\",\"message\":\"Opened checkout\",\"time\":0},{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":2},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":13},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":13}]},\"fees\":2283,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_5wf4vspz5i\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2020\",\"channel\":\"card\",\"card_type\":\"visa DEBIT\",\"bank\":\"Test Bank\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_pp321NYPBMAAFlnY1FJ6\"},\"customer\":{\"id\":5431128,\"first_name\":null,\"last_name\":null,\"email\":\"ewebstech@gmail.com\",\"customer_code\":\"CUS_du6yyl6wf8r85ai\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\"},\"plan\":null,\"paidAt\":\"2018-12-17T10:49:48.000Z\",\"createdAt\":\"2018-12-17T10:49:34.000Z\",\"transaction_date\":\"2018-12-17T10:49:34.000Z\",\"plan_object\":{},\"subaccount\":{},\"custom_fields\":{\"package\":\"Silver\",\"client_id\":\"BZWVW\"},\"package\":\"Silver\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\"}','2018-12-17 09:49:51','2018-12-17 09:49:51'),(52,'240YZ','ewebstech@gmail.com','success','Silver','1522','NGN','iq0UtoJcEsYtsaYdsU59Bm5Pf','{\"id\":83146846,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"iq0UtoJcEsYtsaYdsU59Bm5Pf\",\"amount\":152200,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2018-12-17T11:25:59.000Z\",\"created_at\":\"2018-12-17T11:25:53.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"41.219.185.164\",\"metadata\":{\"custom_fields\":[{\"package\":\"Silver\",\"client_id\":\"240YZ\"}]},\"log\":{\"start_time\":1545045955,\"time_spent\":4,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"open\",\"message\":\"Opened checkout\",\"time\":0},{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":0},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":4},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":4}]},\"fees\":2283,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_1ehwbdu6br\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2020\",\"channel\":\"card\",\"card_type\":\"visa DEBIT\",\"bank\":\"Test Bank\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_pp321NYPBMAAFlnY1FJ6\"},\"customer\":{\"id\":5431128,\"first_name\":null,\"last_name\":null,\"email\":\"ewebstech@gmail.com\",\"customer_code\":\"CUS_du6yyl6wf8r85ai\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\"},\"plan\":null,\"paidAt\":\"2018-12-17T11:25:59.000Z\",\"createdAt\":\"2018-12-17T11:25:53.000Z\",\"transaction_date\":\"2018-12-17T11:25:53.000Z\",\"plan_object\":{},\"subaccount\":{},\"custom_fields\":{\"package\":\"Silver\",\"client_id\":\"240YZ\"},\"package\":\"Silver\",\"client_id\":\"240YZ\",\"email\":\"ewebstech@gmail.com\"}','2018-12-17 10:26:02','2018-12-17 10:26:02'),(53,'240YZ','ewebstech@gmail.com','success','Silver','1522','NGN','22OYy9hCnZOSV3Mq1ETr7BsPJ','{\"id\":83148601,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"22OYy9hCnZOSV3Mq1ETr7BsPJ\",\"amount\":152200,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2018-12-17T11:29:52.000Z\",\"created_at\":\"2018-12-17T11:29:47.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"41.219.185.164\",\"metadata\":{\"custom_fields\":[{\"package\":\"Silver\",\"client_id\":\"240YZ\"}]},\"log\":{\"start_time\":1545046188,\"time_spent\":5,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"open\",\"message\":\"Opened checkout\",\"time\":0},{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":0},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":5},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":5}]},\"fees\":2283,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_5fee5u15tv\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2020\",\"channel\":\"card\",\"card_type\":\"visa DEBIT\",\"bank\":\"Test Bank\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_pp321NYPBMAAFlnY1FJ6\"},\"customer\":{\"id\":5431128,\"first_name\":null,\"last_name\":null,\"email\":\"ewebstech@gmail.com\",\"customer_code\":\"CUS_du6yyl6wf8r85ai\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\"},\"plan\":null,\"paidAt\":\"2018-12-17T11:29:52.000Z\",\"createdAt\":\"2018-12-17T11:29:47.000Z\",\"transaction_date\":\"2018-12-17T11:29:47.000Z\",\"plan_object\":{},\"subaccount\":{},\"custom_fields\":{\"package\":\"Silver\",\"client_id\":\"240YZ\"},\"package\":\"Silver\",\"client_id\":\"240YZ\",\"email\":\"ewebstech@gmail.com\"}','2018-12-17 10:29:55','2018-12-17 10:29:55'),(60,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75Gb0','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75Gb0\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 11:34:46','2018-12-27 11:34:46'),(61,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75Gb076','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75Gb076\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 11:37:35','2018-12-27 11:37:35'),(75,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75Gb07','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75Gb07\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 12:00:33','2018-12-27 12:00:33'),(78,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75Gb007','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75Gb007\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 12:01:56','2018-12-27 12:01:56'),(80,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75Gb089','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75Gb089\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 22:50:51','2018-12-27 22:50:51'),(81,'BZWVW','ewebstech@gmail.com','success','Silver','1500','NGN','TRX907HY75G675','{\"phonenumber\":\"08133918455\",\"status\":\"success\",\"package\":\"Silver\",\"amount\":150000,\"reference\":\"TRX907HY75G675\",\"client_id\":\"BZWVW\",\"email\":\"ewebstech@gmail.com\",\"currency\":\"NGN\",\"channel\":\"USSD\"}','2018-12-27 22:51:20','2018-12-27 22:51:20');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phonenumber_unique` (`phonenumber`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'June','Goldner','+1-770-610-8208','admin@admin.com',NULL,'/images/male_avatar.png','null','admin','750906214','$2y$10$9KSl78XYHDxRUt1TAN.8b./15HVJJ5a/2yYnpP9tBWCbUurtwuDcK','lW3867jHzs','2018-12-08 17:34:28','2018-12-08 17:34:28'),(2,'Gust','Daugherty','(437) 445-6912 x31525','jimmie.bahringer@example.net',NULL,'https://lorempixel.com/640/480/?32754','null','member','1346643844','$2y$10$9KSl78XYHDxRUt1TAN.8b./15HVJJ5a/2yYnpP9tBWCbUurtwuDcK','wClSAOPfPM','2018-12-08 17:34:28','2018-12-08 17:34:28'),(3,'Asa','Gaylord','(402) 203-1134 x1503','dimitri39@example.net',NULL,'https://lorempixel.com/640/480/?60503','null','member','746194310','$2y$10$9KSl78XYHDxRUt1TAN.8b./15HVJJ5a/2yYnpP9tBWCbUurtwuDcK','fybWNJifep','2018-12-08 17:34:28','2018-12-08 17:34:28'),(4,'Ofelia','Mills','728.647.8759 x14587','grayce23@example.com',NULL,'https://lorempixel.com/640/480/?24254','null','member','1910391292','$2y$10$9KSl78XYHDxRUt1TAN.8b./15HVJJ5a/2yYnpP9tBWCbUurtwuDcK','iXH1nrfXcV','2018-12-08 17:34:28','2018-12-08 17:34:28'),(5,'Mikayla','Von','1-680-885-1983 x9828','cayla.rodriguez@example.org',NULL,'https://lorempixel.com/640/480/?27513','null','member','1837538765','$2y$10$9KSl78XYHDxRUt1TAN.8b./15HVJJ5a/2yYnpP9tBWCbUurtwuDcK','TNqtvEuFeo','2018-12-08 17:34:28','2018-12-08 17:34:28'),(13,'Emmanuel','PaulGuy','08133918455','ewebstech@gmail.com',NULL,'http://res.cloudinary.com/ewebstech/image/upload/v1545001015/mobileaid/profile/08133918455/2018121610565231280/santa.png.png','{\"Kyc\": {\"city\": \"Ikeja\", \"role\": \"client\", \"view\": \"1\", \"email\": \"ewebstech@gmail.com\", \"_token\": \"TvQ8h9gOHZbAyIdLv6vePWM3MbYlDhDaP8qgsnhj\", \"country\": \"United Kingdom\", \"lastname\": \"PaulGuy\", \"firstname\": \"Emmanuel\", \"phonenumber\": \"08133918455\", \"postal_code\": \"00000\", \"contact_address\": \"12, Agodi Lane, Abaka, Lagos State\", \"hmo_information\": \"12, Akota Villa, Ikoyi\", \"treatment_status\": \"I am not sick pls\", \"emergency_contact_num_1\": \"09082882829\", \"emergency_contact_num_2\": \"09056443326\", \"emergency_contact_name_1\": \"John Ogbu\", \"emergency_contact_name_2\": \"Kola\", \"medical_condition_details\": \"My Medical Info 2\"}, \"Role\": \"client\", \"city\": \"Ikeja\", \"role\": \"client\", \"user\": \"ewebstech@gmail.com\", \"view\": \"1\", \"calls\": 46, \"email\": \"ewebstech@gmail.com\", \"_token\": \"TvQ8h9gOHZbAyIdLv6vePWM3MbYlDhDaP8qgsnhj\", \"amount\": \"65000\", \"avatar\": \"http://res.cloudinary.com/ewebstech/image/upload/v1545001015/mobileaid/profile/08133918455/2018121610565231280/santa.png.png\", \"gender\": \"Male\", \"status\": \"Active\", \"country\": \"United Kingdom\", \"package\": \"Diamond\", \"ClientId\": \"BZWVW\", \"lastname\": \"PaulGuy\", \"client_id\": \"BZWVW\", \"firstname\": \"Emmanuel\", \"refnumber\": \"09053872296\", \"phonenumber\": \"08133918455\", \"postal_code\": \"00000\", \"form_botcheck\": null, \"contact_address\": \"12, Agodi Lane, Abaka, Lagos State\", \"hmo_information\": \"12, Akota Villa, Ikoyi\", \"treatment_status\": \"I am not sick pls\", \"emergency_contact_num_1\": \"09082882829\", \"emergency_contact_num_2\": \"09056443326\", \"emergency_contact_name_1\": \"John Ogbu\", \"emergency_contact_name_2\": \"Kola\", \"medical_condition_details\": \"My Medical Info 2\"}','client','BZWVW','$2y$10$.J36JOTQtYNF1t95QfUlQ.EWrEF0d2tWrff/D0RPsi.v3JZt0Dd2.','EVoWL7r','2018-12-16 12:08:10','2018-12-30 19:32:50'),(16,'Grady','Mark','09067222827','1x04v@tempemail.com',NULL,'/images/male_avatar.png','{\"role\": \"client\", \"email\": \"1x04v@tempemail.com\", \"avatar\": \"/images/male_avatar.png\", \"gender\": \"Male\", \"lastname\": \"Mark\", \"client_id\": \"1X04V\", \"firstname\": \"Grady\", \"phonenumber\": \"09067222827\"}','client','1X04V','20xvyB',NULL,'2018-12-17 10:56:44','2018-12-17 10:56:44'),(17,'Matthew','Losman','09053782296','ewebsorg@gmail.com',NULL,'/images/male_avatar.png','{\"role\": \"client\", \"user\": \"ewebsorg@gmail.com\", \"view\": \"1\", \"calls\": \"0\", \"email\": \"ewebsorg@gmail.com\", \"_token\": \"00KI8zJ0UmtMFnHMsGlUbentH1X4EZR9mmiBxYbm\", \"amount\": \"5000\", \"avatar\": \"/images/male_avatar.png\", \"gender\": \"Male\", \"status\": \"InActive\", \"package\": \"Gold\", \"ClientId\": \"2C3XWC\", \"lastname\": \"Losman\", \"client_id\": \"2C3XWC\", \"firstname\": \"Matthew\", \"refnumber\": \"08133918455\", \"phonenumber\": \"09053782296\", \"form_botcheck\": null}','client','2C3XWC','$2y$10$wMQn2r5olOdJvU4WbqbVGOLoslGCNbWPFURZ2ZCnClQ.eEfhqsZx.','IWvX3qon','2018-12-19 12:23:00','2018-12-19 12:24:46'),(20,'Shola','Femifasan','08111111111','doc01@mobilemedicalaid.com',NULL,'http://res.cloudinary.com/ewebstech/image/upload/v1545955351/mobileaid/profile/08111111111/2018122812022756547/prof.jpg','{\"Kyc\": {\"city\": \"Lagos\", \"role\": \"doctor\", \"view\": \"1\", \"email\": \"doc01@mobilemedicalaid.com\", \"xdata\": [\"<p><strong>I love my profession okay, kiaisaskdksaidaskfksakfasf</strong></p><p>&nbsp;</p><p>I feely<u>&nbsp;think I should enjoy myself</u>&nbsp;</p><p>&nbsp;</p><p>Never say never</p>\"], \"_token\": \"IG6UqWjyrJV20JuJjsujU45oMmEsvwjfuRNxkecq\", \"country\": \"Nigeria\", \"lastname\": \"Femifasan\", \"firstname\": \"Shola\", \"medprofile\": \"<p><strong>I love my profession okay, kiaisaskdksaidaskfksakfasf</strong></p><p>&nbsp;</p><p>I feely<u>&nbsp;think I should enjoy myself</u>&nbsp;</p><p>&nbsp;</p><p>Never say never</p>\", \"phonenumber\": \"08111111111\", \"postal_code\": \"90003\", \"contact_address\": \"12, Agodi Lane, Abaka, Lagos\"}, \"role\": \"doctor\", \"user\": \"doc01@mobilemedicalaid.com\", \"view\": \"1\", \"email\": \"doc01@mobilemedicalaid.com\", \"_token\": \"00KI8zJ0UmtMFnHMsGlUbentH1X4EZR9mmiBxYbm\", \"avatar\": \"http://res.cloudinary.com/ewebstech/image/upload/v1545955351/mobileaid/profile/08111111111/2018122812022756547/prof.jpg\", \"gender\": \"Male\", \"status\": \"offline\", \"lastname\": \"Femifasan\", \"client_id\": \"X3Y10A\", \"firstname\": \"Shola\", \"phonenumber\": \"08111111111\", \"form_botcheck\": null}','doctor','X3Y10A','$2y$10$.J36JOTQtYNF1t95QfUlQ.EWrEF0d2tWrff/D0RPsi.v3JZt0Dd2.','u3TGat','2018-12-19 16:24:30','2018-12-27 23:02:32'),(21,'Emman','Paul','09053980001','ewebstecho@gmail.com',NULL,'/images/male_avatar.png','{\"role\": \"client\", \"view\": \"1\", \"email\": \"ewebstecho@gmail.com\", \"_token\": \"TvQ8h9gOHZbAyIdLv6vePWM3MbYlDhDaP8qgsnhj\", \"gender\": \"Male\", \"lastname\": \"Paul\", \"firstname\": \"Emmanuel\", \"refnumber\": null, \"phonenumber\": \"09053980001\", \"form_botcheck\": null}','client','1124A4','$2y$10$tRhMAJnI2us7EbEjq5IOTuZTU5VN.dZTSv1FNmiSCrz3a5WJACe3W',NULL,'2018-12-30 15:30:30','2018-12-30 15:30:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mobileaid'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-02  4:29:55
