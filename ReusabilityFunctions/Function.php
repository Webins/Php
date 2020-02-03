	<?php
	function add($num1, $num2){
		echo "<h1>Result is:". ($num1+$num2)."</h1>";
	}
	function divide($num1, $num2){
		if($num2 != 0) return ($num1 / $num2);
		else return "Can not divide 0";	
	}
	?>
