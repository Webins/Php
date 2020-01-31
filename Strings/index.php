<html>
	<head>
		<title> Strings </title>
	</head>
	<body>
	<h1> Strings: <h1>
	<?php
	$name = 'Jose';
	$last_name = "Canceco";
	echo "<p>";
	echo "The name of the player is: $name $last_name";
	$combined = $name . " " . $last_name;
	echo "</p>";
	echo "Combined: $combined"; 

	echo "<h1> differences between double quotes and single quotes <h1>";
	echo "<div>";	
	echo "name double quotes: {$name} -----";
	echo 'name single quotes: $name';
	
	$phrase1 = "the students were thinking in ";
	$phrase2 = "steal the exam from the director's office";
	$phrase = $phrase1;
	$phrase .= $phrase2;
	echo "<br> $phrase";	
	echo "<br>". ucfirst($phrase);
	echo "<br>". ucwords($phrase);
 	echo "<br>". strtolower($phrase);
	echo "<br>". strtoupper($phrase);
	echo "<br> The changues are not by reference:  $phrase";
	echo "<br>". str_repeat($name, 5);
	echo "<br>". substr($phrase1, 10, 15);
	echo "<br>". strpos($phrase1, "students");
	echo "<br>". strchr($name, 's');
	echo "<br>". strlen($phrase);
	echo "<br>". "A" . trim(" B C D") ."E";
	echo "<br>". strstr($phrase, "exam");
	echo "<br>". str_replace("exam", "tests", $phrase);
	echo "</div>";
	?>
	</body>
</html>
