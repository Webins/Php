<html>
	<head>
		<title> Constant </title>
	</head>
	<body>
	<h1> Constants: <h1>
	<?php
	//Constant
	define("PI", 3.14); // arg1:name, arg2: val;
	define("RADIO", 18.98); 
	const max_value = 100;
	$area = RADIO * (PI * PI);
	echo "<p>";
	if($area < max_value){
		echo "<br>The area of the radio of: " .RADIO;
		echo " is: " .$area;
	}else 
		echo "<br>The area of the radio of " .RADIO ." is greater than 100 and his value is " .$area;
	echo "</p>";
	?>
	</body>
</html>
