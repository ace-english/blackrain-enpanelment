/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 --SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS Request;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Request (
SELECT Patient.PatientID, Patient.FName, Patient.MName, Patient.LName, Patient.DOB, Patient.MRN, Empanelment.PcpAssignmentID, Empanelment.ProviderID, Empanelment.ProviderName
FROM Patient, Empanelment
WHERE Patient.PatientID = Empanelment.PatientID
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS Panel;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 --SET character_set_client = utf8mb4 ;
CREATE TABLE Panel (
SELECT ProviderID, FName, MName, LName, NPI, Taxonomy, ProDesignation, Available, Gender, DOB, Title, Specialty1, Specialty2, Status, Size, panelStatus
FROM 
  ProviderID int NULL,
  FName varchar(155) NULL,
  MName varchar(75) NULL,
  LName varchar(155) NULL,
  NPI varchar(15) NULL,
  Taxonomy varchar(155) NULL,
  ProDesignation varchar(155) NULL,
  Available char(1) NULL,
  Gender varchar(75) NULL,
  DOB date NULL,
  Title varchar(155) NULL,
  Specialty1 varchar(155) NULL,
  Specialty2 varchar(155) NULL,
  Status char(1) NULL,
  Size int NULL,
  panelStatus char(1) NULL
) ENGINE=InnoDB;

