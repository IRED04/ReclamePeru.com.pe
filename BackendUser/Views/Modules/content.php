<?php

  $idUser = $_SESSION["idUser"] ;
  $ResponseReclamos  = MVCControllerBkUser::getReclamosxUserController($idUser);


?>



<div class="content-wrapper">
    <div class="container-fluid">
    
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Panel de Control</a>
        </li>
        <li class="breadcrumb-item active">Inicio</li>
      </ol>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Mis Reclamos

        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Reclamo</th>
                  <th>Empresa</th>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Reclamo</th>
                  <th>Empresa</th>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
              <tbody>
                    <?php
                       foreach ($ResponseReclamos  as $reclamos) {
                         
                          if ($reclamos[0] == '1'){
                            $color = '#9d9315';
                            $status = 'En Revision';
                            $icono = 'fa fa-eye';
                          }else if($reclamos[0] == '2'){
                            $color = 'green';
                            $status = 'Publicado';
                            $icono = 'fa fa-thumbs-o-up';
                          }else if($reclamos[0] == '0'){
                            $color = 'red';
                            $status = 'Rechazado';
                            $icono = 'fa fa-times';
                          }


                           echo(
                              "<tr>" .
                                "<td style='color:"  . $color . " '>"  .  $status  ." 
                                <span class= '" . $icono . "''> </span>        
                                </td>".
                                "<td>" .  $reclamos[2] ."</td>".
                                "<td>" .  $reclamos[3] ."</td>". 
                                "<td>" .  $reclamos[4] ."</td>".
                                "<td>" .  $reclamos[5] ."</td>".

                                '<td>
                                  <button style="font-size:14px" title="Hubo acuerdo con la empresa?"><i class="fa fa-handshake-o"></i></button>
                                  <button style="font-size:14px" title="Que nota le da a la empresa?"><i class="fa fa-star"></i></button>
                                  <button style="font-size:14px" title="Editar Reclamo"><i class="fa fa-edit"></i></button>
                                </td>'.

                              "</tr>" 

                           );
                       }
                    ?>
                  
                <!-- /.container-fluid 
                <tr>
                  <td>Publicado</td>
                  <td>Malo servicio brindado</td>
                  <td>Saga Falabella</td>
                  <td>100349</td>
                  <td>16/05/2018</td>
                  <td><button style="font-size:14px" title="Hubo acuerdo con la empresa?"><i class="fa fa-handshake-o"></i></button>
                      <button style="font-size:14px" title="Que nota le da a la empresa?"><i class="fa fa-star"></i></button>
                      <button style="font-size:14px" title="Editar Reclamo"><i class="fa fa-edit"></i></button>
                  </td>
                </tr>
                -->
                
               
              </tbody>
            </table>
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
