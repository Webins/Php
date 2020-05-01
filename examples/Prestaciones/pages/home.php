<?php
require_once("../src/date.php");
require_once("../database/Admins.php");
session_start();
if(isset($_COOKIE["exit"]) && $_COOKIE["exit"] == true){
    setcookie("exit", false, time() + (86400 * 30));
    $adm = new Admin();
    $adm->update_last_login($_SESSION["id"]);
    session_destroy();
    echo "<script>
    location.href=\"../index.php\"
    </script>";
}
if (!isset($_SESSION["username"])) {
    $_SESSION["no_log"] = true;
    echo "<script>
    location.href=\"../index.php\";
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

</script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de prestaciones</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link type="text/css" rel="stylesheet" href="../css/notFound.css" />
    <link rel="stylesheet" href="../assets/fonts/css/all.css" />
    <link rel="icon" href="../assets/uah_logo.png" />
    <script src="../src/jquery-3.5.0.min.js"></script>
    <script src="../src/popper.min.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script src="../src/display_msg.js"></script>
    <script src="../src/sweetalert.min.js"></script>
</head>

<body>

    <nav class="nav-main bg-main nav font-weight-bold navbar-expand-lg navbar-light navbar-navbar">
        <strong>
            <a href="./home.php">
                <img class="img-fluid float-left" src="../assets/uah_logo.png" alt="logo_uah" style="border-radius:100%;max-width:100%; height:10vw; width:10vw;" />
            </a>
        </strong>
        <div class="navbar-brand p-0 m-0 ml-2 align-self-center">

            <center>
                <h1 class=" font-weight-bold align-self-center text-white font-f">U</h1>
                <h1 class=" font-weight-bold align-self-center text-white font-f">&emsp; A</h1>
                <h1 class=" font-weight-bold align-self-center text-white font-f"> &emsp;&emsp; H</h1>

            </center>
        </div>
        <li class="ml-5 align-self-center">
            <h1 class="text-white">Sistema de prestaciones <i class="fa fa-cog"></i> </h1>
        </li>
        <div class="dropdown ml-auto mr-5 align-self-center text-white mt-2">
            <a class="btn dropdown-toggle text-white" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:1.6vw;">
                <h2><i class="fas fa-user-circle"></i> <?php echo $_SESSION["username"]; ?></h2>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="">
                    <h3>Perfil <i class="fas fa-user-lock text-primary"></i> </h3>
                </a>
                <a class="dropdown-item" href="">
                    <h3>Editar <i class="fas fa-user-edit text-secondary"></i></h3>
                </a>
                <a id="exit" class="dropdown-item">
                    <h3>Salir <i class="fas fa-user-times text-danger"></i></h3>
                </a>
            </div>
        </div>

    </nav>
    <script>
        const a = document.getElementById("exit")
        a.addEventListener("click", () => {
            swal({
                    title: "Estas seguro de salir?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.cookie="exit=true;"
                        location.reload()
                    } else {}
                });
        })
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3  bg-first text-black p-0">
                <div class="mt-4 wrapper text-center">
                    <h1 style="font-size: 4vw;"><i class="fas ml-2 fa-user-tie float-left"></i></h1>
                    <h2>Usuario: <?php echo $_SESSION["username"]; ?></h2>
                    <h3>Online <i class="fas fa-circle text-success text-center"></i></h3>
                </div>
                <hr>
                <a href="home.php?pages=dashboard"><h2 class="ml-3">Inicio <i class="fas fa-bookmark"></i></h2></a>
                <div class="container-fluid bg-main text-black mt-4 p-0">
                    <a href="home.php?pages=employees" style="border-radius:0; border-right:0;" class="list-group-item list-group-item-action bg-first">
                        <h3>Registro de Empleados<small class="float-right">&raquo;</small></h3>
                    </a>
                    <a href="home.php?pages=prestaciones" style="border-radius:0;border-right:0;" class="list-group-item list-group-item-action bg-first ">
                        <h3>Prestaciones<small class="float-right">&raquo;</small></h3>
                    </a>
                    <a href="home.php?pages=liquidacion" style="border-radius:0;border-right:0;" class="list-group-item list-group-item-action bg-first ">
                        <h3>Liquidacion<small class="float-right">&raquo;</small></h3>
                    </a>
                </div>
                <h3 class="ml-2 mt-5 mb-3 alert bg-third text-white mr-2">Ultima vez conectado: <?php 
               echo $_SESSION["last_log"] ?> </h3 class="mt-5">
            </div>
            <div class=" col-lg-9 p-0 bg-white">
                <?php
                if (isset($_GET["pages"])) {
                    $page_name = $_GET["pages"];
                    $page_directory = scandir("./system", 0);
                    unset($page_directory[0], $page_directory[1]);
                    if (in_array($page_name . ".php", $page_directory)) {
                        include("./system/" . $page_name . ".php");
                    } else {
                        include("./notFound.php");
                    }
                } else {
                    include("./system/dashboard.php");
                }
                ?>
            </div>
        </div>
    </div>

    <footer id="footer" class=" text-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Created by Kleiver&Carlos &copy; All right reserved <span id="date"></span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container-fluid container-footer">
                        <li class="ml-4 list-unstyled">
                            <a href="">
                                <h2 class="text-white">Twitter <img src="../assets/fonts/svgs/brands/twitter.svg" width="40vw"></h2>
                            </a>
                        </li>
                        <li class="ml-4 list-unstyled">
                            <a href="">
                                <h2 class="text-white">Facebook <img src="../assets/fonts/svgs/brands/facebook.svg" width="40vw"></h2>
                            </a>
                        </li>
                        <li class="ml-4 list-unstyled">
                            <a href="">
                                <h2 class="text-white">Google  <img src="../assets/fonts/svgs/brands/google.svg" width="40vw"></h2>
                            </a>
                        </li>
                        <li class="ml-4 list-unstyled">
                            <a href="">
                                <h2 class="text-white">Instagram  <img src="../assets/fonts/svgs/brands/instagram.svg" width="40vw"></h2>
                            </a>
                        </li>
                        <li class="ml-4 list-unstyled">
                            <a target="_blank" href="https://github.com/Webins">
                                <h2 class="text-white">Github  <img src="../assets/fonts/svgs/brands/github.svg" width="40vw"></h2>
                            </a>
                        </li>

                    </div>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>
