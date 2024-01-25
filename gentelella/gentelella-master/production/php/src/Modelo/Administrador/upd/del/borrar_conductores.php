<?php
		
	class borrar_conductores{
		private $db;
		private $Id;
		


		//hay que hacer que no se puedan ingresar mas de un pasajero con el mismo telefono o nombre y apellido
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_GET["Id"]) ? $_GET["Id"] : null;
			
		}
		public function delete_conductor(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Id)){
					$estado=0;
					
					if($this->Id != 0){
						$update="UPDATE conductor SET Estado= :estado Where idConductor= :id";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":estado"=>$estado, ":id"=>$this->Id));
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Conductores.php#Edit");
						}
						$resultado->closeCursor();
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";
				}
		}
		public function delete_conductor_usu(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Id)){
					$estado=0;
					
					if($this->Id != 0){
						$update="UPDATE conductor SET Estado= :estado Where Usuarios_idUsuarios= :id";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":estado"=>$estado, ":id"=>$this->Id));
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Usuarios.php#Edit");
						}
						$resultado->closeCursor();
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";
				}
		}
	}
?>