<?php

require_once "cone.php";

class Datos extends Conexion{

     /*=============================================
                  Login usario con detalles 
    =============================================*/ 
    public static function login($datosModel , $tabla){

        $encriptacion = crypt($datosModel["pwd"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');



        $stmt = Conexion::conectar()->prepare('SELECT D.nombre , 
                                                      U.email, 
                                                      U.pwd,
                                                      D.genero,
                                                      D.celular,
                                                      U.iduser ,
                                                      U.rol
                                               FROM user U 
                                               inner join  det_user D on U.iduser = D.id_user 
                                               WHERE  U.email = :usuario 
                                               AND U.pwd  = :pwd '
                                               );

        $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stmt->bindParam(":pwd",$encriptacion,PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        return  $stmt->fetch();

    }






      /*=====  Fin Login Usuario  ======*/


    /*=============================================
              GET USER RECUPERO
    =============================================*/ 

   public static function getUserRecu($datosModel , $tabla){
        $stmt = Conexion::conectar()->prepare('SELECT D.nombre , 
                                                      U.email, 
                                                      U.pwd,
                                                      D.genero   
                                               FROM user U 
                                               inner join  det_user D on U.iduser = D.id_user 
                                               WHERE  U.email = :usuario '
                                               );

        $stmt->bindParam(":usuario",$datosModel,PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        return  $stmt->fetch();

    }
         /*=====  GET USER RECUPERO  ======*/


    /*=============================================
               Registro Usuario 
    =============================================*/ 
    public static function registroUser($datosUser,$Tabla){

        $encriptacion = crypt($datosUser["pwd"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


        $stmt = Conexion::conectar()->prepare("INSERT INTO $Tabla ( email, pwd, rol) values (:usuario ,:pwd , :rol)");


        
        $stmt->bindParam(":usuario",$datosUser["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":pwd",$encriptacion, PDO::PARAM_STR);
        $stmt->bindParam(":rol",$datosUser["rol"], PDO::PARAM_STR);
        

        if($stmt->execute()){

            return "Success";
            $stmt->close();

        }else{
            return "error";
            $stmt->close();
        }

        $stmt->close();

    }


  /*=====  FIN Registro usuario ======*/


   /*=============================================
           REGISTRO DETALLES DE USUARIO
    =============================================*/ 
    public static function regUserDetModel($Datos, $tabla){
        // Se crea Insert 

        try {
           

            $inst = "INSERT INTO $tabla (id_user,nombre,apellidos,tipDocumento,numDoc,fecNaci,genero,celular,ciudad,prov,dist,fec_reg) 
                     VALUES (:id_user,:nombre,:apellidos,:tipDoc,:numDoc,:fecNaci,:genero,:celular,:ciudad,:prov,:dist,:fec_reg)";
        
            $stmt = Conexion::conectar()->prepare($inst);

            $a = date("Y-m-d H:i:s");

            $fech_naci = date("Y-m-d");


            $stmt ->bindParam(":id_user",$Datos['id_user'], PDO::PARAM_STR);
            $stmt ->bindParam(":nombre",$Datos['nombre'], PDO::PARAM_STR);
            $stmt ->bindParam(":apellidos",$Datos['apellido'], PDO::PARAM_STR);
            $stmt ->bindParam(":tipDoc",$Datos['tipDoc'], PDO::PARAM_STR);
            $stmt ->bindParam(":numDoc",$Datos['numDoc'], PDO::PARAM_STR);
            $stmt ->bindParam(":fecNaci",$Datos['fecNaci'], PDO::PARAM_INT);
            $stmt ->bindParam(":genero",$Datos['genero'], PDO::PARAM_INT);
            $stmt ->bindParam(":celular",$Datos['celular'], PDO::PARAM_STR);
            $stmt ->bindParam(":ciudad",$Datos['ciudad'], PDO::PARAM_STR);
            $stmt ->bindParam(":prov",$Datos['provincia'], PDO::PARAM_STR);
            $stmt ->bindParam(":dist",$Datos['distrito'], PDO::PARAM_STR);
            $stmt ->bindParam(":fec_reg",$a, PDO::PARAM_INT);
            
            
            if($stmt->execute()){

                return "Success";

            }else{
                return "error Registro Detalleusuario";
            }


            $stmt->close();


        } catch (Exception $e) {

             return $e->getMessage();
           
        }
        
    }
   /*=====  FIN Registro usuario ======*/

   /*=============================================
          CONSULTA ID USER
    =============================================*/ 
    public static function getIdUserModel($user){
        $consulta = "SELECT idUser FROM user WHERE email = :user";
        $getUser = Conexion::conectar()->prepare($consulta);
        $getUser->bindParam(":user",$user,PDO::PARAM_STR);
        $getUser->execute();

        return $getUser->fetch();
        
        $getUser->close();

    }
   
    /*=====  FIN Registro usuario ======*/


    /*=============================================
        VALIDAR USUARIO EXISTENTE AJAX
    =============================================*/ 

    public static function validarUsaurioModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare(
            "SELECT email FROM $tabla WHERE email = :email"
        );

        $stmt->bindParam(":email",$datosModel,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt-> fetch();

        $stmt->close();

    }

     /*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

    
     /*=============================================
            BUSCAR EMPRESAS X NOMBRE 
    =============================================*/ 
    public static function  getEmpresas($datosModel){
      $NombreEmpresa = $datosModel;
      $consultaEmpresa = "SELECT  businessName,ruc FROM empresas  WHERE businessName like '%". $NombreEmpresa . "%'" ;
      $resp = Conexion::Conectar();
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
      $resp = Conexion::Conectar();
      
        return $resp->query($consultaEmpresa);
      
      $resp->close();
    }

  /*=====  FIN BUSCAR EMPRESAS X NOMBRE o RUC  ======*/




    /*====================================================
        Carga Combos Departamento / Provincia / Distrito
    =====================================================*/ 

    public static function CargaComboDepartamentos(){
        $Dep = Conexion::conectar();
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
              $resul = Conexion::conectar();
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
             $resul = Conexion::conectar();
             $resul->query($querry);
        
             //Se imprime lista de Distritos
             echo  '<option value="0"> Seleccione Distrito </option>';
             foreach($resul->query($querry) as $row) {
                       echo    '<option value="'.$row['IdDist'].'"> '.$row['distrito'].' </option>';
             } 

          }

     }

    /*=====  Carga Combos Departamento / Provincia / Distrito  ======*/


    /*====================================================
           REVISAR DE DONDE SE USA ESTA FUNCION
    =====================================================*/ 

    public static function getRucModel(){

      $consulta = "SELECT ruc FROM moodratx_dev.empresas LIMIT 5";
      $resul = Conexion::conectar();
      $resul->query($consulta);
      foreach ($resul->query($consulta) as $row ) {
        echo  $row['ruc'];
      }

    }

     /*===== FIN REVISAR DE DONDE SE USA ESTA FUNCION  ======*/ 

    




      /*====================================================
                     SAVE NEW MERCHANT 
      =====================================================*/

      public static function InsertNewEmpModel($datosModel,$tabla){

        $newEmpresa = Conexion::conectar()->prepare("INSERT INTO $tabla (ruc,legalName,businessName,tipoEmpresa) values(:ruc,:legalName,:businesName, :tipoEmpresa)");
       
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


       /*====================================================
              CONSULTA  6 CATEGORIAS CON MAS RECLAMOS 
      =====================================================*/
       public static function getListaCategoriasModel(){
            $resul = Conexion::conectar()->prepare("
                    SELECT  
                     e.categoria, 
                     c.nombre , 
                     count(e.ruc) AS 'TOTAL' 
                     FROM moodratx_dev.reclamos r
                     inner join empresas e
                     on r.id_emp = e.id_empresas 
                     inner join categoria_empresas c 
                     on c.id = e.Categoria
                     WHERE r.last_status >= 2 
                     
                    
                     group by  e.categoria, c.nombre 
                     order by TOTAL desc limit 6

                     ");

            $resul->execute();

            
              
            return  $resul->fetchAll();

            $resul->close();

          }
       /*=====CONSULTA  6 CATEGORIAS CON MAS RECLAMOS========*/



        /*====================================================
              CONSULTA  6 CATEGORIAS CON MAS RECLAMOS 
      =====================================================*/
       public static function getListaEmpresasReclamadasModel($Datos){
          
          $resul = Conexion::conectar()->prepare("SELECT e.id_empresas, 
                                                         e.businessName,
                                                         count(e.ruc) AS 'TOTAL' 
                                                 FROM moodratx_dev.reclamos r
                                                 inner join empresas e
                                                 on r.id_emp = e.id_empresas 
                                                 inner join categoria_empresas c 
                                                 on c.id = e.Categoria
                                                 where e.categoria = :id
                                                 and r.last_status >= 2 
                                                
                                                
                                                 group by  e.categoria, c.nombre ,e.businessName
                                                 order by TOTAL desc");

          $resul->bindParam(':id',$Datos,PDO::PARAM_INT);

            $resul->execute();

            
              
            return  $resul->fetchAll();

            $resul->close();

          }
       /*=====CONSULTA  6 CATEGORIAS CON MAS RECLAMOS========*/



        /*====================================================
              CONSULTA LISTA DE RECLAMS X EMPRESA
      =====================================================*/
       public static function ReclamosxEmpresaModel($Datos){
          
          $resul = Conexion::conectar()->prepare("SELECT 
                                                       r.id_emp , 
                                                       r.id_user,
                                                       r.Titulo, 
                                                       r.descripcion, 
                                                       r.tipo, 
                                                       u.nombre,
                                                       CONCAT(d.departamento, '/' ,p.provincia, '/',di.distrito) AS Ubicacion 
                                                       
                                                  FROM moodratx_dev.reclamos r
                                                  inner join det_user u
                                                  on r.id_user = u.id_user
                                                  inner join departamento d
                                                  on d.IdDepa = u.ciudad
                                                  inner join provincia p
                                                  on u.prov = p.IdProv
                                                  inner join distrito di
                                                  on u.dist = di.IdDist
                                                  
                                                  where id_emp = :id ");

          $resul->bindParam(':id',$Datos,PDO::PARAM_INT);

            $resul->execute();

            
              
            return  $resul->fetchAll();

            $resul->close();

          }
       /*===== FIN CONSULTA LISTA DE RECLAMS X EMPRESA========*/




       /*====================================================
              CONSULTA LISTA DE RECLAMOS X ID USUARIO
      =====================================================*/
       public static function getReclamosxUserModel($Datos){
          
        $resul = Conexion::conectar()->prepare("SELECT 
                                             r.id_emp , 
                                             e.businessName,
                                             r.id_user,
                                             u.nombre,
                                             r.Titulo, 
                                             r.descripcion, 
                                             r.tipo, 
                                             CONCAT(d.departamento, '/' ,p.provincia, '/',di.distrito) AS Ubicacion 
                                             
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
                                        
                                        where r.id_user = :id ");

          $resul->bindParam(':id',$Datos,PDO::PARAM_INT);

            $resul->execute();

            
              
            return  $resul->fetchAll();

            $resul->close();

          }
       /*===== CONSULTA LISTA DE RECLAMOS X ID USUARIO========*/



      /*====================================================
              CONSULTA LISTA DE RECLAMOS X ID USUARIO
      =====================================================*/

      public static  function getTemplereModel($datos){
        $result = Conexion::Conectar()->prepare('SELECT html FROM  template_email
      WHERE id = :id');
        $result->bindParam(':id',$datos,PDO::PARAM_STR);

        $result->execute();
        return $result->fetchAll();
        $result->close();


      }


      /*===== CONSULTA LISTA DE RECLAMOS X ID USUARIO========*/


     /*====================================================
                  get Empresa x ID
      =====================================================*/

      public static  function getEmpresaxIDModel($datos){
        
         $result = Conexion::Conectar()->prepare('
          SELECT  businessName FROM empresas
          where ID_empresas = :idemp;

          ');
        $result->bindParam(':idemp',$datos,PDO::PARAM_STR);

        $result->execute();
        return $result->fetchAll();
        $result->close();


      }


      /*===== FIN get Empresa x ID ========*/


    /*====================================================
                  get Reclamos
      =====================================================*/

      public static function getReclamosModel(){
      $result = Conexion::Conectar()->prepare('
          SELECT  
            count(tipo)
          from reclamos 
          where tipo = 1;

        ');
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get Reclamos ========*/

    
    /*====================================================
                  get Quejas
      =====================================================*/

      public static function getQuejasModel(){
      $result = Conexion::Conectar()->prepare('
          SELECT  
            count(tipo)
          from reclamos 
          where tipo = 2;

        ');
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get Quejas ========*/


    /*====================================================
                  get Publicaciones
      =====================================================*/

      public static function getPublicacionesModel(){
      $result = Conexion::Conectar()->prepare('
          SELECT 
            count(last_status)
          from reclamos
          where last_status > 1;

        ');
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get Publicaciones ========*/




    /*====================================================
                  get Empresas Reclamadas
      =====================================================*/

      public static function getEmpReclamacasModel(){
      $result = Conexion::Conectar()->prepare('
          SELECT  
            count(id_emp)
          from reclamos;

        ');
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get Empresas Reclamadas ========*/


      /*====================================================
                  get BLog 
      =====================================================*/

      public static function getBlogModel(){
      $result = Conexion::Conectar()->prepare('
          SELECT  * FROM noticias_blog LIMIT 3; ');
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get BLog   ========*/

      /*====================================================
                  get BLog x Token
      =====================================================*/

      public static function getBlogModelID($datos){
      $result = Conexion::Conectar()->prepare('
          SELECT  * FROM noticias_blog 
          WHERE id = :id; ');

      $result->bindParam(":id",$datos,PDO::PARAM_STR);
      $result->execute();
      return $result->fetchAll();
      $result->cose();



      }
   
      /*===== FIN get BLog  x Toke ========*/





}


$a =  Datos::CargaCboProvincia();
$b =  Datos::CargaCboDistrito();