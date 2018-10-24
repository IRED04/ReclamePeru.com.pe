<?php

	$token = $_GET['tokenID'];
	$getData = controller::getPaymentDataController($token);

	$requestDateTime = date('Y-m-d\TH:i:s'); #ISO 8601
	//LLama LLaves De SP
	$datosPartner = ['Partner' => 'SafetyPay','Enviroment'=>'DEV'];
	$getKeys = controller::getKeysController($datosPartner);

	//LLamaDatos de la operacion
	$getOperation = controller::getOperationController($getData[5]);
	$getCountry = controller::getCountryMerchant($getOperation['merchant_id']);

	$codTransaction = $getOperation["merchant_trans_ID"]."_".$getOperation['merchant_id'].$getOperation['operation_id'];


	$request = ['RequestTime'=> $requestDateTime,
	  	 		'Credentials' =>$getKeys,
	  	 		'DataOperation' => $getOperation,
	  	 		'Country' => $getCountry,
	  	 		'codTransaction'=> $codTransaction,
	  			];


	//$reqJson =  json_encode($request);
	//$saveRequest = Controller::save_rqSP($reqJson);

	$updateOperationTrasnPartner = controller::updateTransPartner($getOperation['operation_id'],$codTransaction);

	$urlSP = controller::createRedirectPaymentSafetyPay($request);

	//print_r($urlSP);
	header('Location:'.$urlSP);


	//print_r($getData);

	//$timezone  = -5; //(GMT -5:00) EST (U.S. & Canada) 
	//echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I")));

	 //Armar HASH
     



?>
