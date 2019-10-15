<?php
session_start();

$regValue = $_GET['regName'];

      require_once 'dbconfig.php';
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    $q = $pdo->prepare("SELECT * FROM patient WHERE PatientID = :PatientID ORDER BY FName ASC");
    $q->bindParam(':PatientID',$regValue);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  <form>

  <h2>Display Patient information</h2>
  <div id="container">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>MRN</th>
                    </tr>
                     <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['FName']) ?></td>
                            <td><?php echo htmlspecialchars($row['LName']); ?></td>
                            <td><?php echo htmlspecialchars($row['DOB']); ?></td>
                            <td><?php echo htmlspecialchars($row['MRN']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </thead>
            </table> 
</form>
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