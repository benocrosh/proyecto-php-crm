<?php
		
	class registro_cliente{
		private $db;
		private $nombre_cliente;
		private $usuario_afiliado;
		private $dinero_conductor;
		private $dinero_cliente;
		private $validacion_cli;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/val_ins.php");
			$this->db=conectar::conexion();
			$this->nombre_cliente= isset($_POST["nom_cliente"]) ? $_POST["nom_cliente"] : null;
			$this->usuario_afiliado= isset($_POST["MUsuarios"]) ? $_POST["MUsuarios"] : null;
			$this->dinero_conductor= isset($_POST["din_conduc"]) ? $_POST["din_conduc"] : null;
			$this->dinero_cliente= isset($_POST["din_client"]) ? $_POST["din_client"] : null;
			$this->validacion_cli=new val_ins();
		}
		public function set_cliente(){
			
			$validacion_cli_res=$this->validacion_cli->validacion_clientes($this->nombre_cliente);

			if(!$validacion_cli_res){
					if(isset($this->usuario_afiliado)){
						$estado=1;
						$idusuario;
						require_once("../src/modelo/administrador/scr/ue_union.php");
						$union=new ue_union();
						$idusuario=$union->union_id_usuario($this->usuario_afiliado);
						if($idusuario != 0){
							$ingreso="INSERT INTO cliente (Nombre, Usuarios_idUsuarios, Dinero_Conductor, Dinero_Cliente, Estado) VALUES (:nom, :id_usu, :din_conductor, :din_cliente, :estado)";
							$resultado=$this->db->prepare($ingreso);
							$resultado->execute(array(":nom"=>trim($this->nombre_cliente), ":id_usu"=>$idusuario,":din_conductor"=>trim($this->dinero_conductor),":din_cliente"=>trim($this->dinero_cliente), ":estado"=>$estado));
							$resultado->closeCursor();
							if(!isset($resultado)){
							echo "error al agregar registro";
							} else{
								header("location:Clientes.php");
							}
						} else{
							
							header("location:Clientes.php?errtiprev=400");
						}
					} else{
						
						header("location:Clientes.php?errtiprev=900");
					}

				}else{
					if($validacion_cli_res){
						
						header("location:Clientes.php?errtiprev=700");

					}else{
						
						header("location:Clientes.php?errtiprev=400");
					}
				

				}
			}
	}
?>