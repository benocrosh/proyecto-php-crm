<?php
		
	class actualizar_conductores{
		private $db;
		private $Id;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $nombre_usuario;
		private $nombre_empresa;

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_POST["idconductor"]) ? $_POST["idconductor"] : null;
			$this->Nombre= isset($_POST["nom_conduc_registro"]) ? $_POST["nom_conduc_registro"] : null;
			$this->Apellido_Paterno= isset($_POST["apepa_pasajero_registro"]) ? $_POST["apepa_pasajero_registro"] : null;
			$this->Apellido_Materno= isset($_POST["apema_pasajero_registro"]) ? $_POST["apema_pasajero_registro"] : null;
			$this->nombre_usuario= isset($_POST["MUsuarios"]) ? $_POST["MUsuarios"] : null;
			$this->nombre_empresa= isset($_POST["MEmpresa"]) ? $_POST["MEmpresa"] : null;
		}
		public function update_conductor(){
			//Verificador que efectivamente tiene algun valor no nulo los ingresos efectuados
				if(isset($this->nombre_usuario) && isset($this->nombre_empresa)){
					$estado=1;
					$idempresa;
					$idusuario;
					require_once("../src/modelo/administrador/scr/ue_union.php");
					$union=new ue_union();
					$idusuario=$union->union_id_usuario($this->nombre_usuario);
					$idempresa=$union->union_id_empresa($this->nombre_empresa);
					
					if($idusuario != 0 && $idempresa != 0){
						$update="UPDATE conductor SET Nombre= :nom, Apellido_Paterno= :ape_pa, Apellido_Materno= :ape_ma, Usuarios_idUsuarios= :idusu, Empresa_Transporte_idEmpresa_Transporte= :idemp, Estado= :estado Where idConductor= :idcond";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":nom"=>$this->Nombre, ":ape_pa"=>$this->Apellido_Paterno, ":ape_ma"=>$this->Apellido_Materno, ":idusu"=>$idusuario, ":idemp"=>$idempresa, ":idcond"=>$this->Id, ":estado"=>$estado));
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

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Conductores.php';\",1500);</script>";
				}
		}
	}
?>