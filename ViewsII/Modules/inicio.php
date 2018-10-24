    <section class="bienvenidos">
      
      <div class="texto-bienvenido text-xs-center">
            
            <h1 class="display-4 mb-3">¡Compre con tranquilidad y disfrute!</h1>
            
            <p class="h5">La tranquilidad es la capacidad de enfrentarse a un problema 
               de la mejor manera posible.
            </p>
            
            <p class="h5">
                Ser escuchado, es lo que todos queremos. Pero solo se logra 
                esta satisfacción, después de un  arduo trabajo y perseverancia.
            </p>
            
            <p class="h5">
                Coloca aqui tus reclamos, te ayudamos haciéndolo público,
                para que en comunidad encontremos una solución.
            </p>
            
            <!--
            <input type="button" class="btn  btn-danger btn-lg" value="Reclamar" id="btnSendReclamar" name="btnSendReclamar">
            -->

            <button type="button" class="btn  btn-danger btn-lg" id="btnSendReclamar" name="btnSendReclamar">
                <span class="glyphicon glyphicon-fire"></span> Reclamar
            </button>
            <!--
            <a href="index.php?action=ReclamarPaso1" class="btn  btn-danger btn-lg" >Reclamar</a>
            -->

            <a href="index.php?action=HistoriaEmpresa" class="btn  btn-info btn-lg">Buscar Empresas
            
            </a>
         
        </div>
     
    </section>

    <?php
     include("QueHacemos.php");
     include("ultimosReclamos.php");
    ?>