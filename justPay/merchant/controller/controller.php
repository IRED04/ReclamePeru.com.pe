<?php 

 class MVCControllerMerchantJP{
 	public function paginaMerchant(){
 		include "views/templete.php";
 	}

 	public function enlacesAdminMerchant(){
 		if(isset($_GET['action'])){
     	  $enlaces = $_GET['action'];
		}else{
          $enlaces = "";
		}
		$respuesta = paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
 	}

 	public static  function accessuserMerchant($datos){

 		$getUsers = MerchantDatos::loginUserMerchant($datos);

 		$validate = $datos["pwd"];

 		$encriptacion = crypt($validate,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

 		if($getUsers[1] == $encriptacion){
 			return $getUsers;	
 		}else{
 			return "error";
 		}

 	}

 	public static function getCredentialsMerchant($datos){
        $getCredentialM = MerchantDatos::getCredentialsMerchantModel($datos);
        return $getCredentialM;
        

 	}

 	public static function getDataMerchantC($datos){

 		$getDataMerchant = MerchantDatos::getDataMerchantM($datos);

 		return $getDataMerchant;
 		


 	}

 	public static function consulOperationC($datos){

 		$getDataMerchant = MerchantDatos::consulOperationM($datos);

 		return $getDataMerchant;
 		


 	}




 }