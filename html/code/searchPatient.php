<html>
<head>
	<title>Patient</title>
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
				<h1 id="patient-name">Search Patient</h1>
			</td><td>
				<img src="../img/bell.png" align="middle" >
				USER ID
				<span id="user-id">_________</span>
			</tr>
		</table>

		<div class="floating-box" id="centerTop">
			<h3>Please enter one of the following:</h3>
			<form method="post" action="http://localhost/code/searchPatient.php">
				<label>Patient ID:</label>
				<input type="text" label="patientID" id="patientID" placeholder="000000">
				<label>Patient Name:</label>
				<input type="text" label="patientName" id="patientFName" placeholder="First Name">
				<input type="text" label="patientName" id="patientLName" placeholder="Last Name">
				<input type="submit" name="searchUser" value="Search"  id="searchUser">
				<input type="submit" name="searchAll" value="Search All Patients"  id="searchAll">
			</form>

		</div>

		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="../login.html">Log In</a>
			<a href="../index.html">Home</a>
			<a href="getpatientinfo.php">View Database</a>
			<a href="#">Contact</a>
		</div>

		<?php 
		if(isset($_POST['searchAll'])){
			require_once('connect.php');

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
		}
		?>

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