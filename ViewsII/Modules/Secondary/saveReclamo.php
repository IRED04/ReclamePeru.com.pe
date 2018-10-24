<?php
require_once("../../../Controller/controller.php");
require_once("../../../Model/crud.php");
class saveReclamos{

	public $DataRecived = [];

	public function sendReclamoToControles(){
		$sendRuc = $this->DataRecived['rucEmpr'];
		$rucResponse = MVCController::BuscaEmpresaRucController($sendRuc);
		 foreach ($rucResponse as $row ) {
		 	$idEmp = $row[2];
		 }
		  ob_start();
  		  session_start();
  		  $idUser = $_SESSION["idUser"];

  		  $datos = array('titulo' => $this->DataRecived['titulo'] , 
  		  				 'reclamo'=> $this->DataRecived['reclamo'] ,
  		  				 'tipo' =>$this->DataRecived['tipo'] ,
  		  				 'idEmpr' => $idEmp,
  		  				 'idUser' => $idUser,
  		  				 'status' => "1",
	     				);

		  $response = MVCController::saveReclamosController($datos);

		  if ($response == 0) {

		  	 echo('Se registro Exitosamente');

		  } else{

		  	echo('Se esta presnetando errores');
		  }


	}

}


$a = new saveReclamos();
$a ->DataRecived = ['titulo' => $_POST['titulo'],
					'rucEmpr'=> $_POST['rucEmp'],
					'reclamo'=> $_POST['reclamo'],
					'tipo'=> $_POST['tipo'],
					];

$a->sendReclamoToControles();


