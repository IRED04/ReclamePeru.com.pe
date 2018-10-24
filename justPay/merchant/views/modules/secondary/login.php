<?php
require_once("../../../controller/controller.php");
require_once("../../../model/crud.php");

class getLogin{
 public $data = [];

 public function validateLogin(){
 	$datos = $this->data;

 	$response = MVCControllerMerchantJP::accessuserMerchant($datos);

 	
 	if($response == "error" ) {

 	   print_r("error");

 	

 	}else{
 		
 		session_start();
 		$_SESSION["validar"] = true;
 		$_SESSION["m_id"] = $response["id_merchant"];
 		$_SESSION["u_name"] = $response["name_user"];

 		print_r($response);

 	}



 }


}

$login = new getLogin();
$login->data = ["user" => $_POST["user"],
			    "pwd" => $_POST["pwd"],
			   ];

$login->validateLogin();
