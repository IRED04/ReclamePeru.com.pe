<?php
require_once('../../../../../Model/cone.php');
class updateBDEmpresasxRuc {

	function getNumRuc(){
	 
	  $consulta = "SELECT ruc FROM moodratx_dev.empresas WHERE legalName is Null LIMIT 10000";
      $resul = Conexion::conectar();
      $resul->query($consulta);
	  $countOk = 0;
	  $countError = 0;

	 

	  
	  foreach ($resul->query($consulta) as $row ) {

	  	$ruc =  $row['ruc'];
        $a = updateBDEmpresasxRuc::updateEmpre($ruc);
    
        if ($a == 0) {
	  		echo ($ruc . " , " ) ;
	  		//echo "No hay data que procesar";

				
	  	} else {
	  		//Armanos Update a la BD

	  		$script = "UPDATE moodratx_dev.empresas SET legalName = :raz_soc , businessName = :busName , tipoEmpresa = :tipoEmpresa WHERE  ruc = :ruc" ;
	  
	  		$update = Conexion::Conectar()->prepare($script);
	  		$update->bindParam(":raz_soc",$a['RazonSocial'], PDO::PARAM_STR);
	  		$update->bindParam(":busName",$a['NombreComercial'], PDO::PARAM_STR);
	  		$update->bindParam(":tipoEmpresa",$a['Tipo'], PDO::PARAM_STR);
	  		$update->bindParam(":ruc",$ruc, PDO::PARAM_STR);
	  			
	  			if($update->execute()){
            	  //echo ($ruc . " , " ) ;
            	  $countOk++;	

	        	}else{
	        	  //echo ( "Error" . $ruc . " , " ) ;
            	  $countError++;	
        		}
        	
        	
  		}  
	
	   }

	   echo '<br>' . '===========Total Registros Actualizados=======' . '<br>';
	   echo  $countOk;

	   echo '<br>' . '==========Total Registros fallados ===============' . '<br>';
	   echo   $countError;


	}	

	
	function updateEmpre($numRuc){
	
		//header("Content-Type: text/html; charset=UTF-8");
		require ("../src/autoload.php");
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
	
			return "0";
		}	
	}

 }


$a = new updateBDEmpresasxRuc();
$a ->getNumRuc();


?>
	