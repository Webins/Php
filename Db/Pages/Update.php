<?php
require_once("Db.php");
?>

<link rel="stylesheet" type="text/css" href="css/Update.css">
<!--===============================================================================================-->
<form form name="form" method="post">
    <div class="form__group">
        <center>
            <h1 class="emphasize_e">Enter the ID:</h1>
        </center>
        <center>
        <div>
        <input type="text" class="form__input" id="getId" name="update_id" placeholder="Id" required="" />
            <button class="btn emphasize" name="btn_submit" type="submit">
                Go
            </button>
        </div>
        </center>
        <?php
        if (isset($_POST["btn_submit"])){
            if((search_id_from_db($_POST["update_id"])) == null){
                echo "
            <center><label for=\"name\" class=\"form__label\"><h3 class=\"emphasize\">${_POST["update_id"]} </h3></label></center>
                    <center> <label class=\"emphasize-red\" >ID doesnt exist </label> </center>
                ";
            }else{
                echo "
                <a id =\"btn-anchor\" style=\"color:white\">
                </a>
                </form>
                </div>
                <script type=\"text/javascript\">
                let anchor = document.getElementById(\"btn-anchor\");
                anchor.href =\"index.php?Page=Update_Form&id=${_POST["update_id"]}\";
                anchor.click();
                </script>
                ";
            }  
        }else{
            echo"
            </form>
            </div>
            ";
        }
        ?>
