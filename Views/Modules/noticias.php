<?php

      $blog = MVCController::getBlogController();
      
  ?>

      <section class="section-50 section-md-90 section-md-bottom-100"> 
        <div class="container text-center" id="sec4">
          <h3>Últimas<span class="text-thin">Noticia</span></h3>
         <div class="row justify-content-sm-center row-40">
            

            <?php

            foreach ($blog as $key) {
              echo('
            <div class="col-sm-8 col-md-7 col-lg-4">
              <div class="post-boxed d-xl-inline-block">
                <div class="post-boxed-img-wrap"><a href="index.php?action=blog&id='.$key[0].'"><img src="'.$key[9].'" alt="" width="322" height="219"/></a></div>
                <div class="post-boxed-caption">
                  <div class="post-boxed-title font-weight-bold"><a href="index.php?action=blog&id='.$key[0].'"> '.$key[1].' </a></div>
                  <ul class="list-inline list-inline-dashed text-uppercase">
                    <li>JUNE 14, 2018</li>
                    <li><span>by <a class="text-primary" href="#"> '.$key[8].' </a></span></li>
                  </ul>
                </div>
              </div>
            </div>

            ');
            }
            

            ?>





          </div>
        </div>
      </section>