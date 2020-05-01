<?php
echo "<html>
	<head>
		<title> URLs </title>
	</head>
	<body>
		<h1> <center>Enter a name </center> </h1>
		<center> <form method=\"post\">
			<input id =\"name\" name =\"name\" size=25> 
			<input class=\"formbutton\" type=\"submit\" name=\"Submit\" value=\"Submit\" 
			style=\"font-weight:bold; font-family:verdana; font-size: 10pt; color:#004080\">
			";
	if(isset($_POST["Submit"])){
		if(empty($_POST["name"])){
			echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"solid 3px red\";
			</script>
			";
		}
		else if(!preg_match("/^[A-Za-z\s]+$/", $_POST["name"])){
			echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"solid 3px red\";
			</script>
			";
		}
		else{
			echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"default\";
			</script>
			";
			$href = urlencode($_POST["name"]);
			
				$anchor = "<center><a href=\"file2.php?name=${href}\" 
				style=\"font-weight: bold; font-family: 
				verdana; color:#004080; font-size: 10pt;\" name =\"link\">See the entered name </a> </center>";
				echo $anchor;
		}
	}

	echo "</form> </center>	
	</body>
	</html>";

?>