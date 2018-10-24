<?php

class MVCControllerBkUser{

	public function paginaBkUser(){

		include "Views/templete.php";
	}


	public function enlacesPaginasBkUser(){

		if(isset($_GET['action'])){
     	  $enlaces = $_GET['action'];
		}else{
          $enlaces = "content";
		}
		$respuesta = paginasBkUs::enlacesPaginasModelBkUs($enlaces);
		include $respuesta;
	}


	public static function UpdatePwdModelController($datos){
		ob_start();
		session_start();
		 $validar = $_SESSION["validar"];

		if ($validar == true ) {
		   $idUser = $_SESSION["idUser"] ;
		 } else{
		    $idUser = "Usuario unexistente";
		    return $nameUser;
		 }

		 $sendData =  array('newPwd' => $datos , 'idUser' => $idUser );

		 $execute = DatosBkUs::UpdatePwdModel($sendData,'user');

		 return $execute;





	}

	public  function getDataUserxIDController($datos){
		
		$response = DatosBkUs::getDateUserxIdModel($datos);
		//$dato = $datos;

		return $response;//$response;

	}


	public static function updateDateUserController($datos){

		//$datos = 

		$response =  DatosBkUs::updateDateUserModel($datos);

		return $response;
	}


 /*=============================================
	      BUSCA EMPRESAS X NOMBRE
=============================================*/	

  public static function BuscaEmpresaController(){

  	if(isset($_POST['nameEmpresa'])) {
  		require_once '../Model/crud.php';
   		$a = $_POST['nameEmpresa'];
   		
    	$empresas = DatosBkUs::getEmpresas($a);

    	foreach ($empresas  as $row) {
    		$resp = $row;

    		if($resp == "") {
    		echo ('<tr>
    				  <td> 
    				       <div class="alert alert-danger"> <strong> 
                        Mil disculpas, la empresa que estas buscando aun no esta registrada.
                      Por favor intente con la opcion NO ENCUENTRO LA EMPRESA
                   </strong> </div>
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
    					 ');	
    		}
    	
    	}


    	if($resp == "") {

    		echo ('<tr>
    				  <td> 
    				       <div class="alert alert-danger"> <strong>  Mil disculpas, la empresa que estas buscando aun no esta registrada.
                      Por favor intente con la opcion NO ENCUENTRO LA EMPRESA 
                   </strong> </div>
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
    
      $empresas = DatosBkUs::getEmpresasRuc($a);
      
      if($empresas == 0){
        echo 0;
      }else {
        return $empresas;
      }

    }

   
  }

/*===== FIN BUSCA EMPRESAS X RUC ======*/


  /*=============================================
          GUARDAR RECLAMOS CAB
=============================================*/ 
  public static  function saveReclamosController($DatosController){


    $response = DatosBkUs::SaveReclamosModel($DatosController, 'reclamos');

    if($response == 'Succesfull'){

      return 0;
    }else{
      return $response;
    }



  }

/*===== FIN GUARDAR RECLAMOS CAB ======*/


/*=============================================
        LISTA DE RECLAMOS X ID USUARIO
=============================================*/ 
 public static function getReclamosxUserController($datos){
  
  $response = DatosBkUs::getReclamosxUserModel($datos);
  return $response;
 }

/*===== FIN LISTA DE RECLAMOS X ID USUARIO ======*/



/*=============================================
          INSERTA NUEVA EMPRESA
=============================================*/ 

  public static function  InsertNewEmpController($datosController){

      $response = DatosBkUs::InsertNewEmpModel($datosController,'empresas');

      if($response == "Success"){

        return 1;
      }else{
        return $response;
      }

  }

/*===== FIN INSERTA NUEVA EMPRESA ======*/


/*=============================================
                getMessages
=============================================*/

   public static function  getNewMesages($datosController){
    

    $response = DatosBkUs::getNewMesagesModel($datosController);
    return  $response;
    
   }

/*===== FIN getMessages ======*/

/*=============================================
                getMessages
=============================================*/

   public static function  getCountMesages($datosController){
    

    $response = DatosBkUs::getCountMesagesModel($datosController);
    return  $response;
    
   }

/*===== FIN getMessages ======*/


/*=============================================
                getMessagesxID
=============================================*/

   public static function  updateMesageIdController($datosController){
    

    $response = DatosBkUs::updateMesageIdControllerModel($datosController);
    return  $response;
    
   }

/*===== FIN getMessagesxID ======*/





}




