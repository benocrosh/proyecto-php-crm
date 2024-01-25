<?php

	class mostrar_carreras{
		private $db;
		private $carrera;
		private $sql;
		private $paginacion;
		private $paginacion_empezar;
		private $fechaactual;
		private $fechacomparar;

		public function __construct(){
			require_once("../src/modelo/conectar.php");
			require_once("../src/modelo/administrador/scr/pag.php");
			require_once("../src/modelo/administrador/scr/dates.php");
			$this->db=Conectar::conexion();
			$this->carrera=array();

		}

		public function get_carreras($confirmacion){
			$estado=1;
			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;
			

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}
			if(!$confirmacion){
				$this->sql="SELECT * FROM carrera WHERE Estado= :estado";	
			} else{
				$this->sql="SELECT * FROM carrera WHERE Estado= :estado AND Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal'";
			}
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_id($carrera_asociada){
			$IdCarrera=$Carrera_asociada;
			$this->sql="SELECT * FROM carrera WHERE Estado= :estado";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_paginacion($empe, $total, $orden){
			
			$this->paginacion_empezar=new pag();
			$totpag=10;

			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;
			

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}



			$empezar=$this->paginacion_empezar->emp_pag($empe);
			$estado=1;
			$this->sql="SELECT * FROM carrera WHERE Estado= :estado AND Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal' ORDER BY $orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_paginacion_clientes($empe, $idusu, $orden){
			$counter=$empe;
			$idusuario=$idusu;
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($counter);
			$estado=1;

			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}

			$this->sql="SELECT Fecha, Direccion_Inicial, Direccion_Final, Cliente_idCliente, Conductor_idConductor FROM carrera INNER JOIN cliente ON carrera.Cliente_idCliente= cliente.idCliente WHERE carrera.Estado= :estado AND cliente.Usuarios_idUsuarios= :idusu AND carrera.Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal' ORDER BY carrera.$orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idusu"=>$idusuario));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}

		public function get_carreras_cobxpag_clientes($idusu){
			//$counter=$empe;
			$idusuario=$idusu;
			//$this->paginacion_empezar=new pag();
			//$totpag=10;
			//$empezar=$this->paginacion_empezar->emp_pag($counter);
			$estado=1;

			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}

			$this->sql="SELECT * FROM carrera INNER JOIN cliente ON carrera.Cliente_idCliente= cliente.idCliente WHERE carrera.Estado= :estado AND cliente.Usuarios_idUsuarios= :idusu AND carrera.Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal'";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idusu"=>$idusuario));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}

		public function get_carreras_paginacion_conductor($empe, $idusu, $orden){
			$counter=$empe;
			$idusuario=$idusu;
			$this->paginacion_empezar=new pag();
			$totpag=10;
			$empezar=$this->paginacion_empezar->emp_pag($counter);
			$estado=1;

			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}

			$this->sql="SELECT Kilometraje, Peajes, NPasajeros, Fecha, Direccion_Inicial, Direccion_Final, Cliente_idCliente, Conductor_idConductor FROM carrera INNER JOIN conductor ON carrera.Conductor_idConductor= conductor.idConductor WHERE carrera.Estado= :estado AND conductor.Usuarios_idUsuarios= :idusu AND carrera.Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal' ORDER BY carrera.$orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idusu"=>$idusuario));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_cobxpag_conductor($idcond){
			$idconductor=$idcond;
			$estado=1;

			$this->fechaactual=new dates();
			$this->fechacomparar=new dates();

			$fechacomparada=$this->fechacomparar->show();
			$fechafacturacionfinal=$this->fechaactual->render_date($fechacomparada);
			$hoy=date('Y-m-d');
			$fechadesde;

			foreach ($fechacomparada as $comparativa) {
				if($comparativa["Quincena"]>$hoy){
					$fechadesde=date('Y-m-01');
					break;
				} else{
					$fechadesde=date('Y-m-16');
					break;
				}
			}

			$this->sql="SELECT carrera.Kilometraje, carrera.Peajes, carrera.NPasajeros, carrera.Fecha, carrera.Estado, carrera.Cliente_idCliente, carrera.Conductor_idConductor, cliente.idCliente, cliente.Dinero_Conductor FROM carrera INNER JOIN cliente ON carrera.Cliente_idCliente= cliente.idCliente WHERE carrera.Estado= :estado AND carrera.Conductor_idConductor= :idcond AND carrera.Fecha BETWEEN '$fechadesde' AND '$fechafacturacionfinal'";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idcond"=>$idconductor));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_historico($empe, $tamano, $orden){
			$counter=$empe;
			$this->paginacion_empezar=new pag();
			$validacion=new pag();
			$totpag=$validacion->validar_tamano($tamano);
			$empezar=$this->paginacion_empezar->emp_pag_historico($counter, $totpag);
			$estado=1;
			$this->sql="SELECT * FROM carrera WHERE Estado= :estado ORDER BY $orden LIMIT $empezar,$totpag";	
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_paginacion_conductor_historico($empe, $idusu, $orden, $tamano){
			$counter=$empe;
			$idusuario=$idusu;
			$this->paginacion_empezar=new pag();
			$validacion=new pag();
			$totpag=$validacion->validar_tamano($tamano);
			$empezar=$this->paginacion_empezar->emp_pag_historico($counter, $totpag);
			$estado=1;

			$this->sql="SELECT Kilometraje, Peajes, NPasajeros, Fecha, Direccion_Inicial, Direccion_Final, Cliente_idCliente, Conductor_idConductor FROM carrera INNER JOIN conductor ON carrera.Conductor_idConductor= conductor.idConductor WHERE carrera.Estado= :estado AND conductor.Usuarios_idUsuarios= :idusu ORDER BY carrera.$orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idusu"=>$idusuario));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		public function get_carreras_paginacion_clientes_historico($empe, $idusu, $orden, $tamano){
			$counter=$empe;
			$idusuario=$idusu;
			$this->paginacion_empezar=new pag();
			$validacion=new pag();
			$totpag=$validacion->validar_tamano($tamano);
			$empezar=$this->paginacion_empezar->emp_pag_historico($counter, $totpag);
			$estado=1;

			

			$this->sql="SELECT Fecha, Direccion_Inicial, Direccion_Final, Cliente_idCliente, Conductor_idConductor FROM carrera INNER JOIN cliente ON carrera.Cliente_idCliente= cliente.idCliente WHERE carrera.Estado= :estado AND cliente.Usuarios_idUsuarios= :idusu ORDER BY carrera.$orden LIMIT $empezar,$totpag";
			$consulta=$this->db->prepare($this->sql);
			$consulta->execute(array(":estado"=>$estado, ":idusu"=>$idusuario));
			while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->carrera[]=$fila;
			}
			$consulta->closeCursor();
			return $this->carrera;

		}
		
	}


?>