<html>
<head>
<title>Page Not Found</title>
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/kaiser.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="code/menu.js"></script>

</head>

<body>
	

	<script>
		function empanelment(){
			document.getElementById("home-content").innerHTML = orem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac porta justo, eu porta dolor. Nam interdum, lorem et pellentesque elementum, tortor sem gravida mi, id auctor sapien nibh vel neque. Cras magna magna, gravida ac porttitor eu, molestie nec justo. In ultricies mi quis ipsum interdum, a pulvinar mauris sollicitudin. Pellentesque dictum velit dapibus mauris dictum, sagittis commodo libero mattis. Nulla non metus eu augue convallis cursus. Curabitur vitae tortor eget libero faucibus dapibus aliquam et metus. Integer pulvinar dapibus massa, nec sagittis ex vulputate ac.<p>


		}
		function PCP(){
			document.getElementById("home-content").innerHTML = <?php
			echo "Hello";
			?>

		}
	</script>



<div class="tabs-inner" style="text-align:center;">
	<table class='home-table'>
		<tr><td id='empanelment' onclick="empanelment()">	EMPANELMENT </td>
		<td rowspan='2' >
		<div id='home-content'>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac porta justo, eu porta dolor. Nam interdum, lorem et pellentesque elementum, tortor sem gravida mi, id auctor sapien nibh vel neque. Cras magna magna, gravida ac porttitor eu, molestie nec justo. In ultricies mi quis ipsum interdum, a pulvinar mauris sollicitudin. Pellentesque dictum velit dapibus mauris dictum, sagittis commodo libero mattis. Nulla non metus eu augue convallis cursus. Curabitur vitae tortor eget libero faucibus dapibus aliquam et metus. Integer pulvinar dapibus massa, nec sagittis ex vulputate ac.<p><p>Praesent arcu enim, lacinia nec rhoncus at, lacinia quis dui. Maecenas vitae lacus metus. Donec rutrum pretium cursus. Vestibulum blandit quis quam ut pulvinar. Donec ut vestibulum risus, vitae maximus urna. Duis aliquam neque ut mi mattis dignissim. Aliquam erat volutpat. Donec eget dignissim quam. Sed dignissim urna nunc, vel placerat nisi tempus ut. </p>
	</div>
		</td></tr>
		<tr><td id='PCP' onclick="PCP()">PCP</td></tr>
		</table>
			
	</table>

</div>




</body>
</html>