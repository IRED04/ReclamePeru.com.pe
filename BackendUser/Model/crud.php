<?php

require_once "cone.php";

class DatosBkUs extends ConexionBkUs {

	/*=============================================
              Update Password
    =============================================*/ 

    	public static function UpdatePwdModel($datosModel, $tabla){

    		$newPwd = $datosModel['newPwd'];
    		$idUser = $datosModel['idUser'];
    		
    		$update =  ConexionBkUs::conectarBkUs()->prepare("UPDATE $tabla set pwd = :newPrd
																where idUser = :idUser ");
    		$update->bindParam(":newPrd",$newPwd,PDO::PARAM_STR);
    		$update->bindParam(":idUser",$idUser,PDO::PARAM_STR);

    		if ($update->execute()){

    			return "Success";
    			$update->close();
    		} else{

    			return "Error";
    			$update->close();
    		}

    		$update->close();


    	}

	/*=====  Fin Update Password ======*/




    /*====================================================
        Carga Combos Departamento / Provincia / Distrito
    =====================================================*/ 

    public static function CargaComboDepartamentos(){
        $Dep = ConexionBkUs::conectarBkUs();
        $consulta = "SELECT IdDepa , departamento FROM moodratx_dev.departamento";

        foreach($Dep->query($consulta) as $row) {
                echo '<option value="'.$row['IdDepa'].'">'.$row['departamento'].'</option>';
            }

    }


    public static function CargaCboProvincia(){

        if(isset($_POST['IdDepa'])){
             $IdDepa = $_POST['IdDepa'];
             //Se crea la consuta que almacenara el combo Provincia
             $querry = ("SELECT IdProv,provincia FROM moodratx_dev.provincia WHERE idDepa =  $IdDepa");
              // Se llama a la coneccion
              $resul = ConexionBkUs::conectarBkUs();
              $resul->query($querry);
            
              //Se imprime lista de provincias
               echo '<option value="0"> Seleccione Provincia </option>';
              
              foreach($resul->query($querry) as $row) {
                        echo    '<option value="'.$row['IdProv'].'"> '.$row['provincia'].' </option>';
              }                 
        }

    }

    public static function CargaCboDistrito(){
        //Se almacena el post que envia desde JS

        if(isset($_POST['id_prov'])) {
            $IdProv = $_POST['id_prov'];
            //Se crea la consuta que almacenara el combo Provincia
            $querry = ("SELECT IdDist, distrito FROM moodratx_dev.distrito WHERE IdProv = $IdProv");
             // Se llama a la coneccion
             $resul = ConexionBkUs::conectarBkUs();
             $resul->query($querry);
        
             //Se imprime lista de Distritos
             echo  '<option value="0"> Seleccione Distrito </option>';
             foreach($resul->query($querry) as $row) {
                       echo    '<option value="'.$row['IdDist'].'"> '.$row['distrito'].' </option>';
             } 

          }

     }

    /*=====  Carga Combos Departamento / Provincia / Distrito  ======*/


    /*=============================================
              GET DATOS DE USUARIO
     =============================================*/ 

     public static function getDateUserxIdModel($Datos){

        $consulta = 'SELECT 
                         du.nombre, 
                         du.apellidos,
                         du.celular,
                         case
                           when du.tipDocumento = 1 then  "DNI" 
                           when du.tipDocumento = 4 then  "T. ESTRANGERIA"
                           when du.tipDocumento = 7 then  "PASAPORTE"
                         end  as Doc ,
                         du.numDoc,
                         du.genero,
                         du.fecNaci,
                         d.departamento,
                         p.provincia,
                         di.distrito
                     FROM moodratx_dev.det_user du
                     inner join departamento d
                     on du.ciudad = d.IdDepa
                     inner join provincia p
                     on du.prov = p.IdProv
                     inner join distrito di
                     on du.dist = di.IdDist
                     where id_user = '.$Datos.'' ;


        $getUser = ConexionBkUs::conectarBkUs();

        $getUser->query($consulta);        

        //$getUser->bindParam(":id", $Datos, PDO::PARAM_STR);
        

        return $getUser->query($consulta);  
        $getUser->close();


        




     }


      /*=====  FIN GET DATOS DE USUARIO ======*/


       /*=============================================
                  UPDATE DATOS USER 
     =============================================*/
     public static function updateDateUserModel($datos){

        $update = ConexionBkUs::conectarBkUs()->prepare(
            '
             UPDATE det_user
             set nombre = :nombre,
                 apellidos = :apellido,
                 tipDocumento = :TipDoc,
                 numDoc = :numDoc,
                 fecNaci = :fecNaci ,
                 genero = :gen,
                 celular = :cel,
                 ciudad = :ciudad,
                 prov = :prov,
                 dist = :dist
                 
            WHERE id_user = :id
            ' );
               $update->bindParam(":id",$datos['idUser'],PDO::PARAM_INT);
               $update->bindParam(":nombre",$datos['nomUser'],PDO::PARAM_STR);
               $update->bindParam(":apellido",$datos['apeUser'],PDO::PARAM_STR);
               $update->bindParam(":TipDoc",$datos['tipDoc'],PDO::PARAM_INT);
               $update->bindParam(":numDoc",$datos['numDoc'],PDO::PARAM_STR);
               $update->bindParam(":fecNaci",$datos['fecNaci'],PDO::PARAM_INT);
               $update->bindParam(":gen",$datos['genUser'],PDO::PARAM_INT);
               $update->bindParam(":cel",$datos['celUser'],PDO::PARAM_STR);
               $update->bindParam(":ciudad",$datos['dep'],PDO::PARAM_STR);
               $update->bindParam(":prov",$datos['prov'],PDO::PARAM_STR);
               $update->bindParam(":dist",$datos['dist'],PDO::PARAM_STR);
       
            if ($update->execute()){

                return "Success";
                $update->close();
            } else{

                return "Error";
                $update->close();
            }

            $update->close();


       

     }


     /*=====  FIN UPDATE DATOS USER  ======*/



    /*=============================================
            BUSCAR EMPRESAS X NOMBRE 
    =============================================*/ 
    public static function  getEmpresas($datosModel){
      $NombreEmpresa = $datosModel;
      $consultaEmpresa = "SELECT  businessName,ruc FROM empresas  WHERE businessName like '%". $NombreEmpresa . "%'" ;
      $resp = ConexionBkUs::conectarBkUs();
      $resp->query($consultaEmpresa);
        return $resp->query($consultaEmpresa);
       $resp->close();
    }

  /*=====  FIN BUSCAR EMPRESAS X NOMBRE o RUC  ======*/    




   /*=============================================
            BUSCAR EMPRESAS X  RUC 
    =============================================*/ 
    public static function  getEmpresasRuc($datosModel){
      $RucEmpresa = $datosModel;
     

      $consultaEmpresa = "SELECT  businessName,ruc,id_empresas FROM empresas  WHERE ruc = $RucEmpresa";
      $resp = ConexionBkUs::conectarBkUs();
      
        return $resp->query($consultaEmpresa);
      
      $resp->close();
    }

  /*=====  FIN BUSCAR EMPRESAS X NOMBRE o RUC  ======*/


    /*====================================================
                   GUARDAR RECLAMOS CAB
    =====================================================*/


    public static function SaveReclamosModel($datos, $Tabla){

       $DateActual = date("Y-m-d H:i:s"); 
       
       $insertReclamo = ConexionBkUs::conectarBkUs() ->prepare("INSERT INTO  $Tabla (id_user,id_emp,fec_reclamo,tipo,titulo,descripcion,last_status) VALUES (:idUser, :idemp, :fecReg, :tipo, :titulo,:descripcion,:last_status)"
        );

       $insertReclamo->bindParam(":idUser", $datos['idUser'], PDO::PARAM_INT);
       $insertReclamo->bindParam(":idemp", $datos['idEmpr'], PDO::PARAM_INT);
       $insertReclamo->bindParam(":fecReg",$DateActual, PDO::PARAM_INT);
       $insertReclamo->bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
       $insertReclamo->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
       $insertReclamo->bindParam(":descripcion", $datos['reclamo'], PDO::PARAM_STR);
       $insertReclamo->bindParam(":last_status", $datos['status'], PDO::PARAM_STR);
       

       if($insertReclamo->execute()){
        return "Succesfull";
       }else {
         return "Error in crud/Line 324";
       }

        //return $insertReclamo-> fetch();

       $insertReclamo->close();


    } 

     /*============ GUARDAR RECLAMOS CAB  ===============*/

      /*====================================================
              CONSULTA LISTA DE RECLAMOS X ID USUARIO
      =====================================================*/
       public static function getReclamosxUserModel($Datos){
          
        $resul = ConexionBkUs::conectarBkUs()->prepare("SELECT 
                                             
                                           /* case 
                                              when last_status = 1 then 'En Revision'
                                            end AS STATUS,
                                          */ r.last_status, 
                                             r.id_emp ,
                                             r.Titulo, 
                                             e.businessName,
                                             r.id_reclamo,
                                             Date_format(r.fec_reclamo,'%Y/%M/%d')


                                             
                                        FROM moodratx_dev.reclamos r
                                        inner join det_user u
                                        on r.id_user = u.id_user
                                        inner join empresas e
                                        on r.id_emp = e.id_empresas
                                        inner join departamento d
                                        on d.IdDepa = u.ciudad
                                        inner join provincia p
                                        on u.prov = p.IdProv
                                        inner join distrito di
                                        on u.dist = di.IdDist
                                        
                                        where r.id_user = :id 

                                        order by r.fec_reclamo desc ");

          $resul->bindParam(':id',$Datos,PDO::PARAM_INT);

            $resul->execute();

            
              
            return  $resul->fetchAll();

            $resul->close();

          }
       /*===== CONSULTA LISTA DE RECLAMOS X ID USUARIO========*/



     /*====================================================
                     SAVE NEW MERCHANT 
      =====================================================*/

      public static function InsertNewEmpModel($datosModel,$tabla){

        $newEmpresa = ConexionBkUs::conectarBkUs()->prepare("INSERT INTO $tabla (ruc,legalName,businessName,tipoEmpresa) values(:ruc,:legalName,:businesName, :tipoEmpresa)");
       
        $NombreComercialGet = $datosModel["NombreComercial"];

        if($NombreComercialGet == "-"){
          $NombreComercialSave = $datosModel["RazonSocial"];
        }else{
          $NombreComercialSave = $datosModel["NombreComercial"];
        }


        $newEmpresa->bindParam(":ruc",$datosModel["RUC"], PDO::PARAM_STR);
        $newEmpresa->bindParam(":legalName",$datosModel["RazonSocial"], PDO::PARAM_STR);
        $newEmpresa->bindParam(":businesName",$NombreComercialSave, PDO::PARAM_STR);
        $newEmpresa->bindParam(":tipoEmpresa",$datosModel["Tipo"], PDO::PARAM_STR);


        if($newEmpresa->execute()){
          return "Success";
         }else {
           return "Error al registrar la empresa (CRUD / linea 263)";
         }

         $insertReclamo->close();



      }

       /*============ SAVE NEW MERCHANT  ===============*/ 

      

       /*=============================================
                  getMessages
        =============================================*/
        public static function  getNewMesagesModel($datos){

          

          $getMessage = ConexionBkUs::conectarBkUs()->prepare("
            SELECT id_user,id_reclamo,titulo,descripcion,fec_add,id 
            FROM message_claimant
            WHERE id_user = :idUser AND status = 1");

          $getMessage->bindParam(":idUser",$datos,PDO::PARAM_INT);
          $getMessage->execute();
          return  $getMessage->fetchAll();
          $getMessage->close();

        }


      /*===== FIN getMessages ======*/

       /*=============================================
                  Count Messages x Claiment
        =============================================*/
        public static function  getCountMesagesModel($datos){

          

          $getMessage = ConexionBkUs::conectarBkUs()->prepare("
            SELECT count(id) 
            FROM message_claimant
            WHERE id_user = :idUser AND status = 1");

          $getMessage->bindParam(":idUser",$datos,PDO::PARAM_INT);
          $getMessage->execute();
          return  $getMessage->fetch();
          $getMessage->close();

        }


      /*===== Count Messages x Claiment======*/



        /*=============================================
                  Update Messages x Claiment
        =============================================*/
        public static function  updateMesageIdControllerModel($datos){

          

          $UpdateMessage = ConexionBkUs::conectarBkUs()->prepare("
            UPDATE message_claimant 
            SET status = 2 
            WHERE id = :id_rec"
            );

          $UpdateMessage->bindParam(":id_rec",$datos['id'],PDO::PARAM_INT);

          if($UpdateMessage->execute()){
            return "ok" ;
          }else{return "Faild";}

         
          $UpdateMessage->close();

        }


      /*===== FIN Update Messages x Claiment======*/



     

}


$a =  DatosBkUs::CargaCboProvincia();
$b =  DatosBkUs::CargaCboDistrito();