<?php

 if(isset($_POST['chEmpp1'])){

   $SendRuc = $_POST['chEmpp1'];
   $datosEmpresa = MVCController::BuscaEmpresaRucController($SendRuc);


foreach ($datosEmpresa  as $row) {
          $NombreEmpresa = $row[0];
          $rucEmp = $row[1];
        }
 } else{

  $NombreEmpresa = 'Campo Vacio';
  $rucEmp = 'Parametro Vacio';
 }


?>

<section class="reclama">
     

      <div class="reclama-texto-bienvenido ">
            
            <div class="text-xs-center">
                <h3>Paso 2, Cuentanos lo que paso</h3>

            </div>


            <div class="block_reclamo">

                <form  method="POST" action="index.php?action=ReclamarPasoFinal" onSubmit="return validarPaso2()">
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
                        <label for="comment"> <strong> Cuentanos lo que paso </strong></label>
                        <textarea class="form-control" rows="5" id="reclamoPa2" name="reclamoPa2"></textarea>
                  </div>


                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  id="chTermCond" name="chTermCond" > <a href="" data-toggle="modal" data-target="#termCondiciones"> 
                        Acepto Terminos y condiciones</a>
                    </label>
                  </div>


                  <input type="submit"  value="Siguiente" class="btn-danger btn-lg" name="btnEnviarP3" id="btnEnviarP3">


                </form>  
              </div>

        </div>
          
        </div>


     
    </section>