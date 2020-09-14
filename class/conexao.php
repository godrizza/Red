<?php

	abstract class conexao{
		
		const usuario = "root";
		const senha = "";
		
		private static $instance = null;
		
		private static function conectar(){
			try {
				if(self::$instance == null):
				$sql = "mysql:host=localhost;dbname=red";
				self::$instance = new PDO($sql, self::usuario, self::senha);
				self::$instance -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		 		
				endif;
	   		}catch(PDOException $e){
				echo"Falha na conexão: " . $e->getMessage();
			}
			return self::$instance;
		}
		
		protected static function getDB(){
			return self::conectar();
		}
			
	}
