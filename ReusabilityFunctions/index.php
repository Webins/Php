<html>
	<head>
		<title> Reusability </title>
	</head>
	<body>
	<h1> Reusability <h1>

	<?php
	require_once("Function.php");
	add(5,7);
	echo "<h1>The division of 4 in 0 is: ". divide(4,0) . "</h1>";
	// echo $ok; error
	?>
	</body>
</html>
