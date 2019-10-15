<?php
require_once 'dbconfig.php';
 
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
 
    $q = $pdo->prepare("SELECT FName,LName,NPI,Taxonomy1 FROM provider WHERE FName = :FName || LName = :LName || NPI = :NPI || Taxonomy1 = :Taxonomy1 ORDER BY FName ASC");
    $temp1 = $_POST[FNameText]; // assigned here
    $temp2 = $_POST[LNameText];
    $temp3 = $_POST[NPIText];
    $temp4 = $_POST[TaxonomyText];
    $q->bindParam(':FName',$temp1);
    $q->bindParam(':LName',$temp2);
    $q->bindParam(':NPI',$temp3);
    $q->bindParam(':Taxonomy1',$temp4);
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
    <a href="http://localhost:80/requestProvider.php" class="item_menu">Request Page</a>
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
    NPI:
    <input type="text" name="NPIText"/>
    </label>
    <label>
    Taxonomy:
    <input type="text" name="TaxonomyText"/>
    </label>
    <input type="submit" name="SubmitButton"/>
  </form>
  <div id="container">
            <h1>Providers</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NPI</th>
                        <th>Taxonomy</th>
                        <th>View</th>
                    </tr>
                     <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['FName']) ?></td>
                            <td><?php echo htmlspecialchars($row['LName']); ?></td>
                            <td><?php echo htmlspecialchars($row['NPI']); ?></td>
                            <td><?php echo htmlspecialchars($row['Taxonomy1']); ?></td>
                            <td><input id="btntest" type="button" value="View" onclick="window.location.href = 'http://localhost:80/providerDetailedInfo.php'" /></td>
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