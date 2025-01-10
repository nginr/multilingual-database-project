/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.6.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: multilang_db
-- ------------------------------------------------------
-- Server version	11.6.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(5) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_direction` enum('LTR','RTL') NOT NULL DEFAULT 'LTR',
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_code` (`language_code`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES
(1,'en','Hello, world!','2025-01-10 20:19:48','2025-01-10 20:19:48','LTR'),
(2,'es','¡Hola, mundo!','2025-01-10 20:19:48','2025-01-10 20:19:48','LTR'),
(3,'fr','Bonjour, le monde!','2025-01-10 20:19:48','2025-01-10 20:19:48','LTR'),
(4,'de','Hallo, Welt!','2025-01-10 20:19:48','2025-01-10 20:19:48','LTR'),
(5,'ar','الحاقّ','2025-01-10 20:21:59','2025-01-10 20:24:48','RTL'),
(6,'ar','مرحبا بالعالم!','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL'),
(7,'he','שלום עולם!','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL'),
(8,'fa','سلام دنیا!','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL'),
(9,'ar','كيف حالك؟','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL'),
(10,'he','מה שלומך?','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL'),
(11,'fa','حال شما چطور است؟','2025-01-10 20:22:25','2025-01-10 20:24:48','RTL');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'multilang_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-01-11  2:48:47
