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
-- Table structure for table `Facility`
--

DROP TABLE IF EXISTS Facility;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Facility (
  FacilityID int NOT NULL AUTO_INCREMENT,
  FacilityName varchar(255) NULL,
  NPI varchar(15) NULL,
  LocationId varchar(155) NULL,
  Status char(1) NULL,
  CONSTRAINT PKFac PRIMARY KEY NONCLUSTERED (FacilityID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS Patient;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Patient (
  PatientID int NOT NULL AUTO_INCREMENT,
  FName varchar(155) NULL,
  MName varchar(75) NULL,
  LName varchar(155) NULL,
  DOB date NULL,
  Gender varchar(75) NULL,
  Sex char(2) NULL,
  Language varchar(155) NULL,
  Race varchar(155) NULL,
  Ethnicity varchar(155) NULL,
  HealthPlanID1 varchar(75) NULL,
  HealthPlanID2 varchar(75) NULL,
  SubscriberID1 varchar(75) NULL,
  SubscriberID2 varchar(75) NULL,
  MRN varchar(75) NULL,
  Status char(1) NULL,
  CONSTRAINT PKPat PRIMARY KEY NONCLUSTERED (PatientID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Provider`
--

DROP TABLE IF EXISTS Provider;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Provider (
  ProviderID int NOT NULL AUTO_INCREMENT,
  FName varchar(155) NULL,
  MName varchar(75) NULL,
  LName varchar(155) NULL,
  NPI varchar(15) NULL,
  Taxonomy varchar(155) NULL,
  ProDesigniation varchar(155) NULL,
  Available char(1) NULL,
  Gender varchar(75) NULL,
  DOB date NULL,
  Title varchar(155) NULL,
  Specialty1 varchar(155) NULL,
  Specialty2 varchar(155) NULL,
  Status char(1) NULL,
  CONSTRAINT PKProv PRIMARY KEY NONCLUSTERED (ProviderID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Encounter`
--

DROP TABLE IF EXISTS Encounter;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Encounter (
  EncounterID int NOT NULL AUTO_INCREMENT,
  ProviderID int NOT NULL,
  PatientID int NOT NULL,
  DOS datetime NULL,
  EncId varchar(75) NULL,
  FacilityID int NOT NULL,
  ProcedureCodes char(10) NULL,
  Modifier1 char(10) NULL,
  Modifier2 char(10) NULL,
  Diagnose1 char(10) NULL,
  Diagnose2 char(10) NULL,
  Diagnose3 char(10) NULL,
  Diagnose4 char(10) NULL,
  Diagnose5 char(10) NULL,
  Diagnose6 char(10) NULL,
  Diagnose7 char(10) NULL,
  Diagnose8 char(10) NULL,
  Diagnose9 char(10) NULL,
  Diagnose10 char(10) NULL,
  Status char(1) NULL,
  CONSTRAINT PKEnc PRIMARY KEY CLUSTERED (EncounterID, PatientID, ProviderID, FacilityID),
  CONSTRAINT FacilityID FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT ProviderID FOREIGN KEY (ProviderID) REFERENCES Provider (ProviderID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Empanelment`
--

DROP TABLE IF EXISTS Empanelment;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Empanelment (
  PcpAssignmentID int NOT NULL AUTO_INCREMENT,
  ProviderID int NOT NULL,
  PatientID int NOT NULL,
  FacilityID int NOT NULL,
  ProviderName varchar(155) NULL,
  PatientName varchar(155) NULL,
  EffectiveDate datetime NULL,
  TerminationDate datetime NULL,
  FacilityName varchar(155) NULL,
  Insurance1 varchar(155) NULL,
  Insurance2 varchar(155) NULL,
  CurrentRecordFlag char(1) NULL,
  Status char(1) NULL,
  CONSTRAINT PKEmp PRIMARY KEY NONCLUSTERED (PcpAssignmentID, ProviderID, FacilityID, PatientID),
  CONSTRAINT FacilityID_2 FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID_2 FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT ProviderID_2 FOREIGN KEY (ProviderID) REFERENCES Provider (ProviderID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `PcpAssignment`
--
DROP TABLE IF EXISTS PcpAssignment;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE PcpAssignment (
  PcpAssignmentID int NOT NULL AUTO_INCREMENT,
  ProviderID int NOT NULL,
  FacilityID int NOT NULL,
  PatientID int NOT NULL,
  EffectiveDate datetime NULL,
  TerminationDate datetime NULL,
  Insurance1 varchar(155) NULL,
  Insurance2 varchar(155) NULL,
  CurrentRecordFlag char(1) NULL,
  Status char(1) NULL,
  CONSTRAINT PKPcp PRIMARY KEY NONCLUSTERED (PcpAssignmentID, ProviderID, FacilityID, PatientID),
  CONSTRAINT FacilityID_3 FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID_3 FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT ProviderID_3 FOREIGN KEY (ProviderID) REFERENCES Provider (ProviderID)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Users`
--
DROP TABLE IF EXISTS Users;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Users (
  UserID int NOT NULL AUTO_INCREMENT,
  Password varchar(15) NOT NULL,
  UserType char(2) NOT NULL,
  StyleType varchar(25) NOT NULL,
  UserName varchar(15) NOT NULL,
  Status char(1) NULL,
  CONSTRAINT PKUser PRIMARY KEY NONCLUSTERED (UserID),
  UNIQUE KEY UserName_UNIQUE (UserName)
) ENGINE=InnoDB; --DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


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
