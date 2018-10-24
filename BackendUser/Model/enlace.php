<?php


class paginasBkUs{


	public static function enlacesPaginasModelBkUs($enlaces){


	if($enlaces == "changePwdUser" ||
	   $enlaces == "updateUser" ||
	   $enlaces == "salir" ||
	   $enlaces == "reclamarPaso1" ||
	   $enlaces == "reclamarPaso2" ||
	   $enlaces == "reclamarPasoFinal"
	   )
	   {
	     $module = "Views/Modules/".$enlaces.".php";
	   }
	 else{
		 $module = "Views/Modules/content.php";
	   } 
	
  	return $module;

	}
}