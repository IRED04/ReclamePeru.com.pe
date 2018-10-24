<?php
	
	$token = $_GET['tokenID'];
	$getData = controller::getPaymentDataController($token);

	if(isset($getData[5])){

	  if (isset($getData[6])){

	  	 $codP = $getData[6];

	  	 $getInstrtion = controller::getresponse($getData[5]);
	  	 $Instruction = json_decode($getInstrtion[0]);
	  	 $exp_time = $Instruction->ExpirationDateTime;


	  	 //Pinta instrucciones de pago
	  	 $xml = $Instruction;
	  	 $xmlRespponseBank = $xml->PaymentLocations;
	  	 $PaymentLocation = $xmlRespponseBank->PaymentLocation;

	  }else {
	  	 $requestDateTime = date('Y-m-d\TH:i:s'); #ISO 8601
	  	 //LLama LLaves De SP
	  	 $datosPartner = ['Partner' => 'SafetyPay','Enviroment'=>'DEV'];
	  	 $getKeys = controller::getKeysController($datosPartner);

	  	 //LLamaDatos de la operacion
	  	 $getOperation = controller::getOperationController($getData[5]);
	  	 $getCountry = controller::getCountryMerchant($getOperation['merchant_id']);

	  	 
	  	 
	  	 $request = ['RequestTime'=> $requestDateTime,
	  	 			 'Credentials' =>$getKeys,
	  	 			 'DataOperation' => $getOperation,
	  	 			 'Country' => $getCountry,
	  				];

	  	 //Se solicita Codigo de pago
	  	 $getPaymentCode = controller::createCashPaymentCode($request);
		
		 
	  	 //Almacenamos response en la BD
	  	 //Se conbierte a Json la rspuesta de SP
	  	 $resp = json_encode($getPaymentCode);			
	  	 
	  	 $dataLog = ["OP_ID" => $getData[5],
	  				 "response" => $resp,
	  				 "fec" => $requestDateTime
	  				] ;

	  	 $saveresponse = controller::saveLog($dataLog);
	  	

	  	 $xml = $getPaymentCode;
	  	 $xmlError = $xml->ErrorManager;
	  	 $codP = $xml->TransactionIdentifier;
	  	 $xmlRespponseBank = $xml->PaymentLocations;
	  	 $PaymentLocation = $xmlRespponseBank->PaymentLocation;
     	 $exp_time = $getPaymentCode->ExpirationDateTime;

     	 $datosUpdate = ['Op_id'=> $getData[5],
     	 				 'TransactionPartner'=>$codP,
     					];

     	 $updateOperation =  controller::updatePaymentCodePartner($datosUpdate);
     	 
	 
	  }
	   include("Modules/temp_cash.php");
	}else {
		include("Modules/temp_NoOperation.php");
	}


	
	
?>



