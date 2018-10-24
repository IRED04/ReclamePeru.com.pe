<?php

//Aqui es donde se dispara los POST desde CreateLoginAjax con JS(Validate.js)

require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");
class loginRegAjax{
    public $data = [];
	public  function registrarUsuarioAjax(){
		if(isset($UserReg) ){
			echo"no hay data que procesar";
		}else{
			$datos = $this->data;
			$respuesta = MVCCOntroller::loginUserController($datos);

			$user = $respuesta[0];
			$email = $respuesta[1];
			$pwd = $respuesta[2];
			$genero = $respuesta[3];
			$celular = $respuesta[4];
			$idUser = $respuesta[5];	
	
    		if(isset($user)){
			    session_start();
				$_SESSION["validar"] = true;
				$_SESSION["nomUser"] = $user;
				$_SESSION["emailUser"] = $email; 
				$_SESSION["celUser"] = $celular;
				$_SESSION["idUser"] = $idUser;
	
				$NameUser = $_SESSION["nomUser"] ;

				echo $user;
				
			
    		} else {
		
    		 	echo($email);
    		}

		}
	}
}


	$a = new loginRegAjax();
	$a->data = ['UserReg' => $_POST['userLogin'] ,
				'userPwd' => $_POST['pwdLogin'] ,
	 		   ];
	$a -> registrarUsuarioAjax();

	

