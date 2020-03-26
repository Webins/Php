<?php
/*$fn, $mn, $ln, $g, $e, $a, $de, $s, $d */
$dsn = "mysql:host=localhost;dbname=form_php";
    function send_to_db($boolean){
        global $dsn;
        global $stmt;
        global $exec;
        if($boolean){
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();
        }
           /* ENTRIES OF FORM*/
            $fn = ucfirst(strtolower($_POST["first_name"]));
            if(!empty($_POST["mid_name"])) $mn = ucfirst(strtolower($_POST["mid_name"]));
            else $mn = NULL;
            $ln= ucfirst(strtolower($_POST["last_name"]));;
            if(!empty($_POST["gender-list"])) $g = $_POST["gender-list"];
            else $g = NULL;
            $e = $_POST["email"];
            $a = $_POST["address"];
            $de = $_POST["department"];
            $s = $_POST["salary"];
            $d = $_POST["date_of_birth"];
            $sql = "INSERT INTO employees(emp_first_name, emp_mid_name, emp_last_name, emp_gender, emp_email, emp_address, emp_department, emp_salary, emp_date) 
                VALUES(:fn, :mn, :ln, :g, :e, :a, :de, :s, :d);";
            $stmt = $connect->prepare($sql);
              $stmt->bindParam(':fn', $fn);
              $stmt->bindParam(':mn', $mn);
              $stmt->bindParam(':ln', $ln);
              $stmt->bindParam(':g', $g);
              $stmt->bindParam(':e', $e);
              $stmt->bindParam(':a', $a);
              $stmt->bindParam(':de', $de);
              $stmt->bindParam(':s', $s);
              $stmt->bindParam(':d', $d);
              $exec = $stmt->execute();
              if($exec){
                  echo "
                  <script type=\"text/javascript\">
                  swal(\"Registration completed\", \"The employee ${fn} has been inserted in the database correctly\", \"success\"); 
                  let back = document.getElementsByClassName(\"swal-button--confirm\");
                  back[0].addEventListener(\"click\", go_to_view);
                  function go_to_view(){
                      document.getElementById(\"anchor_back\").click();
                    }
                    </script>
                    ";     
                }
        }
        $connect=NULL;
    }
    function view_from_db(){
        global $dsn;
        global $stmt;
        $arr = array();
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();   
        }
        $sql = "SELECT * FROM employees;";
        $stmt= $connect->query($sql);
        while($data_rows = $stmt->fetch()){
            $id = $data_rows["emp_id"];
            array_push($arr, $id);
            $first_name = $data_rows["emp_first_name"];
            array_push($arr, $first_name);
            $mid_name = $data_rows["emp_mid_name"];
            array_push($arr, $mid_name);
            $last_name = $data_rows["emp_last_name"];
            array_push($arr, $last_name);
            $gender = $data_rows["emp_gender"];
            array_push($arr, $gender);
            $email = $data_rows["emp_email"];
            array_push($arr, $email);
            $address = $data_rows["emp_address"];
            array_push($arr, $address);
            $department = $data_rows["emp_department"];
            array_push($arr, $department);
            $salary = $data_rows["emp_salary"];
            array_push($arr, $salary);
            $date = $data_rows["emp_date"];
            array_push($arr, $date);
        } 
        $connect = NULL;
        return $arr;
    }

    function display_id_from_db($id){
        global $dsn;
        $arr = array();
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();   
        }
        $sql = "SELECT * FROM employees WHERE emp_id=$id;";
        $stmt= $connect->query($sql);
        while($data_rows = $stmt->fetch()){
            $id = $data_rows["emp_id"];
            array_push($arr, $id);
            $first_name = $data_rows["emp_first_name"];
            array_push($arr, $first_name);
            $mid_name = $data_rows["emp_mid_name"];
            array_push($arr, $mid_name);
            $last_name = $data_rows["emp_last_name"];
            array_push($arr, $last_name);
            $gender = $data_rows["emp_gender"];
            array_push($arr, $gender);
            $email = $data_rows["emp_email"];
            array_push($arr, $email);
            $address = $data_rows["emp_address"];
            array_push($arr, $address);
            $department = $data_rows["emp_department"];
            array_push($arr, $department);
            $salary = $data_rows["emp_salary"];
            array_push($arr, $salary);
            $date = $data_rows["emp_date"];
            array_push($arr, $date);
        } 
        $connect = NULL;
        return $arr;
    }

    function search_id_from_db($id){
        global $dsn;
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();   
        }
        if(is_numeric($id) == false) return "null";
        else{
            $sql = "SELECT emp_id FROM employees WHERE emp_id=$id;";
            $stmt= $connect->query($sql);
            $data_rows = $stmt->fetch();
            if(!empty($data_rows["emp_id"])){
                return $data_rows["emp_id"];
            }else {
                return null;
            }
        }
        $connect=null;
    }

    function update_to_db($boolean, $id){
        global $dsn;
        global $exec;
        global $stmt;
       if($boolean){
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();
        }
           /* ENTRIES OF FORM*/
            $fn = ucfirst(strtolower($_POST["first_name"]));
            if(!empty($_POST["mid_name"])) $mn = ucfirst(strtolower($_POST["mid_name"]));
            else $mn = NULL;
            $ln= ucfirst(strtolower($_POST["last_name"]));;
            if(!empty($_POST["gender-list"])) $g = $_POST["gender-list"];
            else $g = NULL;
            $e = $_POST["email"];
            $a = $_POST["address"];
            $de = $_POST["department"];
            $s = $_POST["salary"];
            $d = $_POST["date_of_birth"];
            $old_id = $_POST["id"];
            $i = $id;
            $sql = "UPDATE employees SET emp_id =:i, emp_first_name=:fn, emp_mid_name=:mn, 
            emp_last_name=:ln, emp_gender=:g, emp_email=:e, emp_address=:a, emp_department=:de, 
            emp_salary=:s, emp_date=:d WHERE emp_id=$old_id;";
             $stmt = $connect->prepare($sql);
             $stmt->bindParam(":i", $i);
             $stmt->bindParam(':fn', $fn);
             $stmt->bindParam(':mn', $mn);
             $stmt->bindParam(':ln', $ln);
             $stmt->bindParam(':g', $g);
             $stmt->bindParam(':e', $e);
             $stmt->bindParam(':a', $a);
             $stmt->bindParam(':de', $de);
             $stmt->bindParam(':s', $s);
             $stmt->bindParam(':d', $d);
             $exec = $stmt->execute();
             if($exec){
                 echo "
                 <script type=\"text/javascript\">
                 swal(\"Update successfully\", \"The employee ${fn} has been updated correctly\", \"success\"); 
                 let back = document.getElementsByClassName(\"swal-button--confirm\");
                 back[0].addEventListener(\"click\", go_to_view);
                 function go_to_view(){
                     document.getElementById(\"anchor_back\").click();
                    }
                    </script>
                    ";     
                }
                $connect=NULL;
            }   
    }


    function delete_from_db($id){
        global $dsn;
        global $exec;
        global $stmt;
        try{
            $connect = new PDO($dsn, "root", null, null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection-Failed: " . $e->getMessage();
        }
            $sql = "DELETE FROM employees WHERE emp_id=:id";
             $stmt = $connect->prepare($sql);
             $stmt->bindParam(":id", $id);
             $exec = $stmt->execute();
             $connect=NULL;
            
    }
?>
