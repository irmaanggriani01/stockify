-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: db_stockify
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_user_id_foreign` (`user_id`),
  CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,1,'logout','User logged out','2024-11-13 03:09:29','2024-11-13 03:09:29'),(2,3,'login','User logged in','2024-11-13 03:10:29','2024-11-13 03:10:29'),(3,3,'logout','User logged out','2024-11-13 03:18:07','2024-11-13 03:18:07'),(4,1,'login','User logged in','2024-11-13 03:18:17','2024-11-13 03:18:17'),(5,1,'login','User logged in','2024-11-13 05:07:58','2024-11-13 05:07:58'),(6,1,'logout','User logged out','2024-11-13 05:09:23','2024-11-13 05:09:23'),(7,2,'login','User logged in','2024-11-13 05:09:34','2024-11-13 05:09:34'),(8,2,'logout','User logged out','2024-11-13 05:09:38','2024-11-13 05:09:38'),(9,1,'login','User logged in','2024-11-13 05:09:48','2024-11-13 05:09:48'),(10,1,'logout','User logged out','2024-11-13 05:11:36','2024-11-13 05:11:36'),(11,3,'login','User logged in','2024-11-13 05:11:46','2024-11-13 05:11:46'),(12,3,'logout','User logged out','2024-11-13 05:12:11','2024-11-13 05:12:11'),(13,1,'login','User logged in','2024-11-13 05:12:21','2024-11-13 05:12:21'),(14,1,'logout','User logged out','2024-11-13 05:22:32','2024-11-13 05:22:32'),(15,3,'login','User logged in','2024-11-13 05:22:41','2024-11-13 05:22:41'),(16,3,'logout','User logged out','2024-11-13 05:33:33','2024-11-13 05:33:33'),(17,1,'login','User logged in','2024-11-13 05:33:42','2024-11-13 05:33:42'),(18,1,'logout','User logged out','2024-11-13 06:23:41','2024-11-13 06:23:41'),(19,3,'login','User logged in','2024-11-13 06:23:53','2024-11-13 06:23:53'),(20,3,'logout','User logged out','2024-11-13 06:37:03','2024-11-13 06:37:03'),(21,1,'login','User logged in','2024-11-13 06:37:12','2024-11-13 06:37:12'),(22,1,'login','User logged in','2024-11-15 02:21:02','2024-11-15 02:21:02'),(23,1,'logout','User logged out','2024-11-15 02:30:31','2024-11-15 02:30:31'),(24,3,'login','User logged in','2024-11-15 02:30:39','2024-11-15 02:30:39'),(25,3,'logout','User logged out','2024-11-15 03:18:56','2024-11-15 03:18:56'),(26,1,'login','User logged in','2024-11-15 03:19:08','2024-11-15 03:19:08'),(27,1,'login','User logged in','2024-11-15 05:20:43','2024-11-15 05:20:43'),(28,1,'logout','User logged out','2024-11-15 05:29:18','2024-11-15 05:29:18'),(29,3,'login','User logged in','2024-11-15 05:29:27','2024-11-15 05:29:27'),(30,3,'logout','User logged out','2024-11-15 05:30:10','2024-11-15 05:30:10'),(31,1,'login','User logged in','2024-11-15 05:30:18','2024-11-15 05:30:18'),(32,1,'logout','User logged out','2024-11-15 05:31:54','2024-11-15 05:31:54'),(33,3,'login','User logged in','2024-11-15 05:32:04','2024-11-15 05:32:04'),(34,3,'logout','User logged out','2024-11-15 05:33:28','2024-11-15 05:33:28'),(35,1,'login','User logged in','2024-11-15 05:33:36','2024-11-15 05:33:36'),(36,1,'logout','User logged out','2024-11-15 05:33:53','2024-11-15 05:33:53'),(37,3,'login','User logged in','2024-11-15 05:34:54','2024-11-15 05:34:54'),(38,3,'logout','User logged out','2024-11-15 05:36:47','2024-11-15 05:36:47'),(39,1,'login','User logged in','2024-11-15 05:36:57','2024-11-15 05:36:57'),(40,1,'logout','User logged out','2024-11-15 05:38:00','2024-11-15 05:38:00'),(41,3,'login','User logged in','2024-11-15 05:38:10','2024-11-15 05:38:10'),(42,3,'logout','User logged out','2024-11-15 05:42:01','2024-11-15 05:42:01'),(43,1,'login','User logged in','2024-11-15 05:42:10','2024-11-15 05:42:10'),(44,1,'login','User logged in','2024-11-18 01:05:41','2024-11-18 01:05:41'),(45,1,'logout','User logged out','2024-11-18 01:33:00','2024-11-18 01:33:00'),(46,3,'login','User logged in','2024-11-18 01:33:17','2024-11-18 01:33:17'),(47,3,'logout','User logged out','2024-11-18 01:33:46','2024-11-18 01:33:46'),(48,1,'login','User logged in','2024-11-18 01:33:55','2024-11-18 01:33:55'),(49,1,'logout','User logged out','2024-11-18 01:57:44','2024-11-18 01:57:44'),(50,3,'login','User logged in','2024-11-18 01:57:56','2024-11-18 01:57:56'),(51,3,'logout','User logged out','2024-11-18 01:58:15','2024-11-18 01:58:15'),(52,1,'login','User logged in','2024-11-18 01:58:23','2024-11-18 01:58:23'),(53,1,'logout','User logged out','2024-11-18 02:00:56','2024-11-18 02:00:56'),(54,3,'login','User logged in','2024-11-18 02:01:05','2024-11-18 02:01:05'),(55,3,'logout','User logged out','2024-11-18 02:01:58','2024-11-18 02:01:58'),(56,1,'login','User logged in','2024-11-18 02:02:07','2024-11-18 02:02:07'),(57,1,'logout','User logged out','2024-11-18 02:03:35','2024-11-18 02:03:35'),(58,3,'login','User logged in','2024-11-18 02:03:44','2024-11-18 02:03:44'),(59,3,'logout','User logged out','2024-11-18 02:14:03','2024-11-18 02:14:03'),(60,3,'login','User logged in','2024-11-18 02:14:16','2024-11-18 02:14:16'),(61,3,'logout','User logged out','2024-11-18 02:53:31','2024-11-18 02:53:31'),(62,1,'login','User logged in','2024-11-18 02:53:42','2024-11-18 02:53:42'),(63,1,'logout','User logged out','2024-11-18 03:39:55','2024-11-18 03:39:55'),(64,2,'login','User logged in','2024-11-18 03:40:06','2024-11-18 03:40:06'),(65,1,'login','User logged in','2024-11-18 06:05:12','2024-11-18 06:05:12'),(66,1,'logout','User logged out','2024-11-18 06:05:58','2024-11-18 06:05:58'),(67,3,'login','User logged in','2024-11-18 06:06:07','2024-11-18 06:06:07'),(68,3,'login','User logged in','2024-11-18 06:10:51','2024-11-18 06:10:51'),(69,3,'logout','User logged out','2024-11-18 06:50:23','2024-11-18 06:50:23'),(70,1,'login','User logged in','2024-11-18 06:50:35','2024-11-18 06:50:35'),(71,1,'login','User logged in','2024-11-20 00:17:20','2024-11-20 00:17:20'),(72,1,'login','User logged in','2024-11-20 00:30:47','2024-11-20 00:30:47'),(73,2,'login','User logged in','2024-11-20 01:13:41','2024-11-20 01:13:41'),(74,2,'logout','User logged out','2024-11-20 01:39:06','2024-11-20 01:39:06'),(75,3,'login','User logged in','2024-11-20 01:39:15','2024-11-20 01:39:15'),(76,3,'logout','User logged out','2024-11-20 01:40:02','2024-11-20 01:40:02'),(77,2,'login','User logged in','2024-11-20 01:40:14','2024-11-20 01:40:14'),(78,2,'logout','User logged out','2024-11-20 02:34:11','2024-11-20 02:34:11'),(79,3,'login','User logged in','2024-11-20 02:36:44','2024-11-20 02:36:44'),(80,3,'logout','User logged out','2024-11-20 02:44:40','2024-11-20 02:44:40'),(81,2,'login','User logged in','2024-11-20 02:44:47','2024-11-20 02:44:47'),(82,2,'logout','User logged out','2024-11-20 03:06:40','2024-11-20 03:06:40'),(83,1,'login','User logged in','2024-11-20 03:06:52','2024-11-20 03:06:52'),(84,1,'logout','User logged out','2024-11-20 03:31:45','2024-11-20 03:31:45'),(85,3,'login','User logged in','2024-11-20 03:32:07','2024-11-20 03:32:07'),(86,3,'logout','User logged out','2024-11-20 03:33:30','2024-11-20 03:33:30'),(87,1,'login','User logged in','2024-11-20 03:33:42','2024-11-20 03:33:42'),(88,1,'logout','User logged out','2024-11-20 03:34:03','2024-11-20 03:34:03'),(89,1,'login','User logged in','2024-11-20 03:51:21','2024-11-20 03:51:21'),(90,2,'login','User logged in','2024-11-20 05:11:32','2024-11-20 05:11:32'),(91,2,'login','User logged in','2024-11-20 05:27:38','2024-11-20 05:27:38'),(92,1,'login','User logged in','2024-11-20 06:54:10','2024-11-20 06:54:10'),(93,2,'login','User logged in','2024-11-21 02:14:04','2024-11-21 02:14:04'),(94,2,'logout','User logged out','2024-11-21 02:18:07','2024-11-21 02:18:07'),(95,2,'login','User logged in','2024-11-21 02:45:03','2024-11-21 02:45:03'),(96,2,'logout','User logged out','2024-11-21 03:47:56','2024-11-21 03:47:56'),(97,1,'login','User logged in','2024-11-21 03:48:08','2024-11-21 03:48:08'),(98,1,'logout','User logged out','2024-11-21 03:48:39','2024-11-21 03:48:39'),(99,3,'login','User logged in','2024-11-21 03:48:48','2024-11-21 03:48:48'),(100,3,'logout','User logged out','2024-11-21 03:50:35','2024-11-21 03:50:35'),(101,3,'login','User logged in','2024-11-21 03:50:50','2024-11-21 03:50:50'),(102,3,'logout','User logged out','2024-11-21 05:41:18','2024-11-21 05:41:18'),(103,3,'login','User logged in','2024-11-21 05:41:30','2024-11-21 05:41:30'),(104,3,'login','User logged in','2024-11-21 05:45:12','2024-11-21 05:45:12'),(105,3,'logout','User logged out','2024-11-21 05:57:00','2024-11-21 05:57:00'),(106,1,'login','User logged in','2024-11-21 05:57:12','2024-11-21 05:57:12'),(107,1,'logout','User logged out','2024-11-21 05:57:30','2024-11-21 05:57:30'),(108,2,'login','User logged in','2024-11-21 06:04:24','2024-11-21 06:04:24'),(109,1,'login','User logged in','2024-11-22 00:50:04','2024-11-22 00:50:04'),(110,1,'logout','User logged out','2024-11-22 00:50:47','2024-11-22 00:50:47'),(111,3,'login','User logged in','2024-11-22 00:50:57','2024-11-22 00:50:57'),(112,3,'logout','User logged out','2024-11-22 01:24:31','2024-11-22 01:24:31'),(113,1,'login','User logged in','2024-11-22 01:24:39','2024-11-22 01:24:39'),(114,1,'logout','User logged out','2024-11-22 01:34:30','2024-11-22 01:34:30'),(115,3,'login','User logged in','2024-11-22 01:34:38','2024-11-22 01:34:38'),(116,3,'logout','User logged out','2024-11-22 02:05:13','2024-11-22 02:05:13'),(117,1,'login','User logged in','2024-11-22 02:05:24','2024-11-22 02:05:24'),(118,1,'login','User logged in','2024-11-22 02:07:58','2024-11-22 02:07:58'),(119,1,'logout','User logged out','2024-11-22 02:12:50','2024-11-22 02:12:50'),(120,2,'login','User logged in','2024-11-22 02:13:00','2024-11-22 02:13:00'),(121,2,'logout','User logged out','2024-11-22 02:13:08','2024-11-22 02:13:08'),(122,3,'login','User logged in','2024-11-22 02:13:16','2024-11-22 02:13:16'),(123,3,'logout','User logged out','2024-11-22 02:13:32','2024-11-22 02:13:32'),(124,1,'login','User logged in','2024-11-22 02:13:40','2024-11-22 02:13:40'),(125,1,'logout','User logged out','2024-11-22 02:28:46','2024-11-22 02:28:46'),(126,3,'login','User logged in','2024-11-22 02:28:56','2024-11-22 02:28:56'),(127,3,'logout','User logged out','2024-11-22 02:29:13','2024-11-22 02:29:13'),(128,1,'login','User logged in','2024-11-22 02:29:21','2024-11-22 02:29:21'),(129,1,'logout','User logged out','2024-11-22 02:29:34','2024-11-22 02:29:34'),(130,3,'login','User logged in','2024-11-22 02:29:42','2024-11-22 02:29:42'),(131,3,'logout','User logged out','2024-11-22 02:30:04','2024-11-22 02:30:04'),(132,1,'login','User logged in','2024-11-22 02:30:12','2024-11-22 02:30:12'),(133,1,'logout','User logged out','2024-11-22 02:41:34','2024-11-22 02:41:34'),(134,3,'login','User logged in','2024-11-22 02:41:44','2024-11-22 02:41:44'),(135,3,'logout','User logged out','2024-11-22 02:44:31','2024-11-22 02:44:31'),(136,1,'login','User logged in','2024-11-22 02:44:40','2024-11-22 02:44:40'),(137,1,'login','User logged in','2024-11-22 03:31:31','2024-11-22 03:31:31'),(138,1,'login','User logged in','2024-11-22 05:02:16','2024-11-22 05:02:16'),(139,1,'login','User logged in','2024-11-22 05:02:20','2024-11-22 05:02:20'),(140,1,'logout','User logged out','2024-11-22 05:03:04','2024-11-22 05:03:04'),(141,3,'login','User logged in','2024-11-22 05:03:14','2024-11-22 05:03:14'),(142,1,'login','User logged in','2024-11-22 05:19:34','2024-11-22 05:19:34'),(143,1,'logout','User logged out','2024-11-22 05:19:48','2024-11-22 05:19:48'),(144,3,'login','User logged in','2024-11-22 05:19:59','2024-11-22 05:19:59'),(145,3,'logout','User logged out','2024-11-22 05:25:16','2024-11-22 05:25:16'),(146,3,'login','User logged in','2024-11-22 05:25:26','2024-11-22 05:25:26'),(147,3,'logout','User logged out','2024-11-22 05:37:21','2024-11-22 05:37:21'),(148,1,'login','User logged in','2024-11-22 05:37:33','2024-11-22 05:37:33'),(149,1,'logout','User logged out','2024-11-22 06:35:38','2024-11-22 06:35:38'),(150,3,'login','User logged in','2024-11-22 06:35:47','2024-11-22 06:35:47'),(151,3,'logout','User logged out','2024-11-22 06:38:39','2024-11-22 06:38:39'),(152,1,'login','User logged in','2024-11-22 06:38:51','2024-11-22 06:38:51'),(153,2,'login','User logged in','2024-11-22 06:50:07','2024-11-22 06:50:07'),(154,1,'login','User logged in','2024-11-23 00:11:12','2024-11-23 00:11:12'),(155,1,'logout','User logged out','2024-11-23 00:19:05','2024-11-23 00:19:05'),(156,3,'login','User logged in','2024-11-23 00:19:18','2024-11-23 00:19:18'),(157,3,'logout','User logged out','2024-11-23 01:12:20','2024-11-23 01:12:20'),(158,1,'login','User logged in','2024-11-23 01:12:30','2024-11-23 01:12:30'),(159,1,'logout','User logged out','2024-11-23 01:13:00','2024-11-23 01:13:00'),(160,3,'login','User logged in','2024-11-23 01:13:12','2024-11-23 01:13:12'),(161,3,'logout','User logged out','2024-11-23 01:15:34','2024-11-23 01:15:34'),(162,1,'login','User logged in','2024-11-23 01:15:44','2024-11-23 01:15:44'),(163,1,'logout','User logged out','2024-11-23 02:00:14','2024-11-23 02:00:14'),(164,2,'login','User logged in','2024-11-23 02:00:50','2024-11-23 02:00:50'),(165,2,'logout','User logged out','2024-11-23 02:01:37','2024-11-23 02:01:37'),(166,1,'login','User logged in','2024-11-23 02:04:02','2024-11-23 02:04:02'),(167,1,'logout','User logged out','2024-11-23 02:32:12','2024-11-23 02:32:12'),(168,1,'login','User logged in','2024-11-23 02:32:24','2024-11-23 02:32:24'),(169,1,'logout','User logged out','2024-11-23 02:39:47','2024-11-23 02:39:47'),(170,3,'login','User logged in','2024-11-23 02:39:57','2024-11-23 02:39:57'),(171,3,'logout','User logged out','2024-11-23 02:58:51','2024-11-23 02:58:51'),(172,1,'login','User logged in','2024-11-23 02:59:00','2024-11-23 02:59:00'),(173,1,'logout','User logged out','2024-11-23 03:01:32','2024-11-23 03:01:32'),(174,3,'login','User logged in','2024-11-23 03:01:41','2024-11-23 03:01:41'),(175,3,'logout','User logged out','2024-11-23 03:18:39','2024-11-23 03:18:39'),(176,1,'login','User logged in','2024-11-23 03:18:52','2024-11-23 03:18:52'),(177,1,'login','User logged in','2024-11-23 03:37:18','2024-11-23 03:37:18'),(178,1,'logout','User logged out','2024-11-23 03:38:01','2024-11-23 03:38:01'),(179,3,'login','User logged in','2024-11-23 03:38:11','2024-11-23 03:38:11'),(180,3,'login','User logged in','2024-11-23 05:12:35','2024-11-23 05:12:35'),(181,3,'logout','User logged out','2024-11-23 05:49:38','2024-11-23 05:49:38'),(182,2,'login','User logged in','2024-11-23 05:49:52','2024-11-23 05:49:52'),(183,1,'login','User logged in','2024-11-23 05:59:37','2024-11-23 05:59:37'),(184,1,'logout','User logged out','2024-11-23 06:10:22','2024-11-23 06:10:22'),(185,3,'login','User logged in','2024-11-23 06:10:33','2024-11-23 06:10:33'),(186,3,'logout','User logged out','2024-11-23 06:15:28','2024-11-23 06:15:28'),(187,1,'login','User logged in','2024-11-23 06:15:44','2024-11-23 06:15:44'),(188,1,'logout','User logged out','2024-11-23 06:26:57','2024-11-23 06:26:57'),(189,3,'login','User logged in','2024-11-23 06:27:12','2024-11-23 06:27:12'),(190,3,'logout','User logged out','2024-11-23 06:33:32','2024-11-23 06:33:32'),(191,1,'login','User logged in','2024-11-23 06:33:41','2024-11-23 06:33:41'),(192,1,'logout','User logged out','2024-11-23 06:39:55','2024-11-23 06:39:55'),(193,1,'login','User logged in','2024-11-23 06:40:06','2024-11-23 06:40:06'),(194,1,'logout','User logged out','2024-11-23 06:46:30','2024-11-23 06:46:30'),(195,3,'login','User logged in','2024-11-23 06:46:40','2024-11-23 06:46:40'),(196,3,'logout','User logged out','2024-11-23 06:46:55','2024-11-23 06:46:55'),(197,1,'login','User logged in','2024-11-23 06:47:05','2024-11-23 06:47:05'),(198,1,'login','User logged in','2024-11-25 00:26:45','2024-11-25 00:26:45'),(199,1,'logout','User logged out','2024-11-25 00:27:19','2024-11-25 00:27:19'),(200,3,'login','User logged in','2024-11-25 00:27:30','2024-11-25 00:27:30');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fashion Pria',NULL,'2024-11-01 03:20:32','2024-11-01 03:20:32'),(2,'Aksesoris Pria',NULL,'2024-11-01 03:20:56','2024-11-01 03:20:56');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_10_30_081445_create_user_table',1),(6,'2024_10_30_081445_create_users_table',2),(7,'2024_10_31_040759_create_categories_table',3),(8,'2024_10_31_040845_create_suppliers_table',3),(9,'2024_10_31_040925_create_products_table',3),(10,'2024_10_31_040955_create_product_attributes_table',3),(12,'2024_11_04_100003_create_settings_table',4),(13,'2024_10_31_041031_create_stock_transactions_table',5),(14,'2024_11_13_091123_create_activities_table',6),(17,'2024_11_13_100102_add_stock_recorded_to_products_table',7),(18,'2024_11_13_130615_add_stok_minimum_to_products_table',8),(22,'2024_11_22_095649_add_size_and_color_to_product_attributes',9),(23,'2024_11_22_103337_remove_name_from_product_attributes',10),(24,'2024_11_20_075952_add_is_checked_to_stock_transactions',11),(25,'2024_11_23_084122_create_activity_logs_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attributes_product_id_foreign` (`product_id`),
  CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attributes`
--

LOCK TABLES `product_attributes` WRITE;
/*!40000 ALTER TABLE `product_attributes` DISABLE KEYS */;
INSERT INTO `product_attributes` VALUES (1,2,'Katun','2024-11-22 03:46:34','2024-11-22 05:44:46','S, L, M, X, XL','Hitam'),(2,3,'Denim','2024-11-22 05:44:27','2024-11-22 05:44:27','S, L, M, X, XL','Biru Tua'),(3,4,'Polyster','2024-11-22 05:45:07','2024-11-22 05:45:07','S, L, M, X, XL','Merah Maroon'),(4,5,'Katun Pique','2024-11-22 05:45:17','2024-11-22 05:45:17','S, L, M, X, XL','Merah Maroon'),(5,6,'Katun Combade','2024-11-22 05:45:32','2024-11-22 05:45:38','S, L, M, X, XL','Putih');
/*!40000 ALTER TABLE `product_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `purchase_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_recorded` int NOT NULL DEFAULT '0',
  `stok_minimum` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,2,1,'Kaos Polos','SKU001','Kaos polos berkualitas tinggi',50000.00,75000.00,'products/1xkoO6g1ZdmBOKmQJiki0EobXK79U2peFozhEWRj.jpg','2024-11-01 03:39:10','2024-11-23 06:46:52',80,10),(3,1,2,'Jaket Denim','SKU002','Jaket denim modis dan nyaman',120000.00,180000.00,'products/ahQSlsWtJnBwf5TIZZmNEUALdBcqfNFMHmOmvYUr.jpg','2024-11-01 05:12:27','2024-11-23 06:33:24',50,10),(4,1,1,'Kemeja Flanel Kotak','SKU003','Kemeja flanel motif kotak nyaman dipakai',80000.00,150000.00,'products/NQnsRZjaEqhvdjx0NqSjxjNfXPGicde3k6cJvIs7.jpg','2024-11-01 05:13:52','2024-11-23 01:15:31',160,10),(5,1,1,'Kemeja Formal','SKU004','Kemeja formal dengan bahan nyaman',80000.00,120000.00,'products/9gv77AHfsCY7WcmYJosGRrOYTNAMsPoQ5apcPZDc.jpg','2024-11-01 05:14:39','2024-11-22 05:27:44',60,10),(6,1,2,'Polo Shirt Lengan Pendek','SKU005','Polo shirt berbahan adem dengan kerah',75000.00,150000.00,'products/KTpO0cuqIaQqwP2hclog1JreoNK7ehnO7eHGvauK.jpg','2024-11-01 05:15:37','2024-11-22 05:13:03',50,10);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Stockify','logos/n8oWYG5xo7cxf1tfWZM6Xj0hScLv2JW8EtrePaar.png','2024-11-04 19:45:55','2024-11-11 03:12:57');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_transactions`
