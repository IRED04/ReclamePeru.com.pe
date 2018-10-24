<?php

require_once "../../../Controller/controller.php";
require_once "../../../Model/crud.php";


class ValUser{

	public $validarUsuario;
	public function validarUsuarioAjax(){
		if(isset($validarUsuario)) {	
			echo "No hay data que procesar";
		}else{
			$datos = $this->validarUsuario;
		    $respuesta = MVCController::validarUsuarioController($datos);
			echo $respuesta;

		}
	}
}

$a = new ValUser();
$a ->validarUsuario = $_POST["validarUsuario"];
$a ->validarUsuarioAjax();