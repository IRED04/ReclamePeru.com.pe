<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Reclame Peru Panel del Usuario</title>
  <!-- Bootstrap core CSS-->
  <link href="Views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="Views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="Views/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="Views/css/sb-admin.css" rel="stylesheet">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121043538-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121043538-1');
</script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
  <?php

    include "Views/Modules/nav.php";

  ?>

  <?php
   $getContent = new MVCControllerBkUser();
    $getContent -> enlacesPaginasBkUser();
  ?>

   <!-- Modal -->
  <?php

    include "Views/Modules/Modal/salir.php";
    include "Views/Modules/Modal/ConsultaEmpxRuc.php";
     include "Views/Modules/Modal/messagesBody.php";


  ?>
      <!-- Bootstrap core JavaScript-->
    <script src="Views/vendor/jquery/jquery.min.js"></script>
    <script src="Views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="Views/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="Views/vendor/chart.js/Chart.min.js"></script>
    <script src="Views/vendor/datatables/jquery.dataTables.js"></script>
    <script src="Views/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="Views/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="Views/js/sb-admin-datatables.min.js"></script>
    <script src="Views/js/sb-admin-charts.min.js"></script>
    <script src="Views/js/MyAjaxBkUs.js"></script>
    <script src="Views/js/MyValidateBkUs.js"></script>

</body>

</html>
