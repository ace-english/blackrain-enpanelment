<?php 

$patientID = filter_input(INPUT_POST, 'PatientID');
$fName = filter_input(INPUT_POST, 'Fname');
$mName = filter_input(INPUT_POST, 'Mname');
$lName = filter_input(INPUT_POST, 'Lname');
$DOB = filter_input(INPUT_POST, 'DOB');
$sex = filter_input(INPUT_POST, 'Sex');
$gender = filter_input(INPUT_POST, 'Gender');
$race = filter_input(INPUT_POST, 'Race');
$ethnicity = filter_input(INPUT_POST, 'ethnicity');
$languages = filter_input(INPUT_POST, 'Language');

if(!empty($patientID)){
	$host = "localhost";
	$dbname = "DB.sqlite";

	$conn = new mysql($host, $dbname);

	$sql = "INSERT INTO Patient(PatientID, Fname, Lname, Mname, DOB, Gender,Sex, Language, Race, Ethnicity) 
    values('$patientID', '$fName', '$lName', '$mName', '$DOB', '$gender','$sex', '$languages', '$race', '$ethnicity')";
	
	if($conn->query($sql)){
		echo "Inserted into Database!";
	}
	else{
		echo "Error";
	}
	$conn->close();
}
else{
	echo "PatientID should not be empty";
	die();
}
?>