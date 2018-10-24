<!-- Modal Login-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Login/Registro</h4>
      </div>

      <div class="modal-body">
          <div class="container">
               <ul class="nav nav-tabs" role="tablist">
                   <li class="nav-item">
                     <a class="nav-link active"  data-toggle="tab" href="#home"   >CONSUMIDORES</a>
                   </li>
                   <li class="nav-item"> 
                      <a class="nav-link"  data-toggle="tab" href="#profile"> EMPRESAS</a>
                   </li>
               </ul>
        
               <div class="tab-content">
                 <div id="home" class="container tab-pane active">
                     <p>CONSUMIDORES</p>
                 </div>
        
                 <div  id="profile" class="container tab-pane " >
                     <p>EMPRESAS</p>
                 </div>
        
               </div>

           </div>
        
      </div>  
      
      <div class="modal-footer">
        <button type="button" onclick="RegistriUsuarioCancel()" class="btn btn-primary" data-dismiss="modal" "> Salir </button>
      </div>
    </div>
  </div>
</div>

<!-- FINAL BLOQUE USUARIOS  -->