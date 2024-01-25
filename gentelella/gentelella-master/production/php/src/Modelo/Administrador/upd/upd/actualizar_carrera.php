<?php
		
	class actualizar_carrera{
		private $db;
		private $idCarrera;
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
		



		//hay que hacer que no se puedan ingresar mas de un pasajero con el mismo telefono o nombre y apellido
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
			$this->db=conectar::conexion();
			$this->idCarrera= isset($_POST["idCarrera"]) ? $_POST["idCarrera"] : null;
			$this->Kilometraje= isset($_POST["kilometros"]) ? $_POST["kilometros"] : null;
			$this->Peajes= isset($_POST["peajes"]) ? $_POST["peajes"] : null;
			$this->Num_pasajeros= isset($_POST["num_pasajeros"]) ? $_POST["num_pasajeros"] : null;
			$this->Fecha= isset($_POST["Ingreso_Fecha"]) ? $_POST["Ingreso_Fecha"] : null;
			$this->Cliente_id= isset($_POST["ClienteIngreso"]) ? $_POST["ClienteIngreso"] : null;
			$this->Conductor_id= isset($_POST["ConductorIngreso"]) ? $_POST["ConductorIngreso"] : null;
			$this->Direccion_ini= isset($_POST["MDireccionini"]) ? $_POST["MDireccionini"] : null;
			$this->Direccion_ter= isset($_POST["MDireccionter"]) ? $_POST["MDireccionter"] : null;
			
		}
		public function update_carrera(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->Cliente_id) && isset($this->Conductor_id)){
					require_once("../src/modelo/administrador/scr/ue_union.php");
					$union=new ue_union();
					$idcliente=$union->union_id_cliente($this->Cliente_id);
					$idconductor=$union->union_id_conductor_2($this->Conductor_id);
					
					if($this->idCarrera != 0){
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

						$update="UPDATE carrera SET Kilometraje= :kilo, Peajes= :peaj, NPasajeros= :numpas, Fecha= :fecha, Estado= :estado, Direccion_Inicial= :dir_ini, Direccion_Final= :dir_fin, Cliente_idCliente= :idclie, Conductor_idConductor= :id_cond  Where idCarrera= :id";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":kilo"=>$kilometros, ":peaj"=>$peajedados, ":numpas"=>$numero_pasajeros, ":fecha"=>$fechadada, ":estado"=>$Estado, ":dir_ini"=>$direcciones_ini, ":dir_fin"=>$direcciones_ter, ":idclie"=>$idcliente, ":id_cond"=>$idconductor, ":id"=>$this->idCarrera));
						$resultado->closeCursor();
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Carreras.php");
						}
						$resultado->closeCursor();
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Carreras.php';\",6000);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Carreras.php';\",1500);</script>";
				}
		}
	}
?>