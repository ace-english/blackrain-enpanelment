<html>
<head>
	<title>Database Check</title>
	<link rel="stylesheet" href="../stylesheets/style.css">
	<link rel="stylesheet" href="../stylesheets/kaiser.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script src="code/menu.js"></script>
</head>
<body>

		<div id="floating-box">
			<?php 
			require_once('code/connect.php');

			$query = "SELECT PatientID, Fname, Mname, Lname, DOB, Gender, Sex, Language, Race, Ethnicity FROM patient";

			$responce = @mysqli_query($dbc, $query);

			if($responce){
				echo'<table class="patient-info"><thead>
				<tr><th scope="col" align="left"><b>PatientID</b></th>
				<th scope="col" align="left"><b>First Name</b></th>
				<th scope="col" lign="left"><b>Middle Name</b></th>
				<th scope="col" align="left"><b>Last Name</b></th>
				<th scope="col" align="left"><b>DOB</b></th>
				<th scope="col" align="left"><b>Gender</b></th>
				<th scope="col" align="left"><b>Sex</b></th>
				<th scope="col" align="left"><b>Language</b></th>
				<th scope="col" align="left"><b>Race</b></th>
				<th scope="col" align="left"><b>Ethnicity</b></th></tr></thead>';

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
					$row['Ethnicity'] . '</td>';
					echo '</tr>';
				}

				echo'</table>';
			} else{
				echo "Couldn't issue database query<br />";
				echo mysqli_error($dbc);
			}

			mysqli_close($dbc);

			?>
		</div>
	</body>
	</html>
