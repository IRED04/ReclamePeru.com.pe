<?php
	
	$token = $_GET['tokenID'];

	$getData = controller::getPaymentDataController($token);

	//print_r($getData);


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Views/css/jcstyl.css">
	<title>LPG</title>
</head>

<body class="body">
	<!--
	<header class="header">
		<div class="logo">
			<img src="Views/img/merchant_logo.png" alt="">
		</div>
	</header> 

	 <img src="Views/img/merchant_logo.png" alt="" height="250px" width="120px">  #E4E4E4 / #222 -->
	
	<img src="Views/img/merchant_logo.png" alt="" height="250px" width="120px">

	<div class="ed-container margin-top no-padding">
		<div class="ed-item s-100 l-50 ">
			<div class="price">
			<h2 class="item title"><?php echo $getData[0]; ?></h2>
			<div class="item">
				<p>Identificador de la Tienda:</p>
				<p><?php echo $getData[1]; ?></p>
			</div>
			<div class="item">
				<p>Numero de Transaccion:</p>
				<p id="tx"> <?php echo $getData[2]; ?></p>
			</div>
			<div class="item total">
				<p>Monto:</p>
				<p><?php echo $getData[3]; ?> CLP</p>
			</div>
			<a href="<?php echo $getData[4]; ?>" class="button cancelar"> Cancelar y Volver a la tienda </a>
			</div>
			<ul class="ed-item s-100 guia">
				<h2 class="guia-title">Instrucciones</h2>
				<li class="guia-item"> <span  class="blue"> 1 </span> Seleccione su banco.</li>
				<li class="guia-item"> <span  class="blue"> 2 </span> Ingrese a su banca por internet, con su usuario y contraseña.</li>
				<li class="guia-item"> <span  class="blue"> 3 </span> Realice el pago con el codigo generado.</li>
				<li class="guia-item"> <span  class="blue"> 4 </span> Una vez realizado el pago, comuniquese con el comercio.</li>
			</ul>

		</div>
		
		


		<div class="ed-item l-5 desde-web"></div>

		<div class="ed-item s-100 l-45">
			<div class="ed-container media">
				<h2 class="title">Seleccione su Banco</h2>


				<a class="ed-item s-50 l-25" id="8297" >
						
					<img src="Views/img/BBVA-logo.jpg" alt="" onclick="on()">
						
				</a>

				<a class="ed-item s-50 l-25" id = "b_BCI">
					<img src="Views/img/BCI.jpg" alt="">
					
				</a>
				
				<a class="ed-item s-50 l-25" href="8296" >
					<img src="Views/img/chile.png" alt="">
					
				</a>
				
				<a class="ed-item s-50 l-25" href="#">
					<img src="Views/img/santander.png" alt="">
					
				</a>
				

				<a class="ed-item s-50 l-25" href="#">
					<img src="Views/img/banco estado.png" alt="">
				</a>
				
				<a class="ed-item s-50 l-25" href="#">
					<img src="Views/img/Scotiabank.png" alt="">
				</a>
				
				
			</div>
		</div>


	</div>
	<!--
	<div class="ed-container margin-top no-padding ">

		<div class="ed-item s-100 l-100 price">
			<div class="item title"> Instrucciones </div>	
		</div>	

		<div class="ed-item s-100 l-25 price">
			<div class="item"> 1. Seleccione su banco. </div>	
		</div>	
		
		<div class="ed-item s-100 l-25 price">
			<div class="item"> 2. Ingrese a su banca por internet. </div>	
		</div>	
		<div class="ed-item s-100 l-25 price">
			<div class="item"> 3. Seleccione de Servicios SafetyPay </div>	
		</div>
		<div class="ed-item s-100 l-25 price">
			<div class="item"> 4. Ingrese codigo y monto a pagar</div>	
		</div>	
	</div>	
	
	
	<img src="Views/img/logo.png" alt="" height="400px" width="200px">

	
	<div class="ed-container margin-top no-padding">
		 <div class="ed-item s-100 l-100">
		 	Instrucciones:
		 	 <ul>
		 	 	<li>
		 	 		1. Seleccione su banco.
		 	 	</li>
		 	 	<li>
		 	 		2. Ingrese a su banca por internet, con su usario y contraseña.
		 	 	</li>
		 	 	<li>
		 	 		3. ealize el pago con el codigo Generado
		 	 	</li>
		 	 	<li>
		 	 		4. Una vez realizado el pago, comuniquese con el comercio.
		 	 	</li>

		 	 </ul>
		 	  	
		 </div>
		 
	</div> -->

	<div id="overlay" onclick="off()">
  		<div id="TimeCount"> 
  			Te Quedan: 00.00.00
  		</div>

  		<div id="text"> 
  			Esperando pago 
  		</div>

  		<div id="progres">
  			<img src="Views/img/08.gif" alt=""> 
  		</div>
	</div>

	
	<script src="Views/js/jQuery.js"> </script>
	<script src="Views/js/m_js.js"></script>
	<script src="Views/js/my_ajax.js"></script>

</body>
</html>