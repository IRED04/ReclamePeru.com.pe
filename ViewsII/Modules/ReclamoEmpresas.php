<?php
	if(isset($_GET['idEmp'])) {
		 $idEmp = $_GET['idEmp'];
	}else{
	
		 $idEmp = "No hay datos en el GET";
	}
	$ListaReclamos = MVCController::ReclamosxEmpresaController($idEmp);
?>






<section class="reclama">
      <div class="reclamaEmpresas">



      	<div class="row">
      		
      		<div class="col-md-2" style=" border: 1px solid #dddddd;"></div>


      		<div class="col-md-8" style=" border: 1px solid #dddddd;" >
      			
		    	<div>
	
            	    <div class="text-xs-center " >
            	       <h3>RECLAMO DE EMPRESAS </h3>
    	
            	  	<table>
						<tbody>
							<?php
						 	 foreach ($ListaReclamos as $key) {
						    	echo( '<tr>
						    		     <td> '. $key[5].' </td>
						    		     <td> '. $key[2].' </td>
						    		     <td> '. $key[3].' </td>
						    		     <td> '. $key[6].' </td>
						    			</tr>'
						    		);
							  }
						?>
					</tbody>	
				  </table> 
            	  
            	</div>
          
        		</div>


      		</div>

      		<div class="col-md-2" style=" border: 1px solid #dddddd;" ></div>



      	</div>
            
 


     
    </section>
