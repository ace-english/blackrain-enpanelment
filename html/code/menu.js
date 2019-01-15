
window.onload = function () { 

	var headerHTML="<tr><td><img src='img/menu.png' align='middle' href='index.html' id='hamburger'>CT# - <span id='ct-num'> 1234567890</span></td><td style='width:60%;'></td><td><img src='img/bell.png' align='middle' >	USER ID	<span id='user-id'>_________</span>	</tr>";

	document.getElementById("patient-info-header").innerHTML=headerHTML;
	
	
	var menuHTML="<div class='side_menu'><ul><li><a href=''>« Hide</a></li><li><a href='login.html'>Log In</a></li><li><a href='addpatient.html'>Add Patient</a></li><li><a href='code/searchPatient.php'>Patient Search</a></li><li><a href='code/getpatientinfo.php'>View Database</a></li><li><a href=''>Page</a></li><li><a href=''>Page</a></li></ul></div>";
	
	document.getElementById("side_menu_container").innerHTML=menuHTML;
	
	$("#hamburger").click(function(){
		$("#side_menu_container").toggle();
	});
	
	
	
};