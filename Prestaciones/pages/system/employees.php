<?php
require_once("../database/Employees.php");
if (!isset($_SESSION["username"])) {
    $_SESSION["no_log"] = true;
    echo "<script>
    location.href=\"../index.php\";
    </script>
    ";
}
$query = "SELECT * FROM Empleados";
$employe = new Empleados();
$arr = $employe->search($query);


if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
    if ($_GET["page"] <= 0) {
        $arr = null;
    } else {
        $min = (($_GET["page"] * 10) - 10);
        $count = new Empleados();
        $counter = $count->search("SELECT * FROM Empleados");
        $query = "SELECT * FROM Empleados ORDER BY id_empleado DESC LIMIT ${min},10";
        $empleado = new Empleados();
        $arr = $empleado->search($query);
        $total_empleados = (count($counter));
    }
}else{
    $_GET["page"] = 1;
    $min = (($_GET["page"] * 10) - 10);
        $count = new Empleados();
        $counter = $count->search("SELECT * FROM Empleados");
        $query = "SELECT * FROM Empleados ORDER BY id_empleado DESC LIMIT ${min},10";
        $empleado = new Empleados();
        $arr = $empleado->search($query);
        $total_empleados = (count($counter));
}
?>
<link type="text/css" rel="stylesheet" href="../../css/employees.css">
<header class="header text-black mt-3 third-color">
    <center>
        <h1 style="font-size:2.5vw" class="ml-3 pt-2 pb-4">Empleados <i class="fas fa-male"></i> <i class="fas fa-female"></i></h1>
    </center>
    <hr>
</header>

<center><a href="home.php?pages=add_employee" class="btn btn-info mb-3">
        <h1>Añadir nuevo empleado <i class="fas fa-arrow-right"></i></h1>
    </a></center>


<h1 class="text-black mt-2 ml-2 alert bg-third text-white text-center">Lista de empleados</h1>
<div class="container-fluid">
    <table class="table table-stripped table-hover">
        <thead class="thead bg-opt text-black">
            <tr class="bg-info text-white">
                <th>
                    <h2 class="font-weight-bold bg-primarytext-center">No.</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Nombre</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Apellido</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Cedula</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Fecha Ingreso</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Fecha Egreso</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Horario</h2>
                </th>
                <th>
                    <h2 class="font-weight-bold text-center">Profesion</h2>
                </th>
            </tr>
            <?php
            if($_GET["page"] > 1){
                $adder =  (($_GET["page"] -1) * 10);
            }else $adder=0;
            $i = 1 + $adder;
            foreach ($arr as $employee_obj) {
                $id = $employee_obj->get_id_empleado();
                echo "<tr>";
                echo "<td class=\"td-table text-center number\"><p>${i} </p></td>";
                echo "<td class=\"td-table text-center name\"><p>" . $employee_obj->get_primer_nombre() . "</p></td>";
                echo "<td class=\"td-table text-center last_name\"><p>" . $employee_obj->get_apellido() . "</p></td>";
                echo "<td class=\"td-table text-center ci\"><p>" . $employee_obj->get_ci() . "</p></td>";
                echo "<td class=\"td-table text-center date_in\">
                    <p>" . $employee_obj->get_fecha_ingreso() . "</p>
                </td>";
                echo "<td class=\"td-table text-center date_out\">
                    <p>" . $employee_obj->get_fecha_egreso() . "</p>
                </td>";
                echo "<td class=\"td-table text-center horario\">
                    <p>" . $employee_obj->get_horario() . "</p>
                </td>";
                echo "<td class=\"td-table text-center profession\">
                    <p>" . $employee_obj->get_profesion() . "</p>
                </td>";
                echo "</tr>";
                $i++;
            }
            ?>

        </thead>
        <thead class="thead bg-info mb-4">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>

    <?php if (isset($_GET["page"]) && $_GET["page"] > 0) {
                    $max_page;
                ?>
                    <nav class="mt-3 align-self-center">
                        <center>
                            <ul class="pagination pagination-lg">
                                <a href="home.php?pages=employees&page=<?php if (($_GET["page"] == 1)) echo $_GET["page"];
                        else echo ($_GET["page"] - 1); ?>" class="page-link">&laquo;
                                </a>
                                <?php for ($i = 0, $j = 1; $i < $total_empleados; $i += 10, $j++) {
                                    $max_page = $j;
                                ?>
                                    <li id="page_item<?php echo $j ?>" class="page-item">
                                        <a href="home.php?pages=employees&page=<?php echo $j ?>" class="page-link">
                                            <?php echo $j; ?>
                                        </a>
                                    </li>
                                <?php

                                }
                                ?>
                                <a href="home.php?pages=employees&page=<?php if (($_GET["page"] == $max_page)) echo $_GET["page"];
                        else echo ($_GET["page"] + 1); ?>" class="page-link">&raquo;
                                </a>
                            </ul>
                        </center>
                    </nav>
            <?php }
            echo "<script>
            const act = document.getElementById(\"page_item${_GET["page"]}\")
            act.className = \"page-item active\" 
            </script>";
            ?>
    <hr>
</div>