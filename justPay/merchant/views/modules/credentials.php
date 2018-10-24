<?php
  
 $m_id = $_SESSION["m_id"] ;

 $credentials = MVCControllerMerchantJP::getCredentialsMerchant($m_id);

 //print_r($credentials);


?>

<div class="container">
  <div class="row">
      <div class="col-sm-2"> </div>
      <div class="col-sm-8"> 

      <div class="container">

        <div class="alert alert-info">
          <strong>IMPORTANTE!</strong> Se recominda generar solo una vez las credenciales, realizar cambios solo si se requiere.
          De realizar algun cambio recuerde que tiene que cambiar tambien en su desarrollo.
        </div>

        

        <!-- Horizontal form -->
            <div class="card">
              <div class="row"> 
                
                <div class="col-sm-12 text-center"> <h2>Credentials</h2> </div>
                
             </div>

              <div class="card-body">
                <form action="#">
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">PUBLICK KEY</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" value=" <?php echo $credentials[1]  ?> " readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">SECURE KEY</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" value=" <?php echo $credentials[2]  ?>" readonly>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Generar <i class="icon-paperplane ml-2"></i></button>

                    <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>

                  </div>
                </form>
              </div>
            </div>
            <!-- /horizotal form -->


      </div>


      </div>
      <div class="col-sm-2"> </div>
  </div>

 
</div>

