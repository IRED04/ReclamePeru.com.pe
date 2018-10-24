<?php

require_once "../../../Controller/controller.php";
require_once "../../../Model/crud.php";

class updateReclamo{
	
	public $datos = [];

	
	public function updateReclamoID(){

		$idReclamo = $this->datos;

		$response = ControllerBackendAdmin::updateStatusReclamoControllerBA($idReclamo);

		print_r($response);

	}
}


$a = New updateReclamo();

$a->datos = [ 'id_reclamo'=> $_POST["id_reclamo"],
			 'status' => $_POST["status"],
			 'mensaje' => $_POST["mensaje"],
			 'id_user' => $_POST["id_user"],
			 'titulo' => $_POST["titulo"],
			] ;
$a->updateReclamoID();
