<html>
<head>
<title>Add Provider</title>
<link rel="stylesheet" href="../stylesheets/style.css">
<link rel="stylesheet" href="../stylesheets/kaiser.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<script src="code/menu.js"></script>
</head>

<body>
	
<div class="floating-box" style="text-align:center; margin-left:25%;">
	<h2>Add New Provider</h2>
	<form id="entry" method="post" action="code/provideradded.php">
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
</body>
</html>