
  <section>
        <div class="row no-gutters justify-content-sm-center justify-content-md-start row-40 row-sm-0" id="sec2">
          
          <div class="col-sm-10 col-md-4 height-fill"> 
              
            <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                      <?php
                         
                         $Categorias = MVCController::getListaCategorias();

                         //Inprime Cabezera
                         $num = 0;
                         foreach($Categorias as $key ) {
                            $datos = [$num => $key[1]];
                            if($id == NULL) {
                              $id = [$num => $key[0]];
                            }else{
                              $id = $id;
                            }
                            $num++;
                            print_r($datos[0]) ;
                          }
                          
                          $respBody = MVCController::getListaEmpresasReclamadasController($id[0]);
                            

                       ?> 

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">
               <article class="icon-box-top-line icon-box  icon-box-hover">
                  <table>
                      <tbody > 
                       <?php
                         foreach($respBody as $key ){
                           echo'<tr>
                                   <td> 
                                      <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].' &name='.$datos[0].' ">' .$key[1].' </a>
                                   </td>
                                </tr>'
                                ;
                          }
                       ?>
                      </tbody>
                  </table>   
                <div class="box-body">
                   <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                   </a>
                </div>

                
               </article>
             </div> 

          </div> 



           <div class="col-sm-10 col-md-4 height-fill">

           <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                     <?php
                         //Inprime Cabezera
                         $num = 0;
                         $id1 = 0;

                         foreach($Categorias as $key ) {
                            
                            $datos = [$num => $key[1]];
                            
                            print_r($datos[1]) ;
                          
                            if($id1 == NULL || $id1 == 0 || $id1 == $id) {
                              $id1 = [$key[0]];
                            }else{
                              $id1 = $id1;
                            }

                            $num++;
                          }

                          $respBody1 = MVCController::getListaEmpresasReclamadasController($id1[0]);
                         
                       ?>

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">


               <article class="icon-box-top-line icon-box  icon-box-hover">
              
                  <table>
                      <tbody > 
                       <?php
                         foreach($respBody1 as $key ){
                           echo'<tr>
                                   <td> <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].'">' .$key[1].' </a></td>
                                </tr>'
                                ;
                         }
                       ?>
                      </tbody>
                  </table>   


                <div class="box-body">
                  <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                </a>
                </div>

                
               </article>
             </div> 

          </div>
          


          <div class="col-sm-10 col-md-4 height-fill">

            <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                      <?php
                         //Inprime Cabezera
                         $num = 0;
                         $id2 = 0;

                         foreach($Categorias as $key ) {
                            $datos = [$num => $key[1]];

                            print_r($datos[2]) ;
                          
                            if($id2 == NULL || 
                               $id2 == 0 || 
                               $id2 == $id || 
                               $id2 == $id1) 
                            {
                              $id2 = [$key[0]];
                            }else{
                              $id2 = $id2;
                            }

                            $num++;
                          }

                            $respBody2 = MVCController::getListaEmpresasReclamadasController($id2[0]);
                          
                       ?>

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">


               <article class="icon-box-top-line icon-box  icon-box-hover">
              
                  <table>
                      <tbody > 
                       <?php
                         foreach($respBody2 as $key ){
                           echo'<tr>
                                   <td> <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].'">' .$key[1].' </a></td>
                                </tr>'
                                ;
                         }
                       ?>
                      </tbody>
                  </table>   


                <div class="box-body">
                  <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                  </a>
                </div>

                
               </article>
             </div> 
          </div>


          <div class="col-sm-10 col-md-4 height-fill">
            <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                      <?php
                         //Inprime Cabezera
                         $num = 0;
                         $id3 = 0;

                         foreach($Categorias as $key ) {
                            $datos = [$num => $key[1]];
                            print_r($datos[3]) ;
                          
                            if($id3 == NULL || 
                               $id3 == 0 || 
                               $id3 == $id || 
                               $id3 == $id1 ||
                               $id3 == $id2
                              ) 
                            {
                              $id3 = [$key[0]];
                            }else{
                              $id3 = $id3;
                            }

                            $num++;
                          }

                          $respBody3 = MVCController::getListaEmpresasReclamadasController($id3[0]);
                       
                       ?>

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">


               <article class="icon-box-top-line icon-box  icon-box-hover">
              
                  <table>
                      <tbody > 
                       <?php
                         foreach($respBody3 as $key ){
                           echo'<tr>
                                   <td> <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].'">' .$key[1].' </a></td>
                                </tr>'
                                ;
                         }
                       ?>
                      </tbody>
                  </table>   


                <div class="box-body">
                  <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                  </a>
                </div>

                
               </article>
             </div> 
          </div>



          <div class="col-sm-10 col-md-4 height-fill">
           <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                     <?php
                         //Inprime Cabezera
                         $num = 0;
                         $id4 = 0;

                         foreach($Categorias as $key ) {
                            $datos = [$num => $key[1]];
                            print_r($datos[4]) ;
                          
                            if($id4 == NULL || 
                               $id4 == 0 || 
                               $id4 == $id || 
                               $id4 == $id1 ||
                               $id4 == $id2 ||
                               $id4 == $id3
                              ) 
                            {
                              $id4 = [$key[0]];
                            }else{
                              $id4 = $id4;
                            }

                            $num++;
                          }

                          $respBody4 = MVCController::getListaEmpresasReclamadasController($id4[0]);
                        
                       ?>

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">


               <article class="icon-box-top-line icon-box  icon-box-hover">
              
                  <table>
                      <tbody > 
                      <?php
                         foreach($respBody4 as $key ){
                           echo'<tr>
                                   <td> <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].'">' .$key[1].' </a></td>
                                </tr>'
                                ;
                         }
                       ?>
                      </tbody>
                  </table>   


                <div class="box-body">
                   <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                  </a>
                </div>

                
               </article>
             </div> 

          </div>

          <div class="col-sm-10 col-md-4 height-fill">
            <div id="CabUltRec">
              <div class="box-top">
                <div class="box-header " style="text-align: center; margin-top: 10px;">

                   <h5>
                       <?php


                         //Inprime Cabezera
                         /*$num = 0;
                         $id5 = 0;

                         foreach($Categorias as $key ) {
                            $datos = [$num => $key[1]];
                            print_r($datos[5]) ;
                          
                            if($id5 == NULL || 
                               $id5 == 0 || 
                               $id5 == $id || 
                               $id5 == $id1 ||
                               $id5 == $id2 ||
                               $id5 == $id3 ||
                               $id5 == $id4
                              ) 
                            {
                              $id5 = [$key[0]];
                            }else{
                              $id5 = $id5;
                            }

                            $num++;
                          }

                          $respBody5 = MVCController::getListaEmpresasReclamadasController($id5[0]);*/
                          

                       ?>

                   </h5>
                
                </div>
              </div>
             </div>

             <div id="body_UltRec">


               <article class="icon-box-top-line icon-box  icon-box-hover">
              
                  <table>
                      <tbody > 
                       <?php
                        echo("Adsense");
                         /*foreach($respBody as $key ){
                           echo'<tr>
                                   <td> 
                                      <a href="index.php?action=ReclamoEmpresas&idEmp=' .$key[0].'">' .$key[1].' </a>
                                   </td>
                                </tr>'
                                ;
                          }*/
                       ?>
                      </tbody>
                  </table>   


                <div class="box-body">
                <!--    <a class="btn btn-icon-only btn-icon-single btn-icon-default" href="#">
                      <span class="icon icon-sm material-icons-arrow_forward">  </span>
                  </a> -->
                </div>

                
               </article>
             </div> 

          </div> 


        </div>
      </section>

