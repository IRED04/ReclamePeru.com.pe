      <?php
        include("Views/Modules/cab.php");
      ?>
      

 <section>
        <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true" >
          <div class="swiper-wrapper text-center">
            <div class="swiper-slide text-lg-right" data-slide-bg="Views/images/bg-image-3.jpg">
              <div class="swiper-slide-caption">
                <div class="container">
                  <div class="row justify-content-sm-end">
                    <div class="col-md-11 col-lg-6">
                     <div class="text-white text-uppercase jumbotron-custom border-modern" data-caption-animate="fadeInUp" data-caption-delay="0s">Registrese<span class="text-thin"> en nuestra plataforma.</span></div>
                    <div data-caption-animate="fadeInUp" data-caption-delay="450s">
                        <p class="text-big-19 text-white d-none d-md-inline-block">Y haga público su reclamo.<br class="d-none d-lg-inline-block"></p>
             <div class="text-white text-uppercase jumbotron-custom border-modern" data-caption-animate="fadeInUp" data-caption-delay="0s">100% gratis</div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-scrollbar d-xl-none"></div>
          <div class="swiper-nav-wrap d-none d-xl-block">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>


  </section>


        <!--Modulo Reclamos -->
      <?php
        include("Views/Modules/reclamos.php");
      ?>
      <!-- FIN Modulo Reclamos -->


       <!--Modulo footer -->
      <?php
        include("Views/Modules/estadistica.php");
      ?>
      <!-- FIN Modulo footer -->


      <!--Modulo Noticias -->
      <?php
        include("Views/Modules/noticias.php");
        include("Views/Modules/Modal/salir.php");  
      ?>
      <!-- FIN Modulo Noticias -->


       <!--Modulo footer -->
      <?php
        include("Views/Modules/footer.php");
      ?>
      <!-- FIN Modulo footer -->
      