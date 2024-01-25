<?php

	class mostrar_usuarios{
		private $db;
		private $usuarios;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			$this->db=Conectar::conexion();
			$this->usuarios=array();

		}

		public function get_usuarios($tipo_usuario){

			$privilegioadquirido=$tipo_usuario;
			$this->sql="SELECT * FROM usuarios WHERE Privilegio= :privilegio AND Estado=1";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":privilegio"=>$privilegioadquirido));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			$consulta->closeCursor();
			return $this->usuarios;

		}
		public function get_usuarios_conductor($tipo_usuario_conductor){

			$usuariorelacionado=$tipo_usuario_conductor;
			$this->sql="SELECT * FROM usuarios WHERE User= :user AND Estado=1";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":user"=>$usuariorelacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			$consulta->closeCursor();
			return $this->usuarios;

		}
		public function get_usuarios_id($idusuario){

			$usuariorelacionado=$idusuario;
			$this->sql="SELECT * FROM usuarios WHERE idUsuarios= :id AND Estado=1";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":id"=>$usuariorelacionado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			$consulta->closeCursor();
			return $this->usuarios;

		}

		public function get_usuarios_estado(){

			$estado=1;
			$this->sql="SELECT * FROM usuarios WHERE Estado= :estado AND Privilegio <= 1";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			$consulta->closeCursor();
			return $this->usuarios;

		}
		public function get_usuarios_estado_paginacion($empe, $total, $orden){
			$this->paginacion=new pag();
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM usuarios WHERE Estado= :estado AND Privilegio <= 1 ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			$consulta->closeCursor();
			return $this->usuarios;

		}

		
	}


?>