<?php

$a = new ConexionBkAd();
$a -> conectarBkAd();

class ConexionBkAd{

	public static function conectarBkAd(){

		$link = new PDO("mysql:host=localhost; dbname=moodratx_dev; charset=utf8","moodratx_dev","ReclameDEV#01");
		return $link;

	}

}