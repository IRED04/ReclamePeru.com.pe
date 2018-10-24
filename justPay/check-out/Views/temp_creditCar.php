<?php

  //print_r($getData);

  //$timezone  = -5; //(GMT -5:00) EST (U.S. & Canada) 
  //echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));
  
  $token = $_GET['tokenID'];

  if (isset($token)) {
     
  $getData = controller::getPaymentDataController($token);

  //LLama LLaves De Lyra
  $datosPartner = ['Partner' => 'Lyra','Enviroment'=>'DEV'];
  $getKeys = controller::getKeysController($datosPartner);

  //LLamaDatos de la operacion
  $getOperation = controller::getOperationController($getData[5]);
  $getCountry = controller::getCountryMerchant($getOperation['merchant_id']);

  //Se harma CodTransaction:
  $codTransaction = rand(111111,999999);
  //$getOperation["merchant_trans_ID"]."_".$getOperation['merchant_id'].$getOperation['operation_id'];


  //Parametros a Enviar

  //Armar HASH
  $vads_trans_date = gmdate("YmdHis");
  $vads_trans_id = $codTransaction;
  $vads_action_mode = 'INTERACTIVE';
  $vads_amount = $getOperation['amount'];
  //Enviroment
  $vads_ctx_mode = "TEST";
  $vads_currency = "152";
  $vads_page_action = "PAYMENT";
  $vads_payment_config = "SINGLE";
  //Key
  $vads_site_id = $getKeys[0];
  $vads_site_SecureKey = $getKeys[1];
  $vads_version = "V2";


  $cadena =  $vads_action_mode."+".$vads_amount. "+". $vads_ctx_mode."+".$vads_currency."+".$vads_page_action."+".$vads_payment_config."+".$vads_site_id."+".$vads_trans_date."+".$vads_trans_id."+".$vads_version."+".$vads_site_SecureKey;
    
    $siganture = hash('sha1', $cadena);

    include("Views/Modules/post_lyra.php");



  }else{

    include("Views/Modules/temp_notAccess.php");

  }












