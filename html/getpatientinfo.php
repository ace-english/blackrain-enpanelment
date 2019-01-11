<?php 
require_once('connect.php');

$query = "SELECT PatientID, Fname, Mname, Lname, DOB, Gender, Sex, Language, Race, Ethnicity FROM patient";

$responce = @mysqli_query($dbc, $query);

if($responce){
	echo'<table align = "left"
	cellspaceing="5" sellpadding="8">
	<tr><td align="left"><b>PatientID</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Middle Name</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>DOB</b></td>
	<td align="left"><b>Gender</b></td>
	<td align="left"><b>Sex</b></td>
	<td align="left"><b>Language</b></td>
	<td align="left"><b>Race</b></td>
	<td align="left"><b>Ethnicity</b></td></tr>';

	while($row = mysqli_fetch_array($responce)){

		echo '<tr><td align="left">' .
		$row['PatientID'] . '</td><td align="left">' .
		$row['Fname'] . '</td><td align="left">' .
		$row['Mname'] . '</td><td align="left">' .
		$row['Lname'] . '</td><td align="left">' .
		$row['DOB'] . '</td><td align="left">' .
		$row['Gender'] . '</td><td align="left">' .
		$row['Sex'] . '</td><td align="left">' .
		$row['Language'] . '</td><td align="left">' .
		$row['Race'] . '</td><td align="left">'.
		$row['Ethnicity'] . '</td><td align="left">';
		echo '</tr>';
	}

	echo'</table>';
} else{
	echo "Couldn't issue database query<br />";
	echo mysqli_error($dbc);
}

mysqli_close($dbc);

?>