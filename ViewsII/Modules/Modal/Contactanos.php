<!-- Modal Login-->
<div class="modal fade" id="form_to_support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Envianos tu consulta o sugerencia</h4>
      </div>
      <div class="modal-body">
        <div class="row">
      
              <div class="col-md-12" style ="border-right:  solid 1px black">
                  <h5> Tu Opinion nos interesa </h5>

                  <form method="post">
                    
                    <div class="form-group">
                          <label for="NameUserReg"> Nombre(s): </label>
                          <input type="text" class="form-control" name="nombreUserReg">                  
                    </div>


                    <div class="form-group">
                      <label for="emailRegistro"> Ingrese tu email:  <span> </span> </label>
                      <input type="email" class="form-control" id="userReg" name="userReg">                  
                    </div>
                    
                     <div class="form-group">
                          <label for="NameUserReg"> Asunto:  </label>
                          <input type="text" class="form-control" name="apeUserReg" >    
                      </div>
                        

                       <div class="form-group">
                         <label for="comment">Escriba su consulta:</label>
                         <textarea class="form-control" rows="5" id="comment"></textarea>
                       </div>

                   <input type="submit" name="" value="Enviar" class="btn btn-success"> 

                  </form>
              
              </div>
              
              
        </div>
      </div>  
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>