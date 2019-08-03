<html>
<head>
<title>Patient Info </title>
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/kaiser.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="code/menu.js"></script>

</head>

<body>
	

<?php  
	//=============== 4-Cut Method =================
	// This first line grabs the selected patient's ID from the previous page and check of it's not NULL.
	if(isset($_POST['SelectPat'])){

		// Making a connection to the server/database
		require_once('code/connect.php');			
	
		//Variable initialization
		$pid = filter_var($_POST["SelectPat"]);	
		$query = "SELECT Fname, Lname, DOB, Sex FROM patient WHERE PatientID = ". $pid;
		$responce = @mysqli_query($dbc, $query);
		$phpHospitalID = '444444';	
		$phpFname = '';
		$phpLname = '';
		$phpDOB = '';
		$phpSex = '';

		//This statement will use the quary/responce variable to initialize variables;
		//This will include all infomation on our patient.
		if($responce){
				while($row = mysqli_fetch_array($responce)){
					$phpFname = $row['Fname'];
					$phpLname = $row['Lname'];
					$phpDOB = $row['DOB'];
					$phpSex = $row['Sex'];
				}
			}

		//Same as above, but the query is now going to grab the Max Visit number from said patiant
		//This Max Visit number repesents which doctor he/she visited the most.
		$query = "SELECT max(VisitCount), max(EffectiveDate) FROM health.empanelment WHERE PatientID =". $pid. " and FailityID = ". $phpHospitalID;
		$responce = @mysqli_query($dbc, $query);
		$phpVisit = '';
		$phpDate = '';
		$phpProviderName = '';
		$phpProviderID = '';
		$phpVisitCount = '';

		if($responce){
			while($row = mysqli_fetch_array($responce)){
				$phpVisit = $row['max(VisitCount)'];
			}
		}

		//This will compare if the patient has visited diffrient doctors for the same number of time.
		//If he/she has not visited a doctor at all, they will be givin one at random, look at else statement.
		if($phpVisit > 0){

			$query = "SELECT count(VisitCount) FROM health.empanelment WHERE PatientID =". $pid ." and VisitCount = ". $phpVisit ." and FailityID = ". $phpHospitalID;
			$responce = @mysqli_query($dbc, $query);

			if($responce){
				while($row = mysqli_fetch_array($responce)){
				$phpVisitCount = $row['count(VisitCount)'];

				//This will check if the patient has visited diffrient doctors the same amount of times
				//If true, then assign them to the lastest doctor they visited.
				if($phpVisitCount > 1){
					$query = "SELECT ProviderID, ProviderName FROM health.empanelment WHERE PatientID =".$pid ." and VisitCount = ". $phpVisit ." and FailityID = ". $phpHospitalID ." ORDER BY EffectiveDate DESC LIMIT 1";
					$responce = @mysqli_query($dbc, $query);

					if($responce){
						while($row = mysqli_fetch_array($responce)){
							$phpProviderID = $row['ProviderID'];
							$phpProviderName = $row['ProviderName'];
						}
					}
				}
				else{
					$query = "SELECT ProviderID, ProviderName FROM health.empanelment WHERE PatientID =".$pid ." and VisitCount = ". $phpVisit ." and FailityID = ". $phpHospitalID;
					$responce = @mysqli_query($dbc, $query);

					if($responce){
						while($row = mysqli_fetch_array($responce)){
							$phpProviderID = $row['ProviderID'];
							$phpProviderName = $row['ProviderName'];
						}
					}

				}
			}
			}
		}
		//If no doctor has been visited at all, this will assign them to a random one.
		else{
			$query = "SELECT ProviderID, ProviderName FROM health.empanelment WHERE PatientID =". $pid ." and FacilityID = ". $phpHospitalID ." ORDER BY RAND() LIMIT 1";
			$responce = @mysqli_query($dbc, $query);
			if($responce){
				while($row = mysqli_fetch_array($responce)){
					$phpProviderName = $row['ProviderName'];
					$phpProviderID = $row['ProviderID'];
				}
			}
		}
	}
		//=========== 4-CUT ENDS ============================
?>
	
<div class="overlay" id="provider-overlay">
	<div class="tabs-inner">
	<form>
	<label>Select new provider:</label>
	<?
	$sql="SELECT Lname FROM provider";
	$q=mysql_query($sql);
	echo "<select name='provider'>"; 
	while($row = mysql_fetch_array($q)) 
	{        
	echo "<option value='".$row['Lname']."'>".$row['Lname']."</option>"; 
	}
	echo "</select>";
	?>
	<button type="submit" class="button">
	</form>
</div>

<div class="tabs-inner" style="text-align:center;">
	<table class='home-table'>
		<tr>
			<td id='info'  class="large-side-button" onclick="info()">Patient Info</td>
			<td rowspan='3' >
				<div id='home-content'>
				<p>
				<?php
				echo '					<div class="floating-box" style="border: 1px solid black;" id="searchMe">					<b><h3>'. $phpFname . '</h3></b>					<h5>'. $row['Lname'] . '</h5>					<li> DOB: '. $row['DOB'] . '</li>					<li> Sex: '. $row['Sex'] . '</li>					<li>Last Visit: 365 days ago</li>					';
				?>
				<a class="button" onclick="document.getElementByID('provider-overlay').style.display='block;'">Change Provider</a></div>
				</p>
				</div>
			</td>
		</tr>
		<tr>
			<td id='empanelment' class="large-side-button" onclick="empanelment()">
				Empanelment
			</td>
		</tr>
		<tr><td id='PCP'  class="large-side-button" onclick="PCP()">PCP</td></tr>			
	</table>
</div>



<script type="text/javascript">
	var str = "<?php echo $phpProviderName ?>"; // "A string here"
	
	function empanelment(){
		document.getElementById("home-content").innerHTML = "Reccomended Provider: " + str; 
	}
	function PCP(){
		document.getElementById("home-content").innerHTML = "TBD";
	}
	
	var patient_info=document.getElementById("home-content").innerHTML;
	
	function info(){
		document.getElementById("home-content").innerHTML = patient_info;
	}
	
</script>

</body>
</html>