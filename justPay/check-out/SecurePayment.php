<?php

require_once("Controller/controller.php");
require_once ("Model/crud.php");
require_once ("Model/PaymentMethod/SafetyPay/Safetypay.php");


$url = 'http://dev.reclameperu.com.pe/justPay/check-out/'

if(isset($_POST['public_key'])) {	

	
if(empty($_POST['time'])){
  print_r($url.'error?error=102');
}

else if(empty($_POST['channel'])){
  print_r($url.'error?error=103');
}

else if(empty($_POST['amount'])){
  print_r($url.'error?error=104');
}

else if(empty($_POST['curency'])){
  print_r($url.'error?error=105');
}

else if(empty($_POST['trans_ID'])){
  print_r($url.'error?error=106');
}

else if(empty($_POST['time_expired'])){
  print_r($url.'error?error=107');
}

else if(empty($_POST['url_ok'])){
  print_r($url.'error?error=108');
}

else if(empty($_POST['url_erro'])){
  print_r($url.'error?error=109');
}

else if(empty($_POST['signature'])){
  print_r($url.'error?error=110');
} else{

	
   	$datos = [
					'public_key' => $_POST['public_key'],
					'time' => $_POST['time'],
					'channel' => $_POST['channel'],
					'amount' => $_POST['amount'],
					'curency'=> $_POST['curency'],
					'trans_ID'=> $_POST['trans_ID'],
					'time_expired'=> $_POST['time_expired'],
					'url_ok' => $_POST['url_ok'],
					'url_erro' => $_POST['url_erro'],
					'signature' => $_POST['signature'],

				   ];

 	$excecute = controller::createOperation($datos);

	 //header('Location:'.$excecute);

 	if($excecute == "111"){
 		print_r($url.'error?error=111');
 	}else if($excecute == "112"){
 		print_r($url.'error?error=112');

 	}else{
 		print_r($excecute);
 	}

}

 	
}
 
else{

  include("Views/Modules/temp_notAccess.php");

 }





