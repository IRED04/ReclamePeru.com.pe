<!DOCTYPE html>
<html lang="en">

<head>
<title>Ejemplo Validacion</title>
<script type="text/javascript" src="../../../js/validaUser.js"> </script>

</head>


<body>
 <form name="formu" method="post" action="" onsubmit="return validarRegistro()">
  <table>
   <tr><td>Nombre: </td><td><input type="text" name="userReg" id="userReg" /></td></tr>
   <tr><td>Passwd: </td><td><input type="password" name="pwdReg" id="pwdReg" /></td></tr>
   <tr><td colspan="2"><input type="submit" name="Conectate" value="Conectate" /></td></tr>
  </table>

  <div class="checkbox">
        <label>
          <input type="checkbox" value="1" id="ch_sin_ruc" name="ch_sin_ruc"> NO CUENTO CON EL RUC 
         </label>
     </div>

 </form>
 <script src="../../../js/jquery-3.0.0.min.js"> </script>
 <script src="../../../js/internal.js"> </script>

</body>

</html>