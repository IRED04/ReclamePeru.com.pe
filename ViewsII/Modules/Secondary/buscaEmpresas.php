<?php

require_once "Controller/controller.php";
require_once "Model/crud.php";

 class buscaEmpresas{

 	public static function BuscaEmpresaAjax(){
 			
 				if(isset($_POST['id_prov'])) {
 				$datos =  $_POST['id_prov'];
 			
 				$respuesta = MVCController::BuscaEmpresaController($datos);
 				
 				if($respuesta == 0){
 					echo '0';
 				}else {
 			
 					foreach ($respuesta  as $row) {
        			 	echo ( '<tr> <td>' .  $row[0]  . '</td> <td>' .  $row[1]  . '</td> </tr>');
					} 
				}
			
			}
 			
 		
 	}
}


//$a = $_POST['nameEmpresa'];
//$ejecutar = buscaEmpresas::BuscaEmpresaAjax($a);

 $ejecutar = new buscaEmpresas();
 //$ejecutar->likeEmp = $_POST['nameEmpresa'];
 $ejecutar -> BuscaEmpresaAjax();