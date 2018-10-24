<?php
require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");

class updateMesageId{

	public $datoAjax = [];
	public function updateMesageId(){

		$datos = $this->datoAjax;

		$response = MVCControllerBkUser::updateMesageIdController($datos);

		print_r($response);

		

	}


}

$execute = new updateMesageId();
$execute->datoAjax = [
	'id' => $_POST['id'],
];

$execute->updateMesageId();
