<!-- Modal Login-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button"  onclick="RegistriUsuarioCancel()" class="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Login/Registro</h4>
      </div>

      <div class="modal-body">

        <div class="row"> 
               <div class="col-md-6" style ="border-right:  solid 1px black">
                
                 <!-- Formulario Login -->
                 <div id="userLogin" style="display: block" >
                     <h5> Consumidores</h5>
                       <form action="" onsubmit="return validarLogin()">
                           <div class="form-group">
                             <label for="user" >EMAIL <span id="emailOK"> </span> </label>
                             <div>
                             <input type="email" class="form-control" id="user_access" name="user_access" placeholder="Ingresa tu email">
                             </div>

                           </div>
                         
                           <div class="form-group">
                             <label for="paswordIng">Contraseña</label>
                             <input type="password" class="form-control" id="user_pwd_access" name="user_pwd_access" placeholder="Contraseña">
                           </div>
   
                           <input type="button" name="send_login"  id="send_login" value="Ingresar"  class="btn  btn-success" >
                       
                           <input type="button" name="" value="Registrar" onclick = "RegistriUsuario()" class="btn btn-info" >
       
                           <div class="form-group">
                             <a href="index.php?action=RecuPwdUser">Olvide mi contraseña</a>
                           </div>
   
                      </form>    
                 </div>


                 <!-- Registro New User -->
                 <div id="validateUser" style="display: none"> 
                       <!-- Formulario para registro de usuario -->
                       <form method="POST" onSubmit="return validarRegistro()">
                          <!-- Validacion de usuarios existentes -->
                          <div class="form-group">
                              <label for="emailRegistro"> Ingrese tu email <span id="emailOK"> </span> </label>
                              <input type="email" class="form-control" id="userReg" name="userReg" placeholder="Ingresa tu email">                  
                           </div>
                           
                           <!-- Detalle de un nuevo usuario -->
                           <div id="regUser" style="display: none">

                              <div class="form-group">
                                <label for="NameUserReg"> Nombre(s) </label>
                                <input type="text" class="form-control" name="nombreUserReg" id="nombreUserReg" placeholder="Nombre(s)">                  
                              </div>
      
                              <div class="form-group">
                                <label for="NameUserReg"> Apellidos </label>
                                <input type="text" class="form-control" name="apeUserReg" id="apeUserReg" placeholder="Apellidos">    
                              </div>

                               <div class="form-group">
                                <div >
                                  <label for="NameUserReg"> Tipo Documeto</label>
                                </div>
                                <div >
                                  <select name="tipDocIdenReg" id="tipDocIdenReg" class="form-control" >
                                      <option value="0">Seleccione</option>
                                      <option value="1">L.E / DNI</option>
                                      <option value="4">CARNET EXT.</option>
                                      <option value="7">PASAPORTE</option>
                                  </select>
                                </div>

                              </div>

                              <div class="form-group">
                                <label for="NameUserReg"> N° Documento </label>
                                <input type="text" class="form-control" name="numDocIdenReg" id="numDocIdenReg" placeholder="Ingrese n° documento"  maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">   
                              </div>


                              <div class="form-group">
                                <label for="NameUserReg"> Fecha nacimiento </label>
                                <input type="date" class="form-control" name="fecNaciReg" id="fecNaciReg" placeholder="FechaNacimiento">    
                              </div>

                              <div class="form-group">
                                <label for="cbo_genero"> Genero </label>
                                <select name="genUserReg" id="genUserReg" class="form-control" >
                                    <option value="0">Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="celUserReg"> Celular: </label>
                                <input type="text" class="form-control" name="celUserReg" id="celUserReg" placeholder="Celular" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                  
                              </div>
    
                                <!-- Se Carga los combos Departamento / Provincia y Distrito -->
                              <div class="form-group">
                                <label for="Cbo_Departamentos"> Departamento: </label>
                                <select name="depUserReg" placeholder="Departamento" class="form-control" id="depUserReg" name="depUserReg" 
                                onchange="id_Departament()" >
                                  <option value=0>Seleccione</option>
                                   <?php
                                      $a = new Datos();
                                      $a-> CargaComboDepartamentos();
                                    ?>
                                </select>
                              </div>
              
                              <div class="form-group">
                                <label for="Cbo_Provincias"> Provincia: </label>
                                <select name="provUserReg" class="form-control" id="provUserReg" name="provUserReg" > </select>                 
                              </div>
              
                              <div class="form-group">
                                <label for="Cbo_Distrito"> Distrito: </label>
                                <select name="distritosUserReg" class="form-control" id="distritosUserReg" name="distritosUserReg" > </select>                 
                              </div>
                                
                               <!-- FINAL Carga combos Departamento / Provincia y Distrito -->
                            
                          
                              <div class="form-group">
                                <label for="Pasword"> Contraseña </label>
                                <input type="password" class="form-control" id="pwdReg" name="pwdReg" placeholder="Contraseña">                  
                              </div>

                          
                              
                          <input type="button" name="sendNewUser" id="sendNewUser" value="Registrar" class="btn btn-success">

                          </div>
                          <!-- Final de registro nuevo usuario -->
                            <div id="btnvalidacion">
                              <input type="button" name="btnValidaUserReg" id="btnValidaUserReg" value="Validar" class="btn btn-success" >

                              <input type="button" name="btnCancelRegistro" id="btnCancelRegistro" value="Cancelar" onclick = "RegistriUsuarioCancel()" class="btn btn-info" > 
                            </div>
                      </form>      
                      <!-- FINAL Formulario para registro de usuario -->  
                      
                      
                  </div>


              </div>
              <!-- FINAL BLOQUE USUARIOS  -->

              <!-- Bloque Login/ registro Empresas  -->
              <div class="col-md-6" >


                  <h5>Empresas</h5>
                 
                  <div id="loginEmp" >
                      <form action="" class="form-horizontal">
                        <div class="form-group">
                          <label for="user" class="control-label col-sm-2"> RUC</label>
                          <div class="col-sm-8">
                              <input type="email" class="form-control" >
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="paswordIng">Contraseña</label>
                          <input type="password" class="form-control">
                        </div>





                        <input type="button" name="" value="Ingresar" onclick = "document.getElementById('demo').innerHTML = CambiarUuario()" class="btn btn-success" data-dismiss="modal" >

                        <input type="button" name="" value="Registrar" onclick = "RegistroEmpresa()" class="btn btn-info" >

                      </form>    

                  </div>

                  <div id="validateEmp" style="display: none"> 
  
                        <form method="post">
                          <div class="form-group">
                              <label for="emailRegistro"> RUC <span> </span> </label>
                             <input type="email" class="form-control" id="rucReg" name="rucReg">                  
                           </div>
                        
                      
                      <div id="regEmp" style="display: none">

                            <div class="form-group">
                              <label for="NameUserReg"> Razon Social </label>
                              <input type="text" class="form-control" name="nombreEmpReg">                  
                            </div>
    
                            <div class="form-group">
                              <label for="NameUserReg"> Celular </label>
                              <input type="text" class="form-control" name="celEmpReg" >                  
                            </div>
    
                            <div class="form-group">
                              <label for="Pasword"> email de soporte: </label>
                              <input type="password" class="form-control" id="emailSuport" name="emailSuport" style="background-color: black; color: white">                 
                            </div>

                            <div>
                              <input type="submit" name="" value="Registrar" class="btn btn-success"> 
                            </div>

                      </div>
          
                            
                            <input type="button" name="" value="Cancelar" onclick = "RegistroEmpresaCancel()" class="btn btn-info" >

                      </form>      
                            
                   
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