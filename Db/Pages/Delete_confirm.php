<?php
    if(isset($_COOKIE["confirm"]))
    setcookie("confirm", "", (time()) -86400, "/");;
?>

<link rel="stylesheet" type="text/css" href="css/Update_Form.css">
<form method ="post">
<div class="limiter">
 <div class="container-table100" style ="background: #C5FAFA;">
     <div class="wrap-table100">
         <form class="table">
             <div class="row header">
                 <div class="cell">
                     <center> <font color=#CC0000> *</font> Id</center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>First Name</center>
                 </div>
                 <div class="cell">
                     <center>Middle Name <br><font color="white" >(optional)</font></center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Last Name</center>
                 </div>
                 <div class="cell">
                     <center>Gender <br><font color="white" >(optional)</font></center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Date of birth</center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Address</center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Email</center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Department</center>
                 </div>
                 <div class="cell">
                     <center> <font color=#CC0000> *</font>Salary</center>
                 </div>
             </div>
<script type="text/javascript" src="js/createCookie.js"></script>

<?php
require_once("Db.php");
$arr = display_id_from_db($_GET["id"]);
$i = 0;
echo "
<div class=\"row\">
 <label class=\"cell\" data-title=\"Id\" >
 <center>   
 <div class=\"container_form\">
        <input id=\"id\" placeholder=\"id\" value=\"${arr[0]}\" type=\"text\" name=\"id\" />
        <label id=\"error_id\" content=\"error\" style=\"display:none;\" class=\"errorMessage\"></label>
    </div>
    </center>
</label>

<label class=\"cell\" data-title=\"First Name\" >
<center>    
<div class=\"container_form\">
        <input id=\"fn\" placeholder=\"first name\" value=\"${arr[1]}\" type=\"text\" name=\"first_name\" />
        <label id=\"error_fn\" content=\"error\" style=\"display:none;\" class=\"errorMessage\"></label>
    </div>
    </center>
</label>

<label class=\"cell\" data-title=\"Middle Name\" >
<center>    
<div class=\"container_form\">
        <input id=\"mn\" placeholder=\"middle name\" value=\"${arr[2]}\" type=\"text\" name=\"mid_name\" />
        <label id=\"error_mn\" style=\"display:none;\" class=\"errorMessage\"></label>
    </div>
    </center>
</label>

<label class=\"cell\" data-title=\"Last Name\" >
    <center>
        <div class=\"container_form\">
        <input id=\"ln\" placeholder=\"last name\" value=\"${arr[3]}\" type=\"text\" name=\"last_name\" />
        <label id=\"error_ln\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
    </center>
</label>

        <label class=\"cell\" data-title=\"Gender\" for=\"gender\">
        <center>
        <div class=\"container_form\">
    <select id=\"g\" value=\"${arr[4]}\" style=\"color: #888;font: 13px Arial, Helvetica, sans-serif;\" name=\"gender-list\">
        <option value=\"No specified\">No specified</option>
        <option value=\"Male\">Male</option>
        <option value=\"Female\">Female</option>
        </select>
        </div>
        </center>
    </label>


    <label class=\"cell\" data-title=\"Date of birth\" >
    <center>
    <div class=\"container_form\">
        <input style=\"color: #888;\" id=\"d\" type=\"date\" value=\"${arr[9]}\" name=\"date_of_birth\" />
        <label id=\"error_d\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
    </center>
        </label>

        <label class=\"cell\" data-title=\"Address\" >
        <center>
        <div class=\"container_form\">
        <input id=\"a\" value=\"${arr[6]}\" placeholder=\"123 Sesame Street\" type=\"text\" name=\"address\" />
        <label id=\"error_a\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
        </center>
        </label>

        <label class=\"cell\" data-title=\"Email\" >
        <center>
        <div class=\"container_form\">
        <input id=\"e\" value=\"${arr[5]}\" placeholder=\"somemail@domain.com\" type=\"text\" name=\"email\" />
        <label id=\"error_e\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
        </center>
        </label>

        <label class=\"cell\" data-title=\"Department\" >
        <center>
        <div class=\"container_form\">
        <input id=\"de\" value=\"${arr[7]}\" placeholder=\"Administration\" type=\"text\" name=\"department\" />
        <label id=\"error_de\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
        </center>
        </label>

        <label class=\"cell\" data-title=\"Salary\" >
        <center>
        <div class=\"container_form\">
        <input id=\"s\" value=\"${arr[8]}\" placeholder=\"1800\" type=\"text\" name=\"salary\" />
        <label id=\"error_s\" style=\"display:none;\" class=\"errorMessage\"></label>
        </div>
        </center>
        </label>
    ";


echo "
         </div>
     </form>
 </div>
 <a id =\"anchor_back\" style=\"display:none;\"></a>
 <a id =\"anchor_cookie\" style=\"display:none;\"></a>
 ";


 if((isset($_GET["delete"])) == false){
     echo "
     <script type=\"text/javascript\">
        swal({
            title: \"Delete the employee ${arr[1]}?\",
            text: \"Once deleted, you will not be able to recover the user from the database\",
            icon: \"warning\",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                createCookie(\"confirm\", 1, \"1\");
                document.getElementById(\"anchor_cookie\").href=\"index.php?Page=Delete_confirm&id=${arr[0]}&delete=1\";
                document.getElementById(\"anchor_cookie\").click();
            } else {
                createCookie(\"confirm\", 0, \"1\");
                document.getElementById(\"anchor_cookie\").href=\"index.php?Page=Delete_confirm&id=${arr[0]}&delete=0\";
                document.getElementById(\"anchor_cookie\").click();
            }
            
        });
        </script>";
    }
    
    echo "</div>";
?>

<?php

if(isset($_GET["delete"])){
    if($_GET["delete"] == 1){
        delete_from_db($_GET["id"]);
        echo "
        <script type\"text/javascript\">
        document.getElementById(\"anchor_back\").href=\"index.php?Page=View&Bool=1\";
        </script>
        ";
        echo "
        <script type\"text/javascript\">
         document.getElementById(\"anchor_back\").click();
         </script>
        ";
    }else if($_GET["delete"] == 0){
        echo "
        <script type\"text/javascript\">
        document.getElementById(\"anchor_back\").href=\"index.php?Page=View&Bool=0\";
        </script>
        ";
        echo "
        <script type\"text/javascript\">
         document.getElementById(\"anchor_back\").click();
         </script>
        ";
    }
}


?>