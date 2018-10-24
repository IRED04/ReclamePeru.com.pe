<?php


class MVCController{



/*=============================================
	  IMPRIME EN PANTALLA INDEX
=============================================*/	

    public function pagina(){

 		include "Views/templete.php";
 	}


/*=====  FIN IMPRIME EN PANTALLA INDEX ======*/	


/*=============================================
	      REGISTRO DE USER
=============================================*/	

	public static function RegisterUserController($datos){


		if(isset($datos['email'])){

			$datosUser = array("usuario" => $datos['email'],  
							   "pwd"=> $datos['pwd'],
							    "rol"=> "1",
							   );
	
			$respuesta = Datos::registroUser($datosUser,"user");
	
				if($respuesta == "Success"){
					  //Se llama al ID del usuario
					  $idUser =  Datos::getIdUserModel($datos['email']);
					  //Se crea detalle de usuarios
                      $regUserDet = MVCController::regUserDetController($idUser[0],$datos);
					  
					  if($regUserDet == 'Success') {
					  	return $idUser;	
					  }else{
					  	return "Error en controller Linea 46";
					  }

					  
				}
	
				else{
					return($respuesta);
			   }
		}


	}


/*=====  FIN REGISTRO DE USER ======*/	




/*=============================================
	  REGISTRO DETALLES DE USER 
=============================================*/	
	public static function regUserDetController($id,$datos){
		//Rescata ID del usuario
		 if(isset($id)) {
		 	try {
		 		$userData = array('id_user' =>  $id,
		 					  'nombre' => $datos['userName'],
		 					  'apellido' => $datos['userApe'],
		 					  'tipDoc' => $datos['userTipDoc'],
		 					  'numDoc' => $datos['userNumDoc'],
		 					  'fecNaci' => $datos['userFecNaci'],
		 					  'genero' => $datos['userGenero'],
		 					  'celular' => $datos['userCelular'],
		 					  'ciudad' => $datos['userDepartamento'],
		 					  'provincia' => $datos['userDistrito'],
		 					  'distrito' => $datos['userProvincia'],
		 					 );
			
		 		$sendDataUser = Datos::regUserDetModel($userData,"det_user");
				 	if($sendDataUser == 'Success') {
				 		return "Success";
				 	}else {
				 		return $sendDataUser;
				 	}

		 			

		 		} catch (Exception $e) {
		 			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		 		}

		 }else{echo "El ID es invalido";}
	

	}



/*=====  FIN REGISTRO DE USER ======*/	





/*=============================================
	VALIDAR USUARIO EXISTENTE AJAX
=============================================*/	
public static function validarUsuarioController($ValidateUser){

	$datosController = $ValidateUser;
	$respuesta = Datos::validarUsaurioModel($datosController,"user");

		if ( count($respuesta["email"]) > 0){

			return 1;
		}else {

			return 0;
		}	
	}



/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/



/*=============================================
	         VALIDAR RUC EN SUNAT
=============================================*/	

 	public static function consultaRuc($ruc){
	
		$ruta = "https://ruc.com.pe/api/beta/ruc";
		$token = "262a7c4d-ea5a-4de2-b51c-1b6c7e79c688-aa8a66de-c294-46e1-b75d-d6599165df2b";
		
		$rucaconsultar = $ruc;
		
		$data = array(
		    "token"	=> $token,
		    "ruc"   => $rucaconsultar
		);
			
		$data_json = json_encode($data);
		
		// Invocamos el servicio a ruc.com.pe
		// Ejemplo para JSON
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ruta);
		curl_setopt(
			$ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta  = curl_exec($ch);
		curl_close($ch);
		
		$leer_respuesta = json_decode($respuesta, true);
		if (isset($leer_respuesta['errors'])) {
			//Mostramos los errores si los hay
		    echo $leer_respuesta['errors'];
		} else {
			
			//Mostramos la respuesta
			echo "Respuesta de la API:<br>";
			echo "===========================";
			echo ('<br>');
		
			//print_r( $leer_respuesta);
	
			$response = $leer_respuesta['entity'];
			echo ('Ruc: ');
			print_r($response['ruc'] );
			echo ('<br>');
			echo ('Razon Social: ');
			print_r($response['nombre_o_razon_social']);
			echo ('<br>');
			echo ('Direccion: ');
			print_r($response['direccion_completa']);
			echo ('<br>');
			echo ('Estado: ');
			print_r($response['estado_del_contribuyente']);
			
		
		}
	
	}

/*=====  FIN VALIDAR CONSULTA RUC  ======*/



/*=============================================
	          ENLACES
=============================================*/	

