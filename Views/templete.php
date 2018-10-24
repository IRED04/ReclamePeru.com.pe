<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>ReclamePeru - DEV</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700%7CPlayfair+Display:400,700,700i,900,900i">
    <link rel="stylesheet" href="Views/css/style.css">
    <script src="Views/js/myScripts.js"> </script>



  
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121043538-1"></script>

    
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-121043538-1');
  </script>

  





  </head>
  <body>
    <div class="page">
      <?php
        
            $mvc = new MvcController();
            $mvc -> enlacesPaginasController();    

            
      ?>

    </div>
    <div class="snackbars" id="form-output-global"></div>



    
    <script src="Views/js/core.min.js"></script>
    <script src="Views/js/script.js"></script>
    <script src="Views/js/MyAjax.js"></script>
    <script src="Views/js/MyValidate.js"></script>



  </body>
</html>