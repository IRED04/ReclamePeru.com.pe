<?php
  require_once("../../../../Controller/controller.php");
  require_once("../../../../Model/crud.php");

  if(isset($_POST['ruc'])) {
    $ruc = $_POST['ruc'];

    $a = new MVCController();
    $a ->consultaRuc($ruc);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CONSULTA RUC</title>
</head>
<body>
	<form method="POST">
		<input type="text" id="ruc" name="ruc">
		<input type="text" value=" <?php var_dump($a)  ?> ">	

		<input type="submit" value="send" id="btn_send" name="btn_send">


	</form>
</body>
</html>

