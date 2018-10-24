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



<section class="reclama">
     

      <div class="reclama-texto-bienvenido ">
            
            <div class="text-xs-center">

                <h3>Paso 3, Publicamos tu reclamo</h3>

            </div>
            

            <div class="block_reclamo">

            <form method="post" action="index.php?action=index">
                    
                    <div class="form-group">
                       <label for="NameUserReg"> <strong> TITULO RECLAMO </strong> </label>
                       <input type="text" class="form-control"  id="TituloReclamoPF" name="TituloReclamoPF">                  
                     </div>


                    <div class="form-group">
                       <label for="NameUserReg"> <strong>NOMBRE EMPRESA </strong></label>
                       <input type="text" class="form-control" id="nomEmpPF" name="nomEmpPF" value="<?php echo($nom_emp); ?>">                  
                     </div>
                    <div class="text-xs-center">
                      <h4>
                        <strong>DATOS DONDE TE PUEDEN CONTACTAR</strong>
                      </h4>
                    </div>

                    <div>
                    <span>
                         <div class="alert alert-info"> 
                           <button type="button" class="close" data-dismiss="alert">&times;</button> 
                           <p><strong>Nota: </strong>
                           Si los datos que se muestran no son sus datos actuales por favor, realizar los cambios en la configuracion de su perfil.</p>
                         </div>
                    </span>
                    </div>


                    <div class="form-group">
                      <label for="emailRegistro"> <strong>CELULAR </strong> </label>
                      <input type="text" class="form-control" id="telefUserPF" name="telefUserPF" value="<?php echo($celUser); ?>">                  
                    </div>
                    <div class="form-group">
                      <label for="emailRegistro"> <strong>EMAIL</strong></label>
                      <input type="email" class="form-control" id="emailUserPF" name="emailUserPF" value="<?php echo($emailUser); ?>">                  
                    </div>
                     <!--

                     <a href="index.php?action=ReclamarPaso2" class="btn  btn-danger btn-lg">Atras</a> 
                     <input type="submit" name="btnFinalizarReclamo" id="btnFinalizarReclamo" value="Finalizar" class="btn-danger btn-lg"> 

                     --> 
                     <button type="button" name="btnFinalizarReclamo" id="btnFinalizarReclamo"  class="btn-danger btn-lg" > Guardar reclamo </button>

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