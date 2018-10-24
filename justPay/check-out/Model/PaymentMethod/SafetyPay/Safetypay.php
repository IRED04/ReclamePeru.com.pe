<?php
 date_default_timezone_set('America/Lima');


  class SafetyPay{
  	
  	/*=======================================================
	   Consume Metodo CreateExpressToken - Producto Express
	=========================================================*/	
  	public static  function CreateExpressToken($datos){

  		$trace = true;
		$exceptions = true;

		$key = $datos['Credentials'];
		$data_opeartion = $datos['DataOperation'];
		$RequestDateTime = $datos['RequestTime'];
		$Country = $datos['Country'];

		$opID = $data_opeartion["Operation_ID"];

		$currency = $data_opeartion['currency'];
		$amount = "200";//$data_opeartion['amount'];
		$MerchantRef = $datos['codTransaction'];
		$time = $data_opeartion['time_expired'];
		$url_ok = $data_opeartion['url_ok'];
		$url_error = $data_opeartion['url_error'];
		$channel = $data_opeartion['channel'];
		// COUNTRY(PER)
		if($channel==1){
			$filter = 'CHANNEL(OL)';	
		}else{
			$filter = 'CHANNEL(WP)';
		}	
		
			//Armando Request
			$xml_array['ApiKey'] = $key[0];
			$xml_array['RequestDateTime'] = $RequestDateTime;
			$xml_array['CurrencyID'] = $currency;
			$xml_array['Amount'] = $amount;
			$xml_array['MerchantSalesID'] = $MerchantRef;
			$xml_array['Language'] = 'ES';
			$xml_array['TrackingCode'] = '';
			$xml_array['ExpirationTime'] = $time;
			$xml_array['FilterBy'] = $filter;
			$xml_array['TransactionOkURL'] = $url_ok;
			$xml_array['TransactionErrorURL'] = $url_error;
			$xml_array['ShopperEmail'] = '';
			$xml_array['ProductID'] = '4';
			$xml_array['TransactionExpirationTime'] = $time ;
			$xml_array['CustomMerchantName'] =  'JustPay';
			$xml_array['LocalizedCurrencyID'] = '';
			$xml_array['Signature'] = SafetyPay::Sig_Hash($datos);



			$reqJson =  json_encode($xml_array);

			try {
			
				//$wsdl = 'Model/PaymentMethod/SafetyPay/express/MerchantExpressWs.wsdl';

				$wsdl = 'https://sandbox-mws2.safetypay.com/express/ws/v.3.0/?wsdl';
			    $client = new SoapClient($wsdl, array('trace' => $trace, 'exceptions' => $exceptions));
				$response = $client->CreateExpressToken($xml_array);

				$respJson =  json_encode($response);

			}catch (Exception $e) { 
				return $e->getMessage();
			}
			
			$xmlResponse = $response;
			$xml = $xmlResponse;

			if (isset($xml->ShopperRedirectURL)){
				$URL_Redirect = $xml->ShopperRedirectURL;

				$return = ["request"=>$reqJson,
						   "response"=>$respJson,
						   "URL_Redirect"=>$URL_Redirect
						  ];

				return $return;

			}else{
				
				$error = $xml->ErrorManager;
				$return = ["request"=>$reqJson,"Response"=>$respJson,"URL_Redirect"=>$error];
				return $return;

			}
		   
		
  	}
  	
  	/*=====  FIN Consume Metodo CreateExpressToken - Producto Express  ======*/	

  	/*===========================================================
	   Consume Metodo  CreateCustomCashPayment - Producto Direct
	=============================================================*/	
  	public static function DirectCreateCustomCashPayment($request)	{
  		$trace = false;
		$exception = false;
		$key = $request['Credentials'];
		$data_opeartion = $request['DataOperation'];
		$RequestDateTime = $request['RequestTime'];
		$amount = array();
			$amount['CurrencyID'] = $data_opeartion['currency'];;
			$amount['_'] = $data_opeartion['amount'];

		$Country = $request['Country'];
		
		//Datos Obligatorios de SafetyPay
		$BankID = "";
		$Language = "ES";
		$IncludeAllBanks = "1";
		$TransactionIdentifier = "";
		$MerchantAccount = "";
		$TrackingCode = "";
		$SendEmailToShopper = "0";
		$CustomerInformation = "";
		$CustomMerchantName = "JustPay";
		$ApplicationID = "4";
		
		
		//Se arma la cadena para Hash de SafetyPay
		$cadena = $RequestDateTime.$Country[0].$amount['CurrencyID'].$amount['_'].$data_opeartion[10].$TrackingCode.$data_opeartion['time_expired'].$Language.$CustomMerchantName.$TransactionIdentifier.$key[1];

		$HASH = hash('sha256', $cadena);
		$Signature = $HASH;

		//Request->Cash SafetyPay
		$xml_array["RequestDateTime"] = $RequestDateTime ;
		$xml_array['ApiKey'] = $key[0];
		$xml_array['Signature'] = $Signature;
		$xml_array['BankID'] =  $BankID;
		$xml_array['IncludeAllBanks'] = $IncludeAllBanks ;
		$xml_array['TransactionIdentifier'] = $TransactionIdentifier ;
		$xml_array['MerchantAccount'] = $MerchantAccount ;
		$xml_array['MerchantSalesID'] = $data_opeartion[10] ;
		$xml_array['TrackingCode'] = $TrackingCode  ;
		$xml_array['ExpirationTime'] = $data_opeartion['time_expired'];
		$xml_array['Language'] = $Language ;
		$xml_array['CountryID'] = $Country[0] ;
		$xml_array['Amount'] = $amount;
		$xml_array['SendEmailToShopper'] = $SendEmailToShopper ;
		$xml_array['CustomerInformation'] = $CustomerInformation ;
		$xml_array['CustomMerchantName'] = $CustomMerchantName  ;
		$xml_array['ApplicationID'] = $ApplicationID;

		//Almacenar Request en BD
		$resp = json_encode($xml_array);


			try {
			$wsdl = 'https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/?wsdl';
			$Action = "urn:safetypay:contract:mws:direct:CreateCustomCashPayment";
			$to = "https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/";
			$header = array();
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','Action',$Action,false);
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','To',$to,false);
			$client = new SoapClient($wsdl, array('soap_version' => SOAP_1_2 , 'trace' => $trace, 'exceptions' => $exceptions, 'verifypeer' => true));
			$client->__setSoapHeaders($header);
			$response = $client->CreateCustomCashPayment($xml_array);

			$xmlResposponse = $response;
			
			return $xmlResposponse;

			//echo json_encode($PaymentLocation);


			}catch (Exception $e) { 
				echo htmlspecialchars($e->getMessage());
			}

  	}
  	/*=====  FIN Consume Metodo  CreateCustomCashPayment - Producto Direct  ======*/


	/*============================================================
	   Consume Metodo CreateCustomOnlinePayment - Producto Direct
	==============================================================*/	
  	public static  function Create_DirectCustomOnlinePayment(){
  		
  		$trace = false;
		$exception = false;

		$RequestDateTime = '2018-01-25T19:49:57';
		$ApiKey = "f31431a454e47d5bcffea29e9a2b5b5a";
		$SiganatureKey = "f01f0fb9c074f9a856ca22993962a16f";
		$BankID = "8197";
		$TransactionIdentifier = "";
		$MerchantAccount = "";
		$MerchantSalesID = "TEST1";
		$TrackingCode = "";
		$ExpirationTime = "120";
		$Language = "ES";
		$CountryID = "CHL";
		$amount = array();
			$amount['CurrencyID'] = "CLP";
			$amount['_'] = 100;
		$TransactionOkURL = "#";
		$TransactionErrorURL = "#";
		$SendEmailToShopper = "0";
		$CustomMerchantName = "JUST-PAY";
		$ApplicationID = "4";
		
		$cadena = $RequestDateTime.$CountryID.$amount['CurrencyID'].$amount['_'].$MerchantSalesID.$TrackingCode.$ExpirationTime.$Language.$TransactionIdentifier.$BankID.$SiganatureKey;

		//print_r($cadena);

		$HASH = hash('sha256', $cadena);

		$Signature = $HASH;


		$xml_array["RequestDateTime"] = $RequestDateTime ;
		$xml_array['ApiKey'] = $ApiKey;
		$xml_array['Signature'] = $Signature;
		$xml_array['BankID'] =  $BankID;
		$xml_array['TransactionIdentifier'] = $TransactionIdentifier ;
		$xml_array['MerchantAccount'] = $MerchantAccount ;
		$xml_array['MerchantSalesID'] = $MerchantSalesID ;
		$xml_array['TrackingCode'] = $TrackingCode  ;
		$xml_array['ExpirationTime'] = $ExpirationTime ;
		$xml_array['Language'] = $Language ;
		$xml_array['CountryID'] = $CountryID ;
		$xml_array['Amount'] = $amount;
		$xml_array['TransactionOkURL'] = $TransactionOkURL ;
		$xml_array['TransactionErrorURL'] = $TransactionErrorURL ;
		$xml_array['SendEmailToShopper'] = $SendEmailToShopper ;
		$xml_array['CustomMerchantName'] = $CustomMerchantName  ;
		$xml_array['ApplicationID'] = $ApplicationID;


		try {

			$wsdl = 'https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/?wsdl';

			$Action = "urn:safetypay:contract:mws:direct:CreateCustomOnlinePayment";
			$to = "https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/";

			$header = array();

			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','Action',$Action,false);
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','To',$to,false);

			$client = new SoapClient($wsdl, array('soap_version' => SOAP_1_2 , 'trace' => $trace, 'exceptions' => $exceptions, 'verifypeer' => true));
			$client->__setSoapHeaders($header);
			$response = $client->CreateCustomOnlinePayment($xml_array);

			$url = $response->BankRedirectUrl;

			if($url == ""){

				return json_encode($response->ErrorManager);



			} else {
				return $response;

			}

			
			}catch (Exception $e) { 
				echo htmlspecialchars($e->getMessage());
			}
	}
  	/*=====  FIN Consume Metodo CustomOnlinePayment - Producto Direct ======*/	


	/*=======================================================
	            Bancos Disponibles en SafetyPay
	=========================================================*/	
	public static function getBanksSP(){

		$RequestDateTime = '2018-01-25T19:49:57';
		$ApiKey = "bf7ce82e07245d18d25247434d8fb9fd";
		$SiganatureKey = "928a12486834cc1a8b8a66f9d230ad8e";
		$CountryID = "CHL";
		$ChannelID = "1";

		$cadena = $RequestDateTime.$CountryID.$ChannelID.$SiganatureKey;
		$HASH = hash('sha256', $cadena);
		$Signature = $HASH;


		$xml_array["RequestDateTime"] = $RequestDateTime ;
		$xml_array['ApiKey'] = $ApiKey;
		$xml_array['Signature'] = $Signature;
		$xml_array['CountryID'] =  $CountryID;
		$xml_array['ChannelID'] = $ChannelID ;


			try {

			$wsdl = 'https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/?wsdl';

			$Action = "urn:safetypay:contract:mws:direct:GetBanks";
			$to = "https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/";

			$header = array();

			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','Action',$Action,false);
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','To',$to,false);

			$client = new SoapClient($wsdl, array('soap_version' => SOAP_1_2 , 'trace' => $trace, 'exceptions' => $exceptions, 'verifypeer' => true));
			$client->__setSoapHeaders($header);
			$response = $client->GetBanks($xml_array);


			echo json_encode($response);

			}catch (Exception $e) { 
				echo htmlspecialchars($e->getMessage());
			}
	}
  	/*=====  FIN Bancos Disponibles en SafetyPay ======*/	


	/*=======================================================
	               Armar HASH
	=========================================================*/	
  	public static   function Sig_Hash($datos){

  		$key = $datos['Credentials'];
		$data_opeartion = $datos['DataOperation'];
		$RequestDateTime = $datos['RequestTime'];
		$Country = $datos['Country'];


  		$cadena = $RequestDateTime . $data_opeartion['currency'].
  				  "200" .$datos['codTransaction']. 
  				  'ES'.''.$data_opeartion['time_expired'] .$data_opeartion['url_ok'] . 
  				  $data_opeartion['url_error'] .$key[1];
		$signature = hash('sha256', $cadena);
		return $signature;

  	}
  	/*=====  FIN IMPRIME EN PANTALLA INDEX ======*/	


  	/*=======================================================
	   Consume Metodo Notificaciones de pago TO SafetyPay
	=========================================================*/	

  	Public static function NotificationPayment($datos){


  		$ID_Merchant = $datos["merchant_id"];

		    if(isset($ID_Merchant)) {
				
			$requestDateTime = date('Y-m-d\TH:i:s'); #ISO 8601
		    $trace = true;
			$exceptions = false;	
			
			$xml_array['ApiKey'] = $datos['ApiKey'];
			$xml_array['RequestDateTime'] = $requestDateTime;
			   $cadena = $requestDateTime.$datos['Siganture_key'];
			   $signature = hash('sha256', $cadena);       
			$xml_array['Signature'] = $signature;
			

			$Action = "urn:safetypay:contract:mws:direct:GetNewOperationActivity";
			$to = "https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/";

			$header = array();
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','Action',$Action,false);
			$header[] = new SoapHeader('http://www.w3.org/2005/08/addressing','To',$to,false);

			//DEV
			$wsdl = 'https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/?wsdl';

			//PROD	
			//$wsdl = 'https://mws2.safetypay.com/direct/ws/v.1.0/?wsdl';

			//Llamamos al metodo GetNewIperationActivity
			$client = new SoapClient($wsdl, array('soap_version' => SOAP_1_2 ,'trace' => $trace, 'exceptions' => $exceptions));
			$client->__setSoapHeaders($header);
			$response = $client->GetNewOperationActivity($xml_array);


			$listOperation = $response->ListOfOperations;
			$Operation = $listOperation->Operation;

			


			
			 //print_r($MerchantSalesID);
			 
			 //echo $response->ErrorManager->ErrorNumber;
			 //echo "<br>";
			

			if ( $response->ErrorManager->ErrorNumber == 0)
			{
			    $txtLogMessage = '';
			    $actividades = '';
			    //if (is_object($response->ListOfOperations->Operation))
			    //{
			        if (isset($response->ListOfOperations->Operation->OperationID))
			        {
			            $oResult = $response->ListOfOperations;
			        }
			        else{
			            $oResult = $response->ListOfOperations->Operation;
			        }

			        $nCounter = 0;
			        $opStatus = 0;
			        foreach( $oResult as $key => $v )
			        {
			            $merchantOrderID = $v->MerchantSalesID;
			            
			            if (isset($v->OperationActivities->OperationActivity))
			                $oActivities = $v->OperationActivities->OperationActivity;
			            else
			                $oActivities = $v->OperationActivities;
			            if (isset($oActivities->CreationDateTime))
			            {
			                $opStatus = $oActivities->Status->StatusCode;
			            }
			            else
			            {
			                foreach( $oActivities as $key => $va )
			                {
			                    $opStatus = $va->Status->StatusCode;
			                }
			            }
			            
			            $toconfirm['ConfirmOperation'][] = array(
			                       'CreationDateTime' => $v->CreationDateTime,
			                       'OperationID' => $v->OperationID,
			                       'MerchantSalesID' => $v->MerchantSalesID,
			                       'MerchantOrderID' => $merchantOrderID,
			                       'OperationStatus' => $opStatus);
			                                                   
			                                                    
			            $actividades .= $v->OperationID.$v->MerchantSalesID.$merchantOrderID.$opStatus;
			                                                    
			            $ConfirmTransactions[] = $v->OperationID. ' (' . $v->MerchantSalesID . ')';
			            $nCounter++;
			        }
			
			
			       		$xml_array1['ApiKey'] = $datos['ApiKey'];
			       		$xml_array1['RequestDateTime'] = $requestDateTime;
			       		$cadena1 = $requestDateTime.$actividades.$datos['Siganture_key'];
			       		//echo $cadena1;
			       		$signature1 = hash('sha256', $cadena1);      
			
			       		$xml_array1['Signature'] = $signature1;
			       		$xml_array1['ListOfOperationsActivityNotified'] = $toconfirm;
			
			       				       		
			       		$nCounter = count( $toconfirm['ConfirmOperation'] );
			       		// 3: Confirm to Safetypay the Order Number

			       		//Arma la peticion a SafetyPay
					    $Action1 = "urn:safetypay:contract:mws:direct:ConfirmNewOperationActivity";
						$to1 = "https://sandbox-mws2.safetypay.com/direct/ws/v.1.0/";

						$header1 = array();
						$header1[] = new SoapHeader('http://www.w3.org/2005/08/addressing','Action',$Action1,false);
						$header1[] = new SoapHeader('http://www.w3.org/2005/08/addressing','To',$to1,false);

			       		
			       		$client1 = new SoapClient($wsdl, array('soap_version' => SOAP_1_2 ,'trace' => $trace, 'exceptions' => $exceptions));

			       		$client1->__setSoapHeaders($header1);
			       		$Result = $client1->ConfirmNewOperationActivity($xml_array1);

			       		//print_r($Result);

			       		//echo json_encode($Result);


			       		

			
			       		if ( $Result->ErrorManager->ErrorNumber == 0 )
			       		{
			       		    // 4: Send Email Confirmation (Optional)
			       		    // If needed, enter your own function to send an email to the buyer
			       		    // sendmail_function($emailaddress, $emailsubject, $msg, $headers);
			       		    $txtLogMessage = 'Operation (Merchant Reference No) Confirmed: ' . implode(", ", $ConfirmTransactions);

			       		    return $listOperation;
			        	}
			        	else {
			        	    $txtLogMessage = 'Error: '
			        	    . $Result->ErrorManager->ErrorNumber . ' - '
			        	    . $Result->ErrorManager->Description;
			    		     }
			    	//	}
			        
			       
			       //else
			    	 //  {
			    		//    $txtLogMessage .= 'No New Paid Orders';
			    		//}



			    		// 5: Show message about result some process or error
			    		// 5: Show message about result some process or error
			    		
			    		if ( $nCounter = 0 )
			    		    echo 'No registrations processed.';
			    		elseif ( ($nCounter != 0) && (strrpos($txtLogMessage, 'Error:') > 1) )
			    		    echo (string)$nCounter.' processed not confirmed. <br /><br />'
			    		                . $txtLogMessage;
			    		else
	
			        		echo (string)$nCounter.' processed confirmed. <br /><br />'. $txtLogMessage;
			

			}

			else
			{
			    echo 'Error in GetNewOperationActivity Method: Invalid Credentials!<br />';
			    echo 'Error Number: ' . $response->ErrorManager->ErrorNumber
			            . '<br />Severity: '. $response->ErrorManager->Severity
			            . '<br />Description: '. $response->ErrorManager->Description;
			}

		
		
		  }else{

		  	echo($ID_Merchant);
		  }
  	}

  	/*=====  FIN  Consume Metodo Notificaciones de pago TO SafetyPay ======*/	

  }

/*
$datos = ["ApiKey" => "81004c15f7c4587a1f7a3cc7893a2d07",
		   	"Siganture_key" => "1a652cad12546fead3ac4688120fbe1e",
		   	"merchant_id" => "6365",
		   ];


$a = SafetyPay::NotificationPayment($datos);

print_r($a); */