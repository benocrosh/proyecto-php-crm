<?php
		
	class actualizar_empresas{
		private $db;
		private $Id;
		private $nombre_empresa;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_POST["idempresa"]) ? $_POST["idempresa"] : null;
			$this->nombre_empresa= isset($_POST["nom_empresa"]) ? $_POST["nom_empresa"] : null;
			
		}
		public function update_empresa(){
				//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if($this->Id != 0){
					$estado=1;
					$update="UPDATE empresa_transporte SET Nombre= :nom, Estado= :estado Where idEmpresa_Transporte= :idemp";
					$resultado=$this->db->prepare($update);
					$resultado->execute(array(":nom"=>$this->nombre_empresa, ":idemp"=>$this->Id, ":estado"=>$estado));
					$resultado->closeCursor();
					if(!isset($resultado)){
					echo "error al agregar registro";
					} else{
						header("location:Conductores.php");
					}
				} else{
					//crear una vista para mostrar este mensaje de mejor manera
					echo "Error al procesar la informacion";
					echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";	
				}
		}
	}
?>