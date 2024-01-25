<?php
		
	class actualizar_usuarios{
		private $db;
		private $Id;
		private $usuario;
		private $privilegio;
		private $mail;

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");

			$this->db=conectar::conexion();
			$this->Id= isset($_POST["idusuario"]) ? $_POST["idusuario"] : null;
			$this->usuario= isset($_POST["user_registro"]) ? $_POST["user_registro"] : null;
			$this->privilegio= isset($_POST["Privilegio"]) ? $_POST["Privilegio"] : null;
			$this->mail= isset($_POST["email"]) ? $_POST["email"] : null;

		}
		public function update_usuario(){
				//hay que hacer el verificador de los datos nulos o no ingresados para la operacion del set_usuarios
				$privilegio_otorgado;
				$estado=1;
				foreach ($this->privilegio as $opcion) {
				 	if($opcion=="conductor"){
				 		$privilegio_otorgado=0;
				 	}else{
				 		$privilegio_otorgado=1;
				 	}
				 } 

				 //crear comprobacion de que los campos con indice unico no contengan ninguna informacion.

				if($this->Id != 0){
					$update="UPDATE usuarios SET User= :usu, Privilegio= :priv,  Estado= :estado, Mail= :mail Where idUsuarios= :idusu";
					$resultado=$this->db->prepare($update);
					$resultado->execute(array(":usu"=>$this->usuario,":priv"=>$privilegio_otorgado, ":idusu"=>$this->Id, ":mail"=>$this->mail, ":estado"=>$estado));
					$resultado->closeCursor();
					if(!isset($resultado)){
					echo "error al agregar registro";
					} else{
						header("location:Usuarios.php");
					}
				} else{
					//crear una vista para mostrar este mensaje de mejor manera
					echo "Error al procesar la informacion";
					echo "<script>setTimeout(\"location.href = 'http://http://localhost/php/gentelella-master/production/php/administrador/Usuarios.php';\",1500);</script>";	
				}

		}
	}
?>