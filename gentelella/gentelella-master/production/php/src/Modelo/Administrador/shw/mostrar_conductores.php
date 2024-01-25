<?php

	class mostrar_conductores{
		private $db;
		private $conductor;
		private $sql;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->conductor=array();

		}

		public function get_conductores(){
			$estado=1;
			$this->sql="SELECT * FROM conductor WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->conductor[]=$fila;
			}
			$consulta->closeCursor();
			return $this->conductor;

		}
		public function get_conductores_nombre($nombre_conductor){
			
			$conductor_relacionado=$nombre_conductor;
			$this->sql="SELECT * FROM conductor WHERE Nombre = :nombre";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":nombre"=>$conductor_relacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->conductor[]=$fila;
			}
			$consulta->closeCursor();
			return $this->conductor;

		}
		public function get_conductores_id($nombre_conductor){
			
			$conductor_relacionado=$nombre_conductor;
			$this->sql="SELECT * FROM conductor WHERE idConductor = :nombre";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":nombre"=>$conductor_relacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->conductor[]=$fila;
			}
			$consulta->closeCursor();
			return $this->conductor;

		}
		public function get_conductores_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM conductor WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->conductor[]=$fila;
			}
			$consulta->closeCursor();
			return $this->conductor;

		}
	}


?>