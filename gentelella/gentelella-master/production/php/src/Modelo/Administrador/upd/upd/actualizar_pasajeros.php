<?php
		
	class actualizar_pasajeros{
		private $db;
		private $Id;
		private $Nombre;
		private $Apellido_Paterno;
		private $Apellido_Materno;
		private $Telefono;
		private $Direcciones_id;
		private $Nombre_Cliente;


		//hay que hacer que no se puedan ingresar mas de un pasajero con el mismo telefono o nombre y apellido
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_POST["idpasajero"]) ? $_POST["idpasajero"] : null;
			$this->Nombre= isset($_POST["nom_pasajero"]) ? $_POST["nom_pasajero"] : null;
			$this->Apellido_Paterno= isset($_POST["apepa_pasajero"]) ? $_POST["apepa_pasajero"] : null;
			$this->Apellido_Materno= isset($_POST["apema_pasajero"]) ? $_POST["apema_pasajero"] : null;
			$this->Telefono= isset($_POST["telefono_registro"]) ? $_POST["telefono_registro"] : null;
			$this->Nombre_Cliente= isset($_POST["MCliente"]) ? $_POST["MCliente"] : null;
			$this->Direcciones_id= isset($_POST["MDireccion"]) ? $_POST["MDireccion"] : null;
		
			
		}
		public function update_pasajero(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Nombre_Cliente) && isset($this->Direcciones_id)){
					$estado=1;
					$iddireccion;
					$idcliente;
					require_once("../src/modelo/administrador/scr/ue_union.php");
					$union=new ue_union();
					$idcliente=$union->union_id_cliente($this->Nombre_Cliente);
					$iddireccion=$union->union_id_direccion($this->Direcciones_id);
					
					if($idcliente != 0 && $iddireccion != 0){
						$update="UPDATE pasajeros SET Nombre= :nom, Apellido_Paterno= :ape_pa, Apellido_Materno= :ape_ma, Telefono= :tel, Direcciones_idDirecciones= :direc_id, Cliente_idCliente= :clie_id, Estado= :estado Where idPasajeros= :id_pas";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":nom"=>$this->Nombre, ":ape_pa"=>$this->Apellido_Paterno, ":ape_ma"=>$this->Apellido_Materno, ":tel"=>$this->Telefono, ":direc_id"=>$iddireccion, ":clie_id"=>$idcliente, ":id_pas"=>$this->Id, ":estado"=>$estado));
						$resultado->closeCursor();
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Pasajeros.php");
						}						
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Pasajeros.php';\",1500);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Pasajeros.php';\",1500);</script>";
				}
		}
	}
?>