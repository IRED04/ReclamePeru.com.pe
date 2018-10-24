<?php

require_once "cone.php";

class MerchantDatos extends Conexion_merchantJP{

	public static function loginUserMerchant($datos){

		$encriptacion = crypt($datos["pwd"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		$stmt = Conexion_merchantJP::conectar_merchantJP()->prepare('SELECT name_user, pwd_user , id_merchant
											   FROM user_merchant 
											   WHERE name_user = :usuario
											   and pwd_user = :pwd
											   ');

        $stmt->bindParam(":usuario",$datos["user"],PDO::PARAM_STR);
        $stmt->bindParam(":pwd",$encriptacion,PDO::PARAM_STR);
        $stmt->execute();

        return  $stmt->fetch();

        $stmt->close();





	} 

	public static function getCredentialsMerchantModel($datos){

		$stmt = Conexion_merchantJP::conectar_merchantJP()->prepare('
			SELECT * FROM Merchant_login
			WHERE id_merchant = :id ');

		$stmt->bindParam(":id",$datos,PDO::PARAM_STR);
        $stmt->execute();

        return  $stmt->fetch();

        $stmt->close();



	}

	public static function getDataMerchantM($datos){

		$stmt = Conexion_merchantJP::conectar_merchantJP()->prepare('
			SELECT * FROM Merchant
			WHERE id = :m_id
			');

		$stmt->bindParam(":m_id",$datos,PDO::PARAM_STR);
        $stmt->execute();

        return  $stmt->fetch();

        $stmt->close();

	}

	public static function consulOperationM($datos){

		$where  = "1";

		$typePayment = $datos["TypePayment"];
		$status = $datos["status"];
		$periodo = $datos["periodo"];
		$Operation = $datos["Operation"];
		$reference = $datos["reference"];


		
		if(empty($typePayment) && $status  == "all"  && empty($Operation) && empty($reference)) {
			$where = "";
		}else if(empty($typePayment) && $status  == "all"  && empty($Operation)  ){
			$where  = " WHERE merchant_trans_ID =  "."'"."".$reference.""."'"."" ;  
		}else if(empty($typePayment) && $status  == "all"  && empty($reference)  ){
			$where  = " WHERE operation_id = ".$Operation.""; 
		}else if(empty($reference) && $status  == "all"  && empty($Operation)  ){
			$where  = " WHERE channel = ".$typePayment."";
		}else if(empty($typePayment) && empty($reference)  && empty($Operation)  ){
			$where  = " WHERE last_status = ".$status." "; 
		}else if(empty($typePayment) && $status  == "all" ){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"."  AND operation_id = ".$Operation."" ;
		}else if(empty($typePayment) && empty($Operation) ){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"."  AND last_status = ".$status."" ;
		}else if(empty($typePayment) && empty($reference) ){
			$where  = " WHERE operation_id = ".$Operation." AND last_status = ".$status."" ;
		}else if($status == "all" && empty($reference) ){
			$where  = " WHERE channel = ".$typePayment."  AND  operation_id = ".$Operation."" ;
		}else if($status == "all" && empty($Operation) ){
			$where  = " WHERE channel = ".$typePayment."  AND merchant_trans_ID = "."'"."".$reference.""."'"."" ;
		}else if(empty($reference)  && empty($Operation) ){
			$where  = " WHERE channel = ".$typePayment."  AND last_status = ".$status."";
		}else if(empty($typePayment) ){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"." AND operation_id = ".$Operation." AND last_status = ".$status."" ;
		}else if($status == "all"){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"."  AND operation_id = ".$Operation." AND channel = ".$typePayment."" ;
		}else if(empty($Operation)){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"." AND last_status = ".$status." AND channel = ".$typePayment."" ;
		}else if(empty($reference)){
			$where  = " WHERE merchant_trans_ID = "."'"."".$reference.""."'"."  AND last_status = ".$status." AND operation_id = ".$Operation." " ;
		}else{
			$where  = " WHERE channel = ".$typePayment."  AND last_status = ".$status." AND operation_id = ".$Operation." AND merchant_trans_ID = "."'"."".$reference.""."'"."";
		}



		if ($where == 1){
			return "vacio";
		}else{

		$stmt = Conexion_merchantJP::conectar_merchantJP()->prepare('
			SELECT 
				operation_id,
	   			merchant_trans_ID,
       			currency,
       			amount,
       			last_status  
			FROM Operation'.$where.'
			');

        $stmt->execute();

        return  $stmt->fetchAll();

        $stmt->close();

        //return $stmt;

        }

	}





}


//$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly
//$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly

