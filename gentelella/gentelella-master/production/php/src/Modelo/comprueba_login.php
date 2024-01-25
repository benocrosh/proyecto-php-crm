<?php
	class comprueba_login{
		private $db;
		private $sql;
		private $login;
		private $password;
		private $privilege;
		
		public function __construct(){

			require_once("conectar.php");
			$this->db=conectar::conexion();
			$this->login=htmlentities(addslashes(isset($_POST["login"]) ? $_POST["login"] : null));
			$this->password=htmlentities(addslashes(isset($_POST["password"]) ? $_POST["password"] : null));

		}
		public function comprobar_login(){
			if(isset($this->login) && isset($this->password)){
				$contador=0;

				$this->sql="SELECT * FROM usuarios WHERE User= :login";
				$resultado=$this->db->prepare($this->sql);
				$resultado->execute(array(":login"=>trim($this->login)));
				while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
					if(password_verify($this->password, $registro["Pass"])){
						$contador=1;
						$this->privilege=$registro["Privilegio"];
						if($registro["Estado"]==0){
							$contador=0;
						}else{
							$contador=1;
						}
					} else{
						$contador=0;
					}
				}
				if($contador>0){
					if($this->privilege==2){
					session_start();
					$_SESSION["admin"]=$this->login;
					header("location:administrador/index.php");
					} else{
						if($this->privilege==1){
							session_start();
							$_SESSION["client"]=$this->login;
							header("location:cliente/index.php");
						} else{
							session_start();
							$_SESSION["driver"]=$this->login;
							header("location:conductor/index.php");
						}
					}
				}else{
					header("location:index.php?errtiprev=30000");

					
				}

			}else { 
				header("location:index.php?errtiprev=900");
				
				}


		}
	}
?>