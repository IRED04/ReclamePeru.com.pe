<?php


$numError = $_GET['error'];

$desc;
if($numError == 101){

	$desc = "API_KEy NOT FUNCTION";

}
else if ($numError == 102){
	$desc = "LA fecha no cumple con la estructura";
}
else if ($numError == 103){
	$desc = "Error en el Parametro channel";
}
else if ($numError == 104){
	$desc = "error en el monto enviado";
}
else if ($numError == 105){
	$desc = "error en la moneda";
}
else if ($numError == 106){
	$desc = "error en la transaccion";
}
else if ($numError == 107){
	$desc = "error en el tiempo de expiracion";
}
else if ($numError == 108){
	$desc = "Error en la URL OK";
}
else if ($numError == 109){
	$desc = "error en la URL Error";
}
else if ($numError == 111){
	$desc = "error en signature";
}
else if ($numError == 112){
	$desc = "Error in Credentials";
}

include("Views/Modules/temp_error.php");