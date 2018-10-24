<?php


class paginasBkAd{


	public static function enlacesPaginasModelBkAd($enlaces){


	if($enlaces == "check_reclamos"||
	   $enlaces == "review_reclamo"
	   )
	   {
	     $module = "Views/Modules/".$enlaces.".php";
	   }
	 else{
		 $module = "Views/Modules/inicio.php";
	   } 
	
  	return $module;

	}
}