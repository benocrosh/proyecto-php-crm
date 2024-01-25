<?php
	class conectar{
		private static $conexion=null;
		public static function conexion(){

			if(self::$conexion == null){
				try{
					self::$conexion=new PDO('mysql:host=localhost; dbname=mydb', 'root', '');
					self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$conexion->exec("SET CHARACTER SET UTF8");

				} catch(Exception $e){
					die("Error" . $e->getMessage());
					echo "Linea del error" . $e->getLine();
				}

			}
			return self::$conexion;
		}
	}

?>