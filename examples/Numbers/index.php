<html>
	<head>
		<title> Numbers </title>
	</head>
	<body>
	<h1> Numbers <h1>
	<?php
	$first_number = 3;
	$second_number = 4;
	$third_number = 3.6545;
	//functions
	echo "<br>Ceil: " . ceil($third_number);
	echo "<br>Floor: " .floor($third_number);
	echo "<br> $first_number is integer? " . is_int($first_number);
	echo "<br> $third_number is integer? " . is_int($third_number);
	echo "<br> $first_number is float? " . is_float($first_number);
	echo "<br> $first_number is double? " . is_double($first_number);
	echo "<br> $third_number is float? " . is_float($third_number);
	echo "<br> $third_number is double? " . is_double($third_number);
	echo "<br> $third_number is numeric? " . is_numeric($third_number);
	echo "<br> $second_number is numeric? " . is_numeric($second_number);
	echo "<br> Decimal To binary $first_number: " . decbin($first_number);
	echo "<br> Decimal To binary $third_number: " . decbin($third_number);
	echo "<br> Binary to decimal 1010101: " . bindec(1010101);
	echo "<br> square root: " . sqrt($second_number);
	echo "<br> abs: " . abs(-50);
	echo "<br> pow: " . pow(3,2);
	echo "<br> module of: " . fmod(15, 7);
	echo "<br> module of: " . fmod(4, 2);
	echo "<br> Rand number without a range: " .rand();
	echo "<br> Rand number with range (10,20): " .rand(10, 20);
	?>
	</body>
</html>
