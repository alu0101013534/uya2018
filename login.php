<?php
include_once 'controller.php';

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    if($usuario != '' && $password != '') {
        if(validate_user($usuario, $password)){
            //echo "Validado correctamente";
            header("Location: loggeduser.php");
        }else{
            //echo "Error: En usuario o contraseña";
            echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><b>Error: En usuario o contraseña.</b></div>";
        }        
    }else{
        //echo "Error: No puedes dejar campos vacios.<br>";
        echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><b>Error: No puedes dejar campos vacios.</b></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>UYA</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


    </head>
    <body>
        <nav class="purple darken-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">UYA</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="games.html">Games</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                     <li><a href="login.php">Log in</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="games.html">Games</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                     <li><a href="login.php">Log in</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>





 <h2 class="header center purple-text purple-lighten-2">Log In</h2>
<br>
        <div class="container">

            <div class="row">

                <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="username" name="username" type="text" class="validate">
                                <label for="username">User Name</label>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>   
                        </div>
                        <div class="row center">
                            <div class="input-field col s6 offset-s3">
                                <button class="btn  purple-effect purple" type="submit" name="submit">Submit
                                    <i class="material-icons right">send</i>
                                </button>

                                <a href="signup.php" id="download-button" class="btn  purple-effect purple">Sign Up Now</a>
                            </div>   
                        </div>
                    </div>
                </form>
            </div>

        </div>
       <footer class="page-footer purple lighten-1">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of 3 college students working on this project for the Usability and accessibility subject.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="white-text" href="index.html">Home</a></li>
                            <li><a class="white-text" href="about.html">About</a></li>
                            <li><a class="white-text" href="games.html">Games</a></li>
                            <li><a class="white-text" href="shop.html">Shop</a></li>
                            <li><a class="white-text" href="contactus.html">Contact Us</a></li>
                             <li><a class="white-text" href="login.php">Log in</a></li>
                             
                            <li><a class="white-text" href="sitemap.html">Sitemap</a></li>
                        </ul>
                    </div>
                     <div class="col l3 s12">
                        <h5 class="white-text">Language</h5>
                        <ul>
                            <li><a class="white-text" href="index.html">English</a></li>
                            <li><a class="white-text" href="es/index.html">Spanish</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="purple darken-1">
                <div class="container" >
                    Made by <a class="purple-text text-lighten-3"> Team 6</a>
                </div>
            </div>
        </footer>



        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
