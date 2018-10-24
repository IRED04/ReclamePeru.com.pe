<?php
require_once "Controller/controller.php";
require_once "Model/enlace.php";
require_once "Model/crud.php";

ob_start();
session_start();

$getViews = new MVCControllerBkUser();
$getViews -> paginaBkUser();