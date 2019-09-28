--Creates 
DROP TABLE IF EXISTS Request;

CREATE TABLE Request (
SELECT Patient.PatientID, Patient.FName, Patient.MName, Patient.LName, Patient.DOB, Patient.MRN, Empanelment.PcpAssignmentID, Empanelment.ProviderID, Empanelment.ProviderName
FROM Patient, Empanelment
WHERE Patient.PatientID = Empanelment.PatientID
);

/*CREATE PROCEDURE RequestAcceptted(IN ProName varchar())
BEGIN
    INSERT INTO Empanelment(TerminationDate)
    VALUE();

    INSERT INTO Empanelment(ProviderName, NPI, PatientID, PatientName, EffectiveDate, FacilityName, Insurance1,Insurance2, CurrentRecordFlag)
    VALUE();
    CALL EmpanelmentFill;
END$$

DELIMITER ;*/

--Creates transaction table,add panelStatus field, and update panelStatus
DROP TABLE IF EXISTS Panel;

CREATE TABLE Panel (
SELECT Provider.ProviderID, Provider.FName, Provider.MName, Provider.LName, Provider.NPI, Provider.Taxonomy1, Provider.GenCode, Provider.Title, Provider.Size, Provider.Status
FROM Provider, Empanelment
WHERE Provider.NPI = Empanelment.NPI
);

ALTER TABLE Panel
  ADD COLUMN panelStatus char(1) NOT NULL,
  ADD COLUMN exception1 varchar(155) NULL,
  ADD COLUMN exception2 varchar(155) NULL, 
  ADD COLUMN exception3 varchar(155) NULL,
  ADD COLUMN exception4 varchar(155) NULL;

--Updates panelstatus field by counting the number of patients by size
UPDATE Panel 
SET Panel.panelStatus = (
    CASE

);