<?php
	if (isset($_GET['cadena'])) {
		$cadena = $_GET['cadena'];
		$sigature = hash('sha256', $cadena);

		echo ($sigature);

	}else{
		echo "NO hay POST";
	}

?>
	


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	<form method="get">
		<input type="text" id="cadena" name="cadena">
		<input type="submit" value="Send">

	</form>
</body>
</html>

