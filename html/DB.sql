CREATE TABLE "Appointment" ("AppID" REAL PRIMARY KEY NOT NULL UNIQUE, "ProviderID" REAL NOT NULL REFERENCES "provider" ("ProviderID"), "PatientID" REAL NOT NULL REFERENCES "Patient" ("PatientID"), "Date" DATE NOT NULL, "SurveyID" REAL);
CREATE TABLE "Empanelment" ("EnpanelID" REAL PRIMARY KEY NOT NULL, "ProviderID" TEXT NOT NULL REFERENCES "provider" ("ProviderID"), "PatientID" TEXT NOT NULL REFERENCES "Patient" ("PatientID"), "EffectiveDate" TEXT, "TeamDate" TEXT, "FailityID" INTEGER NOT NULL REFERENCES "Facility" ("FacilityID"));
CREATE TABLE "Facility" ("FacilityID" REAL PRIMARY KEY NOT NULL UNIQUE, "FacilityName" TEXT);
CREATE TABLE "Patient" ("PatientID" REAL PRIMARY KEY NOT NULL UNIQUE, "Fname" TEXT, "Lname" TEXT, "Mname" TEXT, "DOB" TEXT, "Gender" TEXT, "Sex" TEXT, "Language" TEXT, "Race" TEXT, "Ethnically" TEXT);
CREATE TABLE "Users" ("UserID" REAL PRIMARY KEY NOT NULL, "PatientID" REAL NOT NULL REFERENCES "Patient" ("PatientID"), "Password" REAL NOT NULL, "UserType" TEXT NOT NULL);
CREATE TABLE "provider" ("ProviderID" REAL PRIMARY KEY NOT NULL UNIQUE, "Fname" TEXT, "Mname" TEXT, "Lname" TEXT, "NpiNumber" REAL UNIQUE, "Designiation" TEXT);
