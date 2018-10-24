<?php
	if(isset($_GET['idEmp'])) {
		 $idEmp = $_GET['idEmp'];
	}else{
	
		 $idEmp = "No hay datos en el GET";
	}
	$ListaReclamos = MVCController::ReclamosxEmpresaController($idEmp);
    $nameEmp = MVCController::getEmpresaxIDController($idEmp);



?>


 <?php
        include("Views/Modules/cab2.php");
 ?>
      



<section class="reclama">
      <div class="reclamaEmpresas">



      	<div class="row">
      		
      		<div class="col-md-3" style=" border: 1px solid #dddddd;"></div>


      		<div class="col-md-6" style=" border: 1px solid #dddddd;" >
      			

       <section class="section-60 section-md-90 bg-overlay-cello">
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12">
              <h5>
                  <?php
                    foreach ($nameEmp as $key ) {
                        echo( "<div style='color:#212477'> "

                              .$key[0]. "</div>");
                    }
                  ?>

              </h5>
            </div>
          </div>
          <div class="row text-left row-40">
            <div class="col-lg-12">
			 
			 <?php 


			 foreach ($ListaReclamos as $key ) {
			 
			 echo('
             <blockquote class="quote-bordered quote-bordered-inverse">
                <div class="quote-body">
                  <div class="quote-open">
                    
                  </div>
                  <div class="quote-body-inner">
                    <h4 style="color: #da3f3f">' .$key[2]. '</h5>


                    <p class="text-white">
                      <q> 
                            '.$key[3]. '
                      </q>
                    </p>
                    
                    <div class = "row">

                            <div class="col-lg-4">
                             '.$key[5].'
                            </div>
                            <div class="col-lg-4"> </div>
                    
                            <div class="col-lg-4"> 
                                 '.$key[6].' 
                            </div>
                    </div>


                    
                  </div>
                </div>

              </blockquote>
              ');

			 }

              ?> 
            
            <div class="row">
                
                <div class="col-lg-4"></div>
                <div class="col-lg-4" >    
                    <button class = "btn btn-rect btn-primary d-block d-md-inline-block">
                      Ver todas
                    </button>
                </div> 
                <div class="col-lg-4"></div>
            
            </div>


            </div>
          </div>
        </div>
      </section>



    	   <!-- <div>
	
            	    <div class="text-xs-center " >
            	       <h3>RECLAMO DE EMPRESAS </h3>
    	
            	  	<table>
						<tbody>
							<?php
						 	 /* foreach ($ListaReclamos as $key) {
						    	echo( '<tr>
						    		     <td> '. $key[5].' </td>
						    		     <td> '. $key[2].' </td>
						    		     <td> '. $key[3].' </td>
						    		     <td> '. $key[6].' </td>
						    			</tr>'
						    		);
							  }
							  */
						?>
					</tbody>	
				  </table> 
            	  
            	</div>
          
        		</div> -->




      		</div>

      		<div class="col-md-3" style=" border: 1px solid #dddddd;" ></div>



      	</div>
            
 


     
    </section>



 <?php
        include("Views/Modules/footer.php");
      ?>