<?php
 
 require_once"../../../Model/PaymentMethod/SafetyPay/Safetypay.php";
 require_once "../../controller.php";

$idMerchant = "1010"; //$_POST['merchant_id'];

//LLama LLaves De SP
 $datosPartner = ['Partner' => 'SafetyPay','Enviroment'=>'DEV'];
 $getKeys = controller::getKeysController($datosPartner);

 $datos = ["ApiKey" => $getKeys[0],
		   	"Siganture_key" => $getKeys[1],
		   	"merchant_id" => $idMerchant,
		   ];

 $execute = SafetyPay::NotificationPayment($datos);

 //Update Status Operation JustPay
 //and sent to notification Merchant
 
  if(isset($execute)) {

  	foreach ($execute as $key ) {

	 $Paymentreference = $key->PaymentReferenceNo;
	 $MerchantSalesID = $key->MerchantSalesID;

	 $updateStatus = controller::updateStatusOperation($MerchantSalesID);

	 $getUrlMerchantNotification = controller::getUrlMerchantNotification($MerchantSalesID);
 	 $date = gmdate('Y-m-d\TH:i:s');
	 
	 $cadena = $date.$getUrlMerchantNotification['channel'].$getUrlMerchantNotification['amount'].$getUrlMerchantNotification['curency'].$getUrlMerchantNotification['trans_ID'].$getUrlMerchantNotification[2];
  	  $signature = hash('sha256', $cadena);
  	  
  	  //Notification
  	  $data = array("public_key"=> $getUrlMerchantNotification[1],
                          "channel"=> $getUrlMerchantNotification['channel'],
                          "amount"=> $getUrlMerchantNotification['amount'],
                          "curency"=> $getUrlMerchantNotification['curency'],
                          "trans_ID"=> $getUrlMerchantNotification['trans_ID'],
                          "signature"=> $signature,  
                         );

            //url contra la que atacamos
            $ch = curl_init($getUrlMerchantNotification[1]);
            //a true, obtendremos una respuesta de la url, en otro caso, 
            //true si es correcto, false si no lo es
            //secret_api_key: "";
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //establecemos el verbo http que queremos utilizar para la petición
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            //enviamos el array data
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            //obtenemos la respuesta
            $response = curl_exec($ch);
            // Se cierra el recurso CURL y se liberan los recursos del sistema
            curl_close($ch);
            if(!$response) {
                $req = [
            			 "OP_ID" => $getUrlMerchantNotification['OP_ID'],
            			 "request"=>$data,
            			 "response" => "n/a",
            			 "fec" => $date
            			];

            	$saveLog = controller::saveLog($req);
            }else{
            	$req = [
            			 "OP_ID" => $getUrlMerchantNotification['OP_ID'],
            			 "request"=>$data,
            			 "response" => $response,
            			 "fec" => $date
            			];

            	$saveLog = controller::saveLog($req);

                //print_r($response);
            }

  	  
 
  	} 

   }

  


 



  
			

 


