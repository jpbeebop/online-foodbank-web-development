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
-- Table structure for table `enduser`
--

DROP TABLE IF EXISTS `enduser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enduser` (
  `USER_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `IS_ADMIN` tinyint DEFAULT '0',
  `USER_USERNAME` varchar(255) NOT NULL,
  `USER_FNAME` varchar(20) DEFAULT NULL,
  `USER_LNAME` varchar(20) DEFAULT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL,
  `USER_EMAIL` varchar(40) NOT NULL,
  `USER_PHONENO` varchar(11) DEFAULT NULL,
  `USER_ADDRESSLINE1` varchar(40) DEFAULT NULL,
  `USER_ADDRESSLINE2` varchar(40) DEFAULT NULL,
  `USER_POSTCODE` int unsigned DEFAULT NULL,
  `USER_CITY` varchar(15) DEFAULT NULL,
  `USER_STATE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enduser`
--

LOCK TABLES `enduser` WRITE;
/*!40000 ALTER TABLE `enduser` DISABLE KEYS */;
INSERT INTO `enduser` VALUES (1,0,'jianxin21','Tam','Xin','21','jiaxi0431@gmail.com','01121661195','7,jalan gaya 6,taman gaya','',81800,'Johor Bahru','Johor'),(2,0,'jianxin','das','sdsa','123456','jiaxi0431@gmail.com','01121661195','7,jalan gaya 77,taman gaya','',81800,'Johor Bahru','Melaka'),(3,0,'xubor','Celeste Dixon','Dacey Delgado','1234','camenoh@mailinator.com','+1 (888) 52','105 West Old Parkway','Tempora quam deleniti qui dicta et aut e',0,'Optio repudian','Aperiam facilis'),(4,0,'popov','Amity Riggs','Georgia Sellers','1234','javoromy@mailinator.com','+1 (918) 68','51 Green Second Drive','Est voluptatem aut do id dolore vel alia',0,'Ipsum ut volup','Explicabo Sit'),(8,1,'123','TEST','TEsTSTS','$2y$10$/Gt6lKjVghL6QSLmwpIZ4e0YI0VAZUE33HD2OF/.lLOps56ZdgPxW','janji.temu.online@epf.gov.my','0129350714','Uptown 1, 303A, Level 3A, 1, Jalan SS 21','Uptown 1, 303A, Level 3A',47400,'PETALING JAYA','SELANGOR'),(9,0,'1234','','','$2y$10$yyc6nuONW9AU4C8xxe0of.h8Mgdw0C4lTyr9EwGuTWSgCvyyAAinS','janji.temu.online@epf.gov.my','','No. 2-32A1, Jalan Desa 1/1, Desa Aman Pu','',52100,'Kuala Lumpur','Kuala Lumpur');
/*!40000 ALTER TABLE `enduser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-21 19:00:05
