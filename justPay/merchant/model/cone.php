<?php

$a = new Conexion_merchantJP();
$a -> conectar_merchantJP();

//print_r($a);

class Conexion_merchantJP{

	public static function conectar_merchantJP(){

		$link = new PDO("mysql:host=localhost; dbname=moodratx_dev; charset=utf8","moodratx_dev","ReclameDEV#01");
		return $link;

	}

}
