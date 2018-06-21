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
           
    
     echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><div role='alertdialog' aria-labelledby='dialog1Title' aria-selected='true' aria-describedby='dialog1Desc'>
  <div role='document' tabindex='-1'>
    <h2 id='dialog1Title'>Error</h2>
    <p id='dialog1Desc'>wrong username or password</p>
    </div>
 
  </div>
</div> ";
        }        
    }else{
        //echo "Error: No puedes dejar campos vacios.<br>";
        echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><div role='alertdialog' aria-labelledby='dialog1Title'aria-selected='true' aria-describedby='dialog1Desc'>
  <div role='document' tabindex='-1'>
    <h2 id='dialog1Title'>Error</h2>
    <p id='dialog1Desc'>You cant leave empty fields</p>
   
  </div>
  </div>
</div>";
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
                    <li><a href="index.html" role="menuitem" aria-label="Inicio">Inicio</a></li>
                    <li><a href="about.html"  role="menuitem"aria-label="Acerca">Acerca</a></li>
                    <li><a href="games.html"  role="menuitem"aria-label="Juegos">Juegos</a></li>
                    <li><a href="shop.html"  role="menuitem"aria-label="Tienda">Tienda</a></li>
                    <li><a href="contactus.html"  role="menuitem"aria-label="Contacto Us">Contacto</a></li>
                     <li><a href="login.php"  role="menuitem"aria-label="Log in">Log in</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav" aria-hidden="true">
                    <li><a href="index.html">Inicio </a></li>
                    <li><a href="about.html">Acerca</a></li>
                    <li><a href="games.html">Juegos</a></li>
                    <li><a href="shop.html">Tienda</a></li>
                    <li><a href="contactus.html">Contacto</a></li>
                     <li><a href="login.php">Log in</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>




                    <main role="main">
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
                                <label for="username">Usuario</label>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Contraseña</label>
                            </div>   
                        </div>
                        <div class="row center">
                            <div class="input-field col s6 offset-s3">
                                <button class="btn  purple-effect purple" type="submit" name="submit">Enviar
                                    <i class="material-icons right">send</i>
                                </button>

                                <a href="signup.php" id="download-button" class="btn  purple-effect purple">Registrarse Ahora</a>
                            </div>   
                        </div>
                    </div>
                </form>
            </div>

        </div>
        </main>
        <footer class="page-footer purple lighten-1" role="contentinfo">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Biografía</h5>
                        <p class="grey-text text-lighten-4">Somos un equipo de 3 estudiantes universitarios trabajando para el proyecto de usabilidad y accesibilidad.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text" aria-label="Links">Links</h5>
                        <ul>
                            <li><a class="white-text" href="index.html">Inicio</a></li>
                            <li><a class="white-text" href="about.html">Acerca</a></li>
                            <li><a class="white-text" href="games.html">Juegos</a></li>
                            <li><a class="white-text" href="shop.html">Tienda</a></li>
                            <li><a class="white-text" href="contactus.html">Contacto</a></li>
                             <li><a class="white-text" href="login.php">Log in</a></li>
                             
                            <li><a class="white-text" href="sitemap.html">Mapa del Sitio</a></li>
                        </ul>
                    </div>
                     <div class="col l3 s12">
                        <h5 class="white-text" aria-label="Language">Idioma</h5>
                        <ul>
                            <li><a class="white-text" href="index.html">Inglés</a></li>
                            <li><a class="white-text" href="es/index.html">Español</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="purple darken-1">
                <div class="container" >
                     Hecho por <a class="purple-text text-lighten-3"> Equipo 6</a>
                </div>
            </div>
        </footer>



        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
