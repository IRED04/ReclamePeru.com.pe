<?php
 require_once "cone.php";

 class DatosBkAd extends ConexionBkAd {

 	public static function getReclamosModelBA(){

 	$Consul = ConexionBkAd::conectarBkAd()->prepare (
 													"SELECT 
													 r.id_reclamo,
													 r.id_emp ,
													 r.Titulo, 
													 e.businessName,
													 Date_format(r.fec_reclamo,'%Y/%M/%d'),
													 u.nombre,
													 r.last_status 
													FROM moodratx_dev.reclamos r
													inner join det_user u
													on r.id_user = u.id_user
													inner join empresas e
													on r.id_emp = e.id_empresas
													where r.last_status = 1
													order by r.fec_reclamo desc limit 10");
	$Consul->execute();
    return  $Consul->fetchAll();
    $Consul->close();

 	}

 	public static function gerContenReclamoModelBA($datos){
 		$consul = ConexionBkAd::conectarBkAd()->prepare (
 			"SELECT descripcion,id_user FROM  reclamos
			 WHERE id_reclamo = :id_reclamo "
 		);

 		$consul->bindParam(":id_reclamo",$datos, PDO::PARAM_STR);

 	    $consul->execute();

 	    return  $consul->fetchAll();

    	$Consul->close();


 	}

 	public static function updateStatusReclamoModelBA($datos){
 		
 		$DateActual = date("Y-m-d H:i:s");

 		$insertMsage = ConexionBkAd::conectarBkAd()->prepare("

				INSERT into  message_claimant(descripcion,id_user,status,id_reclamo,titulo,fec_add)
				values(:descrip ,:idUSer,1,:idReclamo,:tit,:f_ad)
 			");

		$insertMsage->bindParam(":descrip",$datos['mensaje'],PDO::PARAM_STR);
		$insertMsage->bindParam(":idUSer",$datos['id_user'],PDO::PARAM_STR);
		$insertMsage->bindParam(":idReclamo",$datos['id_reclamo'],PDO::PARAM_STR);
		$insertMsage->bindParam(":tit",$datos['titulo'],PDO::PARAM_STR);
		$insertMsage->bindParam(":f_ad",$DateActual,PDO::PARAM_STR);
		$insertMsage->execute();
		




 		$update = ConexionBkAd::conectarBkAd()->prepare("
				UPDATE reclamos
				SET last_status = :new_status
				WHERE id_reclamo = :id_rec

 			");
 		$update->bindParam(":new_status",$datos['status'],PDO::PARAM_INT);
 		$update->bindParam(":id_rec",$datos['id_reclamo'],PDO::PARAM_INT);


 		  if ($update->execute()){
    			return "Success";
    			
    		} else{

    			return "Error";
    			
    		}
   		$update->close();



 	}
 }