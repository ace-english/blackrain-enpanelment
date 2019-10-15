
<?php
require_once 'dbconfig.php';
session_start();

$_SESSION['regName'] = $regValue; 
try {
  $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  //$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  //if(empty($_POST[FNameText]) && empty($_POST[LNameText]) && empty($_POST[DOBText])){
    //$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
 
    //$q = $pdo->prepare("SELECT FName,LName,DOB,MRN FROM patient WHERE MRN = :MRN ORDER BY FName ASC");
    //$temp = $_POST[MRNText]; // assigned here
    //$q->bindParam(':MRN',$temp);
    //$q->execute();
    //$q->setFetchMode(PDO::FETCH_ASSOC);
  //}else{
    //$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $q = $pdo->prepare("SELECT * FROM patient WHERE FName = :FName || LName = :LName || DOB = :DOB || MRN = :MRN ORDER BY FName ASC");
    $temp1 = $_POST[FNameText]; // assigned here
    $temp2 = $_POST[LNameText];
    $temp3 = $_POST[DOBText];
    $temp4 = $_POST[MRNText];
    $q->bindParam(':FName',$temp1);
    $q->bindParam(':LName',$temp2);
    $q->bindParam(':DOB',$temp3);
    $q->bindParam(':MRN',$temp4);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
  }
//}
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  label, input {
    display: block;
  }

  label {
    margin-bottom: 20px;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <!-- Hamburger Side bar Menu-->
  <div class="top">
      <a href="#" class="menu_icon"><i class="material-icons">dehaze</i></a>
    </div>
  <nav class="menu">
    <a href="http://localhost:80/FOHome.php" class="item_menu">Home</a>
    <a href="http://localhost:80/searchpatient.php" class="item_menu">Search Patients</a>
    <a href="http://localhost:80/searchprovider.php" class="item_menu">Search Providers</a>
    <a href="http://localhost:80/index.php" class="item_menu">Logout</a>
  </nav>
  <!-- Hamburger Side bar Menu End-->

  <form action="" method="post">
    <label>
    First Name:
    <input type="text" name="FNameText"/>
    </label>
    <label>
    Last Name:
    <input type="text" name="LNameText"/>
    </label>
    <label>
    Date of Birth:
    <input type="text" name="DOBText"/>
    </label>
    <label>
    MRN:
    <input type="text" name="MRNText"/>
    </label>
    <input type="submit" name="SubmitButton"/>
  </form>
  <div id="container">
            <h1>Patients</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>MRN</th>
                        <th>PatientID</th>
                        <th>Gender</th>
                        <th>Sex</th>
                        <th>Language</th>
                        <th>Race</th>
                        <th>Ethnicity</th>
                        <th>Insurance1</th>
                        <th>HealthPlanID1</th>
                        <th>SubscriberID1</th>
                        <th>SubscriberID2</th>
                        <th>View</th>
                    </tr>
                     <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['FName']) ?></td>
                            <td><?php echo htmlspecialchars($row['LName']); ?></td>
                            <td><?php echo htmlspecialchars($row['DOB']); ?></td>
                            <td><?php echo htmlspecialchars($row['MRN']); ?></td>
                            <td><?php echo htmlspecialchars($row['PatientID']) ?></td>
                            <td><?php echo htmlspecialchars($row['Gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['Sex']); ?></td>
                            <td><?php echo htmlspecialchars($row['Language']); ?></td>
                            <td><?php echo htmlspecialchars($row['Race']) ?></td>
                            <td><?php echo htmlspecialchars($row['Ethnicity']); ?></td>
                            <td><?php echo htmlspecialchars($row['Insurance1']); ?></td>
                            <td><?php echo htmlspecialchars($row['HealthPlanID1']); ?></td>
                            <td><?php echo htmlspecialchars($row['SubscriberID1']) ?></td>
                            <td><?php echo htmlspecialchars($row['SubscriberID2']); ?></td>
                            <form method="post" action="http://localhost:80/patientDetailedInfo.php">
                              <input type="hidden" name= "regName" value= "">
                              <td><input type="submit" ></td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </thead>
            </table>

</body> 
<!-- Javascript to open the side menu -->
<script type="text/javascript">
  $(document).ready(function() {
  $("body").on('click', '.top', function() {
    $("nav.menu").toggleClass("menu_show");
  });
});
</script>
<!-- Javascript to open the side menu end-->
</html>