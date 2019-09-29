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

DELIMITER $$

CREATE PROCEDURE FillPanel(IN NPI varchar(15), IN Exception1 varchar(255), IN Exception2 varchar(255), IN Exception3 varchar(255), IN Exception4 varchar(255))
BEGIN
DECLARE Temp int DEFAULT 0;

SELECT COUNT(PatientID)
INTO Temp
FROM Empanelment
WHERE Empanelment.NPI = NPI;

UPDATE Panel
SET Panel.PanelStatus = 'O'
WHERE Temp < Panel.Size && Panel.NPI = NPI;

UPDATE Panel
SET Panel.PanelStatus = 'C'
WHERE  Temp >= Panel.Size && Panel.Exception1 = 'Takes Families of Patient' && Panel.NPI = NPI;

UPDATE Panel
SET Panel.PanelStatus = 'L'
WHERE Temp <= Panel.Size && Panel.Exception2 != NULL && Panel.NPI = NPI;

UPDATE Panel 
  SET 
    Panel.exception1 = Exception1,
    Panel.exception2 = Exception2,
    Panel.exception3 = Exception3,
    Panel.exception4 = Exception4
  WHERE Panel.NPI = NPI;

END$$

DELIMITER ;