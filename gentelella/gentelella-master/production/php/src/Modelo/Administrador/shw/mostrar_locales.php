<?php

	class mostrar_locales{
		private $db;
		private $locales;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->locales=array();

		}

		public function get_locales(){
			$estado=1;
			$this->sql="SELECT * FROM locales WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->locales[]=$fila;
			}
			$consulta->closeCursor();
			return $this->locales;

		}
		public function get_locales_nombre($nombre_locales){
			
			$locales_relacionada=$nombre_locales;
			$this->sql="SELECT * FROM locales WHERE Local= :local";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":local"=>$locales_relacionada));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->locales[]=$fila;
			}
			$consulta->closeCursor();
			return $this->locales;

		}
		public function get_locales_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM locales WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->locales[]=$fila;
			}
			$consulta->closeCursor();
			return $this->locales;

		}
	}


?>