<html>
<head>
	<title>Database Check</title>
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/kaiser.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script src="code/menu.js"></script>
</head>
<body>
		<div id="floating-box">
			<?php 
			require_once('code/connect.php');

			$query = "SELECT ProviderID, Fname, Mname, Lname, NpiNumber, Designiation FROM provider";

			$responce = @mysqli_query($dbc, $query);

			if($responce){
				echo'<table align = "left"
				cellspaceing="5" cellpadding="8" border="1">
				<tr><td align="left"><b>ProviderID</b></td>
				<td align="left"><b>First Name</b></td>
				<td align="left"><b>Middle Name</b></td>
				<td align="left"><b>Last Name</b></td>
				<td align="left"><b>NpiNumber</b></td>
				<td align="left"><b>Designiation</b></td></tr>';

				while($row = mysqli_fetch_array($responce)){

					echo '<tr><td align="left">' .
					$row['ProviderID'] . '</td><td align="left">' .
					$row['Fname'] . '</td><td align="left">' .
					$row['Mname'] . '</td><td align="left">' .
					$row['Lname'] . '</td><td align="left">' .
					$row['NpiNumber'] . '</td><td align="left">' .
					$row['Designiation'] . '</td><td align="left">';
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