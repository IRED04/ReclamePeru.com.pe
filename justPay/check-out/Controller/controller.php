<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}
//dirname(__FILE__).
require_once (dirname(__FILE__)."/../Model/crud.php");

//require_once ("../../../Model/crud.php");
//require_once ("../../Model/crud.php");

class controller{
	
	public function pagina(){
		
		 if($_GET['channel'] == 'ol'){
			//include "Views/templete.php";
			include "Views/redirectSafetyPay.php";
		 }else if ($_GET['channel'] == 'efe') {
			//include "Views/templete_cash.php";
			include "Views/redirectSafetyPay.php";
		 }else if($_GET['channel'] == 'tcred'){
		 	include "Views/temp_creditCar.php";
		 }else if($_GET['channel'] == 'uniPay'){
		 	include "Views/temp_UniPay.php";
		 }else{
			include("Views/Modules/temp_notAccess.php");
	   	 }

 		}

	public static  function createOperation($request){

		$DateActual = date("Y-m-d H:i:s");
		
		$DatosMerchant = controller::getKeyMerchant($request['public_key']);
		
		
		if(isset($DatosMerchant[1])) {

		  //Se arma hash para comparar con datos que envia el comercio.
		  $cadena =  $DatosMerchant[1].$request['time'].
		    		 $request['amount']. $request['curency'].
		    		 $request['trans_ID'].$request['time_expired'].
		    		 $request['url_ok'].$request['url_erro'].
		    		 $request['channel'].$DatosMerchant[2];

		  $aprobal = hash('sha256', $cadena);
		  //echo($aprobal);
	 
  		  if($aprobal == $request['signature']){

			//Se arma Request para creacion de nueva Operacion
  		  	$Token = "M".$DatosMerchant[0].$request['trans_ID'];


  		  	//Validate Partner
  		  	if($request['channel'] == 1 || $request['channel'] == 2 ) {
  		  		$partner_id = 1;
  		  	} else if ($request['channel'] == 3) {
  		  		$partner_id = 2;
  		  	} else if ($request['channel'] == 0){
  		  		$partner_id = 0;
  		  	}



			$datosController = ['merchant_id' => $DatosMerchant[0] ,
								'partner_id' => $partner_id,
								'amount' => $request['amount'],
								'curency' => $request['curency'],
								'channel'	=> $request['channel'],
								'url_ok' => $request['url_ok'],
								'url_error' => $request['url_erro'],
								'trans_ID'=> $request['trans_ID'],
								'time_expired'=> $request['time_expired'],
								'last_status' => "1",
								];

			//Crea una nueva operacion para LGP
			$tabla = "Operation";
			$response = Datos_jp::createNewOperation($datosController,$tabla);

			//ArmaTOken
			$CadenaToken = $response.$DateActual.$DatosMerchant[0];

			$tokenB = hash('sha1' , $CadenaToken);

			$requestToken = ["Op_id"=>$response,
							 "token"=>$tokenB,
							 "id_Merchant"=>$DatosMerchant[0],
							];

			$CreateToken = Datos_jp::createNewToken($requestToken);

			if($CreateToken == "Succesfull") {
				$getToken = Datos_jp::getToken($response);
			} else{
				$getToken = $CreateToken;
			}
			
			//if ($response != null){

			  if ($request['channel'] == 1 ){
				$canal = "ol";
				$return = "http://dev.reclameperu.com.pe/justPay/check-out/?channel=". $canal. "&tokenID=".$getToken[0];
			  } else if ($request['channel'] == 2 ) {
				$canal = "efe";	
				$return = "http://dev.reclameperu.com.pe/justPay/check-out/?channel=". $canal. "&tokenID=".$getToken[0];
			  }else if ($request['channel'] == 3){
			  	$canal = "tcred";	
				$return = "http://dev.reclameperu.com.pe/justPay/check-out/?channel=". $canal. "&tokenID=".$getToken[0];
			  }else if ($request['channel'] == 4){
			  	$canal = "uniPay";	
				$return = "http://dev.reclameperu.com.pe/justPay/check-out/?channel=". $canal. "&tokenID=".$getToken[0];
			  }else if ($request['channel'] == 0 ){
			  	$return = "http://dev.reclameperu.com.pe/justPay/check-out/check-out?tokenID=". $getToken[0];
			  }

			//}

	
		} else {

			$return = "111";

		}


		return($return); 


		} else {

			return("112");
		}

		
	}

	public static function getKeyMerchant($public_key){

		$key_Merchant = Datos_jp::getKeyMerchantModel($public_key);
		return $key_Merchant;

	}


	public static function getPaymentDataController($datos){

		$response = Datos_jp::getPaymentDataModel($datos);
		return $response;

	}

	public function createCashPaymentCode($request){
		$paymentCash = SafetyPay::DirectCreateCustomCashPayment($request);
		return $paymentCash; 


	}


	public function createRedirectPaymentSafetyPay($request){
		
		$codPayment = SafetyPay::CreateExpressToken($request);

		$data_operation = $request['DataOperation'];
		$opID = $data_operation["operation_id"];
		$fecSaveData =  date("Y-m-d H:i:s");

		$data = ["opID"=>$opID ,"RqAndRp"=>$codPayment,"fec"=>$fecSaveData] ;

		$save = Datos_jp::save_rqSPModel($data);
		return $codPayment['URL_Redirect']; 

	}


	public function saveLogController($data){
		
		
		$save = Datos_jp::saveLogModel($data);
		//return $codPayment['URL_Redirect']; 

	}





	public function  updatePaymentCodePartner($datos){
		$resp = Datos_jp::updatePaymentCodePartnerModel($datos);
		return $resp;

	}

	public static function saveLog($datos){

		$save = Datos_jp::saveLogModel($datos);
		return  $save;

	}


	public function getresponse($datos){

		$get = Datos_jp::getresponseModel($datos);
		return  $get;

	}

	public function getImgBankController($datos){
		$get = Datos_jp::getImgBankModel($datos);
		return $get ;
	}

	public function getOperationController($datos){
		$get = Datos_jp::getOperationModel($datos);
		return $get;
	}

	public static function  getKeysController($datos){

		$get = Datos_jp::getKeysModel($datos);
		return $get;

	}

	public function getCountryMerchant($datos){

		$get = Datos_jp::getCountryMerchantModel($datos);
		return $get;

	}

	public function updateTransPartner($opID,$transPart){

		$update = Datos_jp::updateTransPartnerModel($opID,$transPart);
		return $update;
	}

	public static function   updateStatusOperation($datos){

		$update = Datos_jp::updateStatusOperationModel($datos);
		return $update;

	}

	public static function   getUrlMerchantNotification($datos){

		$update = Datos_jp::getUrlMerchantNotificationModel($datos);
		return $update;

	}



}


/*
if(isset($_POST['public_key'])) {
 $excecute = new controller();
 $excecute->datos = [
					'public_key' => $_POST['public_key'],
					'time' => $_POST['time'],
					'channel' => $_POST['channel'],
					'amount' => $_POST['amount'],
					'curency'=> $_POST['curency'],
					'trans_ID'=> $_POST['trans_ID'],
					'time_expired'=> $_POST['time_expired'],
					'url_ok' => $_POST['url_ok'],
					'url_erro' => $_POST['url_erro'],
					'siganture' => $_POST['siganture'],

				   ];

 $excecute->createOperation();
}



*/