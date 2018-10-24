<?php

  ob_start();
  session_start();

  $validar = $_SESSION["validar"];
  
  if($validar == true) {
    $emailUser = $_SESSION["emailUser"];
    $celUser = $_SESSION["celUser"];
  } else {
    $emailUser  = "S/N";
    $celUser = "S/N";
  }


  if(isset($_POST['nameEmprPa2'])) {

    $nom_emp = $_POST['nameEmprPa2'];
    $reclamo = $_POST['reclamoPa2'];
    $ruc = $_POST['rucPa2'];
    $tipo = $_POST['cmbTipoPA2'];

  }else{

    $nom_emp = "Sin Datos";
  }

  
?>


<div class="content-wrapper">
    <div class="container-fluid">

<div class="content">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="p-3 mb-2 bg-info text-white"> GENIAL - SOLO UN PASO MAS </h3>
            </div>
        </div>
</div>
      
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-check"></i> Paso final: Coloca un titulo y hagamoslo publico</div>
        <div class="card-body">
          <div class="table-responsive">
           <section class="reclama">
     

      <div class="reclama-texto-bienvenido ">
         
            <div class="block_reclamo">

            <form method="post" action="index.php?action=index">
                    
                    <div class="form-group">
                       <label for="NameUserReg"> <strong> Titulo del Reclamo </strong> </label>
                       <input type="text" class="form-control"  id="TituloReclamoPF" name="TituloReclamoPF">                  
                     </div>


                    <div class="form-group">
                       <label for="NameUserReg"> <strong>Nombre de la Empresa</strong></label>
                       <input type="text" class="form-control" id="nomEmpPF" name="nomEmpPF" value="<?php echo($nom_emp); ?>">                  
                     </div>
                    <div class="text-xs-center">
                      <h4>
                        <strong>Datos dónde te pueden contactar</strong>
                      </h4>
                    </div>

                    <div>
                    <span>
                         <div class="alert alert-info"> 
                           <button type="button" class="close" data-dismiss="alert">&times;</button> 
                           <p><strong>Nota: </strong>
                           Si los datos que se muestran no son sus datos actuales por favor, realizar los cambios en la opción <b>Mi Perfil</b> > <b>Actualizar Datos</b> </p>
                         </div>
                    </span>
                    </div>


                    <div class="form-group">
                      <label for="emailRegistro"> <strong>Celular </strong> </label>
                      <input type="text" class="form-control" id="telefUserPF" name="telefUserPF" value="<?php echo($celUser); ?>">                  
                    </div>
                    <div class="form-group">
                      <label for="emailRegistro"> <strong>Correo</strong></label>
                      <input type="email" class="form-control" id="emailUserPF" name="emailUserPF" value="<?php echo($emailUser); ?>">                  
                    </div>
                     <!--

                     <a href="index.php?action=ReclamarPaso2" class="btn  btn-danger btn-lg">Atras</a> 
                     <input type="submit" name="btnFinalizarReclamo" id="btnFinalizarReclamo" value="Finalizar" class="btn-danger btn-lg"> 

                     --> 
                     <button type="button" name="btnFinalizarReclamo" id="btnFinalizarReclamo"  class="btn-danger btn-lg" > Publicar Reclamo </button>
                     <button type="button" name="btnRedirectMisreclamos" id="btnRedirectMisreclamos"  class="btn-success btn-lg" style="display: none"> Ir a mis reclamos </button>

                     <span id="msg_saveReclamo">
                       
                     </span>

                     <div style="display: none" id="dDateSecondary">
                       <textarea id="tReclamoPF" name="tReclamoPF"> <?php echo($reclamo); ?> </textarea>
                       <input type="text" id="rucPF" name="rucPF" value="<?php echo($ruc); ?>">
                       <input type="text" id="tipoPF" name="tipoPF" value="<?php echo($tipo); ?>">
                     </div>

                    

                  </form>
              </div>

        </div>
          
        </div>


     
    </section>


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