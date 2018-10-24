<?php

$ruta = "https://ruc.com.pe/api/beta/ruc";
$token = "262a7c4d-ea5a-4de2-b51c-1b6c7e79c688-aa8a66de-c294-46e1-b75d-d6599165df2b";

$rucaconsultar = '10725538109';

$data = array(
    "token"	=> $token,
    "ruc"   => $rucaconsultar
);
	
$data_json = json_encode($data);

// Invocamos el servicio a ruc.com.pe
// Ejemplo para JSON
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

$leer_respuesta = json_decode($respuesta, true);
if (isset($leer_respuesta['errors'])) {
	//Mostramos los errores si los hay
    echo $leer_respuesta['errors'];
} else {
	
	//Mostramos la respuesta

	var_dump($respuesta);
	/*
		echo "Respuesta de la API:<br>";
	echo "===========================";
	echo ('<br>');
	$response = $leer_respuesta['entity'];
	echo ('Ruc: ');
	print_r($response['ruc'] );
	echo ('<br>');
	echo ('Razon Social: ');
	print_r($response['nombre_o_razon_social']);
	echo ('<br>');
	echo ('Direccion: ');
	print_r($response['direccion_completa']);
	echo ('<br>');
	echo ('Estado: ');
	print_r($response['estado_del_contribuyente']);

	*/
	

}