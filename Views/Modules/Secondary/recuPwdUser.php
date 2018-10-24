<?php

require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");

class recuPassword{
	public $user;
	public function recuPwd(){
		if(isset($user)) {

			echo "Nada para procesar";			

		} else{

			$datos = $this->user;
			$respuesta = MVCController::getDateRecuPwdController($datos);
			
			echo $respuesta;

		    // Realizar validacion de respuesta para que JS(SEND EMAIL TO USER - (RECU PASWORD))  redireccione o registre algun error


		}

	}   

}


$a = new recuPassword();
$a ->user = $_POST["validarUsuario"];
$a ->recuPwd();