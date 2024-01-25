<?php
		
	class registro_local{
		private $db;
		private $Local;
		private $Direcciones_id;
		private $Nombre_Cliente;


		//hay que hacer que no se puedan ingresar mas de un local con el mismo nombre
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Local= isset($_POST["nom_local"]) ? $_POST["nom_local"] : null;
			$this->Nombre_Cliente= isset($_POST["MCliente"]) ? $_POST["MCliente"] : null;
			$this->Direcciones_id= isset($_POST["MDireccion"]) ? $_POST["MDireccion"] : null;
		
			
		}
		public function set_local(){
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
						$ingreso="INSERT INTO Locales (Local, Direcciones_idDirecciones, Cliente_idCliente, Estado) VALUES (:local, :direccion, :cliente, :estado)";
						$resultado=$this->db->prepare($ingreso);
						$resultado->execute(array(":local"=>trim($this->Local), ":direccion"=>$iddireccion, ":cliente"=>$idcliente, ":estado"=>$estado));
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Locales.php");
						}
						$resultado->closeCursor();
					} else{
						
						header("location:Locales.php?errtiprev=400");	
					}

				} else{
					
					header("location:Locales.php?errtiprev=1000");
				}
		}
	}
?>