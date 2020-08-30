<html>
	<head>
		<title> Super Global Variables </title>
	</head>
	<body>
	<h1> Super Global Variables <h1>
	<?php
	$x = 75;
	$y = 15;

	function addition(){
		$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];	
	}
	addition();
	echo "$z <br>";
	echo "<pre>" . print_r($GLOBALS) . "</pre>";
	
	?>
	</body>
</html>
