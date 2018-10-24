<?php

 $validar = $_SESSION["validar"];
 $Temporal = $_SESSION["temp"];

 if ($validar == true ) {
    if(isset($_SESSION["nomUser"])){
      $span = "";
      $visible = "block";
      $editar = "none";
      $inactivar = "enabled";
      $btnActive = "";
      $idUser = $_SESSION["idUser"] ; 
      
      $getDatos = MVCControllerBkUser::getDataUserxIDController($idUser);
      foreach ( $getDatos as $key ) {
         $nombreUser  = $key[0];
         $apellido = $key[1];
         $cel = $key[2];
         $tipDoc = $key[3];
         $numDoc = $key[4];
         $gen = $key[5];
         $fecNaci = $key[6];
         $dep = $key[7];
         $dis = $key[8];
         $prov = $key[9];
  
      }

    }




 } else if($Temporal == true) {
    $span = '<div class="alert alert-danger"> 
             <button type="button"  class="close" data-dismiss="alert"> &times </button>
             <div class="text-center">
                <p> <strong> ¡Genial!</strong> Muchas gracias por registrarte</p> 
             </div>

            <p>
              <strong> ¡Recuerda! </strong> ReclamePeru no expone tu informacion personal, pero para nosotors si es <strong> importante    </strong> conocerte un poco mas.

              Por favor llena este pequeño formulario y podras presentar tus quejas y reclamos.
            </p> 

             </div>' ;
    $inactivar = "";
    $btnActive = "disabled";  
    $idUser = $_SESSION["idUser"] ; 
     $visible = "none";
     $editar = "block";     

    //$getDatos = MVCControllerBkUser::getDateUserxIDController();


 }else{
    header("Location: http://dev.reclameperu.com.pe/index.php?action=login");

    $span = "error error error error";
 }

