<html>
	<head>
		<title> Global Variable </title>
	</head>
	<body>
	<h1> Global Variable <h1>
	<?php
	$local_var = 4;
	function my_func(){
		// Error local_scope echo "<h1> $local_var <h1>";	
		global $local_var;
		echo "<h1>  $local_var <h1>";	
	}
	my_func();
	?>
	</body>
</html>
