<?php

 $validar = $_SESSION["validar"];

 if ($validar == true ) {
   header("Location: http://dev.reclameperu.com.pe/BackendUser/index.php");
 } 

?>

     <div class="one-screen-page bg-gray-darker bg-image" style="background-image: url(Views/images/bg-image-6.jpg);" > 

      
      <div class="page-inner">
        <header class="page-head">
          <div class="page-head-inner">
            <div class="container text-center"><a class="brand brand-md brand-inverse" href="index.php"><img src="Views/images/logo.png" alt="" width="182" height="100"/></a></div>
          </div>
        </header>

        <section>

          <div class="container">
            <div class="row justify-content-md-center">
            
              <div class="col-md-7 col-lg-5 col-xl-4">
                <span id="respValEmailLogin"> </span>
                <div class="block-shadow text-center">
                  <div class="block-inner">
                    <p class="text-uppercase text-abbey font-weight-bold">Ingresa a tu cuenta </p>
                    <div class="icon-block"><span class="icon icon-xl icon-black material-icons-lock_open"></span></div>
                  </div>
                  <form class="rd-mailform form-modern form-darker form-login">
                    <div class="block-inner">
                    
                      <div class="form-wrap">
                        <input class="form-input" id="login-form-login" type="text" name="login" data-constraints="@Required">
                        <label class="form-label" for="login-form-login">Login</label>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input" id="login-form-password" type="password" name="pass" data-constraints="@Required">
                        <label class="form-label" for="login-form-password">Password</label>
                      </div>
                      <div class="info-text"><a class="link-default" href="index.php?action=recuPwd">¿Olvidate tu contraseña?</a></div>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" id="send_login">Ingresar</button>
                  </form>
                </div>
                <div class="group-inline text-center"><span class="text-white-08">Aun no tienes cuenta?</span><a class="link link-primary-inverse" href="index.php?action=registro">Ingresa aqui</a></div>
              </div>
            </div>
          </div>
        </section>
        <section class="page-foot">
          <div class="page-foot-inner">
            <div class="container text-center">
              <div class="row">

              </div>
            </div>
          </div>
        </section>

      </div>



    </div>
      


