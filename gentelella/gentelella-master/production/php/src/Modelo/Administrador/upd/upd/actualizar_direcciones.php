<?php
		
	class actualizar_direcciones{
		private $db;
		private $Id;
		private $direccion;
		private $comuna;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_POST["iddireccion"]) ? $_POST["iddireccion"] : null;
			$this->direccion= isset($_POST["direc_registro"]) ? $_POST["direc_registro"] : null;
			$this->comuna= isset($_POST["Comuna"]) ? $_POST["Comuna"] : null;
			
		}
		public function update_direccion(){
				//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if($this->Id != 0){
					$comunag;
					foreach ($this->comuna as $arreglo) {
						$comunag=$arreglo;
					}

					$estado=1;
					$update="UPDATE direcciones SET Direccion= :dir, Comuna= :com, Estado= :estado Where idDirecciones= :iddir";
					$resultado=$this->db->prepare($update);
					$resultado->execute(array(":dir"=>$this->direccion,":com"=>$comunag, ":iddir"=>$this->Id, ":estado"=>$estado));
					$resultado->closeCursor();
					if(!isset($resultado)){
					echo "error al agregar registro";
					} else{
						header("location:Direcciones.php");
					}
				} else{
					//crear una vista para mostrar este mensaje de mejor manera
					echo "Error al procesar la informacion";
					echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Direcciones.php';\",1500);</script>";	
				}
		}
	}
?>