<?php
		
	class registro_pasajero{
		private $db;
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
			$this->Nombre= isset($_POST["nom_pasajero"]) ? $_POST["nom_pasajero"] : null;
			$this->Apellido_Paterno= isset($_POST["apepa_pasajero"]) ? $_POST["apepa_pasajero"] : null;
			$this->Apellido_Materno= isset($_POST["apema_pasajero"]) ? $_POST["apema_pasajero"] : null;
			$this->Telefono= isset($_POST["telefono_registro"]) ? $_POST["telefono_registro"] : null;
			$this->Nombre_Cliente= isset($_POST["MCliente"]) ? $_POST["MCliente"] : null;
			$this->Direcciones_id= isset($_POST["MDireccion"]) ? $_POST["MDireccion"] : null;
		
			
		}
		public function set_pasajero(){
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
						$ingreso="INSERT INTO Pasajeros (Nombre, Apellido_Paterno, Apellido_Materno, Telefono, Direcciones_idDirecciones, Cliente_idCliente, Estado) VALUES (:nom, :ape_pa, :ape_mat, :tel, :direccion, :cliente, :estado)";
						$resultado=$this->db->prepare($ingreso);
						$resultado->execute(array(":nom"=>trim($this->Nombre), ":ape_pa"=>trim($this->Apellido_Paterno), ":ape_mat"=>trim($this->Apellido_Materno), "tel"=>trim($this->Telefono), ":direccion"=>$iddireccion, ":cliente"=>$idcliente, ":estado"=>$estado));
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Pasajeros.php");
						}
						$resultado->closeCursor();
					} else{
						
						header("location:Pasajeros.php?errtiprev=400");	
					}

				} else{
					
					header("location:Pasajeros.php?errtiprev=1000");
				}
		}
	}
?>