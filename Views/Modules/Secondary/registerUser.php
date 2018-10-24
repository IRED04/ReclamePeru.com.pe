<?php

require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");

class RegistroUser{

	public $datos = [];

	public  function sendDataRegisterUser(){
		$sendDatos = $this->datos; 
		$response = MVCController::RegisterUserController($sendDatos);

		$idUser = $response[0];

		if(isset($idUser)){
			session_start();
			$_SESSION["temp"] = true;
			$_SESSION["idUser"] = $idUser;
			echo("Success");

		}else
			echo($response);
	}


}

$execute = new RegistroUser();

$execute->datos = ['email'=> $_POST['user'],
					  'pwd'=> $_POST['pwdUser'],
					 ];

$execute->sendDataRegisterUser();