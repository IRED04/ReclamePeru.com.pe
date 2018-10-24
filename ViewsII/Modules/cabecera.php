
<?php
 
 ob_start();
 session_start();
 
 if(isset($_SESSION["nomUser"])) {
     $Nombre = $_SESSION["nomUser"];
     $active1 = "display: none;" ;
     $active2 = "display: block;" ;
     $session = 1;
     $idUser = $_SESSION["idUser"];
  } else {
     $Nombre = "LOGIN/REGISTRO";
     $active1 = "display: block;" ;
     $active2 = "display: none;" ;
     $session = 0;
  }

?>

<header class="encabezado">

  
       <nav class="navbar navbar-light navbar-fixed-top">
         <div class="row">  
            <div class="col-md-6" style=" color: white; background-color: #2a2f33 ">
               <div>
                <i class="fa fa-envelope"></i>
                   soporte@reclameperu.com.pe
               </div>

            </div>
  
            <div class="col-md-6 " style="  color: white; background-color: #2a2f33 ">

               <div class="text-xs-right"> 

                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-pinterest"></i>
              </div>
                 
               
            </div>
            
         </div>
        </nav>

        <nav class="navbar navbar-light navbar-fixed-top">
          <div class="container" id="sec1">
              <button class="navbar-toggler hidden-md-up float-xs-right" type="button" data-toggle="collapse" data-target="#menuprincipal">&#9776;</button>
               <a class="navbar-brand" href="index.php?action=index" >
                  <img src="Views/images/logo.png" alt="" class="logoPrin"> 
                </a>
              
              <div style="display: none">
                <input id="secUserIndex"  name="secUserIndex"  value = "<?php  echo($session); ?>" >
             </div>
              <!--Menu Principal-->  
              <div style="display: block"  id="men_Princ"> 
                 <div class="collapse navbar-toggleable-sm float-md-right" id="menuprincipal">
                         <ul class="nav navbar-nav">
                          <li class="nav-item ">
                            <a class="nav-link" href="index.php?action=index">Inicio</a>
                          </li>
                          
                          <li class="nav-item">
                            <a class="nav-link" href="#sec2">Que Hacemos</a>
                          </li>
          
                          <li class="nav-item">
                            <a class="nav-link" href="#sec3">Ultimos Reclamos</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" data-toggle="modal" data-target="#form_to_support" href="" >Contactanos</a>

                            <span ></span>
                          </li>
          
                         <!--
                         <li class="nav-item">
                            <a class="btn btn-link" id="demo" data-toggle="modal" data-target="#login" href=""> Usuario  </a>
                         </li>
                         -->

                        
                         <li class="nav-item dropdown" style="<?php echo $active1 ?>">
                            
                            <a class="nav-link dropdown-toggle" href="" id="menuUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   <?php  echo ($Nombre); ?> 
                            </a>

                             <div class="dropdown-menu" aria-labelledby="menuUser" id="insertSec" >
                               <a class="dropdown-item" id="demo" data-toggle="modal" data-target="#login" href=""> Ingresar </a>
                             </div>

                        </li>

                        <li class="nav-item dropdown" style="<?php echo $active2 ?>">

                            <a class="nav-link dropdown-toggle" href="" id="menuUser" value = "<?php  echo($Nombre); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php  echo ($Nombre); ?> </a>

                            <div class="dropdown-menu" aria-labelledby="menuUser" id="closeSec" >
                                <a class="dropdown-item" id=""  href="index.php?action=MisReclamos&idUser= <?php echo($idUser) ?> "> Mis Reclamos </a>
                                <a class="dropdown-item" id=""  href=""> Mi Perfil </a>
                                <a class="dropdown-item" href="index.php?action=salir"> Cerrar session </a>
                            </div>
                        </li>


                      </ul>
                  </div>
                </div>

                 <!--FIN-->

                  <!--Other Menu-->    
               <div style="display: none;" id="men_Other"> 
                 <div class="collapse navbar-toggleable-sm float-md-right" id="menuprincipal">
                         <ul class="nav navbar-nav">
                          <li class="nav-item ">
                             <a class="nav-link" href="index.php?action=index">Inicio</a>
                          </li>
                          
                         <li class="nav-item">
                            <a class="btn btn-link" id="demo" data-toggle="modal" data-target="#login" href="#">Ingresar/Registrar</a>
                         </li>
                      </ul>
                  </div>
                </div>

          </div>
        </nav>

        

    </header>




