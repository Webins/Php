<link rel="stylesheet" href="css/General.css">
<link rel="stylesheet" href="css/Pages/Contact.css">
<link rel="stylesheet" href="css/GeneralResponsive.css">

<section class="section">
    <div class="container">
	<form name="form" method="post">
			<table class="table">
				
				<tr>
					<td class="td">
						<b><font color=#CC0000>*</font><font color="white"> Name:</font></b>
					</td>
					<td> <font color="#006600"><b> <input id ="name" size=25 name="Name" style="float: left"> <?php check_for_name() ?> </b></font></td> 
			    </tr>
				<tr>
					<td class="td">
						<b><font color=#CC0000>*</font><font color="white"> Email:</font></b></td>
					<td> <font color="#006600"><b><input id ="email" size=25 name="Email" style="float: left"><?php check_for_email() ?></b></font></td>
				</tr>	
				<tr>
					<td class="td">
						<b><font color="white">Address:</font></b></td>
					<td> <font color="#006600"><b><input size=25 name="Address" style="float: left"></b></font></td>
				</tr>
				<tr>
					</div><td class="td">
						<b><font color="white">Web site:</font></b></td>
					<td> <font color="#006600"><b><input id ="website" size=25 name="Website" style="float: left"><?php check_for_website() ?></b></font></td>
				</tr>
				<tr>
					<td class="td">
					<b><font color=#CC0000>*</font><font color="white"> Gender:</font></b></td>
					<td> <font color="white">
						<b>
							<div style = "display:flex">
							<div class="element">
								<input type="radio" name="Gender" value ="female" style="color:white">Female	
							</div>
							<div class="element">
								<input type="radio" name="Gender" value = "male"  style="color:white">Male
							</div>
							<div class="element">
								<input type="radio" name="Gender" value = "other" style="color:white">Other	
							</div>
							</div>
							
						<?php check_for_gender() ?>
						</b>
					</font> </td>
				</tr>
				<tr>
					<td class="td">
						<b> <font color=#CC0000>*</font><font color="white"> Contact No:</font> </b>
					</td>
					<td> <font color="#006600"><b><input id ="phone" size=25 name="Phone" style="float: left"> <?php check_for_phone()?> </b></font></td>
				</tr>
				<tr>
					<td colspan=2 style="font-family: verdana; font-size: 10pt">
						<font color="white"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Message</b>
						</font><b><font color="#006600">:</font></b>
					</td>
				</tr>
				<tr>
					<td class="td-msg" colspan=2 align=center><textarea name="Message" rows=5 cols=35></textarea></td>
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
				<?php 
				if(isset($_POST["Name"]) && isset($_POST["Email"]) && isset($_POST["Phone"]) && isset($_POST["Gender"]))
				if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Phone"]) && !empty($_POST["Gender"])){
					send_mail($_POST["Name"],$_POST["Email"],$_POST["Phone"], $_POST["Gender"]);
			}
				?>
			</table>
		</form>

    </div> 
</section>
<section class="sidebar">
                <div class="sidebar_container">
                    <div class="sidebar_top10">
                        <center> <h1 class="sidebar_top10_title emphasize">TOP 10 MOVIES <span class="icon-video-camera"></span></h1> </center>
                        <li>
                            <a href="#">
                                1. Parasite
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                2. Joker
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                3. Avengers EndGame
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                4. The Irishman
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                5. Once upon a time in Hollywood
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                6. Toy Story 4
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                7. Marriage story
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                8. John Wick Chapter 3 Parabellum
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                9. 1917
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                10. Dolemite is my name
                            </a>
                        </li>
                    </div>
                    <div class="sidebar_month_mov">
                        <center> <h1 class="sidebar_month_mov_title emphasize">Movie Of The Month </span></h1>
                        <h2 class="title_mov">Joker <span class="icon-star"></h2>
                        <div class ="sidebar_month_mov_container">
                            <a href="#"> 
                                <img src="https://es.web.img3.acsta.net/pictures/19/09/17/17/03/5442885.jpg" alt="movie of the day" />
                            </a>
                        </div>
                        </center>
                    </div>
                    <div class="sidebar_cinema_container">
                        <img src="https://www.casabrunette.com/wp-content/uploads/2017/09/41-majesticbrookfield-exteriorjpg.jpg" alt="cinema_img"/>
                    </div>
            </section>








<?php
function check_for_name(){
	if(isset($_POST["Submit"]) && empty($_POST["Name"])){
		$name_error = "*Name is required*";
		echo "<small style=\"color: red; float: left;
		margin-left: 1rem;\">" . $name_error . "</small>";
		echo "
			<script type=\"text/javascript\">
			let id = document.getElementById(\"name\");
			id.style.border = \"solid 3px red\";
			</script>
		";
	}
	else if(!empty($_POST["Name"]) && !preg_match("/^[A-Za-z\s]+$/", $_POST["Name"])){
		$name_error="*Enter a valid name*";
		echo "<small style=\"color: red; float: left;
		margin-left: 1rem;\">" . $name_error . "</small>";
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
		echo "<small style=\"color: red;float: left;
		margin-left: 1rem;\">" .$email_error. "</small>";
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
			echo "<small style=\"color: red;float: left;
			margin-left: 1rem;\">" . $phone_error . "</small>";
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
		echo "<small style=\"color: red;float: left;
		margin-left: 1rem;\">" .$gender_error . "</small>";
		$_POST["Gender"] ="";
	}
	else echo "";
}

function check_for_website(){
	$website_error = "*Enter a valid website*";
	if(isset($_POST["Submit"]) && !empty($_POST["Website"]) && 
	   !preg_match("/^(https|http|ftp|www)(:([\/]{2})|\.)[a-zA-Z].*?\.(com|.*)$/", $_POST["Website"])){
		echo "<small style=\"color: red;float: left;
		margin-left: 1rem;\">" .$website_error . "</small>";
		$_POST["Website"] ="";
	}
	else echo "";
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