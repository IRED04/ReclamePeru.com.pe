<?php
	
    require_once "cone.php";

	class Datos_jp extends Conexion_jp {


  	/*=============================================
            Creacion de una nueva operacion
    =============================================*/ 

  	public static function createNewOperation($datos,$tabla){
		
      $DateActual = date("Y-m-d H:i:s"); 
      $merchantID = $datos['merchant_id'];
      $partnerID = $datos['partner_id'];
      $monto = $datos['amount'];
      $noneda = $datos['curency'];
      $canal = $datos['channel'];
      $urlOk = $datos['url_ok'];
      $urlError = $datos['url_error'];
      $merchantTrans_id = $datos['trans_ID'];
      $time_exp = $datos['time_expired'];
      $last_status = $datos['last_status'];


      $insertar = "INSERT INTO $tabla
                    (merchant_id,partner_id,amount,currency,channel,fec_peticion,fec_creacion,url_ok,url_error,merchant_trans_ID,time_expired,last_status) 
                   VALUES('$merchantID','$partnerID','$monto','$noneda','$canal','$DateActual','$DateActual','$urlOk','$urlError','$merchantTrans_id','$time_exp', '$last_status') 

                    ";

      $cone = Conexion_jp::conectar_jp();
      $cone->query($insertar);



      return $cone->lastinsertid();
        


  	}

  	/*=====  Creacion de una nueva operacion ======*/



    /*=============================================
                  GET MERCHANT DATES
    =============================================*/ 

    public static function getKeyMerchantModel($datos) {

        $Consul = Conexion_jp::conectar_jp()->prepare(
          "SELECT * FROM `Merchant_login`
          where public_key = :pub_key" 
        );
    
        $Consul->bindParam(":pub_key",$datos,PDO::PARAM_STR);

        $Consul->execute();
        return $Consul->fetch();




     }


    /*==========  FIN GET MERCHANT DATES ========*/


     /*=============================================
                    Create New TOKEN
    =============================================*/

    public static function createNewToken($datos){
      
      $DateActual = date("Y-m-d H:i:s");

      $newToken = Conexion_jp::conectar_jp()->prepare("
        INSERT INTO Token_operation(Id_operation,token,fec_add,id_Merchant)
        VALUES(:id_op,:newToken,:fecha,:id_merchant)
      ");

      $newToken->bindParam(":id_op",$datos['Op_id'],PDO::PARAM_INT);
      $newToken->bindParam(":newToken",$datos['token'],PDO::PARAM_STR);
      $newToken->bindParam(":fecha",$DateActual,PDO::PARAM_STR);
      $newToken->bindParam(":id_merchant",$datos['id_Merchant'],PDO::PARAM_INT);

      if ($newToken->execute()){
        return "Succesfull";
      }else{
        return $datos;
      }

      return $newToken;

      $newToken->close();


    }

    /*==========  FIN Create new TOKEN ========*/

  /*=============================================
                    GET TOKEN
    =============================================*/

    public static function getToken($datos){

        $consulToken = Conexion_jp::conectar_jp()->prepare("
            SELECT token from Token_operation
            where Id_operation = :ip_id");

        $consulToken->bindParam(":ip_id",$datos,PDO::PARAM_INT);

        $consulToken->execute();
        return  $consulToken->fetch();



    } 


     /*==========  FIN GET TOKEN ========*/



  /*=============================================
                    GET TOKEN
    =============================================*/

    public static function getPaymentDataModel($datos){

      $consul = Conexion_jp::conectar_jp()->prepare("
          SELECT 
            M.url_pag_web,
            T.id_Merchant,
            O.merchant_trans_ID,
            O.amount,
            O.url_error,
            O.operation_id,
            O.codTransactioPartner
          FROM Token_operation T
          INNER JOIN Merchant M
          ON T.id_merchant = M.id
          INNER JOIN Operation O
          ON T.id_operation = O.operation_id
          where T.token = :token;

        ");
      $consul->bindParam(":token",$datos,PDO::PARAM_STR);
      $consul->Execute();

      return  $consul->fetch();



    }

     /*==========  FIN GET TOKEN ========*/


    /*=============================================
                    UPDATE  PARTNER Transaction
    =============================================*/


    public static function updatePaymentCodePartnerModel($datos){

      $update = Conexion_jp::conectar_jp()->prepare('
       UPDATE Operation
       SET codTransactioPartner = :codTXPartner
        WHERE operation_id = :idOP 
       ');

      $update->bindParam(":codTXPartner",$datos['TransactionPartner'],PDO::PARAM_STR);
      $update->bindParam("idOP",$datos['Op_id'],PDO::PARAM_STR);

      if($update->Execute()){
        return "Successfull";

      }else{
        return "error";
      }



    }

     /*==========   FIN UPDATE  PARTNER Transaction ========*/


      /*=============================================
                    UPDATE  PARTNER Transaction
    =============================================*/

    public static function saveLogModel($datos){

      $save = Conexion_jp::conectar_jp()->prepare('
          INSERT INTO log_transaction (id_op,response,fec_add) VALUES(:id_op,:resp,:fec)

        ');

      $save->bindParam(":id_op",$datos['OP_ID'],PDO::PARAM_INT);
      $save->bindParam(":resp",$datos['response'],PDO::PARAM_STR);
      $save->bindParam(":fec",$datos['fec'],PDO::PARAM_STR);

      if($save->execute()){
        return "Succesfull";
      }else {
        return "Error";
      }



    }

 /*==========   FIN UPDATE  PARTNER Transaction ========*/

    public static function getresponseModel($datos){

      $get = Conexion_jp::conectar_jp()->prepare('
          SELECT response FROM log_transaction
          WHERE id_op = :id;
       ');

      $get->bindParam(":id",$datos,PDO::PARAM_INT);

      $get->execute();
      return $get->fetch();

    }

    public static function getImgBankModel($datos){
      $get = Conexion_jp::conectar_jp()->prepare('
        SELECT logo FROM banks
        WHERE id_partner = :id_p
        AND channel = :canal ;
       ');

      $get->bindParam(":id_p",$datos['idBank'],PDO::PARAM_INT);
      $get->bindParam(":canal",$datos['Channel'],PDO::PARAM_INT);

      $get->execute();
      return $get->fetch();
      $get->close();

    }

    public static function getKeysModel($datos){
      $get = Conexion_jp::conectar_jp()->prepare('
        SELECT key_public,key_secure 
        FROM Partner
        WHERE legal_name = :partner
        AND environment = :env

      ');

      $get->bindParam(":partner",$datos['Partner'],PDO::PARAM_STR);
      $get->bindParam(":env",$datos['Enviroment'],PDO::PARAM_STR);

      $get->execute();
      return $get->fetch();
      $get->close();

    }

    public static function getOperationModel($datos){
      $get = Conexion_jp::conectar_jp()->prepare('
        SELECT * FROM Operation
        where Operation_ID = :id
      ');
      $get->bindParam(":id",$datos,PDO::PARAM_INT);
      $get->execute();

      return $get->fetch();
      $get->close();
    }

    public static function getCountryMerchantModel($datos){
      $get = Conexion_jp::conectar_jp()->prepare('
        SELECT pais FROM Merchant
        where id = :M_ID;
      ');

      $get->bindParam(":M_ID",$datos,PDO::PARAM_INT);
      $get->execute();
      return $get->fetch();
      $get->close();

    }


    public static function save_rqSPModel($datos){
      
      $save = Conexion_jp::conectar_jp()->prepare('
        INSERT INTO log_transaction (id_op,request,response,fec_add)
        values (:id_op,:rq,:resp,:fec);

      ');

      $peticion = $datos["RqAndRp"];


      $save->bindParam(":id_op",$datos['opID'],PDO::PARAM_STR);
      $save->bindParam(":rq",$peticion['request'],PDO::PARAM_STR);
      $save->bindParam(":resp",$peticion['response'],PDO::PARAM_STR);
      $save->bindParam(":fec",$datos['fec'],PDO::PARAM_INT);

      //print_r($save);


      if ($save->execute()){
        return "ok";
      } else{
        return "failed";
      }
      
      $save->close();

    }

    public static function  updateTransPartnerModel($opID,$transPart){
      
      $update = Conexion_jp::conectar_jp()->prepare('
        UPDATE Operation
        SET codTransactioPartner = :transP
        WHERE operation_id = :opeID;

      ');

       $update->bindParam(":transP",$transPart,PDO::PARAM_STR);
       $update->bindParam(":opeID",$opID,PDO::PARAM_STR);


       if($update->execute()){
        return "Succesfull";
      }else {
        return "Error";
      }

    }


    public static function  updateStatusOperationModel($datos){
      
      $consulta = "SELECT operation_id FROM Operation
        WHERE codTransactioPartner = '$datos' ";


      $cone = Conexion_jp::conectar_jp();
      $operation =  $cone->query($consulta);

      foreach ($operation as $key => $value) {
         $op = $value[0];
      }
      
      $status = 2;



      $update = Conexion_jp::conectar_jp()->prepare('
        UPDATE Operation
        SET last_status = :status
        WHERE operation_id = :opeID;

      ');

       $update->bindParam(":status",$status,PDO::PARAM_STR);
       $update->bindParam(":opeID",$op,PDO::PARAM_STR);


       if($update->execute()){
        return $op;
      }else {
        return "Error";
      }

    }

        public static function  getUrlMerchantNotificationModel($datos){
      
      $consulta = "SELECT *  FROM Operation
        WHERE codTransactioPartner = '$datos' ";

      $cone = Conexion_jp::conectar_jp();
      $merchant_id =  $cone->query($consulta);


      foreach ($merchant_id as $key => $value) {
         

         $arregloOp = ["channel" => $value[5],
                       "mID" => $value[1],
                       "amount" => $value[3],
                       "curency" => $value[4],
                       "trans_ID" => $value[10],
                       "OP_ID" => $value[0],
                      ];

        }
      
       
       $mID = "'" . $arregloOp['mID'] ."'";

      $ConsulURL = "SELECT  URL_notification FROM Merchant_setting 
              where id_merchant = $mID";


      $URL =  $cone->query($ConsulURL);

      foreach ($URL as $key => $value) {
         $URL_Response = $value[0];

      }

      array_push($arregloOp, $URL_Response);


      $ConsulKey =  "SELECT * FROM moodratx_dev.Merchant_login
                     WHERE id_merchant = $mID";

      $KeyAPI = $cone->query($ConsulKey);


      foreach ($KeyAPI as $key => $value) {
         array_push($arregloOp, $value[1]);
         array_push($arregloOp, $value[2]);

      }



     



      return  $arregloOp;



       /*
      $update = Conexion_jp::conectar_jp()->prepare('
        UPDATE Operation
        SET last_status = :status
        WHERE operation_id = :opeID;

      ');

       $update->bindParam(":status",$status,PDO::PARAM_STR);
       $update->bindParam(":opeID",$op,PDO::PARAM_STR);


       if($update->execute()){
        return $op;
      }else {
        return "Error";
      }

      */

    }
    


  }