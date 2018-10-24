<?php

  class ControllerBackendAdmin{


  	public function enlacesPaginasBkAdmin(){

		if(isset($_GET['action'])){
     	  $enlaces = $_GET['action'];
		}else{
          $enlaces = "inicio";
		}

		$respuesta = paginasBkAd::enlacesPaginasModelBkAd($enlaces);

		
		include $respuesta;
	}



  	public static function getReclamosControllerBA(){
  		$response = DatosBkAd::getReclamosModelBA();
  		return $response;

  	}

    public static function gerContenReclamoControllerBA($datos){
      
      $response = DatosBkAd::gerContenReclamoModelBA($datos);
      
      return $response;
    }

    public static function updateStatusReclamoControllerBA($datos){

      $response = DatosBkAd::updateStatusReclamoModelBA($datos);
      return $response;
    }


  }

