<?php
	class val_ins{
		private $mos_usu;
		private $mos_emp;
		private $mos_cli;
		private $validacion_bool;

		public function __construct(){
			require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
			require_once("../src/modelo/administrador/shw/mostrar_empresa.php");
			require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
			$this->mos_usu=new mostrar_usuarios();
			$this->mos_emp=new mostrar_empresa();
			$this->mos_cli=new mostrar_clientes();
		}

		public function validacion_usuarios_user($usu_ing){
			
			$usuario=trim($usu_ing);
			$matrizusuario=$this->mos_usu->get_usuarios_estado();
			foreach ($matrizusuario as $var){
				if($usuario==trim($var["User"])){
					$this->validacion_bool=1;
					break;
				}else{
					$this->validacion_bool=0;
				}
			}
			return $this->validacion_bool;
		}
		public function validacion_usuarios_mail($mail_ing){
			$email=trim($mail_ing);
			$matrizusuario=$this->mos_usu->get_usuarios_estado();
			foreach ($matrizusuario as $var) {
				if(trim($var["Mail"])==$mail_ing){
					$this->validacion_bool=1;
					break;
				}
				else{
					$this->validacion_bool=0;
				}
			}
			return $this->validacion_bool;	
		}
		public function validacion_empresas($emp_ing){
			
			$empresa=trim($emp_ing);
			$matrizempresa=$this->mos_emp->get_empresa();
			foreach ($matrizempresa as $var) {
				if(trim($var["Nombre"])==$empresa){
					$this->validacion_bool=1;
					break;
				}
				else{
					$this->validacion_bool=0;
				}
			}
			return $this->validacion_bool;	
		}

		public function validacion_clientes($cli_ing){
			$cliente=trim($cli_ing);
			
			$matrizcliente=$this->mos_cli->get_clientes();
			foreach ($matrizcliente as $var) {
				if(trim($var["Nombre"])==$cliente){
					$this->validacion_bool=1;
					break;
				}
				else{
					$this->validacion_bool=0;
				}
			}
			return $this->validacion_bool;

		}
	}


?>