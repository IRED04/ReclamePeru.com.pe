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
			<img src="Views/img/logo.png" alt="">
		</div>
	</header> -->
	
	<img src="Views/img/merchant_logo.png" alt="" height="250px" width="120px">

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

				<a href="<?php echo $getData[4]; ?>" class="button cancelar">Cancelar y Volver a la tienda</a>
			</div>
		</div>

		

		<div class="ed-item l-5 desde-web"></div>
		<div class="ed-item s-100 l-45">
			<div class="ed-container media">
				  <div class="half">
						<h2 class="title">Seleccione un medio de pago:</h2>
						<?php
							$n=0; 
							foreach ($PaymentLocation as $key => $value) {
							$n = $n+1;

							$instrucciones = $value->PaymentSteps;
							$pasos = $instrucciones->PaymentStep;
							$idBank = $value->ID;
							
							$datos = ['idBank' => $idBank,'Channel'=>2];

							$getImgBank = Controller::getImgBankController($datos);
							$logo = $getImgBank['logo'];

							//print_r($getImgBank['logo']);


							echo('
								<div class="tab">
									<input id="tab-1'.$n.'" type="checkbox" name="tabs">
									<label for="tab-1'.$n.'">  <span><img src="'.$logo.'" alt=""></span>
										'. $value->Name .'
									</label> 
									<div class="tab-content"> 
								');

								foreach ($pasos as $key => $value) {
							   	    echo('<p>
										      <span class = "blue"> '.$value->Step . ' </span> '.$value->_.' 
										  </p>
										');
								}
		
							echo(' 
									</div>
								</div>
							');			


							}

						?>

					</div>
			 		
			</div>
			<button class="media-button">FINALIZAR</button>
			
		
		</div>

		

	</div>
	<!--
	<img src="Views/img/logo.png" alt="">
	-->
	

	<script src="Views/js/jQuery.js"> </script>
	<script src="Views/js/m_js.js"></script>
	<script src="Views/js/my_ajax.js"></script>



</body>
</html>