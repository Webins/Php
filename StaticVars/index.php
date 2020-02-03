<html>
	<head>
		<title> Static Variables </title>
	</head>
	<body>
	<h1> Static Variables <h1>
<?php
	function normalV(){
		$value =1;	
		echo (++$value) . "<br>";
	}
	
	function staticV(){
		static $value =1;	
		echo (++$value) . "<br>";
	}

echo "Normal: <br>";
for($i =0; $i < 5; $i++)
	normalV();

echo "Static: <br>";
for($i =0; $i < 5; $i++)
	staticV();

?>
	</body>
</html>
