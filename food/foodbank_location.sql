CREATE DATABASE  IF NOT EXISTS `foodbank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `foodbank`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: foodbank
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `LOCATION_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `LOCATION_NO` varchar(15) NOT NULL,
  `LOCATION_ADDRESSLINE1` varchar(40) NOT NULL,
  `LOCATION_ADDRESSLINE2` varchar(40) NOT NULL,
  `LOCATION_POSTCODE` int unsigned NOT NULL,
  `LOCATION_CITY` varchar(15) NOT NULL,
  `LOCATION_STATE` varchar(15) NOT NULL,
  `LOCATION_PIC_NAME` varchar(20) NOT NULL,
  `LOCATION_PIC_PHONENO` varchar(11) NOT NULL,
  `LOCATION_PICTURE` varchar(255) NOT NULL,
  PRIMARY KEY (`LOCATION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (21,'MMU','Persiaran Multimedia','',63100,'Cyberjaya','Selangor','Kim','0126547890','download (1).jfif'),(22,'99 SpeedMart','Biz Avenue II, Lingkaran Cyber Point Bar','',63000,'Cyberjaya','Selangor','June','037579635','Website_Banner_TOP-Outlet-03_72.jpg'),(23,'7Eleven Cyber','Jalan GC 1','',63000,'Cyberjaya','Selangor','Ipin','034546987','7-Eleven_20191227191515_theedgemarkets.jpg'),(24,'Family Mart ','Dpulze, Lingkaran Cyber Point Timur, Cyb','4354345',63000,'Cyberjaya','Selangor','Nurul','01145693211','download.jfif');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-21 19:00:04
