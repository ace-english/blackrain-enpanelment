<html>
<head>
<title>Add Provider</title>
<link rel="stylesheet" href="../stylesheets/style.css">
<link rel="stylesheet" href="../stylesheets/kaiser.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body><table class="patient-info-header">
<tr>
	<td><img src="img/menu.png" align="middle" href="index.html" onclick="openNav()">
	CT# - <span id="ct-num"> 1234567890</span>
	</td><td style="width:60%;">
	</td><td>
	<img src="img/bell.png" align="middle" >
	USER ID
	<span id="user-id">_________</span>
	</tr>
</table>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="../login.html">Log In</a>
	<a href="../index.html">Home</a>
	<a href="code/getpatientinfo.php">View Database</a>
	<a href="code/searchPatient/php">Search Patients</a>
</div>

<div class="floating-box" style="text-align:center; margin-left:25%;">
	<h2>Add New Provider</h2>
	<form id="entry" method="post" action="provideradded.php">
		<table><tbody><tr><td>
		<label>First Name</label>
		</td><td>
		<input type="text" name="Fname" label="Fname"></input>
		</td><td>
		<label>Middle Name</label></td><td>
		<input type="text" name="Mname" label="Mname"></input>
		</td></tr><tr><td>
		<label>Last Name</label></td><td>
		<input type="text" name="Lname" label="Lname"></input>
		</td><td>
		<label>Npi Number</label></td><td>
		<input type="text" name="npinum" label="npinum"></input>
		</td><tr><td>
		<label>Designiation</label></td><td>
		<input type="text" name="designiation" label="Designiation"></input>
		</td></tr><td>
		
		<input type="submit" value="submit"></input></td><td></td>
		</tr></tbody></table>
	</form>
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