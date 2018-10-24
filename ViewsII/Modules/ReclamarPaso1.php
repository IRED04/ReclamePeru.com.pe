<?php

 ob_start();
 session_start();
$validar = $_SESSION["validar"];

 //if($validar == false){

    //header('Location: index.php?action=index');

    //return 0;
 //}

 if(isset($_SESSION["nomUser"])) {
    $Nombre = $_SESSION["nomUser"];
  } else {
     $Nombre = "Login";
  }

 
?>
<section class="reclama">
      <div class="reclama-texto-bienvenido ">
            
            <div>

                <div class="text-xs-center " >
                   <h3>Paso 1, Encontremos a la empresa</h3>
    
                   <form method="POST">
                     <div class="form-group block_reclamo ">
                       <label for="name">Nombre Empresa:</label>
                       <input type="text"  width = "60%" id="buscaEmpresa" name="buscaEmpresa">
                       <button type="button" class="btn btn-success" id="btnBuscarEmrpesa" name="btnBuscarEmrpesa" > Buscar </button>
                     </div>
                   </form>
                </div>

                <div  class="block_reclamo"  name= "empEncontradas" id="empEncontradas" style="display: none">
                  <form method="POST" action="index.php?action=ReclamarPaso2" onsubmit="return ValidaP1()">
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
                                $a = MVCController::BuscaEmpresaController();
                            ?>

                          </tbody>
                        </table>
                        <a class="btn btn-link" data-toggle="modal" data-target="#validateRuc" href="#">No se encuentra la empresa</a>
                        <input type="submit" value="Siguiente" class="btn  btn-danger btn-lg" id="btnEnviarP2" name="btnEnviarP2">


                      </div>
                     
                  </form>
               </div>
            </div>
          
        </div>


     
    </section>