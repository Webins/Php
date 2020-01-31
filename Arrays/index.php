<html>
	<head>
		<title> Arrays </title>
	</head>
	<body>
	<h1> Arrays <h1>
	<?php
	$names_arr = array("Juan", "Pedro", "Jason");
	for($i =0; $i < 3 ; $i++){
		echo $names_arr[$i] . "<br>";
	}
	$var1=221211;
	$food_arr = array("Pizza", 10, 15, "Burguer", array("Asian", "Italian", "American"), 2.199);
	echo "<br> Asian: " . $food_arr[4][0];
	echo "<br> American: " . $food_arr[4][2];
	echo "<br> pos 5:" . $food_arr[5];
	echo "<br>";
	echo "<br> Description of array: <br> "; 
	echo"<pre>" ;
	print_r($food_arr);
	echo "</pre>";

	//associative arrays
	$assoc_arr = array("A"=> 40, "B" => "Pizza");
	echo "<br>". $assoc_arr["A"];
	echo "<br>".$assoc_arr["B"];
	$food_asoc = array("Asian" => array("Sushi", "Ramen"), "American" => array("Burguer", "Hotdogs"), 
										"Italian" => array("Pizza", "Pasta"));
	echo "<br>". $food_asoc["Asian"][0];
	echo "<br>". $food_asoc["American"][1];
	echo "<br>". $food_asoc["Italian"][0];

	echo "<pre>";
		print_r($food_asoc);
	echo "</pre>";

	//Array functions
	array_push($names_arr, "Luis");
	array_push($names_arr, "Gary");
	echo "<br>". array_pop($names_arr);
	echo "<br>". array_pop($names_arr);
	echo "<br>". array_pop($names_arr);
	array_push($names_arr, "Carlos");

	$numbers_arr = array();

	for($i=0; $i < 10; $i++){
		array_push($numbers_arr, rand(1, 100));
		echo "<br>" .$numbers_arr[$i];
	}

	echo "<br>Size: " . count($numbers_arr);
	echo "<br>Max element: " .max($numbers_arr);
	echo "<br>Min element: " .min($numbers_arr);
	echo "<br>Yes/no: " . in_array(1, $numbers_arr);
	echo "<br> Sort: " . sort($numbers_arr);
	print_r($numbers_arr);
	echo "<br> reverse sort: " . rsort($numbers_arr);
	print_r($numbers_arr);

	$words_to_glue = array("This", "is", "a", "complete", "phrase", "to", "connect");
	echo "<br> Implode: " . implode(" ", $words_to_glue);
	$string_to_split = "This is a complete phrase to connect";
	echo "<br> Explode: ";
	print_r( explode(" ", $string_to_split));


	echo "<hr> Pointers <br>";
	
	$arr_numbers = array(10, 20, 30, 40, 50, 60, 80, 999);
		echo "[" . current($arr_numbers);
		next($arr_numbers);
		echo " " . current($arr_numbers);
		next ($arr_numbers);
		echo " " . current($arr_numbers);
		next ($arr_numbers);
		echo " " . current($arr_numbers);
		next ($arr_numbers);
		echo " " . current($arr_numbers);
		next ($arr_numbers);
		echo " " . current($arr_numbers);
		echo " " . end($arr_numbers);
	echo "] <br>" ;
	?>
	</body>
</html>
