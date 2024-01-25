<?php

	class mostrar_direcciones{
		private $db;
		private $direccion;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->direccion=array();

		}

		public function get_direcciones(){
			$estado=1;
			$this->sql="SELECT * FROM direcciones WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->direccion[]=$fila;
			}
			$consulta->closeCursor();
			return $this->direccion;

		}
		public function get_direcciones_nombre($nombre_direccion){
			
			$direccion_relacionada=$nombre_direccion;
			$this->sql="SELECT * FROM direcciones WHERE Direccion= :direccion";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":direccion"=>$direccion_relacionada));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->direccion[]=$fila;
			}
			$consulta->closeCursor();
			return $this->direccion;

		}

		public function get_direcciones_id($id_direccion){
			
			$direccion_relacionada=$id_direccion;
			$this->sql="SELECT * FROM direcciones WHERE idDirecciones= :iddireccion";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":iddireccion"=>$direccion_relacionada));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->direccion[]=$fila;
			}
			$consulta->closeCursor();
			return $this->direccion;

		}

		public function get_direcciones_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM direcciones WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->direccion[]=$fila;
			}
			$consulta->closeCursor();
			return $this->direccion;

		}
	}


?>