	public function enlacesPaginasController(){
		
		if(isset($_GET['action'])){
     	  $enlaces = $_GET['action'];
		}else{
          $enlace = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;

	}


     /*=====  FIN ENLACES  ======*/



/*=============================================
	        INGRESO DE USUARIOS
=============================================*/	
		
PUBLIC STATIC FUNCTION loginUserController($datos){

	if(isset($datos["UserReg"])) {

	$datosUser = array("usuario" => $datos['UserReg'],  
					    "pwd"=> $datos['userPwd'], );

	$respuesta = Datos::login($datosUser,"user");

	$user = $respuesta[0];
	$email = $respuesta[1];
	$pwd = $respuesta[2];


	$encriptacion = crypt($datos['userPwd'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		
    if($email == $datos['UserReg'] && $pwd == $encriptacion){
			
			return $respuesta;

    	} else {
	
    	 	print_r($respuesta);

    	}


	} else{

		echo "Error en Controller.php (LoginUserController)";
	}
 }

   /*===== FIN INGRESO DE USUARIOS======*/



 /*=============================================
	      BUSCA EMPRESAS X NOMBRE
=============================================*/	

  public static function BuscaEmpresaController(){

  	if(isset($_POST['nameEmpresa'])) {
  		require_once '../Model/crud.php';
   		$a = $_POST['nameEmpresa'];
   		
    	$empresas = Datos::getEmpresas($a);

    	foreach ($empresas  as $row) {
    		$resp = $row;

    		if($resp == "") {
    		echo ('<tr>
    				  <td> 
    				       <div class="alert alert-danger"> <strong> 0 Registros encontrados </strong> </div>
    				  </td> 
    				  <td>0</td> 
    				  	 
    				  <td>
                           <input type="radio"  id="chEmpp1" name="chEmpp1"  value="0" disabled>
                      </td> 
                   </tr>');
    		}else{
    		echo ( '<tr> 
    					 <td>' .  $row[0]  . '</td> 
    					 <td>' .  $row[1]  . '</td>    
    				</tr>');	
    		}
    	
    	}


    	if($resp == "") {

    		echo ('<tr>
    				  <td> 
    				       <div class="alert alert-danger"> <strong> 0 Registros encontrados </strong> </div>
    				  </td> 
    				  <td>0</td> 
    				  	 
    				  <td>
                           <input type="radio"  id="chEmpp1" name="chEmpp1"  value="0" disabled>
                      </td> 
                   </tr>');

    		}

    	
    	
    }

   
  }	 


	/*===== FIN BUSCA EMPRESAS X NOMBRE======*/



 /*=============================================
	          BUSCA EMPRESAS X RUC
=============================================*/	

public static function BuscaEmpresaRucController($dato){


  	
  	if(isset($dato)) {
  		//require_once '../Model/crud.php';
   		$a = $dato;
   	
    	$empresas = Datos::getEmpresasRuc($a);
    	
    	if($empresas == 0){
    		echo 0;
    	}else {
    	  return $empresas;
    	}

    }

   
  }


/*=============================================
	      RECUPARAR PWD
=============================================*/	
		
  PUBLIC static function getDateRecuPwdController($datos){
  	
  	$respuesta = Datos::getUserRecu($datos,"user");
  	$email = $respuesta[1];
	$usuario = $respuesta[0];
	$pwd = $respuesta[2];

  	$id_templete = 1;
  	$templete = Datos::getTemplereModel($id_templete);
  	$responseTemplate = $templete[0];
  	
  	$html = $responseTemplate[0];
   	
   	
	
	// Codificar Envio de Email al cliente
	
	if(isset($respuesta[1])) {
		$para      = $email;
		$titulo    = 'Recuperar tu contreseña/ReclamePeru.com';
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'From: soporte@reclameperu.com.pe' . "\r\n" .
		    'Reply-To: soporte@reclameperu.com.pe' . "\r\n" .
		    'Cc: eyalico@reclameperu.com.pe' . "\r\n".
		    'X-Mailer: PHP/' . phpversion();
		$mensaje   =  $html;

		mail($para, $titulo, $mensaje, $cabeceras);
		//FIN ENVIO EMAIL
		
		return 0;
		//print_r($html);

	} else {
		$error = "error en controller.php";
		return $templete;


	}
	
   }


/*===== FIN RECUPARAR PWD ======*/




/*=============================================
	        GUARDAR RECLAMOS CAB
=============================================*/	
  public static  function saveReclamosController($DatosController){


  	$response = Datos::SaveReclamosModel($DatosController, 'reclamos');

  	if($response == 'Succesfull'){

  		return 0;
  	}else{
  		return $response;
  	}



  }

/*===== FIN GUARDAR RECLAMOS CAB ======*/
	




/*=============================================
	  LLAMA A LAS CATEGORIAS PARA INDEX
=============================================*/	
 public static function getListaCategorias(){
 	$response = Datos::getListaCategoriasModel();
	return $response;
 }

/*===== LLAMA A LAS CATEGORIAS PARA INDEX ======*/



/*=============================================
 LLAMA A LAS EMPRESASA RECLAMADAS X ID CATEGORIA
=============================================*/	
 public static function getListaEmpresasReclamadasController($datos){
 	
 	$response = Datos::getListaEmpresasReclamadasModel($datos);
	return $response;
 }

/*===== DIN LLAMA A LAS EMPRESASA RECLAMADAS X ID CATEGORIA ======*/


/*=============================================
           LISTA DE RECLAMOS 
=============================================*/	
 public static function ReclamosxEmpresaController($datos){
 	
 	$response = Datos::ReclamosxEmpresaModel($datos);
	return $response;
 }

/*===== FIN LISTA DE RECLAMOS ======*/

/*=============================================
        LISTA DE RECLAMOS X ID USUARIO
=============================================*/	
 public static function getReclamosxUserController($datos){
 	
 	$response = Datos::getReclamosxUserModel($datos);
	return $response;
 }

/*===== FIN LISTA DE RECLAMOS X ID USUARIO ======*/


/*=============================================
            get Empresa x ID
=============================================*/	
 public static function getEmpresaxIDController($datos){
 	
 	$response = Datos::getEmpresaxIDModel($datos);
	return $response;
 }

/*===== FIN get Empresa x ID  ======*/

/*=============================================
            get Reclamos 
=============================================*/

 public static function getReclamosController(){
 	$response = Datos::getReclamosModel();
 	return $response;
 } 
/*===== FIN get Reclamos ======*/

/*=============================================
            get Reclamos 
=============================================*/

 public static function getQuejasController(){
 	$response = Datos::getQuejasModel();
 	return $response;
 } 
/*===== FIN get Reclamos ======*/

/*=============================================
            get Publicaciones 
=============================================*/

 public static function getPublicacionesController(){
 	$response = Datos::getPublicacionesModel();
 	return $response;
 } 
/*===== FIN get Publicaciones ======*/

/*=============================================
            get Empresas Reclamadas 
=============================================*/

 public static function getEmpReclamacasController(){
 	$response = Datos::getEmpReclamacasModel();
 	return $response;
 } 
/*===== FIN get Empresas Reclamadas ======*/


/*=============================================
            get BLog  
=============================================*/

 public static function getBlogController(){
 	$response = Datos::getBlogModel();
 	return $response;
 } 
/*===== FIN get BLog  ======*/

/*=============================================
            get BLog x Token 
=============================================*/

 public static function getBlogControllerID($datos){
 	$response = Datos::getBlogModelID($datos);
 	return $response;
 } 
/*===== FIN get BLog x Token ======*/



}


$a = MVCController::BuscaEmpresaController();

