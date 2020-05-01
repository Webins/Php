<html>
    <head>
        <title>Movie Cinema</title>
    </head>
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Initial.css">
    <body>
        <div class="grid_container">
            <header class="header">
                <div class="header_container">
                        <li class="li header_li">
                            <a href="Index.php?Page=Home">
                                Home  <span class="icon-home3"></span>
                            </a>
                        </li>
                        <li class="li header_li">
                            <a href="Index.php?Page=About">
                                About   <span class="icon-profile"></span>
                            </a >
                        </li>
                        <li class="li header_li">
                            <a href="Index.php?Page=Contact">
                                Contact Us  <span class="icon-envelope"></span>
                            </a >
                        </li>
                        <li class="li header_li">
                            <a href="Index.php?Page=Forum">
                                Forum  <span class="icon-newspaper"></span>
                            </a >
                        </li>               
                </div>
            </header>
            
                    <?php
                    if(isset($_GET["Page"])){
                        $page_name = $_GET["Page"];
                        $page_directory = scandir("Pages/", 0);
                        unset($page_directory[0], $page_directory[1]);
                        if(in_array($page_name.".php", $page_directory)){
                            include("Pages/".$page_name.".php");
                       }else{
                           include("Pages/NotFound.php");
                       }
                    }else{
                        include("Pages/Home.php");
                    }
                ?>
                    
           
           
            <footer class="footer">
                <div class="footer_grid">
                    <div class="footer_mid1">
                        <center> <h1 class="search_title emphasize"> Search Movies </h1> </center>
                        <center> <form class="search_form" action ="form.php" method ="POST">
                            <input class="search-bar" id = search-bar type="text" name ="search-bar">
                            <input class="search-submit" type="submit" name ="submit" value = "Search">
                        </form> </center>
                    </div>
                        <div class="footer_mid2">
                            <div class="social fb">
                                <a href="#">
                                    Facebook <span class="icon-facebook2"></span>
                                </a>
                            </div>
                            <div class="social ig">
                                <a href="#">
                                    Instagram <span class="icon-instagram"></span>
                                </a>
                            </div>
                            <div class="social tw">
                                <a href="#">
                                    Twitter <span class="icon-twitter"></span>
                                </a>
                            </div>
                        </div>  
                </div>
            </footer>
        </div>
    </body>
</html>
