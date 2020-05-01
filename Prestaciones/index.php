


<?php
session_start();
require_once("./src/date.php");
require_once("./database/Admins.php");
if(isset($_SESSION["username"])){
    echo "<script>
        location.href=\"./pages/home.php\"
    </script>";
}
if(isset($_GET["no_log"]) && $_GET["no_log"] == true){
    $_SESSION["no_log"] = true;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/index.css" />
    <link type="text/css" rel="stylesheet" href="./css/notFound.css" />
    <link rel="stylesheet" href="assets/fonts/css/all.css" />
    <link rel="icon" href="assets/uah_logo.png" />
    <script src="src/display_msg.js"></script>
</head>

<body>

    <nav class="nav-main bg-main nav font-weight-bold navbar-expand-lg navbar-light navbar-navbar">
        <strong>
            <a href="index.php">
                <img class="img-fluid float-left" src="./assets/uah_logo.png" alt="logo_uah" style="border-radius:100%;max-width:100%; height:10vw; width:10vw;" />
            </a>
        </strong>
        <div class="navbar-brand p-0 m-0 ml-2 align-self-center">
            <center>
                <h1 class="text-white">Universidad Alejandro de Humboldt</h1>
                <p class="text-white">
                    <h1 class="align-self-center text-white"> <i class="fa fa-university"></i></h1>
                </p>
            </center>
        </div>
        <ul class="navbar-nav ul-container ml-auto mr-4">
            <li class="li-nav nav-item align-self-center">
                <a href="index.php?pages=support" class="navbar-link">
                    <h2 class="text-white mr-3">Soporte <i class="fas fa-phone-square"></i></h2>
                </a>
            </li>
            <li class="li-nav nav-item align-self-center">
                <a href="index.php?pages=contact" class="navbar-link">
                    <h2 class="text-white mr-3">Contacto <i class="fas fa-address-book"></i></h2>
                </a>
            </li>
            <li class="li-nav nav-item align-self-center">
                <a target="_blank" href="http://unihumboldt.edu.ve/" class="navbar-link">
                    <h2 class="text-white mr-3">Acerca de nosotros <i class="fas fa-university"></i></h2>
                </a>
            </li>
        </ul>
    </nav>

    <?php
    if (isset($_GET["pages"])) {
        $page_name = $_GET["pages"];
        $page_directory = scandir("pages/login", 0);
        unset($page_directory[0], $page_directory[1]);
        if (in_array($page_name . ".php", $page_directory)) {
            include("pages/login/" . $page_name . ".php");
        } else {
            include("pages/notFound.php");
        }
    } else {
        include("pages/login/login.php");
    }
    ?>
</body>

</html>
