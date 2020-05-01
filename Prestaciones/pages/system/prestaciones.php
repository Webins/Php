<?php 
if (!isset($_SESSION["username"])) {
    $_SESSION["no_log"] = true;
    echo "<script>
    location.href=\"../index.php\";
    </script>
    ";
}


?>

<header class="header text-black mt-3 third-color">
    <center>
        <h1 style="font-size:2.5vw" class="ml-3 pt-2 pb-4">Prestaciones <i class="fas fa-money-bill"></i></i></h1>
    </center>
    <hr>
</header>