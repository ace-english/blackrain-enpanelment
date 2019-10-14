<html>
<head>
	<title>Database Check</title>
	<link rel="stylesheet" href="../stylesheets/style.css">
	<link rel="stylesheet" href="../stylesheets/kaiser.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>

	<table class="patient-info-header">
		<tr>
			<td><img src="../img/menu.png" align="middle" href="index.html" onclick="openNav()"&#9776; >
				CT# - <span id="ct-num"> 1234567890</span>
			</td><td>
				<h1 id="patient-name">Database</h1>
			</td><td>
				<img src="../img/bell.png" align="middle" >
				USER ID
				<span id="user-id">_________</span>
			</tr>
		</table>

		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="../login.html">Log In</a>
			<a href="../index.html">Home</a>
			<a href="../addpatient.html">Add Patient</a>
			<a href="searchPatient.php">Search Patients</a>

		</div>

		<div id="floating-box">
			<?php 
			require_once('connect.php');

			$query = "SELECT PatientID, Fname, Mname, Lname, DOB, Gender, Sex, Language, Race, Ethnicity FROM patient";

			$responce = @mysqli_query($dbc, $query);

			if($responce){
				echo'<table align = "left"
				cellspaceing="5" cellpadding="8" border="1">
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
		</div>


		<script>
			/* Set the width of the side navigation to 250px */
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
			}

			/* Set the width of the side navigation to 0 */
			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}
		</script>
	</body>
	</html>