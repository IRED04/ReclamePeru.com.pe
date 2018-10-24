<?php

class Paginas{

  public static function enlacesPaginasModel($enlaces){

	if($enlaces == "ReclamarPaso1" ||
	   $enlaces	== "ReclamarPaso2" ||
	   $enlaces	== "ReclamarPasoFinal"||
	   $enlaces	=="HistoriaEmpresa" ||
	   $enlaces == "salir" ||
	   $enlaces == "RecuPwdUser"||
	   $enlaces == "ReclamoEmpresas" ||
	   $enlaces == "MisReclamos" ||
	   
	   $enlaces == "login" ||
	   $enlaces == "registro"||
	   $enlaces == "recuPwd" ||
	   $enlaces == "TerminosDeUso" ||
	   $enlaces == "blog"

	   )
	   {
	     $module = "Views/Modules/".$enlaces.".php";
	   }
	 else if($enlaces == "index"){
		 $module = "Views/Modules/inicio.php";
	   } 
	else
	   {
		 $module = "Views/Modules/inicio.php";
	   }

  	return $module;
  }	

}


?>