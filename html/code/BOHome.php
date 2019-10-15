<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<header>
		<font size="6" color="white">DASHBOARD</font>
		<div class="top">
			<a href="#" class="menu_icon"><i class="material-icons">dehaze</i></a>
		</div>
	</header>
	<nav class="menu">
		<a href="http://localhost:80/BOHome.php" class="item_menu">Home</a>
		<a href="http://localhost:80/searchpatient.php" class="item_menu">Search Patients</a>
		<a href="http://localhost:80/searchprovider.php" class="item_menu">Search Providers</a>
		<a href="http://localhost:80/requestProvider.php" class="item_menu">Request Page</a>
		<a href="http://localhost:80/index.php" class="item_menu">Logout</a>
	</nav>
	<main>
		<h1>WELCOME</h1>
	</main>
	<footer>
		@blackrain-technologies copyright@2019
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function() {
	$("body").on('click', '.top', function() {
		$("nav.menu").toggleClass("menu_show");
	});
});
</script>
</html>