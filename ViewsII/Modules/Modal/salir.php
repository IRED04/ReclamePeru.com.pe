<?php

//session_start();
//session_destroy();

?>

<!-- Modal Salir-->
<div class="modal fade" id="salir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Session Finalizada</h4>
      </div>

      <div class="modal-body">

        <div class="row"> 
          <section class="salir"> 
             <div class="texto-bienvenido text-xs-center">
               <h1 class="display-4 mb-3">¡Muchas gracias por tu visita aun puedes segir revisando nuestro contenido!</h1>
             </div>
          </section>
         </div>
      </div>  
      
      <div class="modal-footer">
        <button type="button" onclick="RedirecIndex()" class="btn btn-primary" data-dismiss="modal" "> <a href="index.php?action=index"> </a> Salir </button>
      </div>
    </div>
  </div>
</div>

<!-- FINAL BLOQUE USUARIOS  -->