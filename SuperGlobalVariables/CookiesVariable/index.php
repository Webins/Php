

<?php
setcookie("cookie_name", "content", (time()) +86400, "/");
setcookie("Age", "24", (time()) + 86400, "/");
echo $_COOKIE["cookie_name"]; // will display content;
echo "<br>". $_COOKIE["Age"]; //will display 24
//unset
setcookie("cookie_name", "", (time()) -86400, "/");
if(isset($_COOKIE["cookie_name"])){
    echo "Cookie is set";
}else echo "Cookie was unset";
?>



