<?php
require_once("./database/Admins.php");
?>
<section class="container-fluid py-2 mb-4">
    <center>
        <div id="display-msg">
        </div>
    </center>
    <?php

    if(isset($_SESSION["no_log"]) && $_SESSION["no_log"] == true){
        echo "<script> display_error(\"Necesitar iniciar sesion primero\",10) </script>"; 
        unset ($_SESSION["no_log"]);
    }
    if(isset($_SESSION["success_register"])){
        if($_SESSION["success_register"] == true){
            echo "<script> display_success(\"El administrador se ha registrado correctamente!\",15)</script>";
        }
        else echo "<script> display_error(\"Un error con la base de datos ha ocurrido, intenta mas tarde\",15) </script>"; 
        unset($_SESSION["success_register"]);
    }
?>
    <div class="row mt-4">
        <div class="col offset-lg-3 col-lg-6">
            <form class="font-weight-bold" id="form" method="post">
                <div class="card bg-opt">
                    <div class="card-header badge-secondary bg-main">
                        <h1 class="new-category ">Iniciar Sesion</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user"><span class="secondary-color">
                                    <p>Administrador</p>
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <small class="input-group-text text-white bg-main"><i class="fas fa-user"></i></small>
                                </div>
                                <input id="input" class="form-control" type="text" name="username" placeholder="Usuario" required />
                            </div>
                            <label for="password"><span class="secondary-color">
                                    <p>Contraseña</p>
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <small class="input-group-text text-white bg-main"><i class="fas fa-lock"></i></small>
                                </div>
                                <input id="input" class="form-control" type="password" name="password" placeholder="Contraseña" required />

                                <button type="submit" name="submit" class="mt-3 btn btn-block bg-main text-white">Entrar <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                        <a target="" href="index.php?pages=register" class="btn bg-third float-right text-white">Registrar nuevo Admin <i class="fas fa-user-circle"></i></a>
                        <a href="index.php?pages=recover_pass" class="mr-4 btn bg-opt float-right font-weight-bold third-color">Olvide mi Contraseña <i class="fas fa-key"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById("form").addEventListener("keydown", () => {
        document.getElementById("display-msg").style.display="none"
    })
</script>

<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM Admins  WHERE BINARY username=\"$username\" AND BINARY password=\"$password\"";
    $adm = new Admin();
    $exists = $adm->search($query);
    if ($exists != null) {
        $_SESSION["username"] = $exists[0]->get_username();
        $_SESSION["password"] = $exists[0]->get_password();
        $_SESSION["id"] = $exists[0]->get_id();
        $_SESSION["log_correctly"] = true;
        $_SESSION["last_log"] = $adm->get_last_login();
        if($_SESSION["last_log"] == null) $_SESSION["last_log"] = get_time();
        unset($exists);
        unset($_SESSION["no_log"]);
        echo "<script>
        location.href=\"./pages/home.php\"
        </script>";
    } else {
        echo "<script> display_error(\"El nombre de usuario o contrasena es incorrecta, intenta de nuevo\", 10) </script>";
    }
}

?>