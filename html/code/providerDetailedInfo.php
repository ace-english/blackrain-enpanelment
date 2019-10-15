<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<form>
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
  <h2>Display Provider information</h2>
  <table>
    <tr>
      <td align="right">First Name:</td>
      <td align="left"><input type="text" name="first" /></td>
    </tr>
    <tr>
      <td align="right">Last Name:</td>
      <td align="left"><input type="text" name="last" /></td>
    </tr>
    <tr>
      <td align="right">NPI:</td>
      <td align="left"><input type="text" name="npi" /></td>
    </tr>
        <tr>
      <td align="right">Taxonomy:</td>
      <td align="left"><input type="text" name="Taxonomy" /></td>
    </tr>
        <tr>
      <td align="right">Provider ID:</td>
      <td align="left"><input type="text" name="ProID" /></td>
    </tr>
        <tr>
      <td align="right">Gender Code:</td>
      <td align="left"><input type="text" name="Gender" /></td>
    </tr>
        <tr>
      <td align="right">Available:</td>
      <td align="left"><input type="text" name="Avail" /></td>
    </tr>
        <tr>
      <td align="right">Language:</td>
      <td align="left"><input type="text" name="Language" /></td>
    </tr>
        <tr>
      <td align="right">Title:</td>
      <td align="left"><input type="text" name="Title" /></td>
    </tr>
        <tr>
      <td align="right">Ethnicity:</td>
      <td align="left"><input type="text" name="Ethnicity" /></td>
    </tr>
            <tr>
      <td align="right">Exception 1:</td>
      <td align="left"><input type="text" name="SubID1" /></td>
    </tr>    
    <tr>
      <td align="right">Exception 2:</td>
      <td align="left"><input type="text" name="SUBID2" /></td>
    </tr>
<tr>
      <td align="right">Exception 3:</td>
      <td align="left"><input type="text" name="Ex3" /></td>
    </tr>
    <tr>
      <td align="right">Status:</td>
      <td align="left"><input type="text" name="Status" /></td>
    </tr>
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