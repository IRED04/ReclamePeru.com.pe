<?php

$a = new Conexion();
$a -> conectar();


class Conexion{

	public static function conectar(){

		/*	
		try{
  			$bdd =new PDO('mysql:host=localhost;  dbname=mabdd; charset=utf8', 'user', 'password');
  			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch(PDOException $e) {
    		die('Erro: ' . $e->getMessage());
		}*/


		$link = new PDO("mysql:host=localhost; dbname=moodratx_dev; charset=utf8","moodratx_dev","ReclameDEV#01");
		return $link;

	}

}


