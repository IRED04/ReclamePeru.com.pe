<?php
 


 class SafetyPayController{

 	public static  function creareURLDirect($datos){
 		
 		$a = SafetyPay::Create_DirectCustomOnlinePayment();

 		$URL =  $a->BankRedirectUrl;
 		$TransaccionSP = $a->TransactionIdentifier;

 		return($URL);
	}

 }