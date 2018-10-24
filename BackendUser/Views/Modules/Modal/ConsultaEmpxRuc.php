<!-- Modal Login-->
<div class="modal fade" id="validateRuc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCabRegistraEmpresa">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-md-12" ">
                  <form   >
                    
                    <div id="validaRucP1">
                     <div class="form-group">
                       <label for="ruc"> <strong>Ingrese numero de RUC </strong> </label>
                       <input type="text" class="form-control" name="valRucEmp" id="valRucEmp" placeholder="Ingrese n° RUC "  maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                     </div>

                     <div>
                       <span id="SpanRespValidaEmp"></span>

                     </div>
                     
                      <div id="BtnsValidarP1">
                       <button type="button" name="btnRegistraEmpresa" id="btnRegistraEmpresa" class="btn btn-success"> VALIDAR </button>

                       <button type="button" class="btn btn-link" id="redirecSunat" name="redirecSunat"> NO CUENTO CON EL RUC </button>

                       

                      </div>
                    
                     </div>


                    <div id="DatosEmpresas" style="display: none">
                      <div class="form-group">
                        <label for="nomEmpresa"> Razon Social </label>
                        <input type="text" class="form-control" name="razSoc" id="razSoc" disabled>  
                      </div>

                      <div class="form-group">
                        <label for="direccion"> Direccion: </label>
                        <input type="text" class="form-control" name="dire" id="dire" disabled>  
                      </div>

                      <div class="form-group">
                        <label for="Status"> Status: </label>
                        <input type="text" class="form-control" name="status" id="status" disabled>  
                      </div>
                      
                      <button type="button" name="btnRegistraEmpresa" id="btnRegistraEmpresa" class="btn btn-success"> REGISTRAR </button>


                    </div>
                    
                  </form>
              </div>
              
           
        </div>
      </div>  
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnSalirRegEmp">Salir</button>
      </div>
    </div>
  </div>
</div>


<?php
  
  /* if(isset($_POST['ruc'])) {
    $ruc = $_POST['ruc'];

    $a = new MVCController();
    $a ->consultaRuc($ruc);
  } */
?>