  <div class="content-wrapper">
    <div class="container-fluid">
      <!--
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Panel de Control</a>
        </li>
        <li class="breadcrumb-item active">Inicio</li>
      </ol>
      -->

      <div class="content">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="p-3 mb-2 bg-info text-white"> PASO 1 - ENCUENTRA TU EMPRESA </h3>
            </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-search"></i> Paso 1: Encontremos a la empresa</div>
        <div class="card-body">
          <div class="table-responsive">
           <section class="reclama">
              <div class="reclama-texto-bienvenido ">
                <div class="text-xs-center " >
                  <form method="POST">
                     <div class="form-group block_reclamo ">
                       <label for="name">Nombre Empresa:</label>
                       <input type="text"  width = "100%" id="buscaEmpresa" name="buscaEmpresa">
                       <button type="button" class="btn btn-success" id="btnBuscarEmrpesa" name="btnBuscarEmrpesa" > Buscar</button>
                     </div>
                   </form>
                </div>

                <div  class="block_reclamo"  name= "empEncontradas" id="empEncontradas" style="display: none">
                  <form method="POST" action="index.php?action=reclamarPaso2" onsubmit="return ValidaP1()">
                    <div class="container">
                        <h4>Empresas encontradas</h4>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>NombreEmpresa</th>
                              <th>RUC</th>
                              <th>Select</th>
                            </tr>
                          </thead>
                         
                          <tbody id="tEmpBody">

                            <?php
                                //$a = MVCControllerBkUser::BuscaEmpresaController();
                            ?>

                          </tbody>
                        </table>
                        <a class="btn btn-link" data-toggle="modal" data-target="#validateRuc" href="#">No se encuentra la empresa</a>
                        <input type="submit" value="Siguiente" class="btn  btn-danger btn-lg" id="btnEnviarP2" name="btnEnviarP2">


                      </div>
                     
                  </form>
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