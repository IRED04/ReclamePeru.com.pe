<?php

 
//require_once "../Model/PaymentMethod/SafetyPay/Safetypay.php";
 
 class getPaymentCode{

 	/*public $datos = [];*/

 	public  function createPaymentoCodeSafetyPay(){

 		
 		$datosSend = "PAYMENTCODE" ; //$this->datos;

 		//$urlToken = SafetyPay::CreateExpressToken($datosSend);


		//print_r($urlToken);
		return ($datosSend );

		

 	}


	 public static function getURLExpress($datos){

	 	//$url = new SafetyPay();
	 	//$url->CreateExpressToken();

	 	$url = SafetyPay::CreateExpressToken($datos);

 		return $url; 
 	 }


 	 public static function getURLDirect(){

	 	//$url = SafetyPay::CreateExpressToken();

 		return "http://dev.reclameperu.com.pe/justPay/Views/"; 
 	 }





 }


/* $a = new getExpressToken();


 $a->datos = ['ApyKey' => $_POST['ApyKey'],
 			  'Signature_Key' => $_POST['Signature_Key'],
 			  'RequestDateTime' => $_POST['RequestDateTime'],
 			  'CurrencyID' => $_POST['CurrencyID'],
 			  'Amount' => $_POST['Amount'],
 			  'MerchantSalesID' => $_POST['MerchantSalesID'],
 			  'Language' => $_POST['Language'],
 			  'TrackingCode' => $_POST['TrackingCode'],
 			  'ExpirationTime' => $_POST['ExpirationTime'],
 			  'TransactionOkURL' => $_POST['TransactionOkURL'],
 			  'TransactionErrorURL' => $_POST['TransactionErrorURL'],
 			  'ShopperEmail' => $_POST['ShopperEmail'],
 			  'ProductID' => $_POST['ProductID'],
 			  'TransactionExpirationTime' => $_POST['TransactionExpirationTime'],
 			  'CustomMerchantName' => $_POST['CustomMerchantName'],
 			  'LocalizedCurrencyID' => $_POST['LocalizedCurrencyID'],
 			  'M_ID' => $_POST['M_ID'],

			 ];


$a->createPaymentoCodeSafetyPay();
*/


