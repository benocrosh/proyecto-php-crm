<?php
		
	class registro_conductor{
		private $db;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $nombre_usuario;
		private $nombre_empresa;

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->nombre= isset($_POST["nom_conduc_registro"]) ? $_POST["nom_conduc_registro"] : null;
			$this->apellido_paterno= isset($_POST["apepa_pasajero_registro"]) ? $_POST["apepa_pasajero_registro"] : null;
			$this->apellido_materno= isset($_POST["apema_pasajero_registro"]) ? $_POST["apema_pasajero_registro"] : null;
			$this->nombre_usuario= isset($_POST["MUsuarios"]) ? $_POST["MUsuarios"] : null;
			$this->nombre_empresa= isset($_POST["MEmpresa"]) ? $_POST["MEmpresa"] : null;
		}
		public function set_conductor(){
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
						$ingreso="INSERT INTO conductor (Nombre, Apellido_Paterno, Apellido_Materno, Usuarios_idUsuarios, Empresa_Transporte_idEmpresa_Transporte, Estado) VALUES (:nom, :ape_pat, :ape_mat, :usu, :empre, :estado)";
						$resultado=$this->db->prepare($ingreso);
						$resultado->execute(array(":nom"=>trim($this->nombre), ":ape_pat"=>trim($this->apellido_paterno), ":ape_mat"=>trim($this->apellido_materno), ":usu"=>$idusuario, ":empre"=>$idempresa, ":estado"=>$estado));
						$resultado->closeCursor();
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Conductores.php");
						}
					} else{
						
						header("location:Conductores.php?errtiprev=400");
					}

				} else{
					
					header("location:Conductores.php?errtiprev=1000");
				}
		}
	}
?>