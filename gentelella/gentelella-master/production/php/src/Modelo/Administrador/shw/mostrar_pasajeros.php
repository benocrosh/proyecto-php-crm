<?php

	class mostrar_pasajeros{
		private $db;
		private $pasajeros;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->pasajeros=array();

		}

		public function get_pasajeros(){
			$estado=1;
			$this->sql="SELECT * FROM pasajeros WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->pasajeros[]=$fila;
			}
			$consulta->closeCursor();
			return $this->pasajeros;

		}
		public function get_pasajeros_nombre($nombre_pasajeros, $apellido_pasajeros){
			
			$pasajeros_relacionada=$nombre_pasajeros;
			$apellido_relacionada=$apellido_pasajeros;
			$this->sql="SELECT * FROM pasajeros WHERE Nombre= :nombre AND Apellido_Paterno= :ape_pat";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":nombre"=>$pasajeros_relacionada, ":ape_pat"=>$apellido_relacionada));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->pasajeros[]=$fila;
			}
			$consulta->closeCursor();
			return $this->pasajeros;

		}
		public function get_pasajeros_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM pasajeros WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->pasajeros[]=$fila;
			}
			
			$consulta->closeCursor();
			return $this->pasajeros;

		}
	}


?>