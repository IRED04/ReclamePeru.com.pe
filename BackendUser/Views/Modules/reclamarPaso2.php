<?php

 if(isset($_POST['chEmpp1'])){

   $SendRuc = $_POST['chEmpp1'];
   $datosEmpresa = MVCControllerBkUser::BuscaEmpresaRucController($SendRuc);


foreach ($datosEmpresa  as $row) {
          $NombreEmpresa = $row[0];
          $rucEmp = $row[1];
        }
 } else{

  header('location: index.php?action=reclamarPaso1');

 }


?>



<div class="content-wrapper">
    <div class="container-fluid">

<div class="content">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="p-3 mb-2 bg-info text-white"> PASO 2 - CUENTANOS QUE PASO </h3>
            </div>
        </div>
</div>


    
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bullhorn"></i> Paso 2: Cuéntanos lo que pasó</div>
        <div class="card-body">
          <div class="table-responsive">
           <section class="reclama">
      <div class="block_reclamo">

                <form  method="POST" action="index.php?action=reclamarPasoFinal" onSubmit="return validarPaso2()">
                  <div class="form-group">
                    <label for="NombreEmpresa"> <strong>Nombre de la empresa</strong></label>
                    <input type="text" class="form-control" id="nameEmprPa2" name="nameEmprPa2" placeholder="Nombre Empresa" value="<?php echo($NombreEmpresa); ?> "  >
                  </div>
                  
                  <div class="form-group">
                      <div >
                         <label for="NameUserReg"> <strong>Tipo </strong>  </label>
                      </div>
                      <div >
                         <select name="cmbTipoPA2" id="cmbTipoPA2" class="form-control" >
                            <option value="0">Seleccione</option>
                             <option value="1">RECLAMO</option>
                             <option value="2">QUEJA</option>
                          </select>
                          <span id="infoTipoRec"></span>
                       </div>

                  </div>


                  <div class="form-group" style="display: none" id="drucPa2">
                    <input type="text" class="form-control" id="rucPa2" name="rucPa2" value="<?php echo($rucEmp); ?> "  >
                  </div>
                  
                  <div class="form-group">
                    <label for="SubirArchivo"> Subir Archivo </label>
                    <input type="file" id="ejemplo_archivo_1" value="Seleccionar" >
                    

                  </div>
                  
                  <div class="form-group">
                        <label for="comment"> <strong> Ingrese reclamo: </strong></label>
                        <textarea class="form-control" rows="5" id="reclamoPa2" name="reclamoPa2"></textarea>
                  </div>


                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  id="chTermCond" name="chTermCond" > <a href="" data-toggle="modal" data-target="#termCondiciones"> 
                        Acepto Términos y Condiciones</a>
                    </label>
                  </div>


                  <input type="submit"  value="Siguiente" class="btn-danger btn-lg" name="btnEnviarP3" id="btnEnviarP3">


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


  