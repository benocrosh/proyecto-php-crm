<?php

	class mostrar_clientes{
		private $db;
		private $cliente;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->cliente=array();

		}

		public function get_clientes(){
			$estado=1;
			$this->sql="SELECT * FROM cliente WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->cliente[]=$fila;
			}
			$consulta->closeCursor();
			return $this->cliente;

		}
		public function get_cliente_nombre($nombre_cliente){
			
			$cliente_relacionado=$nombre_cliente;
			$this->sql="SELECT * FROM cliente WHERE Nombre = :nombre";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":nombre"=>$cliente_relacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->cliente[]=$fila;
			}
			$consulta->closeCursor();
			return $this->cliente;

		}
		public function get_clientes_id($id_cliente){
			
			$cliente_relacionado=$id_cliente;
			$this->sql="SELECT * FROM cliente WHERE idCliente = :id";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":id"=>$cliente_relacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->cliente[]=$fila;
			}
			$consulta->closeCursor();
			return $this->cliente;

		}
		public function get_clientes_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM cliente WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->cliente[]=$fila;
			}
			$consulta->closeCursor();
			return $this->cliente;

		}
	}


?>