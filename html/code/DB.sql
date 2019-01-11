-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: health
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `appointment` (
  `AppID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `SurveyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`AppID`),
  UNIQUE KEY `AppID` (`AppID`),
  KEY `ProviderID_idx` (`ProviderID`),
  KEY `PatientID_idx` (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empanelment`
--

DROP TABLE IF EXISTS `empanelment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `empanelment` (
  `EnpanelID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `EffectiveDate` text,
  `TeamDate` text,
  `FailityID` int(11) NOT NULL,
  PRIMARY KEY (`EnpanelID`),
  KEY `ProviderID_idx` (`ProviderID`),
  KEY `PatientID_idx` (`PatientID`),
  KEY `FacilityID_idx` (`FailityID`),
  CONSTRAINT `FacilityID` FOREIGN KEY (`FailityID`) REFERENCES `facility` (`facilityid`),
  CONSTRAINT `PatientID` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`patientid`),
  CONSTRAINT `ProviderID` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`providerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `facility` (
  `FacilityID` int(11) NOT NULL,
  `FacilityName` text,
  PRIMARY KEY (`FacilityID`),
  UNIQUE KEY `FacilityID` (`FacilityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Mname` text,
  `Lname` text NOT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` text,
  `Sex` text,
  `Language` text,
  `Race` text,
  `Ethnicity` text,
  PRIMARY KEY (`PatientID`),
  UNIQUE KEY `PatientID_UNIQUE` (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provider` (
  `ProviderID` int(11) NOT NULL,
  `Fname` text,
  `Mname` text,
  `Lname` text,
  `NpiNumber` int(11) DEFAULT NULL,
  `Designiation` text,
  PRIMARY KEY (`ProviderID`),
  UNIQUE KEY `ProviderID` (`ProviderID`),
  UNIQUE KEY `NpiNumber` (`NpiNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Password` text NOT NULL,
  `UserType` text NOT NULL,
  `StyleType` text,
  `UserName` varchar(15) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-11 14:21:33
