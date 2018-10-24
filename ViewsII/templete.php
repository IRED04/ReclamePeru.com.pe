<?php
 ob_start();
 if(isset($_SESSION["nomUser"])) {
     $Nombre = $_SESSION["nomUser"];
     $active1 = "display: block;" ;
     $active2 = "display: none;" ;
  } else {
     $Nombre = "Login";
     $active1 = "display: none;" ;
     $active2 = "display: block;" ;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Views/css/bootstrap.css">
    <!-- Carga de fuentes de Font  Awesome -->
     <link rel="stylesheet" href="Views/css/font-awesome.min.css">
    <!-- Carga de estilos css personalizados -->
    <link rel="stylesheet" href="Views/css/estilos.css">
    <!-- Scroll Var-->
    <script src="Views/js/smooth-scroll.min.js"> </script>
    <script src="Views/js/validaUser.js"> </script>

         
    <script>
      var scroll = new SmoothScroll('a[href*="#"]', {
        // Selectors
          ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
          header: null, // Selector for fixed headers (must be a valid CSS selector)

          // Speed & Easing
          speed: 500, // Integer. How fast to complete the scroll in milliseconds
          offset: 0, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
          easing: 'easeInOutCubic', // Easing pattern to use
          customEasing: function (time) {

          // Function. Custom easing pattern
            // If this is set to anything other than null, will override the easing option above

            // return <your formulate with time as a multiplier>

            // Example: easeInOut Quad
            return time < 0.5 ? 2 * time * time : -1 + (4 - 2 * time) * time;
          },

          // Callback API
          before: function (anchor, toggle) {}, // Callback to run before scroll
          after: function (anchor, toggle) {} // Callback to run after scroll
      });

    </script>
   

  </head>

  <body>
	  <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

    <!--Invocamos a todos los modulos Index,Que hacemos,Ultimos Reclamos-->
    
   
   <?php
      include ("Modules/cabecera.php");
    ?>

    <section>
        <?php
            $mvc = new MvcController();
            $mvc -> enlacesPaginasController();
        ?>
    </section>

     
    
    
    <?php
       
        include("Modules/footer.php");
    
    ?>

    <?php
        //Incluyendo Modal
        include("Modules/Modal/login.php");
        include("Modules/Modal/QueHacemos.php");
        include("Modules/Modal/minfouni.php"); 
        include("Modules/Modal/m_info_col.php"); 
        include("Modules/Modal/ConsultaEmpxRuc.php"); 
        include("Modules/Modal/Contactanos.php"); 
        include("Modules/Modal/salir.php"); 
        include("Modules/Modal/termiCondiciones.php"); 
        include("Modules/Modal/PoliticasPrivacidad.php"); 
    ?>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->


    <script src="Views/js/jquery.min.js"></script>
    <script src="Views/js/bootstrap.min.js"></script>
    <script src="Views/js/internal.js"></script>
    <script src="Views/js/validate.js"></script>

   


  </body>
</html>
