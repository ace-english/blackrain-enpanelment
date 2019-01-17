<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/kaiser.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script src="code/menu.js"></script>
</head>
<body>


		<div class="floating-box" id="centerTop">
			<h3>Please enter one of the following:</h3>
			<form method="post" action="http://localhost/code/searchPatient.php">
				<label>Patient ID:</label>
				<input type="text" label="patientID" name="patientID" placeholder="000000">
				<label>Patient Name:</label>
				<input type="text" label="patientName" name="patientFName" placeholder="First Name">
				<input type="text" label="patientName" name="patientLName" placeholder="Last Name">
				<input type="submit" name="searchUser" value="Search"  id="searchUser">
				<input type="submit" name="searchAll" value="Search All Patients"  id="searchAll">
			</form>

		</div>


		<?php 
		if(isset($_POST['searchAll'])){
			require_once('code/connect.php');

			$query = "SELECT Fname, Lname, DOB, Sex FROM patient";
			$responce = @mysqli_query($dbc, $query);
			$boxLimit = 4;
			$count = 0;

			if($responce){
				
				echo'<div class="floating-box">';
				echo'<table>';
				while($row = mysqli_fetch_array($responce)){
					$count++;
					if ($count > $boxLimit) {
						echo'<tr>';
					}
					echo'
					<td> 
					<div class="floating-box" style="border: 1px solid black;" id="searchMe">
					<b><h3>'. $row['Fname'] . '</h3></b><h5>'. $row['Lname'] . '</h5>
					<li> DOB: '. $row['DOB'] . '</li>
					<li> Sex: '. $row['Sex'] . '</li>
					<li>Health Status: Alive</li>
					<li>Last Visit: 365 days ago</li>
					<li>Care Team: Team Deep</li>
					</div>
					</td>';

					if ($count > $boxLimit){
						echo'<?/tr>';
						$count = 1;
					}

				}
				echo'</table>';
				echo'</div>';
			} else{
				echo "Couldn't issue database query<br />";
				echo mysqli_error($dbc);
			}

			mysqli_close($dbc);

		} else if (isset($_POST['searchUser'])) {
			require_once('code/connect.php');
			$f_name = filter_var($_POST["patientFName"]);
			$l_name = filter_var($_POST["patientLName"]);
			$pid = filter_var($_POST["patientID"]);
			$query = '';

			if($pid=='' && $f_name=='' && $l_name==''){
				echo'<div class="floating-box">Please enter in one of the following: Patient ID or Patients first and last name.</div>';
			}
			if($f_name != '' && $l_name!= '') {
				$query = 'SELECT Fname, Lname, DOB, Sex FROM patient WHERE Fname = "$f_name" and Lname = "$l_name"';
			}
			if($pid != ''){
				$query = "SELECT Fname, Lname, DOB, Sex FROM patient WHERE PatientID = ". $pid;
			}

			if ($query != '') {
				$responce = @mysqli_query($dbc, $query);
				if($responce){
					echo'<div class="floating-box">';
					echo'<table>';
					while($row = mysqli_fetch_array($responce)){
						$count++;
						if ($count > $boxLimit) {
							echo'<tr>';
						}
						echo'
						<td> 
						<div class="floating-box" style="border: 1px solid black;" id="searchMe">
						<b><h3>'. $row['Fname'] . '</h3></b><h5>'. $row['Lname'] . '</h5>
						<li> DOB: '. $row['DOB'] . '</li>
						<li> Sex: '. $row['Sex'] . '</li>
						<li>Health Status: Alive</li>
						<li>Last Visit: 365 days ago</li>
						<li>Care Team: Team Deep</li>
						</div>
						</td>';

						if ($count > $boxLimit){
							echo'<?/tr>';
							$count = 1;
						}

					}
					echo'</table>';
					echo'</div>';
				} else{
					echo "Couldn't issue database query<br />";
					echo mysqli_error($dbc);
				}

				mysqli_close($dbc);
			}
		}

		?>
	</body>
	</html>