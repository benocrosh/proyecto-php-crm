<?php
		
	class registro_direccion{
		private $db;
		private $direccion;
		private $comuna;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->direccion= isset($_POST["direc_registro"]) ? $_POST["direc_registro"] : null;
			$this->comuna= isset($_POST["Comuna"]) ? $_POST["Comuna"] : null;
			
		}
		public function set_direccion(){

				//hay que mejorar el procedimiento por el cual pasa el set direcciones, ya que falta el arreglo para el caso de que los datos no existan
				if(isset($this->direccion)){
					$estado=1;
					$comuna_ingresada="nv";
					foreach ($this->comuna as $nombre_comuna) {
						if(isset($nombre_comuna)){
							$comuna_ingresada=$nombre_comuna;
						}
					}
					$ingreso="INSERT INTO direcciones (Direccion, Comuna, Estado) VALUES (:direccion, :comuna, :estado)";
					$resultado=$this->db->prepare($ingreso);
					$resultado->execute(array(":direccion"=>trim($this->direccion), ":comuna"=>trim($comuna_ingresada), ":estado"=>$estado));
					$resultado->closeCursor();
					if(!isset($resultado)){
					echo "error al agregar registro";
					} else{
						header("location:Direcciones.php");
						}
				} else{
						header("location:Direcciones.php?errtiprev=400");	
					}


				

		}
	}
?>