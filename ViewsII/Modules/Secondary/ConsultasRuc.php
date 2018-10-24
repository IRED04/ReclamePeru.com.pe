<?php

require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");
require_once("../Secondary/SunatPHP-master/example/consultaSunat.php");


class ConsultasRUC{
	public $validarUsuario;
	public function consultandoRuc(){
		$datos = $this->validarUsuario;
		
		//Busca si existe el RUC en la BD - ReclamePeru
		$validaBD = MVCController::BuscaEmpresaRucController($datos);
		
		foreach($validaBD as $row) {
			$response = $row[0];
		}

		
		if($response ==  NULL){
	
			//INICIO BUSCAR Y RECUPERA DATOS DE EMPRESAs EN SUNAT
		    $getDateRuc = getDateEmployes::getEmployes($datos);
			
			if($getDateRuc == 0){
				//EL NUMERO DE RUC NO EXISTE AL CONSULTAR EN SUNAT 

			    //echo("Este ruc no existe, por favor verifique");
			    echo(1);

			}else {
				//SE RECUPERA LOS DATOS DE LA SUNAT Y SE ARMA ARREGLO PARA EL CONTROLADOR
				$datoSendController  = array('RUC' => $getDateRuc['RUC'], 
											 'RazonSocial' =>$getDateRuc['RazonSocial'],
											 'NombreComercial' =>$getDateRuc['NombreComercial'],
											 'Tipo' =>$getDateRuc['Tipo'],);
				//ENVIAMOS LOS DATOS AL CONTROLADOR PARA QUE LOS PROCESE
				$resInsertNewEmp = MVCController::InsertNewEmpController($datoSendController);
				
				//SI EL INSERT REGRESA SUCCESS
				if($resInsertNewEmp== 1){
					//CAPTUREAMOS EL NOMBRE COMERCIAL DE LA RESPUESTA DE SUNAT;
					$NombreComercialGet = $getDateRuc["NombreComercial"];
					 // SI EL NOMBRE COMERCIAL ES SOLO - SE UTILIZARA EL NOMBRE DE LA RAZON SOCIAL
      				 if($NombreComercialGet == "-"){
      				   $NombreComercialSave = $getDateRuc["RazonSocial"];
      				 }else{
      				   $NombreComercialSave = $getDateRuc["NombreComercial"];
      				 }

					echo($NombreComercialSave);

					//echo("La empresa fue registrada exitosamente buscarlo con el nombre de: " . $NombreComercialSave );

				//SI INSERT REGRESA ERROR 
				}else{

					echo(2);
					
				}

				
			}
			//FIN BUSCAR EMPRESA EN SUNAT

		}else{
			echo($response);
		}
	
	}


}

$a = new ConsultasRUC();
$a -> validarUsuario = $_POST["ruc"];
//var_dump ($a);
$a ->consultandoRuc();


