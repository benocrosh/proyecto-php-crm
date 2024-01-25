<?php
		
	class ingreso_carrera{
		private $db;
		private $Kilometraje;
		private $Peajes;
		private $Num_pasajeros;
		private $Fecha;
		private $Cliente_id;
		private $Conductor_id;
		private $Direccion_ini;
		private $Direccion_ter;
		private $matriz_direcciones_ini;
		private $matriz_direcciones_ter;


		//hay que hacer que no se puedan ingresar mas de un local con el mismo nombre
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
			$this->db=conectar::conexion();
			$this->Kilometraje= isset($_POST["kilometros"]) ? $_POST["kilometros"] : null;
			$this->Peajes= isset($_POST["peajes"]) ? $_POST["peajes"] : null;
			$this->Num_pasajeros= isset($_POST["num_pasajeros"]) ? $_POST["num_pasajeros"] : null;
			$this->Fecha= isset($_POST["Ingreso_Fecha"]) ? $_POST["Ingreso_Fecha"] : null;
			$this->Cliente_id= isset($_POST["ClienteIngreso"]) ? $_POST["ClienteIngreso"] : null;
			$this->Conductor_id= isset($_POST["ConductorIngreso"]) ? $_POST["ConductorIngreso"] : null;
			$this->Direccion_ini= isset($_POST["MDireccionini"]) ? $_POST["MDireccionini"] : null;
			$this->Direccion_ter= isset($_POST["MDireccionter"]) ? $_POST["MDireccionter"] : null;
		
			
		}
		public function set_carrera(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Cliente_id) && isset($this->Conductor_id)){
					require_once("../src/modelo/administrador/scr/ue_union.php");
					$union=new ue_union();
					$idcliente=$union->union_id_cliente($this->Cliente_id);
					$idconductor=$union->union_id_conductor_2($this->Conductor_id);
					
					if($idcliente != 0 && $idconductor != 0){
						$direcciones_ini;
						$direcciones_ter;
						$Estado=1;
						$registro_ingresado=0;
						$kilometros=$this->Kilometraje;
						$peajedados=$this->Peajes;
						$numero_pasajeros=$this->Num_pasajeros;
						$fechadada=$this->Fecha;
						foreach ($this->Direccion_ini as $registro) {
							$direcciones_ini=$registro;
						}
						foreach ($this->Direccion_ter as $registro) {
							$direcciones_ter=$registro;
						}
						$ingreso="INSERT INTO Carrera (Kilometraje, Peajes, NPasajeros, Fecha, Estado, Direccion_Inicial, Direccion_Final, Cliente_idCliente, Conductor_idConductor) VALUES (:kilom, :peajes, :pasajeros, STR_TO_DATE(:fecha, '%d.%m.%Y'), :estado, :direc_ini, :direc_fin, :clientesid, :conductoresid)";
						$resultado=$this->db->prepare($ingreso);
						$resultado->execute(array(":kilom"=>trim($kilometros), ":peajes"=>trim($peajedados),":pasajeros"=>trim($numero_pasajeros),":fecha"=>trim($fechadada), ":estado"=>$Estado, ":direc_ini"=>$direcciones_ini, ":direc_fin"=>$direcciones_ter, ":clientesid"=>$idcliente, ":conductoresid"=>$idconductor));
						$resultado->closeCursor();
						$registro_ingresado=1;
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Carreras.php");
						}
						
					} else{
						header("location:Carreras.php?errtiprev=400");	
					}

				} else{
					
					header("location:Carreras.php?errtiprev=1000");
				}
		}
		
	}
?>