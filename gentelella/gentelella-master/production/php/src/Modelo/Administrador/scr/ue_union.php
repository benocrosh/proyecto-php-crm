<?php
	class ue_union{
		private $usuario_conductor;
		private $empresa_conductor;
		private $cliente_direccion;
		private $usuario_cliente;
		private $conductor_final;

		public function __construct(){
			require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
			require_once("../src/modelo/administrador/shw/mostrar_empresa.php");
			require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
			require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
			require_once("../src/modelo/administrador/shw/mostrar_conductores.php");
			$this->usuario_conductor=new mostrar_usuarios();
			$this->empresa_conductor=new mostrar_empresa();
			$this->cliente_direccion=new mostrar_direcciones();
			$this->usuario_cliente=new mostrar_clientes();
			$this->conductor_final=new mostrar_conductores();
			}
		//inicializacion de las variables para buscar los id correspondientes a los nombre de usuarios

		public function union_id_usuario($nombre_usuario){
					$buscar_usuario;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($nombre_usuario as $indicador){
						if(isset($indicador)){
						$buscar_usuario=$indicador;
						}
					}
					$identificador=$this->usuario_conductor->get_usuarios_conductor($buscar_usuario);
					$idusuario=0;
					foreach ($identificador as $registro) {
						if($registro["User"]==$buscar_usuario)
						$idusuario=$registro["idUsuarios"];
					}
					return $idusuario;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}
		public function union_id_empresa($nombre_empresa){
			$buscar_empresa;
			foreach ($nombre_empresa as $indicador) {
						if(isset($indicador)){
							$buscar_empresa=$indicador;
						}
					}
					
					$identificador_empresa=$this->empresa_conductor->get_empresa_conductor($buscar_empresa);
					$idempresa=0;
					foreach ($identificador_empresa as $registro) {
						$idempresa=$registro["idEmpresa_Transporte"];
					}
					return $idempresa;
		}
		public function union_id_direccion($direccion){
					$buscar_direccion;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($direccion as $indicador){
						if(isset($indicador)){
						$buscar_direccion=$indicador;
						}
					}
					$identificador=$this->cliente_direccion->get_direcciones_nombre($buscar_direccion);
					$iddireccion=0;
					foreach ($identificador as $registro) {
						if($registro["Direccion"]==$buscar_direccion)
						$iddireccion=$registro["idDirecciones"];
					}
					return $iddireccion;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}

		public function union_id_cliente($cliente){
					$buscar_cliente;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($cliente as $indicador){
						if(isset($indicador)){
						$buscar_cliente=$indicador;
						}
					}
					$identificador=$this->usuario_cliente->get_cliente_nombre($buscar_cliente);
					$idcliente=0;
					foreach ($identificador as $registro) {
						if($registro["Nombre"]==$buscar_cliente)
						$idcliente=$registro["idCliente"];
					}
					return $idcliente;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}
		public function union_id_conductor($conductor){
					$buscar_conductor;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($conductor as $indicador){
						if(isset($indicador)){
						$buscar_conductor=$indicador;
						}
					}
					$identificador=$this->conductor_final->get_conductores_nombre($buscar_conductor);
					$idconductor=0;
					foreach ($identificador as $registro) {
						if($registro["Nombre"]==$buscar_conductor)
						$idconductor=$registro["idConductor"];
					}
					return $idconductor;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}
				public function union_id_conductor_2($conductor){
					$buscar_conductor;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($conductor as $indicador){
						if(isset($indicador)){
						$buscar_conductor=$indicador;
						}
					}
					$identificador=$this->conductor_final->get_conductores_id($buscar_conductor);
					$idconductor=0;
					foreach ($identificador as $registro) {
						if($registro["idConductor"]==$buscar_conductor)
						$idconductor=$registro["idConductor"];
					}
					return $idconductor;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}
				public function union_idxnom_conductor($idconductor){
					$buscar_conductor;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					foreach($idconductor as $indicador){
						if(isset($indicador)){
						$buscar_conductor=$indicador;
						}
					}
					$identificador=$this->conductor_final->get_conductores_id($buscar_conductor);
					$idconductor=0;
					foreach ($identificador as $registro) {
						if($registro["idConductor"]==$buscar_conductor)
						$nomconductor=$registro["Nombre"] . " " . $registro["Apellido_Paterno"];
					}
					return $nomconductor;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}
				public function union_idxnom_cliente($idcliente){
					$buscar_cliente=$idcliente;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					/**foreach($idcliente as $indicador){
						if(isset($indicador)){
						$buscar_cliente=$indicador;
						}
					}**/
					$identificador=$this->usuario_cliente->get_clientes_id($buscar_cliente);
					$idclientenom;
					foreach ($identificador as $registro) {
						if($registro["idCliente"]==$buscar_cliente){
						$idclientenom=$registro["Nombre"];
						}
					}
					return $idclientenom;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}

				public function union_idxnom_direccion($direccion){
					$buscar_direccion=$direccion;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					/**foreach($direccion as $indicador){
						if(isset($indicador)){
						$buscar_direccion=$indicador;
						}
					}**/
					$identificador=$this->cliente_direccion->get_direcciones_id($buscar_direccion);
					$nomdireccion;
					foreach ($identificador as $registro) {
						if($registro["idDirecciones"]==$buscar_direccion)
						$nomdireccion=$registro["Direccion"];
					}
					return $nomdireccion;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}

				public function union_idxnom_usuario($nombre_usuario){
					$buscar_usuario=$nombre_usuario;
					//iteracion para guardar el valor de lo puesto en los post -- a partir de este punto empieza el proceso de unir los usuarios a la id
					/**foreach($nombre_usuario as $indicador){
						if(isset($indicador)){
						$buscar_usuario=$indicador;
						}
					}**/
					$identificador=$this->usuario_conductor->get_usuarios_id($buscar_usuario);
					$nomusuario;
					foreach ($identificador as $registro) {
						if($registro["idUsuarios"]==$buscar_usuario)
						$nomusuario=$registro["User"];
					}
					return $nomusuario;
				//finalizacion proceso adjuntar id con nombres de los usuarios
				}

				public function union_idxnom_empresa($id_empresa){
					$buscar_empresa=$id_empresa;
					/**foreach ($nombre_empresa as $indicador) {
							if(isset($indicador)){
								$buscar_empresa=$indicador;
							}
						}
						**/
						$identificador_empresa=$this->empresa_conductor->get_empresa_id($buscar_empresa);
						$idempresa;
						foreach ($identificador_empresa as $registro) {
							$idempresa=$registro["Nombre"];
						}
						return $idempresa;
				}

				public function union_idxid_usuxcond($id_usu){
					$buscar_usuario=$id_usu;
					$bool;
					$identificador_conductor=$this->conductor_final->get_conductores();
					foreach ($identificador_conductor as $var) {
						if($var["Usuarios_idUsuarios"]==$buscar_usuario){
							$bool=1;
							break;
						} else{
							$bool=0;
						}
					}
					return $bool;



						
				}


				

	}

?>