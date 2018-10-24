<?php
 class getDateEmployes{

 	public static function getEmployes($numRuc){

 		//header("Content-Type: text/html; charset=UTF-8");
		require_once("../Secondary/SunatPHP-master/src/autoload.php");


		$cliente = new \Sunat\Sunat(true,true);
		$ruc =  $numRuc ;  //( isset($_REQUEST["nruc"]))? $_REQUEST["nruc"] : false;
		$respuesta = $cliente->search( $ruc, true );
		//se convierte la respuesta a Json
		$respuesta_json = json_decode($respuesta, true);
		$Validar_response = $respuesta_json['success'];
		$response_dat_Emp = $respuesta_json['result'];
		
		if($Validar_response== 1) {

			return $response_dat_Emp;
	
		}else{
	
			return 0;
		}
		
 	}

 }


