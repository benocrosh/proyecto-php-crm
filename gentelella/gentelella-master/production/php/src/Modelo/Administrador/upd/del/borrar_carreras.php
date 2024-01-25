<?php
		
	class borrar_carreras{
		private $db;
		private $Id;
		


		//hay que hacer que no se puedan ingresar mas de un pasajero con el mismo telefono o nombre y apellido
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_GET["Id"]) ? $_GET["Id"] : null;
			
		}
		public function delete_carrera(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Id)){
					$estado=0;
					
					if($this->Id != 0){
						$update="UPDATE carrera SET Estado= :estado Where idCarrera= :id";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":estado"=>$estado, ":id"=>$this->Id));
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Carreras.php#Edit");
						}
						$resultado->closeCursor();
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Carreras.php';\",1500);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Carreras.php';\",1500);</script>";
				}
		}
	}
?>