--Creates Request transaction table
DELIMITER $$

CREATE PROCEDURE CreateRequestTbl()
BEGIN

DROP TABLE IF EXISTS Request;

CREATE TABLE Request (
SELECT Patient.PatientID, Patient.MRN, Empanelment.ProviderName, Empanelment.NPI, Empanelment.TerminationDate, Empanelment.Status
FROM Patient, Empanelment
WHERE Patient.PatientID = Empanelment.PatientID
);
END$$

DELIMITER ;

--Creates transaction table,add panelStatus field, and update panelStatus
DELIMITER $$

CREATE PROCEDURE CreatePanelTbl()
BEGIN

CALL EncounterFill();
CALL PcpAssignmentFill();
CALL EmpanelmentFill();

DROP TABLE IF EXISTS Panel;
 
CREATE TABLE Panel
SELECT Provider.ProviderID, Provider.FName, Provider.MName, Provider.LName, Provider.NPI, Provider.Taxonomy1, Provider.GenCode, Provider.Title, Provider.Size, Provider.Status
FROM Provider, Empanelment
WHERE Provider.NPI = Empanelment.NPI;

ALTER TABLE Panel
  ADD COLUMN PanelStatus char(1) NULL,
  ADD COLUMN Exception1 varchar(255) NULL,
  ADD COLUMN Exception2 varchar(255) NULL, 
  ADD COLUMN Exception3 varchar(255) NULL,
  ADD COLUMN Exception4 varchar(255) NULL;

END$$

DELIMITER ;