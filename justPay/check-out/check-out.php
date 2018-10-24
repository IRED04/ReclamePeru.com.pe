<?php
require_once("Controller/controller.php");
require_once ("Model/crud.php");
require_once ("Model/PaymentMethod/SafetyPay/Safetypay.php");

 $token = $_GET['tokenID'];
 $getData = controller::getPaymentDataController($token);

 $respJson =  json_encode($getData);

 //print_r($respJson);


 include("Views/check-out.php");


 







 