<?php



 $validar = $_SESSION["validar"];
 $Temporal = $_SESSION["temp"];

 $id_user = $_SESSION["IdUser"] ;
 



 if ($validar == true ) {
    if(isset($_SESSION["nomUser"])){
     $nameUser = $_SESSION["nomUser"] ;
      $span = "";
      $codUser = $_SESSION["idUser"];
      $ActivateReclamos = "block";

      $mesages = MVCControllerBkUser::getNewMesages($codUser);
      $alert = MVCControllerBkUser::getCountMesages($codUser);


      if ($alert[0] == 0){
         $alerta = "none";
      }else{
         $alerta = "block";
      }


    }else{
      $nameUser = $_SESSION["IdUser"] ;
      $span = ""; 
    }
 } else if($Temporal == true) {
    $nameUser = "Usuario " . $_SESSION["idUser"] ;
    $span = "Sus datos no estan actualizados";
    $ActivateReclamos = "none";

 }else{
    header("Location: http://dev.reclameperu.com.pe/index.php?action=login");
    $span = "error error error error";
 }


?>


  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img src="Views/imag/logo.png" width="150"  height="30" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php?action=content">
            
            <span class="nav-link-text">
              Bienvenido(a), <?php echo ($nameUser) ?>
            </span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php?action=content">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Mi Perfil</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="index.php?action=changePwdUser">Cambiar Contraseña</a>
            </li>
            <li>
              <a href="index.php?action=updateUser">Actualizar Datos</a>
            </li>
          </ul>

          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion2" style="display: <?php echo $ActivateReclamos ; ?>">
            <i class="fa fa-fw fa fa-exclamation" ></i>
            <span class="nav-link-text">Reclamos</span>
          </a> 
            <ul class="sidenav-second-level collapse" id="collapseComponents2">
              <li>
                <a href="index.php?action=reclamarPaso1">Ingresar un Reclamo</a>
              </li>
            </ul>


        </li>

      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a  class="nav-link" href="http://dev.reclameperu.com.pe/">
            <i class="fa fa-fw fa-home"></i>Retornar a la pagina INICIO</a>
        </li>
        
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Mensajes
              <span class="badge badge-pill badge-primary"><?php echo $alert[0] ?></span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle" style="display: <?php echo $alerta ?> " ></i>
            </span>
          </a>

          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Nuevos Mensajes: <?php echo($alert[0]); ?></h6>
            <div class="dropdown-divider"></div>

            <?php 
                  foreach ($mesages as $key ) {

                    echo('
                     
                      
                     <a class="dropdown-item" data-toggle="modal" data-target="#messagaBodyModal" id="openModal" name="openModal" >
                      <strong > <span id = "StrTitulo"> '. $key[2] .' </span></strong>
                      <span class="small float-right text-muted"> '. $key[4] .' </span>
                      <span id="sidReclamo" name="sidReclamo" hidden> '. $key[5] .'  </span>
                      <div class="dropdown-message small" id="diBoby">
                            '.  $key[3] .'
                      </div>
                    </a>

                    ');
                 }
                 
            ?>

           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Ver todos los mensajes</a>
          </div>

        </li>
        <li class="nav-item dropdown">
          
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <!--
            <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-warning">6 nuevos alertas</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span> -->
          </a>
          <!--
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Nuevos Alertas:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Ver todos los alertas</a>
          </div> -->


        </li>
        <!--
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Buscar por...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->

        


        <li class="nav-item">
          <a  class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
