<?php

$a = new Conexion_jp();
$a -> conectar_jp();

//print_r($a);

class Conexion_jp{

	public static function conectar_jp(){

		$link = new PDO("mysql:host=localhost; dbname=moodratx_dev; charset=utf8","moodratx_dev","ReclameDEV#01");
		return $link;

	}

}
