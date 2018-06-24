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
            echo "<div role='alertdialog' aria-labelledby='dialog1Title' aria-describedby='dialog1Desc'>
  <div role='document' ta'bindex='0'>
    <h2 id='dialog1Title'>Error</h2>
    <p id='dialog1Desc'>wrong username or password</p>
   
  </div>
</div> ";
        }        
    }else{
        //echo "Error: No puedes dejar campos vacios.<br>";
        echo "<div role='alertdialog' aria-labelledby='dialog1Title' aria-describedby='dialog1Desc'>
  <div role='document' ta'bindex='0'>
    <h2 id='dialog1Title'>Error</h2>
    <p id='dialog1Desc'>You cant leave empty fields</p>
   
  </div>
</div>";
    }
    
        
 

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
 <h2 class="header center purple-text purple-lighten-2">Log In</h2>
<br>
        <div class="container">

            <div class="row" style="background: orange; padding:5px; text-align: center;">LOGIN ERROR</div>

            <div class="row">

                <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="username" name="username" type="text" class="validate" aria-required="true">
                                <label for="username">User Name</label>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" name="password" type="password" class="validate" aria-required="true">
                                <label for="password">Password</label>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <button class="btn  purple-effect purple" type="submit" name="submit">Submit
                                    <i class="material-icons right">send</i>
                                </button>
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
