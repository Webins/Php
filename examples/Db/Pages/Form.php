<?php
require_once("Db.php");
?>


<link rel="stylesheet" href="css/Form.css">


<div class="container">
    <div class="form-style-10">
        <h1>Employee Registration<span>Submit your personal information to keep track of you as an employee</span></h1>
        <form form name="form" method="post">
            <div class="section"><span>1</span>Personal Information</div>
            <div class="inner-wrap">

                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000>* </font>First Name <input id="fn" placeholder="first name" type="text" name="first_name" />
                    </label>
                    <label id="error_fn" content="error" style="display:none;" class="errorMessage"></label>
                </div>
                <div class="fieldWrapper">
                    <label>Middle Name <font color=#2A88AD>(optional)</font><input id="mn" placeholder="middle name" type="text" name="mid_name" /></label>
                    <label id="error_mn" style="display:none;" class="errorMessage"></label>
                </div>
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Last Name <input id="ln" placeholder="last name" type="text" name="last_name" />
                    </label>
                    <label id="error_ln" style="display:none;" class="errorMessage"></label>
                </div>
                <div class="fieldWrapper">
                    <label for="gender">Gender <font color=#2A88AD>(optional)</font></label>
                    <select id="g" style="color: #888;font: 13px Arial, Helvetica, sans-serif;" name="gender-list">
                        <option value="No specified">No specified</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Date of birth <input style="color: #888;" id="d" type="date" name="date_of_birth" />
                    </label>
                    <label id="error_d" style="display:none;" class="errorMessage"></label>
                </div>




            </div>
            <div class="section"><span>2</span>Address & Email</div>
            <div class="inner-wrap">
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Address <input id="a" placeholder="123 Sesame Street" type="text" name="address" />
                    </label>
                    <label id="error_a" style="display:none;" class="errorMessage"></label>
                </div>
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Email <input id="e" placeholder="somemail@domain.com" type="text" name="email" />
                    </label>
                    <label id="error_e" style="display:none;" class="errorMessage"></label>
                </div>


            </div>
            <div class="section"><span>3</span>Job & Salary</div>
            <div class="inner-wrap">
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Department <input id="de" placeholder="Administration" type="text" name="department" />
                    </label>
                    <label id="error_de" style="display:none;" class="errorMessage"></label>
                </div>
                <div class="fieldWrapper">
                    <label>
                        <font color=#CC0000> *</font>Salary ($)<input id="s" placeholder="1800" type="text" name="salary" />
                    </label>
                    <label id="error_s" style="display:none;" class="errorMessage"></label>
                </div>


            </div>
            <center><small class="required-info">A <font color=red>*</font> indicates that a field is required</small></center><br>
            <div class="button-section">
                <input type="submit" name="submit" />
                <span class="privacy-policy">
                    <input id="t" type="checkbox" name="terms">You agree to our Terms and Policy.
                    <label id="error_t" style="display:initial;" class="terrorMessage"></label>
                </span>
            </div>
        </form>
    </div>
    <?php 
    if(isset($_POST["submit"]))
        send_to_db((check_error())) 
    ?>
    <a id ="anchor_back" style="display:none;" href ="index.php?Page=View"></a>
</div>


