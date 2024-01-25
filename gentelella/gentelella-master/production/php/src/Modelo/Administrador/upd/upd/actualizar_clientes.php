<?php
		
	class actualizar_clientes{
		private $db;
		private $Id;
		private $nombre_cliente;
		private $usuario_afiliado;
		private $dinero_conductor;
		private $dinero_cliente;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=conectar::conexion();
			$this->Id= isset($_POST["idCliente"]) ? $_POST["idCliente"] : null;
			$this->nombre_cliente= isset($_POST["nom_cliente"]) ? $_POST["nom_cliente"] : null;
			$this->usuario_afiliado= isset($_POST["MUsuarios"]) ? $_POST["MUsuarios"] : null;
			$this->dinero_conductor= isset($_POST["din_conduc"]) ? $_POST["din_conduc"] : null;
			$this->dinero_cliente= isset($_POST["din_client"]) ? $_POST["din_client"] : null;
			
		}
		public function update_cliente(){
				if(isset($this->usuario_afiliado)){
					$estado=1;
					$idusuario;
					require_once("../src/modelo/administrador/scr/ue_union.php");
					$union=new ue_union();
					$idusuario=$union->union_id_usuario($this->usuario_afiliado);
					if($idusuario != 0){
						$update="UPDATE cliente SET Nombre= :nom, Usuarios_idUsuarios= :id_usu, Dinero_Conductor= :din_cond, Dinero_Cliente= :din_clie,  Estado= :estado Where idCliente= :id_cli";
						$resultado=$this->db->prepare($update);
						$resultado->execute(array(":nom"=>$this->nombre_cliente, ":id_usu"=>$idusuario, ":din_cond"=>$this->dinero_conductor, ":din_clie"=>$this->dinero_cliente, ":estado"=>$estado, ":id_cli"=>$this->Id));
						$resultado->closeCursor();
						if(!isset($resultado)){
						echo "error al agregar registro";
						} else{
							header("location:Clientes.php");
						}	
					} else{
						echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Clientes.php';\",1500);</script>";	
					}
				} else{
					echo "Error al ingresar el conductor";
					echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Clientes.php';\",1500);</script>";
				}

				

		}
	}
?>