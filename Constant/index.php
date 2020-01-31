<html>
	<head>
		<title> Untitled </title>
	</head>
	<body>
	<h1> Constants: <h1>
	<?php
	//Constant
	define("PI", 3.14); // arg1:name, arg2: val;
	define("RADIO", 9.12); 
	$area = RADIO * (PI * PI);
	echo "<p>";
	echo "The area of the radio of: " .RADIO;
	echo " is: " .$area;
	echo "</p>";
	?>
	</body>
</html>
