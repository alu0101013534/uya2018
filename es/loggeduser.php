<?php
include_once 'controller.php';
/* Comprobar que se ha logeado, sino devolver a login */
secure_user();

if(isset($_POST['borrar'])){
	session_start();
    $usuario = $_SESSION['user'];

    if(delete_profile($usuario)){
    	echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><b>Cuenta eliminada correctamente.</b></div>";
        header("Location: login.php");
    }else{
        //echo "Error: No puedes dejar campos vacios.<br>";
        echo "<div class='row' style='margin-bottom:0px; background: orange; padding:5px; text-align: center;'><b>Error: No se pudo eliminar la cuenta.</b></div>";
    }
}

if(isset($_POST['logout'])){
	disconect_user($usuario);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head><!-- Global site tag (gtag.js) - Google Analytics --> <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121249718-1"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());    gtag('config', 'UA-121249718-1'); </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>UYA</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/userprofile.css" type="text/css" rel="stylesheet" />


    </head>
    <body>
        
        
        <nav class="purple darken-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="loggeduser.php" class="brand-logo">UYA</a>
                <ul class="right hide-on-med-and-down">
                    <li style="margin-left: 5px; margin-right: 5px;"><b>User: <?php echo $_SESSION['user']; ?></b></li>
                    <li>
                    	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button class="btn btn-small waves-effect waves-light purple darken-1" type="submit" name="logout">Salir</button>
						</form>
                    </li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li style="margin-left: 5px; margin-right: 5px;"><b>User: <?php echo $_SESSION['user']; ?></b></li>
                    <li>
                    	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button class="btn btn-small waves-effect waves-light purple darken-1" type="submit" name="logout">Salir</button>
						</form>
                    </li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        
        
                    <main role="main">
		<br>
		<div class="center">
			<div>
				<i class="large material-icons grey-text text-lighten-2">account_circle</i> 
			</div>
			<div>
				<h6 class="header center purple-text text-lighten-2">Usuario: <?php echo $_SESSION['user']; ?></h6>
			</div>	
			
			
		</div>
		<div>
			<div class="row">
				<div class="col s5 offset-s1">
					 <h5 class="header center purple-text purple-darken-2">Tu lista de deseo</h5>
				</div>
				<div class="col s5">
					 <h5 class="header center purple-text purple-darken-2">Tus Valoraciones</h5>
				</div>
			</div>
			<div class="row">
				<div class="col s5 offset-s1">
					<table class="striped centered responsive-table">
						<thead>
						  <tr>
							  <th>Nombre del juego</th>
						  </tr>
						</thead>
				
						<tbody>
						  <tr>
							<td>Clash Royale</td>
							
							<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">delete_forever</i> </a></td>
							<td> <a href= "solveqiuz.php"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
						  </tr>
						  <tr>
							<td>Fruit Ninja</td>
							
							<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">delete_forever</i> </a></td>
							<td> <a href= "solveqiuz.php"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
						  </tr>
						  <tr>
							<td>Candy Crush</td>
							
							<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">delete_forever</i> </a></td>
							<td> <a href= "solveqiuz.php"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
						  </tr>
						</tbody>
					</table>
				</div>
				<div class="col s5">
				<table class="striped centered responsive-table">
					<thead>
					  <tr>
						  <th>Nombre del juego</th>
						  <th>Estrellas</th>
					  </tr>
					</thead>
			
					<tbody>
					  <tr>
						<td>Clash of Clans</td>
						<td><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></td>
						<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
					  </tr>
					  <tr>
						<td>Fallout Shelter</td>
						<td><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></td>
						<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
					  </tr>
					  <tr>
						<td>Minecraft</td>
						<td><i class="material-icons">star</i></td>
						<td> <a href= "#"> <i class="small material-icons purple-text text-darken-1">pageview</i> </a></td>
					  </tr>
					</tbody>
					</table>
				</div>
			</div>
			<div class ="center">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<button class="btn btn-small waves-effect waves-light red darken-1" type="submit" name="borrar">Borrar cuenta</button>
				</form>
			</div>
			<br>
            <br>
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
