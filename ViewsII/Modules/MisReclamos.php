<?php
if (isset($_GET['idUser'])) {
	$idUser = $_GET['idUser'];
}else {

  header('Location: index.php?action=index');
}

  $ResponseReclamos  = MVCController::getReclamosxUserController($idUser);

 

?>

<section class="reclama">
      <div class="reclama-texto-bienvenido ">
            
            <div>

                <div class="text-xs-center " >
                   <h3>MIS RECLAMOS</h3>

                   <?php
                   	foreach ($ResponseReclamos  as $reclamos) {
  	  				 echo($reclamos[1]);
  					}

                   ?>
    
              
              
            </div>
          
        	</div>


     
    </section>
