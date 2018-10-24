   

 <?php

      $token = $_GET['id'];
      $blog = MVCController::getBlogControllerID($token);
      include("Views/Modules/cab2.php");
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
                     <!-- <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="550s"><a class="btn btn-primary" href="appointment.html">make An Appointment</a></div>-->
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


      <section class="section-60 section-md-75 section-xl-100">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8 col-xl-9">
              <article class="post post-single">

                <div class="post-header">
                  <h4> 
                      <?php
                      foreach ($blog as $key ) {
                        echo($key[1]);
                      }
                      ?>

                  </h4>
                </div>
                <div class="post-meta">
                  <ul class="list-bordered-horizontal">
                    <li>
                      <dl class="list-terms-inline">
                        <dt>Date</dt>
                        <dd>
                          <time datetime=" <?php
                            foreach ($blog as $key ) {
                            echo($key[7]);
                           }
                           ?>">

                          <?php
                            foreach ($blog as $key ) {
                            echo($key[7]);
                           }
                           ?>
                         </time>
                        </dd>
                      </dl>
                    </li>
                    <li>
                      <dl class="list-terms-inline">
                        <dt>Posted by</dt>
                        <dd>
                          <?php
                            foreach ($blog as $key ) {
                            echo($key[8]);
                           }
                         ?>
                        </dd>
                      </dl>
                    </li>
                    
                    <li>
                      <dl class="list-terms-inline">
                        <dt>Category</dt>
                        <dd><?php echo $token ?> </dd>
                      </dl>
                    </li>
                  </ul>
                </div>
                <div class="divider-fullwidth bg-gray-light"></div>
                <div class="post-body">
                  <div class="row">
                    <div class="col-lg-4">
                      
                    </div>

                    <div class = "col-lg-8">
                      <p class="text-black">
                        <?php
                            foreach ($blog as $key ) {
                            echo($key[3]);
                           }
                         ?>
                      </p>
                      <p class="text-black">
                        <?php
                            foreach ($blog as $key ) {
                            echo($key[4]);
                           }
                         ?>

                      </p>
                    </div>

                  </div>
                  
                  

                  <div class="post-blockquote inset-md-right-40 inset-xl-left-40 inset-xl-right-120">
                    <blockquote class="quote-minimal-bordered">
                      <p>
                        <q>
                          <?php
                            foreach ($blog as $key ) {
                            echo($key[5]);
                           }
                         ?>

                        </q>
                      </p>
                    </blockquote>
                  </div>
                  <p class="text-black-08"><?php
                            foreach ($blog as $key ) {
                            echo($key[6]);
                           }
                         ?></p>
                </div>
                <div class="post-footer">
                  <h6 class="text-medium">Compartir esta publicacion:</h6>
                  <ul class="list-inline list-inline-xs">
                    <li><a class="icon icon-xxs-small link-primary fa-facebook" href="#"></a></li>
                    <li><a class="icon icon-xxs-small link-primary fa-twitter" href="#"></a></li>
                    <li><a class="icon icon-xxs-small link-primary fa-google-plus" href="#"></a></li>
                    <li><a class="icon icon-xxs-small link-primary fa-pinterest-p" href="#"></a></li>
                  </ul>
                </div>
              </article>
              <div class="divider-fullwidth bg-gray-lighter"></div>
              

            
            </div>



          </div>
        </div>
      </section>


 <?php
        include("Views/Modules/footer.php");
      ?>