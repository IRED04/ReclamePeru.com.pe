<?php
require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");

class updateDatUser{

	public $datoAjax = [];
	public function getDateUpdateDatUser(){

		$datos = $this->datoAjax;

		$response = MVCControllerBkUser::updateDateUserController($datos);

		print_r($response);

		

	}


}

$execute = new updateDatUser();
$execute->datoAjax = [
	'idUser' => $_POST['idUser'],
	'nomUser' => $_POST['nomUser'],
	'apeUser' => $_POST['apeUser'],
	'celUser' => $_POST['celUser'],
	'tipDoc' => $_POST['tipDoc'],
	'numDoc' => $_POST['numDoc'],
	'genUser' => $_POST['genUser'],
	'fecNaci' => $_POST['fecNaci'],
	'dep' => $_POST['dep'],
	'prov' => $_POST['prov'],
	'dist' => $_POST['dist'],

];

$execute->getDateUpdateDatUser();
