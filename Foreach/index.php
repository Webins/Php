<html>
	<head>
		<title> For each </title>
	</head>
	<body>
	<h1> For each <h1>
	<?php
	$numbers = array(10, 20, 332, 323, 22, 90, 990, 21, 545, 77);
	foreach($numbers as $num)
		echo "number : $num  <br> ";
	
	$foot_players = array(
	"Barcelona" => array("Leo messi", "Antoine Griezman", "Luis Suarez"), 
	"Real Madrid" => array("Karim Benzema", "Luka Modric", "Toni Kroos"), 
	"Manchester City" => array("Kun Aguero", "Bernardo Silva", "Kevin de Bruyne"),
	"Juventus" => array("Cristiano Ronaldo", "Paulo Dybala", "Gonzalo Higuain"));
	
	
	foreach($foot_players as $team=>$players){
		echo "<h1> Team: $team <h1>"; 	
		echo "<div> Players: ";		
		foreach($players as $player){
			echo "<li>$player</li>";
		}
		echo "</div>";
	}

	$food_arr = array(
		"Item_id" => 1574,
		"name" => "Pizza",
		"Region" => "Italy",
		"side_food" => "Pasta",
		"Package_Price" => 100	
	);
	
	echo "<hr>";
	foreach($food_arr as $key => $value){
		$data = ucwords(str_replace("_", " ", $key));
		if($key == "Package_Price")
			if(!(is_numeric($value)))
				$value = "Can not be determined";
			
		echo "<h3>$data: $value </h3> <hr>";		
	}
		

	?>
	</body>
</html>
