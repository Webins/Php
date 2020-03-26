<html>
<html lang="en">

<head>
    <title>Employee Registration</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<header style ="display:flex">
    <a href="index.php?Page=Form"> Register</a>


    <a href="index.php?Page=View"> View</a>


    <a href="index.php?Page=Update"> Update</a>


    <a href="index.php?Page=Delete"> Delete</a>
</header>
<body style ="background: #C5FAFA;">
<?php
if (isset($_GET["Page"])) {
    $page_name = $_GET["Page"];
    $page_directory = scandir("Pages", 0);
    unset($page_directory[0], $page_directory[1]);
    
    if (in_array($page_name . ".php", $page_directory)) {
        include("Pages/" . $page_name . ".php");
    } else {
        include("Pages/NotFound.php");
    }
}else{
    include("Pages/Form.php");
}
?>
</body>

<footer>

</footer>

<body>
</body>

</html>