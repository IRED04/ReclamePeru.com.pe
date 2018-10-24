<?php

//Aqui es donde se dispara los POST desde CreateLoginAjax con JS(Validate.js)

require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");
class userRegAjax{
    public $data = [];
	public  function registrarUsuarioAjax(){
		if(isset($UserReg) ){
			echo"no hay data que procesar";
		}else{
			$datos = $this->data;
			$respuesta = MVCCOntroller::registrarUsuariosController($datos);
			


		}
	}
}

$a = new userRegAjax();
$a->data = ['UserReg' => $_POST['userReg'] ,
			'userName' => $_POST['userName'] ,
			'userApe' => $_POST['userApe'] ,
			'userTipDoc' => $_POST['tipDoc'],
			'userNumDoc' => $_POST['numDoc'],
			'userFecNaci' => $_POST['fec_naci'],
			'userGenero' => $_POST['userGenero'] ,
			'userCelular' => $_POST['userCelular'] ,
			'userDepartamento' => $_POST['userDepartamento'] ,
			'userProvincia' => $_POST['userProvincia'] ,
			'userDistrito' => $_POST['userDistrito'] ,
			'pwdUser' => $_POST['pwdReg'] ,
 		   ];
$a -> registrarUsuarioAjax();


