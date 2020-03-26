<html>
	<head>
		<title>Php contact form</title>
		<style type="text/css">
			input{
				border: 1px solid black;
				margin-right: 1em;
			}
		</style>
	</head>
	<body>
		<form name="form" method="post" action="formValidation.php">
			<table bgcolor=cornsilk style="border-collapse: collapse" bordercolor="#111 cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td style="font-family: verdana; font-size: 10pt; padding-bottom: 10px; padding-right: 4px;" align="right">
						<b><font color=#CC0000>*</font><font color=#004080> Name:</font></b>
					</td>
					<td> <font color="#006600"><b> <input id ="name" size=25 name="Name"> <?php check_for_name() ?> </b></font></td> 
			    </tr>
				<tr>
					<td style="padding-bottom: 10px; padding-right: 4px; font-family: verdana; font-size: 10pt" align="right">
						<b><font color=#CC0000>*</font><font color=#004080> Email:</font></b></td>
					<td> <font color="#006600"><b><input id ="email" size=25 name="Email"><?php check_for_email() ?></b></font></td>
				</tr>	
				<tr>
					<td style="padding-bottom: 10px; padding-right: 4px;font-family: verdana; font-size: 10pt" align="right">
						<b><font color="#004080">Address:</font></b></td>
					<td> <font color="#006600"><b><input size=25 name="Address" style="float: left"></b></font></td>
				</tr>
				<tr>
					<td style="padding-bottom: 10px; padding-right: 4px;font-family: verdana; font-size: 10pt" align="right">
						<b><font color="#004080">Web site:</font></b></td>
					<td> <font color="#006600"><b><input id ="website" size=25 name="Website" style="float: left"><?php check_for_website() ?></b></font></td>
				</tr>
				<tr>
					<td style="padding-bottom: 10px; padding-right: 4px;font-family: verdana; font-size: 10pt" align="right">
					<b><font color=#CC0000>*</font><font color="#004080"> Gender:</font></b></td>
					<td> <font color="#006600">
						<b>
							<div style = "display:flex">
							<input type="radio" name="Gender" value ="female" style="color:#004080">Female
							<input type="radio" name="Gender" value = "male"  style="color:#004080">Male
							<input type="radio" name="Gender" value = "other" style="color:#004080">Other
							</div>
							
						<?php check_for_gender() ?>
						</b>
					</font> </td>
				</tr>
				<tr>
					<td style="padding-bottom: 10px; padding-right: 4px;font-family: verdana; font-size: 10pt" align="right">
						<b> <font color=#CC0000>*</font><font color="#004080"> Contact No:</font> </b>
					</td>
					<td> <font color="#006600"><b><input id ="phone" size=25 name="Phone" style="float: left"> <?php check_for_phone()?> </b></font></td>
				</tr>
				<tr>
					<td colspan=2 style="font-family: verdana; font-size: 10pt">
						<font color="#004080"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Message</b>
						</font><b><font color="#006600">:</font></b>
					</td>
				</tr>
				<tr>
					<td colspan=2 align=center><textarea name="Message" rows=5 cols=35></textarea></td>
				</tr>
				<tr>
					<td colspan=2 align=center><input class="formbutton" type=submit name="Submit" value="Submit" 
					style="font-weight:bold; font-family:verdana; font-size: 10pt; color:#004080"></td>
				</tr>
				<tr>
					<td colspan=2 align=center style="font-family: verdana; font-size: 10pt">
						<small>A <font color=red>*</font> indicates a field is required</small>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>


<?php
function check_for_name(){
	$name_error;
	if(isset($_POST["Submit"]) && empty($_POST["Name"])){
		$name_error = "*Name is required*";
		echo "<small style=\"color: red;\">" . $name_error . "</small>";
		echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"solid 3px red\";
			</script>
		";
	}
	else if(!empty($_POST["Name"]) && !preg_match("/^[A-Za-z\s]+$/", $_POST["Name"])){
		$name_error="*Enter a valid name*";
		echo "<small style=\"color: red;\">" . $name_error . "</small>";
		$_POST["Name"] ="";
		echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"solid 3px red\";
			id.style.border = \"default\";
			</script>
		";
	}
	else {
		echo "";
		echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"default\";
			</script>
		";
	}
	}
function check_for_email(){
	$email_error = "*Email is required*";
	if(isset($_POST["Submit"]) && empty($_POST["Email"]))
		echo "<small style=\"color: red;\">" .$email_error. "</small>";
	else if(!empty($_POST["Email"]) && !preg_match("/^[a-zA-Z_\.0-9]{3,}@[a-z]+\.com$/", $_POST["Email"])){
		$email_error="*Enter a valid email*";
		echo "<small style=\"color: red;\">" . $email_error . "</small>";
		$_POST["Email"] ="";
	}
	else echo "";
}
function check_for_phone(){
	$phone_error = "*Contact Phone is required*";
	if(isset($_POST["Submit"]) && empty($_POST["Phone"]))
			echo "<small style=\"color: red;\">" . $phone_error . "</small>";
	else if(!empty($_POST["Phone"]) && !preg_match("/^(0414|0412|0424|0416|0212)[0-9]{7}$/", $_POST["Phone"])){
		$phone_error="*Enter a valid phone number*";
		echo "<small style=\"color: red;\">" . $phone_error . "</small>";
		$_POST["Phone"] ="";
	}
	else echo "";
}
function check_for_gender(){
	$gender_error = "*Gender is required*";
	if(isset($_POST["Submit"]) && (empty($_POST["Gender"]))){
		echo "<small style=\"color: red;\">" .$gender_error . "</small>";
		$_POST["Gender"] ="";
	}
	else echo "";
}

function check_for_website(){
	$website_error = "*Enter a valid website*";
	if(isset($_POST["Submit"]) && !empty($_POST["Website"]) && 
	   !preg_match("/^(https|http|ftp|www)(:([\/]{2})|\.)[a-zA-Z].*?\.(com|.*)$/", $_POST["Website"])){
		echo "<small style=\"color: red;\">" .$website_error . "</small>";
		$_POST["Website"] ="";
	}
	else echo "";
}
if(isset($_POST["Name"]) && isset($_POST["Email"]) && isset($_POST["Phone"]) && isset($_POST["Gender"]))
	if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Phone"]) && !empty($_POST["Gender"])){
		send_mail($_POST["Name"],$_POST["Email"],$_POST["Phone"], $_POST["Gender"]);
}

function send_mail($name, $email, $phone, $gender){
	$to = "some_email@gmail.com";
	$subject = "PHP form";
	$msg = "Name: ${name}\nEmail: ${email}\nContact no: ${phone}\nGender: ${gender}";
	if(mail($to, $subject, $msg)){
		echo "<div style=\"border: 1px solid green\"><small>Information Delivered</small></div>";
	}else{
		echo "<div style=\"border: 1px solid red\"><small>Couldn't send the information</small></div>";
	}

}

?> 