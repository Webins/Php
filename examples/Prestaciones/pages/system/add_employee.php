<?php
require_once("../database/Employees.php");
if (!isset($_SESSION["username"])) {
    $_SESSION["no_log"] = true;
    echo "<script>
    location.href=\"../index.php\";
    </script>
    ";
}
/* Validate functs */
function check_first_name(&$msg)
{
    if (!preg_match("/^(?=.{3,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["first_name"])) {
        $msg .= "El nombre debe contener de 3 a 30 caracteres y no contener numeros ni caracteres especiales";
        return false;
    } else return true;
}
function check_last_name(&$msg)
{
    if (!preg_match("/^(?=.{3,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["last_name"])) {
        $msg .= "El apellido debe contener de 3 a 30 caracteres y no contener numeros ni caracteres especiales";
        return false;
    } else return true;
}
function check_ci(&$msg)
{
    if (!preg_match("/^\d{7,8}$/", $_POST["ci"])) {
        $msg .= "La cedula de identidad introducida es incorrecta";
        return false;
    }
    $query = "SELECT * FROM Empleados WHERE ci=${_POST["ci"]}";
    $emp = new Empleados();
    $check_employee = $emp->search($query);
    if ($check_employee != null) {
        $msg .= "La cedula introducida ya esta registrada, introduce otra";
        return false;
    } else return true;
}
?>
<header class="header text-black mt-3 third-color">
    <center>
        <h1 style="font-size:2.5vw" class="ml-3 pt-2 pb-4">Empleados <i class="fas fa-male"></i> <i class="fas fa-female"></i></h1>
    </center>
    <hr>
</header>
<section class="container-fluid py-2 mb-4">
    <center>
        <div id="display-msg">
        </div>
    </center>

    <?php 
    if(isset($_SESSION["success_register"]) && $_SESSION["success_register"] == true){
        echo "<script> display_success(\"El empleado fue agregado exitosamente!\") </script>";
        $_SESSION["success_register"] = false;
    }
    ?>
    <div class="row mt-4">
        <div class="col">
            <form class="needs-validation" method="POST" id="form">
                <div class="card bg-opt">
                    <div class="card-header badge-secondary bg-main">
                        <h1 class="new-category ">Agregar empleado <i class="fas fa-male"></i> <i class="fas fa-female"></i></h1>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Primer Nombre</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Primer Nombre" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Segundo Nombre (opcional)</label>
                                <input type="text" class="form-control" name="mid_name" placeholder="Segundo Nombre">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">Apellido</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Apellido" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Fecha ingreso</label>
                                <input type="date" class="form-control" id="validationCustom03" name="date_in" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom05">Fecha egreso (opcional)</label>
                                <input type="date" class="form-control" id="validationCustom05" name="date_out">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom06">Cedula de identidad</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="ci" placeholder="Cedula" id="validationCustom05" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="horario ">Horario</label>
                                    <select class="custom-select" name="horario" required>
                                        <option selected disabled>Turno</option>
                                        <option>Matutino</option>
                                        <option>Nocturno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="horario ">Profesion</label>
                                    <select class="custom-select" name="profesion" required>
                                        <option selected disabled>Docente</option>
                                        <option>Administrativo</option>
                                        <option>Docente</option>
                                    </select>
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

            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById("form").addEventListener("keydown", () => {
        document.getElementById("display-msg").style.display = "none"
    })
</script>
<?php
global $msg;
$msg = "";
if (isset($_POST["submit"])) {
    if (check_first_name($msg)) {
        if (check_last_name($msg)) {
            if (check_ci($msg)) {
                $empleado = new Empleados(
                    $_POST["first_name"],
                    $_POST["mid_name"],
                    $_POST["last_name"],
                    $_POST["ci"],
                    $_POST["date_in"],
                    $_POST["date_out"],
                    $_POST["horario"],
                    $_POST["profesion"]
                );
                $empleado->insert();
            }
        }
    }
    echo "<script> display_error(\"${msg}\") </script>";
}



?>