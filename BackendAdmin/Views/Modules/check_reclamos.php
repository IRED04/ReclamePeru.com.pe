 <div class="span_11">
		
       <div class="clearfix"> </div>
    </div>
    
    <div class="content_bottom">
     <div class="col-md-12 span_3">
		  <div class="bs-example1" data-example-id="contextual-table">
        <span class="text-center">
             <h3>
               Reclamos Pendientes de Aprobación
             </h3>
        </span>
		    
			
		    <table class="table">
		      <thead>
		        <tr>
		          <th>Id</th>
		          <th>Asunto</th>
		          <th>Empresa Reclamada</th>
		          <th>Fecha de Publicación</th>
                  <th>Usuario</th>
                  <th>Status</th>
                  <th>Acción</th>
		        </tr>
		      </thead>
		      <tbody>
				
				      <?php 
             
                $getReclamos =  ControllerBackendAdmin::getReclamosControllerBA();
                
                $count = 1; 

                foreach ($getReclamos as $key ) {

                    if ($key[6] == 0){
                      $style = "alert alert-danger active";
                      $color = "red";
                      $status = "Rechazado";

                    }else if ($key[6] == 1){
                      $style = "alert alert-warning active";
                      $color = "black";
                      $status = "Pendiente";
                    }else {
                      $style = "alert alert-success active";
                      $color = "green";
                      $status = "Publicado";
                    }


                  
                    echo('<tr class="'.$style.'"> 
                            <form method="POST" action="index.php?action=review_reclamo">
                                <th scope="row" style="color:'.$color.'; font-size: 10px" >'.$key[0].'</th> 
                                <td style="color:'.$color.'; font-size: 10px" >'.$key[2].'</td>
                                <td style="color:'.$color.'; font-size: 10px">'.$key[3].'</td>
                                <td style="color:'.$color.'; font-size: 10px">'.$key[4].'</td>
                                <td style="color:'.$color.'; font-size: 10px">'.$key[5].'</td>
                                <td style="color:'.$color.'; font-size: 10px">'.$status.'</td>
                                <td> <input type="submit" class="btn-success btn" value= "Revisar"> </td>
                                  <input type="text" id="id_reclamo" name = "id_reclamo" value="'.$key[0].'" style = "visibility:hidden">
                            </form>
                            
                          </tr style="color:'.$color.'; font-size: 10px">
                         ');
                    $count++;

                 }

              ?>



		      </tbody>
		    </table>
		   </div>
	   </div>
	  
	   <div class="clearfix"> </div>
	   </div>

	    <div class="copy">
            <p>Derechos Reservados &copy; 2018 Reclame Peru.  </p>
	    </div>
      