?>



  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Panel de Control</a>
        </li>
        <li class="breadcrumb-item active">Mi Perfil</li>
      </ol>
     <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-info"></i> Datos Personales </div>
         <div class="container">
     <span> <?php  echo ($span) ?></span>

           
    <div class="card card-register mx-auto mt-5">
      <span id="ResponseUdateUserDate"> </span>
      
       <!-- INICIO -->
      <div class="card-body" id="MostrarDetUser" style="display: <?php echo $visible; ?>">
         
       
        <form>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="Nombre"><strong> Nombre: </strong></label>
                <input class="form-control-plaintext" id="Nombre" type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($nombreUser) ; ?> ">
              </div>
              <div class="col-md-6">
                <label for="Apellido"> <strong> Apellido: </strong></label>
                <input class="form-control-plaintext" id="Apellido" type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($apellido) ; ?> ">
              </div>
            </div>
          </div>

          <div class="form-group">

           <div class="form-row">
              <div class="col-md-6" >
                <label for="Nombre"> <strong> Email: </strong></label>
                <input class="form-control-plaintext" id="Nombre" type="text" aria-describedby="nameHelp" placeholder=""  disabled >
              </div>
              <div class="col-md-6">
                <label for="Apellido"> <strong> Celular: </strong></label>
                <input class="form-control-plaintext" id="Apellido" type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($cel) ; ?> " >
              </div>
            </div>
          </div>
          <div class="form-group">

            <div class="form-row" id="NotUpdate" >

               <div class="col-md-6">
                 <label for= "disabledInput"> <strong> Tipo de Documento: </strong></label>
                 
                 <input class="form-control-plaintext" id="tipDoc" type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($tipDoc) ; ?> " >

               </div>
               <div class="col-md-6">
                 <label for="disabledInput" > <strong> Número de Documento: </strong></label>
                    <input class="form-control-plaintext" id="disabledInput" type="text" placeholder="Numero" <?php echo $inactivar; ?> value="<?php print_r($numDoc) ; ?> " >
               </div>
               <div class="col-md-6">
                 <label for="disabledInput"> <strong> Género: </strong> </label>
                 <input class="form-control-plaintext"  type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($gen) ; ?> " >

               </div>
               <div class="col-md-6">
                 <label for="disabledInput"> <strong> Fecha de Nacimiento </strong></label>
                   <div>
                      <input class="form-control-plaintext" id="disabledInput" type="text" placeholder="DD/MM/AAAA"  <?php echo $inactivar; ?> value="<?php print_r($fecNaci) ; ?> " >
                   </div>
                </div>
                


              </div>
            </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for= "TipoDoc"> <strong> Departamento: </strong> </label>
                <input class="form-control-plaintext"  type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($dep) ; ?> " >

              </div>
                <div class="col-md-6">
                <label for= "TipoDoc"> <strong> Provincia: </strong> </label>
                <input class="form-control-plaintext"  type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($dis) ; ?> " >
              </div>
                <div class="col-md-6">
                <label for= "TipoDoc"><strong> Distrito:</strong></label>

                <input class="form-control-plaintext" type="text" aria-describedby="nameHelp" placeholder="" value="<?php print_r($prov) ; ?> " >
              
              </div>
               
              </div>
            </div>
            <button class="btn btn-primary" type="button" id="btnEditUsuario">Editar</button>
            <div style="display: none">
              <input type="text" id="IdUserUp" value=" <?php echo($idUser);?> ">
            </div>
        </form>
       
      </div>
      <!-- FIN -->

      <!-- INICIO -->
      

      <div class="card-body" id="editDetUser" style="display: <?php echo $editar; ?>;">
         

        <form>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="Nombre">Nombre:</label>
                <input class="form-control" id="NombreReg" type="text" aria-describedby="nameHelp" placeholder="">
              </div>
              <div class="col-md-6">
                <label for="Apellido">Apellido:</label>
                <input class="form-control" id="ApellidoReg" type="text" aria-describedby="nameHelp" placeholder="" >
              </div>
            </div>
          </div>

          <div class="form-group">
           <div class="form-row">
              <div class="col-md-6" >
                <label for="Nombre">Email:</label>
                <input class="form-control" id="emilReg" type="text" aria-describedby="nameHelp" placeholder=""  disabled >
              </div>
              <div class="col-md-6">
                <label for="Apellido">Celular:</label>
                <input class="form-control" id="celReg" type="text" aria-describedby="nameHelp" placeholder=""  >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row" id="NotUpdate" >

               <div class="col-md-6">
                 <label for= "disabledInput">Tipo de Documento:</label>
                 <select class="form-control" id="tipDocReg" <?php echo $inactivar; ?> >
                     <option value="0">SELECCIONE</option>
                     <option value="1">DNI</option>
                     <option value="2">Carnet de Extranjeria</option>
                     <option value="4">Pasaporte</option>
                 </select>
               </div>
               <div class="col-md-6">
                 <label for="disabledInput" >Número de Documento:</label>
                    <input class="form-control" id="numDocReg" type="text" placeholder="Numero" <?php echo $inactivar; ?> >
               </div>
               <div class="col-md-6">
                 <label for="disabledInput">Género:</label>
                 <select class="form-control" id="genReg" <?php echo $inactivar; ?>>
                     <option value="0">SELECCIONE</option>
                     <option value="F">Mujer</option>
                     <option value="M">Varon</option>
                 </select>
               </div>
               <div class="col-md-6">
                 <label for="disabledInput">Fecha de Nacimiento</label>
                   <div>
                      <input class="form-control" id="fecNaciReg" type="date" placeholder="DD/MM/AAAA"  <?php echo $inactivar; ?> >
                   </div>
                </div>
                
              </div>

            </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for= "TipoDoc">Departamento:</label>
            <select class="form-control" id="depId" name="depId">
                    <option value="0">Seleccione</option>
                    <?php
                      $a = new DatosBkUs();
                      $a-> CargaComboDepartamentos();
                    ?>

            </select>

              </div>
                <div class="col-md-6">
                <label for= "TipoDoc">Provincia:</label>
            <select class="form-control" id="propId" name="propId"> </select>
              </div>
                <div class="col-md-6">
                <label for= "TipoDoc"> Distrito:</label>

            
            <select class="form-control" id="distId" name="distId"> </select>
              
              </div>
               
              </div>
            </div>
            
            <button class="btn btn-danger" type="button" id="btnCancel" <?php echo $btnActive; ?>   >Cancel</button>
            <button class="btn btn-primary" type="button" id="btnGrabarUsuario" name="btnGrabarUsuario">Grabar</button>
            <div style="display: none">
              <input type="text" id="IdUserUp" value=" <?php echo($idUser);?> ">
            </div>
        </form>
       
      </div>

      <!-- FIN  -->




    </div>
  </div>


        <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Reclame Peru 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

  </div>