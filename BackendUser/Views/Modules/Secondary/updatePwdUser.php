<?php
require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");

class updatePwd{

	public $datos;
	public function updatepwdUser(){

	 $newPwd = $this->datos;

	 $execute = MVCControllerBkUser::UpdatePwdModelController($newPwd);

	 print_r($execute);
	}


}

$ejecute = New updatePwd();
$ejecute->datos = $_POST['pwdUpdate'];
$ejecute->updatepwdUser();