<?php
    $reclamos = MVCController::getReclamosController();
    $quejas= MVCController::getQuejasController();
    $publicaciones= MVCController::getPublicacionesController();
    $empresas = MVCController::getEmpReclamacasController();

?>     

      <section class="section-with-counters bg-accent text-center" >
        <div class="container bg-cape-cod context-dark section-60 section-lg-90" id="sec3">
          <h4 class="text-rolling-stone font-weight-bold text-uppercase">Estadísticas</h4>
          <h3 class="section-title"><span class="text-thin"> </span> 
          </h3>
          <p class="text-white">Compartimos nuestros logros, y queremos que nuestra informacion sea transparente</p>
          <div class="row list-md-dashed row-40">
            <div class="col-md-3">
              <div class="h1 small counter-bold counter">

               <?php
                  foreach ($publicaciones as $key) {
                    echo($key[0]);
                  }
                ?>

            </div>
              <div class="counter-title font-weight-bold text-white text-uppercase">Publicaciones</div>
            </div>
            <div class="col-md-3">
              <div class="h1 small counter-bold counter">
                <?php
                  foreach ($reclamos as $key) {
                    echo($key[0]);
                  }
                ?>

              </div>
              <div class="counter-title font-weight-bold text-white text-uppercase">Reclamos</div>
            </div>
            <div class="col-md-3">
              <div class="h1 small counter-bold counter">

                <?php
                  foreach ($quejas as $key) {
                    echo($key[0]);
                  }
                ?>


              </div>
              <div class="counter-title font-weight-bold text-white text-uppercase">Quejas</div>
            </div>
            <div class="col-md-3">
              <div class="h1 small counter-bold counter">
                <?php
                  foreach ($empresas as $key) {
                    echo($key[0]);
                  }
                ?>
              </div>
              <div class="counter-title font-weight-bold text-white text-uppercase">Empresas Reclamadas</div>
            </div>
          </div>
          <div class="button-block inset-sm-left-60 inset-sm-right-60">
            <div class="d-md-flex justify-content-md-center align-items-md-center"><a class="btn btn-rect btn-primary d-block d-md-inline-block" href="index.php?action=login">Login</a><span class="font-italic text-white inset-md-left-20 inset-md-right-20 d-block d-md-inline-block text-big-18">o</span><a class="btn btn-rect btn-white-outline d-block d-md-inline-block" href="index.php?action=registro" style="min-width:236px;">Registrate</a></div>
          </div>
        </div>
      </section>
