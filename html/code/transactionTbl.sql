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

DROP TABLE IF EXISTS Patient;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
  CONSTRAINT PKPat PRIMARY KEY NONCLUSTERED (PatientID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;