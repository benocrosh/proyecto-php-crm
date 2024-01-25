<?php
	class orders{
		private $pasvar;
		private $columna;
		private $posicion;
		public function __construct(){
			$this->pasvar= htmlentities(addslashes(isset($_GET["col"]) ? $_GET["col"] : null)); 
			$this->posicion= htmlentities(addslashes(isset($_GET["pos"]) ? $_GET["pos"] : null));

		}

		public function render_get_carrera(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idCarrera ASC";
				}else{
					$this->columna="idCarrera DESC";
				}

			}elseif($this->pasvar=="fecha"){
				if($this->posicion==1){
					$this->columna="Fecha ASC";
				}else{
					$this->columna="Fecha DESC";
				}

			}elseif($this->pasvar=="dir_ini"){
				if($this->posicion==1){
					$this->columna="Direccion_Inicial ASC";
				}else{
					$this->columna="Direccion_Inicial DESC";
				}

			}elseif($this->pasvar=="dir_fin"){
				if($this->posicion==1){
					$this->columna="Direccion_Final ASC";
				}else{
					$this->columna="Direccion_Final DESC";
				}

			}elseif($this->pasvar=="kil"){
				if($this->posicion==1){
					$this->columna="Kilometraje ASC";
				}else{
					$this->columna="Kilometraje DESC";
				}
			}elseif($this->pasvar=="pas"){
				if($this->posicion==1){
					$this->columna="NPasajeros ASC";
				}else{
					$this->columna="NPasajeros DESC";
				}
			}elseif($this->pasvar=="peaj"){
				if($this->posicion==1){
					$this->columna="Peajes ASC";
				}else{
					$this->columna="Peajes DESC";
				}
			}elseif($this->pasvar=="cond"){
				if($this->posicion==1){
					$this->columna="Conductor_idConductor ASC";
				}else{
					$this->columna="Conductor_idConductor DESC";
				}
			}elseif($this->pasvar=="clie"){
				if($this->posicion==1){
					$this->columna="Cliente_idCliente ASC";
				}else{
					$this->columna="Cliente_idCliente DESC";
				}
			} else{
				$this->columna="Fecha DESC";
			}
			return $this->columna;
		}
		public function render_get_local(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idLocales ASC";
				}else{
					$this->columna="idLocales DESC";
				}

			}elseif($this->pasvar=="loc"){
				if($this->posicion==1){
					$this->columna="Local ASC";
				}else{
					$this->columna="Local DESC";
				}

			}elseif($this->pasvar=="direc"){
				if($this->posicion==1){
					$this->columna="Direcciones_idDirecciones ASC";
				}else{
					$this->columna="Direcciones_idDirecciones DESC";
				}

			}elseif($this->pasvar=="clie"){
				if($this->posicion==1){
					$this->columna="Cliente_idCliente ASC";
				}else{
					$this->columna="Cliente_idCliente DESC";
				}

			}else{
				$this->columna="idLocales DESC";
			}
			return $this->columna;
		}
		public function render_get_pasajeros(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idPasajeros ASC";
				}else{
					$this->columna="idPasajeros DESC";
				}

			}elseif($this->pasvar=="nom"){
				if($this->posicion==1){
					$this->columna="Nombre ASC";
				}else{
					$this->columna="Nombre DESC";
				}

			}elseif($this->pasvar=="ape_pat"){
				if($this->posicion==1){
					$this->columna="Apellido_Paterno ASC";
				}else{
					$this->columna="Apellido_Paterno DESC";
				}

			}elseif($this->pasvar=="ape_mat"){
				if($this->posicion==1){
					$this->columna="Apellido_Materno ASC";
				}else{
					$this->columna="Apellido_Materno DESC";
				}

			}elseif($this->pasvar=="tel"){
				if($this->posicion==1){
					$this->columna="Telefono ASC";
				}else{
					$this->columna="Telefono DESC";
				}
			}elseif($this->pasvar=="direc"){
				if($this->posicion==1){
					$this->columna="Direcciones_idDirecciones ASC";
				}else{
					$this->columna="Direcciones_idDirecciones DESC";
				}
			}elseif($this->pasvar=="clie"){
				if($this->posicion==1){
					$this->columna="Cliente_idCliente ASC";
				}else{
					$this->columna="Cliente_idCliente DESC";
				}
			}else{
				$this->columna="idPasajeros DESC";
			}
			return $this->columna;
		}
		public function render_get_direcciones(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idDirecciones ASC";
				}else{
					$this->columna="idDirecciones DESC";
				}

			}elseif($this->pasvar=="direc"){
				if($this->posicion==1){
					$this->columna="Direccion ASC";
				}else{
					$this->columna="Direccion DESC";
				}

			}elseif($this->pasvar=="com"){
				if($this->posicion==1){
					$this->columna="Comuna ASC";
				}else{
					$this->columna="Comuna DESC";
				}

			}else{
				$this->columna="idDirecciones DESC";
			}
			return $this->columna;
		}
		public function render_get_conductores(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idConductor ASC";
				}else{
					$this->columna="idConductor DESC";
				}

			}elseif($this->pasvar=="nom"){
				if($this->posicion==1){
					$this->columna="Nombre ASC";
				}else{
					$this->columna="Nombre DESC";
				}

			}elseif($this->pasvar=="ape_pat"){
				if($this->posicion==1){
					$this->columna="Apellido_Paterno ASC";
				}else{
					$this->columna="Apellido_Paterno DESC";
				}

			}elseif($this->pasvar=="ape_mat"){
				if($this->posicion==1){
					$this->columna="Apellido_Materno ASC";
				}else{
					$this->columna="Apellido_Materno DESC";
				}

			}elseif($this->pasvar=="usu"){
				if($this->posicion==1){
					$this->columna="Usuarios_idUsuarios ASC";
				}else{
					$this->columna="Usuarios_idUsuarios DESC";
				}
			}elseif($this->pasvar=="emp_tra"){
				if($this->posicion==1){
					$this->columna="Empresa_Transporte_idEmpresa_Transporte ASC";
				}else{
					$this->columna="Empresa_Transporte_idEmpresa_Transporte DESC";
				}
			}else{
				$this->columna="idConductor DESC";
			}
			return $this->columna;
		}
		public function render_get_clientes(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idCliente ASC";
				}else{
					$this->columna="idCliente DESC";
				}

			}elseif($this->pasvar=="nom"){
				if($this->posicion==1){
					$this->columna="Nombre ASC";
				}else{
					$this->columna="Nombre DESC";
				}

			}elseif($this->pasvar=="usu"){
				if($this->posicion==1){
					$this->columna="Usuarios_idUsuarios ASC";
				}else{
					$this->columna="Usuarios_idUsuarios DESC";
				}

			}elseif($this->pasvar=="din_cond"){
				if($this->posicion==1){
					$this->columna="Dinero_Conductor ASC";
				}else{
					$this->columna="Dinero_Conductor DESC";
				}

			}elseif($this->pasvar=="din_clie"){
				if($this->posicion==1){
					$this->columna="Dinero_Cliente ASC";
				}else{
					$this->columna="Dinero_Cliente DESC";
				}
			}else{
				$this->columna="idCliente DESC";
			}
			return $this->columna;
		}
		public function render_get_usuarios(){
			if($this->pasvar=="id"){
				if($this->posicion==1){
					$this->columna="idUsuarios ASC";
				}else{
					$this->columna="idUsuarios DESC";
				}

			}elseif($this->pasvar=="usu"){
				if($this->posicion==1){
					$this->columna="User ASC";
				}else{
					$this->columna="User DESC";
				}

			}elseif($this->pasvar=="privi"){
				if($this->posicion==1){
					$this->columna="Privilegio ASC";
				}else{
					$this->columna="Privilegio DESC";
				}

			}elseif($this->pasvar=="mail"){
				if($this->posicion==1){
					$this->columna="Mail ASC";
				}else{
					$this->columna="Mail DESC";
				}

			}else{
				$this->columna="idUsuarios DESC";
			}
			return $this->columna;
		}
		public function render_get_carrera_posicion(){
			if(isset($this->posicion)){
				if($this->posicion==1){
					$this->posicion=0;
				}elseif($this->posicion==0){
					$this->posicion=1;
				}else{
					$this->posicion=0;
				}
			}else{
				$this->position=0;
			}
			return $this->posicion;
		}
		public function hold_get_posicion(){
			if(isset($this->posicion)){
				if($this->posicion==1){
					$this->posicion=1;
				}elseif($this->posicion==0){
					$this->posicion=0;
				}else{
					$this->posicion=0;
				}
			}else{
				$this->position=0;
			}
			return $this->posicion;
		}

		public function validar_columna(){
			if(isset($this->pasvar)){
				$longitud=strlen($this->pasvar);
				if($longitud<10 && $longitud>0){
					$longitud=1;
				}else{
					$longitud=0;
				}
			} else{
				$longitud=0;
			}
			return $longitud;
		}
		public function validar_columna_get(){
			if(isset($this->pasvar)){
				$longitud=strlen($this->pasvar);
				if($longitud<10 && $longitud>0){
					$col=$this->pasvar;
				}else{
					$col=0;
				}
			} else{
				$col=0;
			}
			return $col;
		}
		



	}






?>