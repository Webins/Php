<?php 

$GLOBALS["dsn"] =  "mysql:host=127.0.0.1;dbname=prestaciones_uah";
$GLOBALS["username_db"] = "webins";
$GLOBALS["password_db"] = "mi perro es coke";

    class Empleados{
        private $id_empleado;
        private $primer_nombre;
        private $segundo_nombre;
        private $apellido;
        private $ci;
        private $fecha_ingreso;
        private $fecha_egreso;
        private $horario;
        private $profesion;

    function __construct($primer_nombre="", $segundo_nombre=null, $apellido="", $ci="", $fecha_ingreso="", $fecha_egreso=null, $horario="", $profesion="")
    {
        $this->primer_nombre = ucfirst(strtolower($primer_nombre));
        $this->segundo_nombre = $segundo_nombre;
        $this->apellido = ucfirst(strtolower($apellido));
        $this->ci = $ci;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_egreso = $fecha_egreso;
        $this->horario = $horario;
        $this->profesion = $profesion;
    }
    public function construct($id_empleado, $primer_nombre,  $segundo_nombre, $apellido, $ci, $fecha_ingreso, $fecha_egreso, $horario, $profesion)
    {
        $this->id_empleado = $id_empleado;
        $this->primer_nombre = ucfirst(strtolower($primer_nombre));
        $this->segundo_nombre = $segundo_nombre;
        $this->apellido = ucfirst(strtolower($apellido));
        $this->ci = $ci;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_egreso = $fecha_egreso;
        $this->horario = $horario;
        $this->profesion= $profesion;
    }
    public function insert()
    {
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $sql = "INSERT INTO `Empleados`(`primer_nombre`, `segundo_nombre`, `apellido`, `ci`, `fecha_ingreso`, `fecha_egreso`, `horario`, `profesion`)
                    VALUES(:primer_nombre, :segundo_nombre, :apellido, :ci, :fecha_ingreso, :fecha_egreso,  :horario, :profesion);";

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':primer_nombre', $this->primer_nombre);
        $stmt->bindParam(':segundo_nombre', $this->segundo_nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':ci', $this->ci);
        $fecha_ingreso = date('Y-m-d',strtotime($this->fecha_ingreso));  
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
        $fecha_egreso = $this->fecha_egreso;
        $fecha_egreso==null? $fecha_egreso = null: $fecha_egreso= date('Y-m-d',strtotime($this->fecha_egreso));
        $stmt->bindParam(':fecha_egreso', $fecha_egreso);
        $stmt->bindParam(':horario', $this->horario);
        $stmt->bindParam(':profesion', $this->profesion);
        $exec = $stmt->execute();
        $this->id_empleado = $connect->lastInsertid();
        if ($exec) {
            $_SESSION["success_register"] = true;
            echo "<script> location.href=\"home.php?pages=add_employee\" </script>";
            
        } else {
            
        }
        $connect = NULL;
    }

    
    static function search($query)
    {
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $arr = array();
        $stmt = $connect->query($query);
        if ($stmt == NULL) {
            $connect = NULL;
            return NULL;
        }
        while ($data_rows = $stmt->fetch()) {
            $returnedEmployee = new Empleados();
            $returnedEmployee->construct(
                $data_rows["id_empleado"],
                $data_rows["primer_nombre"],
                $data_rows["segundo_nombre"],
                $data_rows["apellido"],
                $data_rows["ci"],
                $data_rows["fecha_ingreso"],
                $data_rows["fecha_egreso"],
                $data_rows["horario"],
                $data_rows["profesion"]
            );
            array_push($arr, $returnedEmployee);
        }
        $connect = NULL;
        return $arr;
    }

    /* GETTERS AND SETTERS */
    public function get_id_empleado()
    {
        return $this->id_empleado;
    }
    public function get_primer_nombre()
    {
        return $this->primer_nombre;
    }
    public function get_apellido()
    {
        return $this->apellido;
    }
    public function get_ci()
    {
        return $this->ci;
    }
    public function get_fecha_ingreso()
    {
        return $this->fecha_ingreso;
    }
    public function get_fecha_egreso()
    {
        return $this->fecha_egreso;
    }
    public function get_horario()
    {
        return $this->horario;
    }
    public function get_profesion()
    {
        return $this->profesion;
    }
    

    
    
    public function set_ci($ci)
    {
        $this->ci = $ci;
    }
    public function set_fecha_ingreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }
    public function set_horario($horario)
    {
        $this->horario = $horario;
    }
    public function set_last_login($last_login)
    {
        $this->last_login = $last_login;
    }
}

?>