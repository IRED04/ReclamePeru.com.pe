<?php

require_once "../../../Controller/controller.php";
require_once "../../../Model/crud.php";


class Ajax{

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

$a = new Ajax();
$a ->validarUsuario = $_POST["validarUsuario"];
$a ->validarUsuarioAjax();