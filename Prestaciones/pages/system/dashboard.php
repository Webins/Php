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
    <center><h1 style="font-size:2.5vw" class="ml-3 pt-2 pb-4">Inicio <i class="fas text-black fa-edit"></i></h1></center>
    <hr>
</header>

<h1 class="text-black mt-2 ml-2 alert bg-third text-white text-center">Seleccione una opcion para editar o consultar</h1>
<div class="row container-fluid mt-2 mb-2">
    <div class="col-md ml-2  card bg-primary text-white mt-3" >
        <div class="card-body p-0 ">
            <div class="wrapper p-3">
                <h1 style="font-size:2.5vw;" class="card-title ">Empleados</h1>
                <h3 class="card-subtitle mb-2 color-opt">Agregar o editar empleados</h3>
            </div>
            <h1 style="font-size:5vw;" class="card-text p text-center"><i class="fas fa-male"></i> <i class="fas fa-female"></i></h1 style="width">
            <hr>
            <?php 
            require_once("../database/Employees.php");
            $emp = new Empleados();
            $arr = $emp->search("SELECT * FROM Empleados");
            $count = count($arr);
            ?>
            <h3 class="mt-2 ml-2 card-text">Total empleados: <?php echo $count;?></h3>
            <a href="home.php?pages=employees" class="text-white">
                <div class="card-footer mt-2 bg- p-3 ">
                    <p>Mas informacion <i class="fas fa-arrow-right"></i> </p>
                </div>

            </a>
        </div>
    </div>
        <div class="col-md ml-3 card bg-info text-white mt-3" >
        <div class="card-body p-0 ">
            <div class="wrapper p-3">
                <h1 style="font-size:2.5vw;" class="card-title ">Prestaciones</h1>
                <h3 class="card-subtitle mb-2 color-opt">Ver la lista de prestaciones</h3>
            </div>
            <h1 style="font-size:5vw;" class="card-text p text-center"><i class="fas fa-money-bill"></i></h1 style="width">
            <hr>
            <h3 class="mt-2 ml-2 card-text">Prestaciones sociales </h3>
            <a href="home.php?pages=prestaciones" class="text-white">
                <div class="card-footer mt-2 bg- p-3 ">
                    <p>Mas informacion <i class="fas fa-arrow-right"></i> </p>
                </div>

            </a>
        </div>
        </div>
        <div class="col-md ml-2 card bg-success text-white mt-3" >
        <div class="card-body p-0 ">
            <div class="wrapper p-3">
                <h1 style="font-size:2.5vw;" class="card-title ">Liquidaciones</h1>
                <h3 class="card-subtitle mb-2 color-opt">Planillas de liquidacion</h3>
            </div>
            <h1 style="font-size:5vw;" class="card-text p text-center"><i class="fas fa-money-check"></i></h1 style="width">
            <hr>
            <h3 class="mt-2 ml-2 card-text">Ver liquidaciones</h3>
            <a href="home.php?pages=liquidacion" class="text-white">
                <div class="card-footer mt-2 bg- p-3 ">
                    <p>Mas informacion <i class="fas fa-arrow-right"></i> </p>
                </div>

            </a>

        </div>
    </div>
</div>
<hr>
<br>
<br>