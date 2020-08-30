<?php 
require_once("./database/Admins.php");
    /* Validate functs */
    function check_name(&$msg){
        if(!preg_match("/^(?=.{3,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["name"])){
            $msg .= "El nombre debe contener de 3 a 30 caracteres y no contener numeros ni caracteres especiales";
            return false;
        }else return true;
    }
    function check_last_name(&$msg){
        if(!preg_match("/^(?=.{3,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["last_name"])){
            $msg .= "El apellido debe contener de 3 a 30 caracteres y no contener numeros ni caracteres especiales";
            return false;
        }else return true;
    }
    function check_address(&$msg){
        if(strlen($_POST["address"]) < 5 || strlen($_POST["address"]) >=50){
            $msg .= "Introduce una direccion valida entre 5 y 50 caracteres";
            return false;
        }else return true;
    }
    function check_username(&$msg){
        if(!preg_match("/^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $_POST["username"])){
            $msg .= "El nombre de usuario es incorrecto, evita el uso de multiples __ e introduce un usuario de 5 a 20 caracteres";
            return false;
        }
        $query = "SELECT * FROM Admins WHERE username=\"${_POST["username"]}\"";
        $adm = new Admin();
        $check_adm = $adm->search($query);
        if($check_adm != null){
            $msg .= "El nombre de usuario ya esta registrado, introduce otro";
            return false;
        } else return true;
    }
    function check_ci(&$msg){
        if(!preg_match("/^\d{7,8}$/", $_POST["ci"])){
            $msg .= "La cedula de identidad introducida es incorrecta";
            return false;
        }
        $query = "SELECT * FROM Admins WHERE ci=${_POST["ci"]}";
        $adm = new Admin();
        $check_adm = $adm->search($query);
        if($check_adm != null){
            $msg .= "La cedula introducida ya esta registrada, introduce otra";
            return false;
        } 
        else return true;
    }
    function check_password(&$msg){
        $pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W\_])[a-zA-Z0-9\W\_]{8,15}$/";
        if(!preg_match($pattern, $_POST["password"])){
            $msg.="La Contraseña debe contener de 8 a 15 caracteres, contener un caracter especial, digitos y una letra en mayusculas";
            return false;
        }else if($_POST["password"] != $_POST["confirm"]){
            $msg.= "La Contraseñas introducidas no son iguales, intenta de nuevo";
            return false;
        }else{
            return true;
        }
    }
?>
<section class="container-fluid py-2 mb-4">
    <center>
        <div id="display-msg">
        </div>
    </center>
    <div class="row mt-4">
        <div class="col offset-lg-3 col-lg-6">
            <form class="needs-validation" method="POST" id="form">
                <div class="card bg-opt">
                    <div class="card-header badge-secondary bg-main">
                        <h1 class="new-category ">Registrar Administrador <i class="fas fa-user-circle"></i></h1>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Apellido" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">Nombre de usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="Usuario" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Direccion</label>
                                <input type="text" class="form-control" id="validationCustom03" name="address" placeholder="Direccion" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom05">Cedula de identidad</label>
                                <input type="text" class="form-control" id="validationCustom05" name="ci" placeholder="Cedula de identidad" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom06">Contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text text-white bg-main"><i class="fas fa-key"></i></small>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" id="validationCustom05" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom07">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text text-white bg-main"><i class="fas fa-lock"></i></small>
                                        <input type="password" class="form-control" name="confirm" placeholder="Confirmar Contraseña" id="validationCustom05" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Acepta nuestro terminos y condiciones
                                </label>
                                <div id="invalid_7" class="invalid-feedback">
                                    Debes aceptar nuestros terminos
                                </div>
                            </div>
                        </div>
                        <button class="btn text-white bg-main" type="submit" name="submit">Confirmar</button>
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
global $msg;
$msg = "";
    if(isset($_POST["submit"])){
        if(check_name($msg)){
            if(check_last_name($msg)){
                if(check_username($msg)){
                    if(check_address($msg)){
                        if(check_ci($msg)){
                            if(check_password($msg)){
                                $Admin = new Admin($_POST["name"], $_POST["last_name"], $_POST["username"],
                                $_POST["address"], $_POST["ci"], $_POST["password"], date('Y-m-d H:i:s'));
                                $Admin->insert();
                            }
                        }
                    }
                }
            }
        }
        echo "<script> display_error(\"${msg}\") </script>";
    }



?>