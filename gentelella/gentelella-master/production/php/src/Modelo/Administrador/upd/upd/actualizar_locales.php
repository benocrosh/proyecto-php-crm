<?php
		
	class actualizar_locales{
		private $db;
		private $idLocal;
		private $Local;
		private $Direcciones_id;
		private $Nombre_Cliente;


		//hay que hacer que no se puedan ingresar mas de un local con el mismo nombre
		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->idLocal= isset($_POST["idlocal"]) ? $_POST["idlocal"] : null;
			$this->Local= isset($_POST["nom_local"]) ? $_POST["nom_local"] : null;
			$this->Nombre_Cliente= isset($_POST["MCliente"]) ? $_POST["MCliente"] : null;
			$this->Direcciones_id= isset($_POST["MDireccion"]) ? $_POST["MDireccion"] : null;
		
			
		}
		public function update_local(){
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
						$update="UPDATE locales SET Local= :loc, Direcciones_idDirecciones= :direc_id, Cliente_idCliente= :clie_id, Estado= :estado Where idLocales= :id_loc";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":loc"=>$this->Local, ":direc_id"=>$iddireccion, ":clie_id"=>$idcliente, ":id_loc"=>$this->idLocal, ":estado"=>$estado));
						$resultado->closeCursor();
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Locales.php");
						}
					} else{
						//crear una vista para mostrar este mensaje de mejor manera
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Locales.php;\",1500);</script>";	
					}

				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/Locales.php';\",1500);</script>";
				}
		}
	}
?>