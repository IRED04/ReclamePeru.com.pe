<?php


class paginas{


	public static function enlacesPaginasModel($enlaces){


	if($enlaces == "account" ||
	   $enlaces == "credentials" ||
	   $enlaces == "notification" ||
	   $enlaces == "operations" ||
	   $enlaces == "reports"  ||
	   $enlaces == "login" ||
	   $enlaces == "salir"
	   )

	   {
	     $module = "views/modules/".$enlaces.".php";
	   }
	 else{
		 $module = "views/modules/dashboard.php";
	   } 
	
  	return $module;

	}
}