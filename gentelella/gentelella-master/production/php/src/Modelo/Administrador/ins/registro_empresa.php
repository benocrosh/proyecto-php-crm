<?php
		
	class registro_empresa{
		private $db;
		private $nombre_empresa;
		private $validacion_emp;
		

		

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/val_ins.php");
			$this->db=conectar::conexion();
			$this->nombre_empresa= isset($_POST["nom_empresa"]) ? $_POST["nom_empresa"] : null;
			$this->validacion_emp=new val_ins();
			
		}
		public function set_empresa(){
				//hay que mejorar el procedimiento por el cual pasa el set empresas, ya que falta el arreglo para el caso de que los datos no existan
				
				$validacion_emp_res=$this->validacion_emp->validacion_empresas($this->nombre_empresa);

				if(!$validacion_emp_res){
					if(isset($this->nombre_empresa)){
					$estado=1;
					$ingreso="INSERT INTO empresa_transporte (Nombre, Estado) VALUES (:nombre_empresa, :estado)";
					$resultado=$this->db->prepare($ingreso);
					$resultado->execute(array(":nombre_empresa"=>trim($this->nombre_empresa), ":estado"=>$estado));
					if(!isset($resultado)){
					echo "error al agregar registro";
					} else{
						header("location:Conductores.php");
					}
					$resultado->closeCursor();
					} else{
							
							header("location:Conductores.php?errtiprev=400");	
						}

				}else{
					if($validacion_emp_res){
						
						header("location:Conductores.php?errtiprev=700");
					}else{
						
						header("location:Conductores.php?errtiprev=800");
					}
				}
		}
	}
?>