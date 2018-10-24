<!-- Modal Login-->
<div class="modal fade" id="politicasPriv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button"  onclick="RegistriUsuarioCancel()" class="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Login/Registro</h4>
      </div>

      <div class="modal-body">
        
           <div class="container">
              <h2>Horizontal form</h2>
              <form class="form-horizontal" action="/action_page.php">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Password:</label>
                  <div class="col-sm-10">          
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </form>
            </div>   
            
        
      </div>  
      
      <div class="modal-footer">
        <button type="button" onclick="RegistriUsuarioCancel()" class="btn btn-primary" data-dismiss="modal" "> Salir </button>
      </div>
    </div>
  </div>
</div>

<!-- FINAL BLOQUE USUARIOS  -->