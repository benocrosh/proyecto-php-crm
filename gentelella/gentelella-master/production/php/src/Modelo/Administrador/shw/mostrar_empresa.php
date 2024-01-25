<?php

	class mostrar_empresa{
		private $db;
		private $empresa;
		private $sql;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			$this->db=Conectar::conexion();
			$this->empresa=array();

		}

		public function get_empresa(){
			$estado=1;
			$this->sql="SELECT * FROM empresa_transporte WHERE Estado=:estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->empresa[]=$fila;
			}
			$consulta->closeCursor();
			return $this->empresa;

		}
		public function get_empresa_conductor($nombre_empresa){
			$estado=$nombre_empresa;
			$this->sql="SELECT * FROM empresa_transporte WHERE Nombre=:estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->empresa[]=$fila;
			}
			$consulta->closeCursor();
			return $this->empresa;

		}
		public function get_empresa_id($id_empresa){
			$estado=$id_empresa;
			$this->sql="SELECT * FROM empresa_transporte WHERE idEmpresa_Transporte=:estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->empresa[]=$fila;
			}
			$consulta->closeCursor();
			return $this->empresa;

		}
	}


?>