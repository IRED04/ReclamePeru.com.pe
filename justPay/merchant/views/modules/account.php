<?php
  
  $m_id = $_SESSION["m_id"];
  $getDataMerchant =  MVCControllerMerchantJP::getDataMerchantC($m_id); 

?>

<div class="container">
  <div class="row">
      <div class="col-sm-1"> </div>
      <div class="col-sm-10"> 

      <div class="container">
 
      
        <!-- 2 columns form -->
         <div class="card-body card">

            <form action="#">
              <div class="row">
                
                  <div class="container">
                      <div class="row">
                        <div class="col-sm-8">
                          
                          <h3 class="text-center" style="background-color: #3f51b5; color: white" > DATOS GENERALES </h3>
                          
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4"> <strong>ID :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext"><?php echo $getDataMerchant[0]; ?></div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>NOMBRE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext"><?php echo $getDataMerchant[3]; ?></div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>PAIS :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">CHILE</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>LEGAL NAME :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext"><?php echo $getDataMerchant[1]; ?></div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>LEGAL NUMBER :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext"> <?php echo $getDataMerchant[2]; ?> </div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>PHONE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">9876543</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>FAX :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">987665546</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>EMAIL :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">mymerchant@mymerchant.com</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>URL :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext"> <a href="http://pincelando.pe.hu/justPay/Views/Merchant3"><?php echo $getDataMerchant[4]; ?> </a></div>
                           </div>
                          </div>

                        
                        </div>
                        
                        <div class="col-sm-4">
                          <h3 class="text-center"  style="background-color: #3f51b5; color: white"> MI IMAGEN </h3>
                          <img src="views/global_assets/images/backgrounds/user_bg4.jpg" alt="" width="100%" height="50%">


                            
                            <form class="mb-3 mb-xl-0 ml-xl-auto">
                                <div class="wmin-xl-200">
                                  <input type="file" class="form-input-styled" > <!-- data-fouc -->
                                  <button type="button" class="btn btn-primary btn-lg btn-block"> Subir Imagen </button>
                                </div>
                            </form>

                        </div>
                        
                      </div>
                    
                      <div class="row">
                       
                        <div class="col-sm-12">

                          <h3 class="text-center" style="background-color: #3f51b5; color: white; " >  MATRIX ESCALAMIENTO </h3>

                           <div class="row">
                              
                           <div class="col-sm-6">
                          
                          <h3 class="text-center"> COMERCIAL </h3>
                          

                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>NAME :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">Merchant Test</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>PHONE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">CHILE</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>CEL PHONE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">TMTEST</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>EMAIL :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">1234567890</div>
                           </div>
                          </div>


                        
                        </div>

                          <div class="col-sm-6">
                          <h3 class="text-center" > SUPPORT </h3>
                          
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>NAME :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">Merchant Test</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>PHONE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">CHILE</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>CEL PHONE :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">TMTEST</div>
                           </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-lg-4 "><strong>EMAIL :</strong></label>
                            <div class="col-lg-8">
                                <div class="form-control-plaintext">1234567890</div>
                           </div>
                          </div>


                        </div>


                           </div> 


                        
                      

                        </div>
                        
                      </div>
                    
                  </div>
              </div>

             
         </div>
        <!-- /2 columns form -->  

      </div>
      </div>
      <div class="col-sm-1"> </div>
  </div>

 
</div>


      







