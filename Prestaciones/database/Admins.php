<?php
$GLOBALS["dsn"] =  "mysql:host=127.0.0.1;dbname=prestaciones_uah";
$GLOBALS["username_db"] = "webins";
$GLOBALS["password_db"] = "mi perro es coke";

class Admin
{
    private $id;
    private $name;
    private $last_name;
    private $username;
    private $address;
    private $ci;
    private $password;
    private $created_at;
    private $last_login;
    function __construct($name="", $last_name="", $username="", $address="", $ci="", $password="", $created_at="")
    {
        $this->name = ucfirst(strtolower($name));
        $this->last_name = ucfirst(strtolower($last_name));
        $this->username = $username;
        $this->address = $address;
        $this->ci = $ci;
        $this->password = $password;
        $this->created_at = $created_at;
    }
    public function construct($id, $name,  $last_name, $username, $address, $ci, $password, $created_at, $last_login)
    {
        $this->id = $id;
        $this->name = ucfirst(strtolower($name));
        $this->last_name = ucfirst(strtolower($last_name));
        $this->username = $username;
        $this->address = $address;
        $this->ci = $ci;
        $this->password = $password;
        $this->created_at= $created_at;
        $this->last_login = $last_login;
    }
    public function insert()
    {
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $sql = "INSERT INTO `Admins`(`name`, `last_name`, `username`, `address`, `ci`, `password`, `created_at`)
                    VALUES(:name, :last_name, :username, :address, :ci,  :password, :created_at);";

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':ci', $this->ci);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':created_at', $this->created_at);
        $exec = $stmt->execute();
        $this->id = $connect->lastInsertId();
        if ($exec) {
            $_SESSION["success_register"] = true;
            echo "<script> 
            location.href=\"index.php\"
            </script>";
        } else {
            echo "<script> 
            location.href=\"index.php\"
            </script>";
        }
        $connect = NULL;
    }

    public function update_last_login($id){
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $query = "UPDATE Admins SET last_login=:last_login WHERE id_admin=${id}";
        $stmt = $connect->prepare($query);
        $date = get_time();
        $stmt->bindParam(':last_login', $date);
        $exec = $stmt->execute();
        $connect=null;
    }

    public function update($obj)
    {
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $id = $obj->get_id();
        global $class;
        global $getMsg;
        $username = $obj->get_username();
        $password = $obj->get_password();
        $name = $obj->get_name();
        $added_by = $obj->get_added_by();
        $date = $obj->get_date();
        $query = "UPDATE `Admins` SET username=:username, password=:password, name=:name, added_by=:added_by, 
        date=:date WHERE id=${id}";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':added_by', $added_by);
        $stmt->bindParam(':date', $date);
        $exec = $stmt->execute();
        if ($exec) {
            $getMsg = "The Admin $this->username was edited succesfully";
            $class = "container-fluid alert alert-success col-lg-8";
        } else {
            $getMsg = "An error with the database has ocurred, please try again later";
            $class = "container-fluid alert alert-danger col-lg-8";
        }
        $connect = NULL;
        /*
        echo "<script type=\"text/javascript\">
                const a = document.createElement(\"a\");
                a.href=\"index.php?pages=&class=$class&msg=$getMsg\" 
                a.click();
                </script>";*/
    }
    public function delete($id)
    {
        try {
            $connect = new PDO($GLOBALS["dsn"], $GLOBALS["username_db"], $GLOBALS["password_db"], null);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection-Failed: " . $e->getMessage();
        }
        $query = "DELETE FROM Admins WHERE id=:id";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $exec = $stmt->execute();
        $connect = null;
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
            $returned_Admin = new Admin();
            $returned_Admin->construct(
                $data_rows["id_admin"],
                $data_rows["name"],
                $data_rows["last_name"],
                $data_rows["username"],
                $data_rows["address"],
                $data_rows["ci"],
                $data_rows["password"],
                $data_rows["created_at"],
                $data_rows["last_login"]
            );
            array_push($arr, $returned_Admin);
        }
        $connect = NULL;
        return $arr;
    }

    /* GETTERS AND SETTERS */
    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_last_name()
    {
        return $this->last_name;
    }
    public function get_username()
    {
        return $this->username;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function get_ci()
    {
        return $this->ci;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_created_at()
    {
        return $this->created_at;
    }
    public function get_last_login()
    {
        return $this->last_login;
    }
    

    
    
    public function set_username($username)
    {
        $this->username = $username;
    }
    public function set_address($address)
    {
        $this->address = $address;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }
    public function set_last_login($last_login)
    {
        $this->last_login = $last_login;
    }
}

?>