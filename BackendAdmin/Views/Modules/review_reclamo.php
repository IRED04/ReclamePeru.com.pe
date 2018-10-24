
        <?php
          if(isset($_POST["id_reclamo"])){
            $a = $_POST["id_reclamo"];

            $consul = ControllerBackendAdmin::gerContenReclamoControllerBA($a);
            foreach ($consul as $key ) {
               $descripcion = $key[0];
               $id_user = $key[1];
            }

          }else{
            $a = "No hay datos en el post";
          }
        
        ?>

        <div class="xs">
           <h3>Publicación</h3>
             <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
              <form class="form-horizontal">
                <div class="form-group">
                   <label for="disabledinput" class="col-sm-2 control-label">ID</label>
                  <div class="col-sm-4">
                    <input disabled="" type="text" class="form-control1" id="disabledinput" placeholder="No Editable" value= "<?php echo $a;  ?>">
                  </div>
                 <div class="form-group">                  <label for="selector1" class="col-sm-2 control-label">Acción</label>
                  <div class="col-sm-2">
                    <select name="selector1" id="selector1" class="form-control1">
                      <option value= "1">Seleccione</option>
                      <option value= "2">Aprobar</option>
                      <option value= "3">Editar</option>
                      <option value= "0">Rechazar</option>
                    </select></div>
                 </div> 
                  <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Publicación</label>
                    <div class="col-sm-8"><textarea disabled="" name="txtarea1"id="txtarea1" cols="100" rows="15" class="form-control13"> 
                    <?php echo $descripcion; ?> </textarea>  </div>
                  </div>
                  
                  <span id="Comentario"> 
                   
                  </span>

                </div>     

                <div class="row">
                  <div class="col-sm-8 col-sm-offset-5">
                    <input type="button" class="btn-success btn" id="update_reclamo" name="update_reclamo" value="Actualizar">
                    <input type="text" id= "user_idRR" value = "<?php echo $id_user; ?>" hidden >         
                  </div>
                </div>


            </form>
            
            </div>
          </div>
   </div>
 
    
      
      <!-- /#page-wrapper -->