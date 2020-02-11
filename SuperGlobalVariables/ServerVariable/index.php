<html>
	<head>
		<title> Server Variable </title>
	</head>
	<body>
	<center><h1> Server Variable <h1> </center>
	<?php

	echo "<h1> NAME OF THE FILE: " . $_SERVER['PHP_SELF'] . "<h1>";
	//echo "<h1>" . $_SERVER['argv'] . "<h1>"; for commandline 
	echo "<h1> GATEWAY INTERFACE: " . $_SERVER['GATEWAY_INTERFACE'] . "<h1>";
	echo "<h1> IP ADDRESS: " . $_SERVER['SERVER_ADDR'] . "<h1>"; 
	echo "<h1> SERVER NAME: " . $_SERVER['SERVER_NAME'] . "<h1>"; 
	echo "<h1> SERVER SOFTWARE: " . $_SERVER['SERVER_SOFTWARE']. "<h1>"; 
	echo "<h1> SERVER PROTCOLl: " . $_SERVER['SERVER_PROTOCOL'].  "<h1>"; 
	echo "<h1> REQUEST METHOD: ". $_SERVER['REQUEST_METHOD']. "<h1>"; 
	echo "<h1> REQUEST TIME: ". $_SERVER['REQUEST_TIME']. "<h1>"; 	
	echo "<h1> QUERY STRING: ". $_SERVER['QUERY_STRING']. "<h1>"; 	
	echo "<h1> HTTP ACCEPT: ". $_SERVER['HTTP_ACCEPT']. "<h1>"; 	
	echo "<h1> HTTP ACCEPT CHARSET: ". $_SERVER['HTTP_ACCEPT_CHARSET']. "<h1>"; 
	echo "<h1> HTTP HOST: ". $_SERVER['HTTP_HOST']. "<h1>"; 
	echo "<h1> HTTP REFERER: ". $_SERVER['HTTP_REFERER']. "<h1>"; 
	echo "<h1> HTTP USER AGENT: ". $_SERVER['HTTP_USER_AGENT']. "<h1>"; 
	echo "<h1> HTTPS: ". $_SERVER['HTTPS']. "<h1>"; 
	echo "<h1> REMOTE ADDRESS: ". $_SERVER['REMOTE_ADDR']. "<h1>"; 
	echo "<h1> REMOTE HOST: ". $_SERVER['REMOTE_HOST']. "<h1>"; 
	echo "<h1> REMOTE PORT: ". $_SERVER['REMOTE_PORT']. "<h1>"; 
	echo "<h1> REMOTE HOST: ". $_SERVER['REMOTE_HOST']. "<h1>"; 
	echo "<h1> SCRIPT FILENAME: ". $_SERVER['SCRIPT_FILENAME']. "<h1>"; 
	echo "<h1> SERVER ADMIN: ". $_SERVER['SERVER_ADMIN']. "<h1>"; 
	echo "<h1> SERVER PORT: ". $_SERVER['SERVER_PORT']. "<h1>"; 
	echo "<h1> SERVER SIGNATURE: ". $_SERVER['SERVER_SIGNATURE']. "<h1>"; 
	echo "<h1> SCRIPT NAME: ". $_SERVER['SCRIPT_NAME']. "<h1>"; 
	echo "<h1> SCRIPT URI: ". $_SERVER['SCRIPT_URI']. "<h1>"; 
	echo "<pre>" . print_r($_SERVER) . "</pre> <br>";
	?>
	</body>
</html>



