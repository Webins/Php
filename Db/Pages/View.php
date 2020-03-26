<?php
require_once("Db.php");
?>

<link rel="stylesheet" type="text/css" href="css/View.css">
<!--===============================================================================================-->

<div class="limiter">
    <div class="container-table100" style="background: #C5FAFA;">
        <div class="wrap-table100">
            <div class="table">
                <div class="row header">
                    <div class="cell">
                        <center>Id</center>
                    </div>
                    <div class="cell">
                        <center>First Name</center>
                    </div>
                    <div class="cell">
                        <center>Middle Name</center>
                    </div>
                    <div class="cell">
                        <center>Last Name</center>
                    </div>
                    <div class="cell">
                        <center>Gender</center>
                    </div>
                    <div class="cell">
                        <center>Date of birth</center>
                    </div>
                    <div class="cell">
                        <center>Address</center>
                    </div>
                    <div class="cell">
                        <center>Email</center>
                    </div>
                    <div class="cell">
                        <center>Department</center>
                    </div>
                    <div class="cell">
                        <center>Salary</center>
                    </div>
                    <div class="cell">
                        <center>Actions</center>
                    </div>
                </div>
                <?php
                $arr = view_from_db();
                global $i;
                $i = 0;
                while ($i < count($arr)) {
                    echo "
            <div class=\"row\">
            <div class=\"cell\" data-title=\"Id\">
            <center>${arr[$i]}</center>
            </div>";
            $id = $arr[$i];
                    $i++;
                    echo " 
            <div class=\"cell\" data-title=\"First Name\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo " 
            <div class=\"cell\" data-title=\"Middle Name\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo "
            <div class=\"cell\" data-title=\"Last Name\">
            <center>${arr[$i]}</center>
            </div>";

                    $i++;
                    echo " 
            <div class=\"cell\" data-title=\"Gender\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo "
            <div class=\"cell\" data-title=\"Date of birth\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo " 
            <div class=\"cell\" data-title=\"Address\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo "
            <div class=\"cell\" data-title=\"Email\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo "
            <div class=\"cell\" data-title=\"Department\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo "
            <div class=\"cell\" data-title=\"Salary\">
            <center>${arr[$i]}</center>
            </div>";
                    $i++;
                    echo " 
            <div class=\"cell\">
            <center><a href=\"index.php?Page=Update_Form&id=${id}\" style=\"
                display: inline-block;
                color:white;
                padding: .5em;
                margin-right: .5em;
                border-radius: 10px;
                font-weight: bold;
                background: #257C9E;
              \">Update</a>
            <a href=\"index.php?Page=Delete_confirm&id=${id}\" style=\"
                display: inline-block;
                margin-top: .5em;
                color:white;
                margin-right: .5em;
                padding: .5em;
                border-radius: 10px;
                font-weight: bold;
                background: #CC0000;
            \">Delete</a> </center>
            </div>
            </div>
            ";
                }
                ?>
            </div>
        </div>
    </div>
</div>



<?php
    if(isset($_GET["Bool"])){
      if($_GET["Bool"] ==1) {
        echo "
        <script type=\"text/javascript\">
        swal(\"Delete completed\", \"The employee of has been deleted correctly\", \"success\"); 
        </script>
        "; 
      }else{
        echo "
            <script type=\"text/javascript\">
            swal(\"Delete uncompleted\", \"You have canceled the delete\", \"info\"); 
            </script>
            "; 
    }
        $_GET["Bool"] ="";
    }
?>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>