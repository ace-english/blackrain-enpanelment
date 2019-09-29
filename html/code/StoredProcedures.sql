/* Procedure calls to fill in the rest of the Encounter,PcpAssignment, or Empanelment Table 
    after inserting data into the DB */
DELIMITER $$

CREATE PROCEDURE EncounterFill()
BEGIN
UPDATE Encounter 
SET Encounter.ProviderID = (
    SELECT Provider.ProviderID 
    FROM Provider
    WHERE Provider.NPI = Encounter.NPI
);

UPDATE Encounter 
SET Encounter.FacilityID = (
    SELECT Facility.FacilityID 
    FROM Facility
    WHERE Facility.NPI = Encounter.NPI
);

UPDATE Encounter 
SET Status = 'I';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE PcpAssignmentFill()
BEGIN
UPDATE PcpAssignment 
SET PcpAssignment.FacilityID = (
    SELECT Facility.FacilityID 
    FROM Facility
    WHERE Facility.NPI = PcpAssignment.NPI
);

UPDATE PcpAssignment 
SET Status = 'I';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE EmpanelmentFill()
BEGIN
UPDATE Empanelment 
SET Empanelment.PcpAssignmentID = (
    SELECT PcpAssignment.PcpAssignmentID 
    FROM PcpAssignment
    WHERE PcpAssignment.NPI = Empanelment.NPI
);

UPDATE Empanelment 
SET Empanelment.FacilityID = (
    SELECT Facility.FacilityID 
    FROM Facility
    WHERE Facility.NPI = Empanelment.NPI
);

UPDATE Empanelment 
SET Status = 'I';
END$$

DELIMITER ;

/*Patient Searches for the front end*/
DELIMITER $$

CREATE PROCEDURE PatientSearch(IN MRN varchar(75))
BEGIN
    SELECT PatientID,FName,MName,LName,DOB,Gender,Sex,Language,Race,Ethnicity,Insurance1,HealthPlanID1,Insurance2,HealthPlanID2,SubscriberID1,SubscriberID2,MRN 
    FROM Patient
    WHERE Patient.MRN = MRN && Patient.Status != 'D';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE PatientSearch2(IN MRN varchar(75))
BEGIN
    SELECT FName, LName, DOB, MRN 
    FROM Patient
    WHERE Patient.MRN = MRN && Patient.Status != 'D'; 
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE PatientSearchAlt(IN FName varchar(155), IN LName varchar(155), IN DOB date)
BEGIN
    SELECT PatientID,FName,MName,LName,DOB,Gender,Sex,Language,Race,Ethnicity,Insurance1,HealthPlanID1,Insurance2,HealthPlanID2,SubscriberID1,SubscriberID2,MRN 
    FROM Patient
    WHERE Patient.FName = FName && Patient.LName = LName && Patient.DOB = DOB && Patient.Status != 'D';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE PatientSearchAlt2(IN FName varchar(155), IN LName varchar(155), IN DOB date)
BEGIN
    SELECT FName, LName, DOB, MRN 
    FROM Patient
    WHERE Patient.FName = FName && Patient.LName = LName && Patient.DOB = DOB && Patient.Status != 'D';
END$$

DELIMITER ;

/*Provider Searches for the front end*/
DELIMITER $$

CREATE PROCEDURE ProviderSearch(IN NPI varchar(15))
BEGIN
    SELECT ProviderID,FName,MName,LName,NPI,Taxonomy1,GenCode,Title,Size
    FROM Panel
    WHERE Panel.NPI = NPI && Panel.Status != 'D';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE ProviderSearch2(IN NPI varchar(15))
BEGIN
    SELECT NPI, FName, LName, Taxonomy1
    FROM Panel
    WHERE Panel.NPI = NPI && Panel.Status != 'D';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE ProviderSearchAlt(IN FName varchar(155),IN LName varchar(155),IN Taxonomy1 varchar(75))
BEGIN
    SELECT ProviderID,FName,MName,LName,NPI,Taxonomy1,GenCode,Title,Size
    FROM Panel
    WHERE Panel.FName = FName && Panel.LName = LName && Panel.Taxonomy1 = Taxonomy1 && Panel.Status != 'D';
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE ProviderSearchAlt2(IN FName varchar(155),IN LName varchar(155),IN Taxonomy1 varchar(75))
BEGIN
    SELECT NPI, FName, LName, Taxonomy1
    FROM Panel
    WHERE Panel.FName = FName && Panel.LName = LName && Panel.Taxonomy1 = Taxonomy1 && Panel.Status != 'D';
END$$

DELIMITER ;

/*Encounter Searches that looks for how much a patient has visited each provider*/
DELIMITER $$

CREATE PROCEDURE EncounterSearch(IN PatientID int)
BEGIN
    SELECT COUNT(Encounter.NPI) AS VisitCnt, Provider.FName, Provider.LName, Encounter.NPI, Encounter.DOS, Encounter.EncID
    FROM Encounter, Provider
    WHERE Encounter.PatientID = PatientID && Encounter.NPI = Provider.NPI && Encounter.Status != 'D'
    GROUP BY Provider.FName, Provider.LName, Encounter.NPI, Encounter.DOS, Encounter.EncID;
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE RequestAccepted(IN NPI varchar(15), IN MRN varchar(75))
BEGIN
    UPDATE Request 
    SET 
      Request.TerminationDate = GETDATE(),
      Request.Status = 'D',
    WHERE Request.MRN = MRN;

    INSERT INTO Empanelment(PcpAssignmentID,NPI,PatientID,FacilityID,ProviderName,PatientName,FacilityName)
    SELECT PcpAssignment.PcpAssignmentID, Provider.NPI, Facility.FacilityID, CONCATE(Provider.FName,'',Provider.LName), Patient.PatientName, Facility.FacilityName
    FROM Provider, Patient, PcpAssignment, Facility
    WHERE Provider.NPI = NPI;
END$$

DELIMITER ;

/*For adding and dropping master tables easier*/
DELIMITER $$

CREATE PROCEDURE DropAllTables()
BEGIN
    DROP TABLE IF EXISTS Empanelment;
    DROP TABLE IF EXISTS PcpAssignment;
    DROP TABLE IF EXISTS Encounter;
    DROP TABLE IF EXISTS Users;
    DROP TABLE IF EXISTS Facility;
    DROP TABLE IF EXISTS Provider;
    DROP TABLE IF EXISTS Patient;
    DROP TABLE IF EXISTS Panel;
    DROP TABLE IF EXISTS Request;
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE AddAllTables()
BEGIN
    CALL AddPatientTbl();
    CALL AddProviderTbl();
    CALL AddFacilityTbl();
    CALL AddUsersTbl();
    CALL AddEncounterTbl();
    CALL AddPcpAssignmentTbl();
    CALL AddEmpanelmentTbl();
    CALL CreatePanelTbl();
    CALL CreateRequestTbl();
END$$

DELIMITER ;

/*For after inserting into Encounter,PcpAssignment,or Empanelment Tables*/
--CALL EncounterFill();
--CALL PcpAssignmentFill();
--CALL EmpanelmentFill();