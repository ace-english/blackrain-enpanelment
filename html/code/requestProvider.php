<!DOCTYPE html>
<html>
<head>
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
    <a href="http://localhost:80/BOHome.php" class="item_menu">Home</a>
    <a href="http://localhost:80/searchpatient.php" class="item_menu">Search Patients</a>
    <a href="http://localhost:80/searchprovider.php" class="item_menu">Search Providers</a>
    <a href="http://localhost:80/requestProvider.php" class="item_menu">Request Page</a>
    <a href="http://localhost:80/index.php" class="item_menu">Logout</a>
  </nav>
  <!-- Hamburger Side bar Menu End-->
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