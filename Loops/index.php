<html>
	<head>
		<title> Conditional </title>
	</head>
	<body>
	<h1> Conditional <h1>
	<?php
	const days_num = 7;
	define("months_num", 12);
	$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September",
	"October", "November", "December");
	$days = array("Monday", "Thursday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	for($i =0, $j =0; $i < months_num; $i++){
		while($j < days_num){
			echo "<h3>" . $months[$i] . " ". $days[$j] . "<h3> <br>";
			$j++;
		}
		$j =0;
	}
	
	?>
	</body>
</html>
