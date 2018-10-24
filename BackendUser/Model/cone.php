<?php

$a = new ConexionBkUs();
$a -> conectarBkUs();



class ConexionBkUs{

	public static function conectarBkUs(){

		$link = new PDO("mysql:host=localhost; dbname=moodratx_dev; charset=utf8","moodratx_dev","ReclameDEV#01");
		return $link;

	}

}
