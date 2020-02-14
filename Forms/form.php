<?php
    if(isset($_POST["submit"])){
        if((isset($username) && !empty($username)) && (isset($password) && !empty($password))){
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($username == "Kleiver" && $password ="123456789")
                echo "Welcome ". $username . "<br>";
            else 
                echo "Account doesn't exist. Try again!<br>";
        }
        else
            echo "Account doesn't exist. Try again!<br>";
        
    }else
        echo "<center><h4> Login required <h4></center>";

?>