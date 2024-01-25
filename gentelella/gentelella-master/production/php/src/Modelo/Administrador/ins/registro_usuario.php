<?php
		
	class registro_usuario{
		private $db;
		private $usuario;
		private $contraseña;
		private $privilegio;
		private $mail;
		private $validacion_mail;
		private $validacion_user;

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/val_ins.php");
			$contraseñasin=null;
			$this->db=conectar::conexion();
			$this->usuario= isset($_POST["user_registro"]) ? $_POST["user_registro"] : null;
			$contraseñasin= isset($_POST["pass_registro"]) ? $_POST["pass_registro"] : null;
			$this->privilegio= isset($_POST["Privilegio"]) ? $_POST["Privilegio"] : null;
			$this->mail= isset($_POST["email"]) ? $_POST["email"] : null;

			$this->validacion_mail=new val_ins();
			$this->validacion_user=new val_ins();

			$this->contraseña=password_hash($contraseñasin, PASSWORD_DEFAULT);
			$contraseñasin=null;

		}
		public function set_usuarios(){
				//hay que hacer el verificador de los datos nulos o no ingresados para la operacion del set_usuarios
				$privilegio_otorgado;
				$verificadorentrante=0;
				$estado=1;
				$validacion;
				
				foreach ($this->privilegio as $opcion) {
				 	if($opcion=="conductor"){
				 		$privilegio_otorgado=0;
				 	}else{
				 		$privilegio_otorgado=1;
				 	}
				 } 

				 if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
				 	$validacion=1;
				 } else{
				 	$validacion=0;
				 }

				 $validacion_mail_res=$this->validacion_mail->validacion_usuarios_mail($this->mail);
				 $validacion_user_res=$this->validacion_user->validacion_usuarios_user($this->usuario);


				 if(!$validacion_mail_res && !$validacion_user_res){

				 //crear comprobacion de que los campos con indice unico no contengan ninguna informacion.
					 if($validacion){
							$ingreso="INSERT INTO usuarios (User, Pass, Privilegio, Estado, Mail) VALUES (:usu, :contra, :privi, :estado, :mail)";
							$resultado=$this->db->prepare($ingreso);
							$resultado->execute(array(":usu"=>trim($this->usuario), ":contra"=>trim($this->contraseña), ":privi"=>$privilegio_otorgado, ":estado"=>$estado, ":mail"=>trim($this->mail)));
							$resultado->closeCursor();
							if(!isset($resultado)){
							echo "error al agregar registro";
							} else{
								header("location:Usuarios.php");
							}
						} else{
							//echo "Error al procesar la informacion";
							header("location:Usuarios.php?errtiprev=400");

						}
				}else{
					if($validacion_user_res){
						//echo "El Nombre del usuario ya existe";
						header("location:Usuarios.php?errtiprev=500");
						

					}elseif($validacion_mail_res){
						//echo "El E-Mail ya existe";
						header("location:Usuarios.php?errtiprev=600");

					}else{
					//echo "El usuario o el mail ya existe";
					header("location:Usuarios.php?errtiprev=800");
					}
				}


				

		}
	}
?>