--

DROP TABLE IF EXISTS `stock_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `type` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_checked` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  `status` enum('pending','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_transactions_product_id_foreign` (`product_id`),
  KEY `stock_transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `stock_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_transactions`
--

LOCK TABLES `stock_transactions` WRITE;
/*!40000 ALTER TABLE `stock_transactions` DISABLE KEYS */;
INSERT INTO `stock_transactions` VALUES (1,2,3,'masuk',0,50,'2024-11-08','completed','-','2024-11-08 00:55:38','2024-11-20 05:44:01'),(2,4,3,'masuk',0,50,'2024-11-08','completed','-','2024-11-08 01:34:15','2024-11-20 05:44:26'),(3,2,3,'keluar',0,4,'2024-11-08','completed',NULL,'2024-11-08 01:34:32','2024-11-20 05:44:21'),(4,6,3,'masuk',0,50,'2024-11-08','completed','p','2024-11-08 10:19:49','2024-11-20 05:44:29'),(5,4,3,'masuk',0,60,'2024-11-11','completed','-','2024-11-11 03:43:40','2024-11-20 05:44:32'),(9,3,3,'masuk',0,50,'2024-11-11','completed','-','2024-11-11 05:15:18','2024-11-20 05:45:14'),(10,5,3,'masuk',0,50,'2024-11-11','completed','-','2024-11-11 05:20:48','2024-11-20 05:45:19'),(11,5,3,'masuk',0,10,'2024-11-11','completed','-','2024-11-11 05:21:04','2024-11-20 05:45:22'),(13,2,3,'keluar',0,50,'2024-11-13','completed','-','2024-11-13 06:24:24','2024-11-20 05:46:28'),(14,2,3,'masuk',0,50,'2024-11-15','completed','-','2024-11-15 02:31:11','2024-11-20 05:45:29'),(15,2,3,'keluar',0,100,'2024-11-15','completed','-','2024-11-15 02:31:28','2024-11-20 05:46:32'),(16,2,3,'keluar',0,50,'2024-11-15','completed','-','2024-11-15 02:41:22','2024-11-20 05:46:35'),(17,3,3,'keluar',0,50,'2024-11-15','completed','-','2024-11-15 02:44:23','2024-11-20 05:46:39'),(18,2,3,'masuk',0,104,'2024-11-15','completed','-','2024-11-15 02:54:49','2024-11-20 05:45:40'),(19,2,3,'masuk',0,50,'2024-11-15','completed','-','2024-11-15 02:55:07','2024-11-20 05:45:43'),(20,3,3,'masuk',0,50,'2024-11-15','completed','-','2024-11-15 02:55:36','2024-11-20 05:45:47'),(21,2,3,'keluar',0,50,'2024-11-15','completed','-','2024-11-15 05:32:50','2024-11-20 05:46:43'),(22,2,3,'masuk',0,100,'2024-11-15','completed','-','2024-11-15 05:41:33','2024-11-20 05:45:50'),(23,2,3,'masuk',0,15,'2024-11-18','completed','-','2024-11-18 01:33:42','2024-11-20 05:45:52'),(24,2,3,'keluar',0,15,'2024-11-18','completed','-','2024-11-18 01:58:12','2024-11-20 05:46:46'),(25,2,3,'keluar',0,95,'2024-11-18','completed','-','2024-11-18 02:14:54','2024-11-20 05:46:49'),(26,2,3,'masuk',0,95,'2024-11-18','completed','-','2024-11-18 06:08:36','2024-11-20 05:45:55'),(27,2,3,'keluar',0,100,'2024-11-20','completed','-','2024-11-20 03:32:42','2024-11-20 05:46:52'),(28,2,3,'masuk',0,100,'2024-11-21','completed','-','2024-11-21 03:51:09','2024-11-21 06:54:35'),(29,2,3,'keluar',0,20,'2024-11-21','completed','-','2024-11-21 05:49:39','2024-11-21 06:54:39'),(31,4,3,'masuk',0,50,'2024-11-23','completed','-','2024-11-23 01:15:01','2024-11-23 01:15:01'),(32,3,3,'keluar',0,50,'2024-11-23','completed','-','2024-11-23 01:15:13','2024-11-23 01:15:13'),(33,3,3,'masuk',0,100,'2024-11-23','completed','-','2024-11-23 03:39:58','2024-11-23 03:39:58'),(34,3,3,'keluar',0,100,'2024-11-23','completed','-','2024-11-23 03:40:52','2024-11-23 03:40:52'),(35,3,3,'masuk',0,50,'2024-11-23','completed','-','2024-11-23 06:33:04','2024-11-23 06:33:04');
/*!40000 ALTER TABLE `stock_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'PT. Fashion Sejati','Jl. Mode No. 123, Jakarta, Indonesia','021-5556789','info@fashionsejati.com','2024-11-01 03:21:12','2024-11-11 07:32:13'),(2,'Distribusi Fashion Jakarta','Jl. Gaya No. 456, Jakarta, Indonesia','021-6667890','kontak@distribusifashionjakarta.com','2024-11-01 03:21:19','2024-11-04 01:55:38'),(3,'PT. INDIGHO CLOTHES','Jl. Janti No. 42, Yogyakarta, Indonesia','021-6667888','indigoclothes@gmail.com','2024-11-08 10:54:13','2024-11-08 10:54:50');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Staff Gudang','Manajer Gudang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','Admin','$2y$12$ENRYzUQVyKw7dEFYcJWKyOpMCjwBKp0xmc3z8rGLysAjLaGVIJgm2',NULL,'2024-10-30 02:01:15','2024-11-04 02:22:06'),(2,'Staff Gudang','staffgudang@gmail.com','Staff Gudang','$2y$12$35Qr3z0JtMJOoNMCAH9Bmert7r2Dk2qFHZyoajXha2bojJzQaKlw2',NULL,'2024-10-30 02:01:15','2024-10-30 02:01:15'),(3,'Manajer Gudang','manajergudang@gmail.com','Manajer Gudang','$2y$12$jx5EuQ32qftWeoIcP.MU2uGD90zc6CZaB/CX/c3DnecwUwiP6EBma',NULL,'2024-10-30 02:01:15','2024-10-30 02:01:15');
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

-- Dump completed on 2024-11-25 14:45:18
