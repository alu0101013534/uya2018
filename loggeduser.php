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
     <head>     <!-- Page-hiding snippet (recommended)  -->     <style>.async-hide { opacity: 0 !important} </style>     <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;     h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};     (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;     })(window,document.documentElement,'async-hide','dataLayer',4000,     {'GTM-NTCL4GD':true});</script>     <!-- Modified Analytics tracking code with Optimize plugin -->         <script>         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');          ga('create', 'UA-121249718-1', 'auto');         ga('require', 'GTM-NTCL4GD');         ga('send', 'pageview');         </script>                
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>UYA</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet"  />
        <link href="css/style.css" type="text/css" rel="stylesheet"  />
        <link href="css/userprofile.css" type="text/css" rel="stylesheet" />


    </head>
    <body>
        
        
       <nav class="purple darken-1" role="navigation"  >
            <div class="nav-wrapper container" role="menubar"><a id="logo-container" href="#" class="brand-logo">UYA</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.html" role="menuitem" aria-label="Home">Home</a></li>
                    <li><a href="about.html"  role="menuitem"aria-label="About">About</a></li>
                    <li><a href="games.html"  role="menuitem"aria-label="Games">Games</a></li>
                    <li><a href="shop.html"  role="menuitem"aria-label="Shop">Shop</a></li>
                    <li><a href="contactus.html"  role="menuitem"aria-label="Contact Us">Contact Us</a></li>
                     <li><a href="login.php"  role="menuitem"aria-label="Log in">Log in</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav" aria-hidden="true">
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
        
        
                    <main role="main">
		<br>
		<div class="center">
			<div>
				<i class="large material-icons grey-text text-lighten-2">account_circle</i> 
			</div>
			<div>
				<h6 class="header center purple-text text-lighten-2">User: <?php echo $_SESSION['user']; ?></h6>
			</div>	
			
			
		</div>
		<div>
			<div class="row">
				<div class="col s5 offset-s1">
					 <h5 class="header center purple-text purple-darken-2">Your Wishlist</h5>
				</div>
				<div class="col s5">
					 <h5 class="header center purple-text purple-darken-2">Your Reviews</h5>
				</div>
			</div>
			<div class="row">
				<div class="col s5 offset-s1">
					<table class="striped centered responsive-table">
						<thead>
						  <tr>
							  <th>Game name</th>
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
						  <th>Game name</th>
						  <th>Stars</th>
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
					<button class="btn btn-small waves-effect waves-light red darken-1" type="submit" name="borrar">Delete profile</button>
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
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of 3 college students working on this project for the Usability and accessibility subject.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text" aria-label="Links">Links</h5>
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
                        <h5 class="white-text" aria-label="Language">Language</h5>
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
