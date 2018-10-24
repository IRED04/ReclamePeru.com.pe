<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Views/css/jcstyl.css">
	<title>LPG</title>
</head>

<body class="body">
	
	
		<div class="price">
			<div class="item total">
				  <p style="color:white">
				  Esta Operacion no existe, por favor contacte con nuestra area de soporte "support@lapayment.com"
				  </p>
			</div>
		</div>
	
	
	<div class="ed-container margin-top no-padding">
		
		<div class="ed-item s-100 l-50">
			<div class="price">
				<a class="item title" href="http://www.lapaymentgroup.com"><?php echo $getData[0]?></a>
				
				<div class="item">
					<p>Identificador de la Tienda:</p>
					<p><?php echo $getData[1]?></p>
				</div>
				<div class="item">
					<p>Numero de Transaccion/Codigo de pago :</p>
					<p><?php print_r($codP); ?></p>
				</div>
				<div class="item total">
					<p>  Fecha Expiracion:  </p>
				</div>
				<div class="item" >
					<p><?php echo $exp_time ?> </p>
				</div>
				
				<div class="item total">
					<p>Monto:</p>
					<p><?php echo $getData[3]?> CLP</p>
				</div>

				<a href="#" class="button cancelar">Cancelar y Volver a la tienda</a>
			</div>
			<!--
			<ul class="ed-item s-100 guia">
				<h2 class="guia-title">Instrucciones</h2>
				<li class="guia-item">1. Seleccione su banco.</li>
				<li class="guia-item">2. Ingrese a su banca por internet, con su usuario y contraseña.</li>
				<li class="guia-item">3. Realice el pago con el codigo generado.</li>
				<li class="guia-item">4. Una vez realizado el pago, comuniquese con el comercio.</li>
			</ul> -->
		</div>

		

		<div class="ed-item l-5 desde-web"></div>
		
		<div class="ed-item s-100 l-45">
			<div class="ed-container media">
				  <div class="half">
						<h2 class="title">Seleccione un medio de pago:</h2>
						

					</div>
			</div>
		</div>

	</div>

	<img src="Views/img/logo.png" alt="">

	

	<script src="Views/js/jQuery.js"> </script>
	<script src="Views/js/m_js.js"></script>



</body>
</html>