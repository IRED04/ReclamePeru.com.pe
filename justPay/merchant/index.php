<?php


require_once "controller/controller.php";
require_once "model/enlace.php";
require_once "model/crud.php";

session_start();
$validar = $_SESSION["validar"];
 //print_r($validar);

 if ($validar == true ) {
   $getViews = new MVCControllerMerchantJP();
   $getViews -> paginaMerchant();
 } else{
 	include ("views/modules/login.php");
 }