<?php
/*fn(first_name), mn(mid_name), ln(last_name), g(gender), d(date) , a(address), e(email), de(department), s(salary), t(terms)*/
function check_error()
{
    /*FIRST NAME*/
    $error_count = array(false, false, false, false, false, false, false, false, false);
    if ( empty($_POST["first_name"])) {
        $error_msg = "*First Name is required*";
        echo "
                <script type=\"text/javascript\">
                let error_fn = document.getElementById(\"error_fn\");
                error_fn.innerHTML = \"${error_msg}\";
                error_fn.style.display = \"initial\";
                let container_fn_id = document.getElementById(\"fn\");
                container_fn_id.style.border = \"1px solid #CC0000\";
                </script>
            ";
        $error_count[0] = false;
    } else if (!empty($_POST["first_name"]) && !preg_match("/^(?=.{1,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["first_name"])) {
        $value = $_POST["first_name"];
        $error_msg = "*Enter a valid name*";
        echo "
                <script type=\"text/javascript\">
                let error_fn = document.getElementById(\"error_fn\");
                error_fn.innerHTML = \"${error_msg}\";
                error_fn.style.display = \"initial\";
                let container_fn_id = document.getElementById(\"fn\");
                container_fn_id.style.border = \"1px solid #CC0000\";
                container_fn_id.value = \"${value}\";
                </script>
            ";
        $_POST["first_name"] = "";
        $error_count[0] = false;
    } else {
        if (!empty($_POST["first_name"]))
            $value = $_POST["first_name"];
        else
            $value = "";
        echo "";
        echo "
                <script type=\"text/javascript\">
                let container_fn_id = document.getElementById(\"fn\");
                let error_fn = document.getElementById(\"error_fn\");
                container_fn_id.style.border = \"none\";
                error_fn.style.display = \"none\";
                container_fn_id.value = \"${value}\";
                </script>  
            ";
        $error_count[0] = true;
    }
    /*FIRST NAME*/

    /*MID NAME*/
    if (!empty($_POST["mid_name"]) && !preg_match("/^(?=.{1,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["mid_name"])) {
        $value = $_POST["mid_name"];
        $error_msg = "*Enter a valid middle name*";
        echo "
                <script type=\"text/javascript\">
                let error_mn = document.getElementById(\"error_mn\");
                error_mn.innerHTML = \"${error_msg}\";
                error_mn.style.display = \"initial\";
                let container_mn_id = document.getElementById(\"mn\");
                container_mn_id.style.border = \"1px solid #CC0000\";
                container_mn_id.value = \"${value}\";
                </script>    
            ";
        $_POST["mid_name"] = "";
        $error_count[1] = false;
    } else {
        if (!empty($_POST["mid_name"]))
            $value = $_POST["mid_name"];
        else
            $value = "";
        echo "";
        echo "
                    <script type=\"text/javascript\">
                    let container_mn_id = document.getElementById(\"mn\");
                    let error_mn = document.getElementById(\"error_mn\");
                    container_mn_id.style.border = \"none\";
                    error_mn.style.display = \"none\";
                    container_mn_id.value = \"${value}\";
                    </script>
                    
                ";
        $error_count[1] = true;
    }
    /*MID NAME*/

    /*LAST NAME*/
    if ( empty($_POST["last_name"])) {
        $error_msg = "*Last Name is required*";
        echo "
                        <script type=\"text/javascript\">
                        let error_ln = document.getElementById(\"error_ln\");
                        error_ln.innerHTML = \"${error_msg}\";
                        error_ln.style.display = \"initial\";
                        let container_ln_id = document.getElementById(\"ln\");
                        container_ln_id.style.border = \"1px solid #CC0000\";
                        </script>
                  ";
        $error_count[2] = false;
    } else if (!empty($_POST["last_name"]) && !preg_match("/^(?=.{1,30}$)[a-zA-Z]+(?:[-',\s][a-zA-Z]+)*$/", $_POST["last_name"])) {
        $value = $_POST["last_name"];
        $error_msg = "*Enter a valid Last Name*";
        echo "
                        <script type=\"text/javascript\">
                        let error_ln = document.getElementById(\"error_ln\");
                        error_ln.innerHTML = \"${error_msg}\";
                        error_ln.style.display = \"initial\";
                        let container_ln_id = document.getElementById(\"ln\");
                        container_ln_id.value = \"${value}\";
                        container_ln_id.style.border = \"1px solid #CC0000\";
                        </script>
                        
                    ";
        $_POST["last_name"] = "";
        $error_count[2] = false;
    } else {
        if (!empty($_POST["last_name"]))
            $value = $_POST["last_name"];
        else
            $value = "";
        echo "";
        echo "
                        <script type=\"text/javascript\">
                        let container_ln = document.getElementById(\"ln\");
                        let error_ln = document.getElementById(\"error_ln\");
                        container_ln.style.border = \"none\";
                        error_ln.style.display = \"none\";
                        container_ln.value = \"${value}\";
                        </script>
                  ";
        $error_count[2] = true;
    }
    /*LAST NAME*/

    /*GENDER*/

    if ( !empty($_POST["gender-list"])) {
        $value = $_POST["gender-list"];
        echo "
        <script type=\"text/javascript\">
        let container_g = document.getElementById(\"g\");
        container_g.style.color =\"black\";
        container_g.value = \"${value}\";
        </script>
        
    ";
    }


    /*DATE OF BIRTH*/
    if ( empty($_POST["date_of_birth"])) {
        $error_msg = "*Date of birth is required*";
        echo "
                <script type=\"text/javascript\">
                let error_d = document.getElementById(\"error_d\");
                error_d.innerHTML = \"${error_msg}\";
                error_d.style.display = \"initial\";
                let container_d = document.getElementById(\"d\");
                container_d.style.border = \"1px solid #CC0000\";
                </script>
                
            ";
        $error_count[3] = false;
    } else {
        if (!empty($_POST["date_of_birth"])) {
            $value = $_POST["date_of_birth"];
            echo "
            <script type=\"text/javascript\">
            document.getElementById(\"d\").style.color=\"black\";
            </script>
            ";
        } else
            $value = "";
        echo "";
        echo "
                <script type=\"text/javascript\">
                let container_d = document.getElementById(\"d\");
                let error_d = document.getElementById(\"error_d\");
                container_d.style.border = \"none\";
                error_d.style.display = \"none\";
                container_d.value = \"${value}\";
                </script>
                
            ";
        $error_count[3] = true;
    }
    /*DATE OF BIRTH*/

    /*ADDRESS*/
    if ( empty($_POST["address"])) {
        $error_msg = "*Address is required*";
        echo "
                <script type=\"text/javascript\">
                let error_a = document.getElementById(\"error_a\");
                error_a.innerHTML = \"${error_msg}\";
                error_a.style.display = \"initial\";
                let container_a_id = document.getElementById(\"a\");
                container_a_id.style.border = \"1px solid #CC0000\";
                </script>
                
            ";
        $error_count[4] = false;
    } else {
        if (!empty($_POST["address"]))
            $value = $_POST["address"];
        else
            $value = "";

        echo "";
        echo "
                <script type=\"text/javascript\">
                let container_a_id = document.getElementById(\"a\");
                let error_a = document.getElementById(\"error_a\");
                container_a_id.style.border = \"none\";
                error_a.style.display = \"none\";
                container_a_id.value = \"${value}\";
                </script>
                
            ";
        $error_count[4] = true;
    }
    /*ADDRESS*/

    /*EMAIL*/
    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
    if ( empty($_POST["email"])) {
        $error_msg = "*Email is required*";
        echo "
                <script type=\"text/javascript\">
                let error_e = document.getElementById(\"error_e\");
                error_e.innerHTML = \"${error_msg}\";
                error_e.style.display = \"initial\";
                let container_e_id = document.getElementById(\"e\");
                container_e_id.style.border = \"1px solid #CC0000\";
                </script>
                
            ";
        $error_count[5] = false;
    } else if (!empty($_POST["email"]) && !preg_match($pattern, $_POST["email"])) {
        $value = $_POST["email"];
        $error_msg = "*Enter a valid email*";
        echo "
                <script type=\"text/javascript\">
                let error_e = document.getElementById(\"error_e\");
                error_e.innerHTML = \"${error_msg}\";
                error_e.style.display = \"initial\";
                let container_e_id = document.getElementById(\"e\");
                container_e_id.style.border = \"1px solid #CC0000\";
                container_e_id.value = \"${value}\";
                </script>
                
            ";
        $_POST["email"] = "";
        $error_count[5] = false;
    } else {
        if (!empty($_POST["email"]))
            $value = $_POST["email"];
        else
            $value = "";
        echo "";
        echo "
                <script type=\"text/javascript\">
                let container_e_id = document.getElementById(\"e\");
                let error_e = document.getElementById(\"error_e\");
                container_e_id.style.border = \"none\";
                error_e.style.display = \"none\";
                container_e_id.value = \"${value}\";
                </script>
                
            ";
        $error_count[5] = true;
    }
    /*EMAIL*/

    /*DEPARTMENT*/
    if ( empty($_POST["department"])) {
        $error_msg = "*The department is required*";
        echo "
                <script type=\"text/javascript\">
                let error_de = document.getElementById(\"error_de\");
                error_de.innerHTML = \"${error_msg}\";
                error_de.style.display = \"initial\";
                let container_de_id = document.getElementById(\"de\");
                container_de_id.style.border = \"1px solid #CC0000\";
                </script>
                
            ";
        $error_count[6] = false;
    } else if (!empty($_POST["department"]) && !preg_match("/^[A-Za-z\s]+$/", $_POST["department"])) {
        $error_msg = "*Enter a valid department name*";
        $value = $_POST["department"];
        echo "
                <script type=\"text/javascript\">
                let error_de = document.getElementById(\"error_de\");
                error_de.innerHTML = \"${error_msg}\";
                error_de.style.display = \"initial\";
                let container_de_id = document.getElementById(\"de\");
                container_de_id.value = \"${value}\";
                container_de_id.style.border = \"1px solid #CC0000\";
                </script>
                
            ";
        $error_count[6] = false;
        $_POST["department"] = "";
    } else {
        if (!empty($_POST["department"]))
            $value = $_POST["department"];
        else
            $value = "";
        echo "";
        echo "
                <script type=\"text/javascript\">
                let container_de_id = document.getElementById(\"de\");
                let error_de = document.getElementById(\"error_de\");
                container_de_id.style.border = \"none\";
                error_de.style.display = \"none\";
                container_de_id.value = \"${value}\";
                </script>
                
            ";
        $error_count[6] = true;
    }
    /*DEPARTMENT*/

    /*SALARY*/
    if ( empty($_POST["salary"])) {
        $error_msg = "*The salary is required*";
        echo "
                    <script type=\"text/javascript\">
                    let error_s = document.getElementById(\"error_s\");
                    error_s.innerHTML = \"${error_msg}\";
                    error_s.style.display = \"initial\";
                    let container_s_id = document.getElementById(\"s\");
                    container_s_id.style.border = \"1px solid #CC0000\";
                    </script>
                    
                ";
        $error_count[7] = false;
    } else if (!empty($_POST["salary"]) && !preg_match("/^\d+$/", $_POST["salary"])) {
        $value = $_POST["salary"];
        $error_msg = "*Enter a valid salary*";
        echo "
                    <script type=\"text/javascript\">
                    let error_s = document.getElementById(\"error_s\");
                    error_s.innerHTML = \"${error_msg}\";
                    error_s.style.display = \"initial\";
                    let container_s_id = document.getElementById(\"s\");
                    container_s_id.style.border = \"1px solid #CC0000\";
                    container_s_id.value =\"${value}\";
                    </script>
                    
                ";
        $error_count[7] = false;
        $_POST["salary"] = "";
    } else {
        if (!empty($_POST["salary"]))
            $value = $_POST["salary"];
        else
            $value = "";
        echo "";
        echo "
                    <script type=\"text/javascript\">
                    let container_s_id = document.getElementById(\"s\");
                    let error_s = document.getElementById(\"error_s\");
                    container_s_id.style.border = \"none\";
                    error_s.style.display = \"none\";
                    container_s_id.value =\"${value}\";
                    </script>
                    
                ";
        $error_count[7] = true;
    }
    /*SALARY*/

    /*TERMS*/
    if ( empty($_POST["terms"])) {
        $error_msg = "*You must accept our conditions to continue*";
        echo "
                    <br>
                    <center>
                    <script>
                    let error_t = document.getElementById(\"error_t\");
                    error_t.innerHTML = \"${error_msg}\";
                    error_t.style.display = \"initial\";
                    </script>
                    </center>
                    
                ";
        $error_count[8] = false;
    } else {
        if (!empty($_POST["terms"]))
            $value = true;
        else
            $value = false;
        echo "";
        echo "
                    <script type=\"text/javascript\">
                    document.getElementById(\"t\").checked = ${value}; 
                    let error_t = document.getElementById(\"error_t\");
                    error_t.style.display = \"none\";
                    </script>
                ";
        $error_count[8] = true;
    }
    /*TERMS*/

    if ( ($error_count[0] == true) && ($error_count[1] == true) && ($error_count[2] == true) && ($error_count[3] == true) && ($error_count[4] == true) &&
        ($error_count[5] == true) && ($error_count[6] == true) && ($error_count[7] == true) && ($error_count[8] == true)
    )
    return true;
    else return false;
}
?>