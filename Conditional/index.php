<html>
	<head>
		<title> Conditional </title>
	</head>
	<body>
	<h1> Conditional <h1>
	<?php
		$check_bouught = true;
		if($check_bouught)
			echo "<h1> Your bought is being processing <h1> <br><hr> <p> Please wait </p>";
		else
			echo "<h3> Go and buy something! <h3>";

		echo "<br> <hr>Switch staments <br>";
		
		$day = "Monday";

		switch($day){
			case "Monday" : echo "<h1> Today is monday <h1> <br>"; break;
			case "Tuesday" : echo "<h1> Today is Tuesday <h1><br>"; break;
			case "wednesday" : echo "<h1> Today is Wednesday <h1><br>"; break;
			case "Thursday" : echo "<h1> Today is Thursday <h1><br>"; break;
			case "Friday" : echo "<h1> Today is Friday <h1><br>"; break;
			case "Saturday" : echo "<h1> Today is Saturday <h1><br>"; break;
			case "Sunday" : echo "<h1> Today is Sunday <h1><br>"; break;
			default : echo "<h1> Are you sure that it is a day? <h1><br>";
		}

	?>
	</body>
</html>
