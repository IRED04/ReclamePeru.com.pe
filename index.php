<?php
 
 require_once "Model/enlace.php";	
 require_once "Controller/controller.php";
 require_once "Model/crud.php";
 /*require_once "Model/crud.php";
 require_once "Views/Modules/Secondary/buscaEmpresas.php";*/
 
ob_start();
session_start();

 $a = new MVCController();
 $a -> pagina();