<html>
	<head>
		<title> Functions </title>
	</head>
	<body>
	<h1> Functions <h1>

	<?php
	
	function scope1(){
		function scope2(){
			// $ok ="Todo ok"; error
			echo "Hello";
			function scope3(){
				echo " Again";
			}
		}
	/*scope3(); si hago esto declara la funcion y cuando vuelvo a llamar tira un error
	debido a que no puedo redeclarar la funcion*/
	}
	scope1();
	scope2();
	scope3();
	function add($num1, $num2){
		echo "<h1>Result is:". ($num1+$num2)."</h1>";
	}
	function divide($num1, $num2){
		if($num2 != 0) return ($num1 / $num2);
		else return "Can not divide 0";	
	}
	add(5,7);
	echo "<h1>The division of 4 in 0 is: ". divide(4,0) . "</h1>";
	// echo $ok; error
	?>
	</body>
</html>
