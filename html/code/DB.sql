--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS Patient;

DELIMITER $$

CREATE PROCEDURE AddPatientTbl()
BEGIN
CREATE TABLE Patient (
  PatientID int NOT NULL,
  FName varchar(155) NULL,
  MName varchar(75) NULL,
  LName varchar(155) NULL,
  DOB date NULL,
  Gender varchar(75) NULL,
  Sex char(1) NULL,
  Language varchar(155) NULL,
  Race varchar(155) NULL,
  Ethnicity varchar(155) NULL,
  Insurance1 varchar(155) NULL,
  HealthPlanID1 varchar(75) NULL,
  Insurance2 varchar(155) NULL,
  HealthPlanID2 varchar(75) NULL,
  SubscriberID1 varchar(75) NULL,
  SubscriberID2 varchar(75) NULL,
  MRN varchar(75) NULL,
  Status char(1) NULL,
  CONSTRAINT PKPat PRIMARY KEY NONCLUSTERED (PatientID),
  UNIQUE (MRN)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `Provider`
--

DROP TABLE IF EXISTS Provider;

DELIMITER $$

CREATE PROCEDURE AddProviderTbl()
BEGIN 
CREATE TABLE Provider (
  ProviderID int NOT NULL AUTO_INCREMENT,
  NPI varchar(15) NOT NULL,
  TypeCode varchar(75) NULL,
  LName varchar(155) NULL,
  FName varchar(155) NULL,
  MName varchar(75) NULL,
  NPI2 varchar(15) NULL,
  EIN varchar(75) NULL,
  OrgName varchar(75) NULL,
  Prefix varchar(75) NULL,
  Suffix varchar(75) NULL,
  Cred varchar(75) NULL,
  OrgNameAlt varchar(75) NULL,
  TypeCodeAlt varchar(75) NULL,
  LNameAlt varchar(75) NULL,
  FNameAlt varchar(75) NULL,
  MNameAlt varchar(75) NULL,
  PrefixAlt varchar(75) NULL,
  SuffixAlt varchar(75) NULL,
  CredAlt varchar(75) NULL,
  LNameCode varchar(75) NULL,
  MailAddr1 varchar(75) NULL,
  MailAddr2 varchar(75) NULL,
  City varchar(75) NULL,
  State varchar(75) NULL,
  Postal varchar(75) NULL,
  CountryCode varchar(75) NULL,
  Phone varchar(75) NULL,
  Fax varchar(75) NULL,
  PrAddr1 varchar(75) NULL,
  PrAddr2 varchar(75) NULL,
  PrCity varchar(75) NULL,
  PrState varchar(75) NULL,
  PrPostal varchar(75) NULL,
  PrCountryCode varchar(75) NULL,
  PrPhone varchar(75) NULL,
  PrFax varchar(75) NULL,
  EnumDate varchar(75) NULL,
  UpdateDate varchar(75) NULL,
  DeactCode varchar(75) NULL,
  DeactDate varchar(75) NULL,
  ReactDate varchar(75) NULL,
  GenCode varchar(75) NULL,
  OffLName varchar(75) NULL,
  OffFName varchar(75) NULL,
  OffMName varchar(75) NULL,
  Title varchar(75) NULL,
  OffPhone varchar(75) NULL,
  Taxonomy1 varchar(75) NULL,
  License1 varchar(75) NULL,
  LicStateCode1 varchar(75) NULL,
  TaxSwitch1 varchar(75) NULL,
  Taxonomy2 varchar(75) NULL,
  License2 varchar(75) NULL,
  LicStateCode2 varchar(75) NULL,
  TaxSwitch2 varchar(75) NULL,
  Taxonomy3 varchar(75) NULL,
  License3 varchar(75) NULL,
  LicStateCode3 varchar(75) NULL,
  TaxSwitch3 varchar(75) NULL,
  Taxonomy4 varchar(75) NULL,
  License4 varchar(75) NULL,
  LicStateCode4 varchar(75) NULL,
  TaxSwitch4 varchar(75) NULL,
  Taxonomy5 varchar(75) NULL,
  License5 varchar(75) NULL,
  LicStateCode5 varchar(75) NULL,
  TaxSwitch5 varchar(75) NULL,
  Taxonomy6 varchar(75) NULL,
  License6 varchar(75) NULL,
  LicStateCode6 varchar(75) NULL,
  TaxSwitch6 varchar(75) NULL,
  Taxonomy7 varchar(75) NULL,
  License7 varchar(75) NULL,
  LicStateCode7 varchar(75) NULL,
  TaxSwitch7 varchar(75) NULL,
  Taxonomy8 varchar(75) NULL,
  License8 varchar(75) NULL,
  LicStateCode8 varchar(75) NULL,
  TaxSwitch8 varchar(75) NULL,
  Taxonomy9 varchar(75) NULL,
  License9 varchar(75) NULL,
  LicStateCode9 varchar(75) NULL,
  TaxSwitch9 varchar(75) NULL,
  Taxonomy10 varchar(75) NULL,
  License10 varchar(75) NULL,
  LicStateCode10 varchar(75) NULL,
  TaxSwitch10 varchar(75) NULL,
  Taxonomy11 varchar(75) NULL,
  License11 varchar(75) NULL,
  LicStateCode11 varchar(75) NULL,
  TaxSwitch11 varchar(75) NULL,
  Taxonomy12 varchar(75) NULL,
  License12 varchar(75) NULL,
  LicStateCode12 varchar(75) NULL,
  TaxSwitch12 varchar(75) NULL,
  Taxonomy13 varchar(75) NULL,
  License13 varchar(75) NULL,
  LicStateCode13 varchar(75) NULL,
  TaxSwitch13 varchar(75) NULL,
  Taxonomy14 varchar(75) NULL,
  License14 varchar(75) NULL,
  LicStateCode14 varchar(75) NULL,
  TaxSwitch14 varchar(75) NULL,
  Taxonomy15 varchar(75) NULL,
  License15 varchar(75) NULL,
  LicStateCode15 varchar(75) NULL,
  TaxSwitch15 varchar(75) NULL,
  Id1 varchar(75) NULL,
  IdCode1 varchar(75) NULL,
  IdState1 varchar(75) NULL,
  IdIssuer1 varchar(75) NULL,
  Id2 varchar(75) NULL,
  IdCode2 varchar(75) NULL,
  IdState2 varchar(75) NULL,
  IdIssuer2 varchar(75) NULL,
  Id3 varchar(75) NULL,
  IdCode3 varchar(75) NULL,
  IdState3 varchar(75) NULL,
  IdIssuer3 varchar(75) NULL,
  Id4 varchar(75) NULL,
  IdCode4 varchar(75) NULL,
  IdState4 varchar(75) NULL,
  IdIssuer4 varchar(75) NULL,
  Id5 varchar(75) NULL,
  IdCode5 varchar(75) NULL,
  IdState5 varchar(75) NULL,
  IdIssuer5 varchar(75) NULL,
  Id6 varchar(75) NULL,
  IdCode6 varchar(75) NULL,
  IdState6 varchar(75) NULL,
  IdIssuer6 varchar(75) NULL,
  Id7 varchar(75) NULL,
  IdCode7 varchar(75) NULL,
  IdState7 varchar(75) NULL,
  IdIssuer7 varchar(75) NULL,
  Id8 varchar(75) NULL,
  IdCode8 varchar(75) NULL,
  IdState8 varchar(75) NULL,
  IdIssuer8 varchar(75) NULL,
  Proprieter varchar(75) NULL,
  OrgSubpart varchar(75) NULL,
  LBN varchar(75) NULL,
  TIN varchar(75) NULL,
  OffPrefix varchar(75) NULL,
  OffSuffix varchar(75) NULL,
  OffCred varchar(75) NULL,
  TaxmyGrp1 varchar(75) NULL,
  TaxmyGrp2 varchar(75) NULL,
  TaxmyGrp3 varchar(75) NULL,
  TaxmyGrp4 varchar(75) NULL,
  TaxmyGrp5 varchar(75) NULL,
  Size int NULL,
  Status char(1) NULL,
  CONSTRAINT PKProv PRIMARY KEY NONCLUSTERED (ProviderID),
  UNIQUE (NPI)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `Facility`
--

DROP TABLE IF EXISTS Facility;

DELIMITER $$

CREATE PROCEDURE AddFacilityTbl()
BEGIN 
CREATE TABLE Facility (
  FacilityID int NOT NULL AUTO_INCREMENT,
  FacilityName varchar(255) NULL,
  NPI varchar(15) NOT NULL,
  LocationId varchar(155) NULL,
  Status char(1) NULL,
  CONSTRAINT PKFac PRIMARY KEY NONCLUSTERED (FacilityID),
  CONSTRAINT NPI FOREIGN KEY (NPI) REFERENCES Provider (NPI)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `Encounter`
--

DROP TABLE IF EXISTS Encounter;

DELIMITER $$

CREATE PROCEDURE AddEncounterTbl()
BEGIN 
CREATE TABLE Encounter (
  EncounterID int NOT NULL AUTO_INCREMENT,
  ProviderID int NULL,
  PatientID int NULL,
  DOS datetime NULL,
  EncID varchar(75) NULL,
  FacilityID int NULL,
  NPI varchar(15) NOT NULL,
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
  CONSTRAINT PKEnc PRIMARY KEY CLUSTERED (EncounterID),
  CONSTRAINT FacilityID FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT ProviderID FOREIGN KEY (ProviderID) REFERENCES Provider (ProviderID),
  CONSTRAINT NPI_2 FOREIGN KEY (NPI) REFERENCES Provider (NPI)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `PcpAssignment`
--
DROP TABLE IF EXISTS PcpAssignment;

DELIMITER $$

CREATE PROCEDURE AddPcpAssignmentTbl()
BEGIN
CREATE TABLE PcpAssignment (
  PcpAssignmentID int NOT NULL AUTO_INCREMENT,
  NPI varchar(15) NOT NULL,
  FacilityID int NULL,
  PatientID int NULL,
  EffectiveDate datetime NULL,
  TerminationDate datetime NULL,
  Insurance1 varchar(155) NULL,
  Insurance2 varchar(155) NULL,
  CurrentRecordFlag char(1) NULL,
  Status char(1) NULL,
  CONSTRAINT PKPcp PRIMARY KEY NONCLUSTERED (PcpAssignmentID),
  CONSTRAINT FacilityID_2 FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID_2 FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT NPI_3 FOREIGN KEY (NPI) REFERENCES Provider (NPI),
  CONSTRAINT Unique_Key UNIQUE (PatientID, NPI)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `Empanelment`
--

DROP TABLE IF EXISTS Empanelment;

DELIMITER $$

CREATE PROCEDURE AddEmpanelmentTbl()
BEGIN 
CREATE TABLE Empanelment (
  PcpAssignmentID int NULL,
  NPI varchar(15) NOT NULL,
  PatientID int NULL,
  FacilityID int NULL,
  ProviderName varchar(155) NULL,
  PatientName varchar(155) NULL,
  EffectiveDate datetime NULL,
  TerminationDate datetime NULL,
  FacilityName varchar(155) NULL,
  CurrentRecordFlag char(1) NULL,
  Status char(1) NULL,
  CONSTRAINT PKEmp UNIQUE KEY NONCLUSTERED (PatientID),
  CONSTRAINT FacilityID_3 FOREIGN KEY (FacilityID) REFERENCES Facility (FacilityID),
  CONSTRAINT PatientID_3 FOREIGN KEY (PatientID) REFERENCES Patient (PatientID),
  CONSTRAINT NPI_4 FOREIGN KEY (NPI) REFERENCES Provider (NPI),
  CONSTRAINT PcpAssignmentID FOREIGN KEY (PcpAssignmentID) REFERENCES PcpAssignment (PcpAssignmentID),
  UNIQUE (PatientID)
) ENGINE=InnoDB;

END$$

DELIMITER ;

--
-- Table structure for table `Users`
--
DROP TABLE IF EXISTS Users;

DELIMITER $$

CREATE PROCEDURE AddUsersTbl()
BEGIN 
CREATE TABLE Users (
  UserID int NOT NULL AUTO_INCREMENT,
  Password varchar(15) NOT NULL,
  UserType char(2) NOT NULL,
  StyleType varchar(25) NOT NULL,
  UserName varchar(15) NOT NULL,
  Status char(1) NULL,
  CONSTRAINT PKUser PRIMARY KEY NONCLUSTERED (UserID),
  UNIQUE (UserName)
) ENGINE=InnoDB;

END$$

DELIMITER ;


--Calls stored procedures to add tables
CALL AddPatientTbl();
CALL AddProviderTbl();
CALL AddFacilityTbl();
CALL AddEncounterTbl();
CALL AddPcpAssignmentTbl();
CALL AddEmpanelmentTbl();
CALL AddUsersTbl();