<?php
	class pag{
		private $paginas;

		public function __construct(){
			require_once("../src/modelo/administrador/shw/mostrar_carreras.php");
			$this->paginas= isset($_GET["pag"]) ? $_GET["pag"] : null;
			$this->carreras=new mostrar_carreras();
		}

		public function paginacion($rows){
			$paginaresult;
			$numpag=$rows;
			if(isset($this->paginas)){
				if(is_numeric($this->paginas) && $this->paginas<=$numpag){
				$paginaresult=$this->paginas;
				}
				else{
					$paginaresult=1;
				}
			} else{
				$paginaresult=1;
			}
			return $paginaresult;
		}
		public function emp_pag($pagn){
			$tamano=10;
			$empezar=($pagn-1)*$tamano;
			return $empezar;
		}

		public function tot_pag($filas){
			$tamano=10;
			$total=ceil($filas/$tamano);
			return $total;
		}
		public function emp_pag_historico($pagn, $cantidad){
			$empezar=($pagn-1)*$cantidad;
			return $empezar;
		}
		public function tot_pag_historico($filas, $tamano){
			//$tamano=10;
			$total=ceil($filas/$tamano);
			return $total;
		}
		public function validar_tamano($cantidad){
			if(is_numeric($cantidad)){
				$cantidad=$cantidad;
			}else{
				$cantidad=10;
			}
			return $cantidad;
		}
	}
?>