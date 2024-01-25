<?php
	class uca_union{
		private $carreras;
		private $clientes;
		//private $acumuladomaxcob;
		//private $acumuladomaxpag;

			public function __construct(){
				require_once("../src/modelo/administrador/shw/mostrar_carreras.php");
				require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
				$this->carreras=new mostrar_carreras();
				$this->clientes=new mostrar_clientes();
			}


			public function union_cobrar(){
				$confimar=1;
				$compcarrcob=$this->carreras->get_carreras($confimar);
				$idcarrxusucob;
				$suma=0;
				$acumuladomaxcob=0;
				
				foreach ($compcarrcob as $info) {
					if($info["Estado"]==1){
						$idcarrxusucob=$info["Cliente_idCliente"];
						$compid=$this->clientes->get_clientes_id($idcarrxusucob);
						$suma=0;
						foreach ($compid as $clientescomp) {
							if(isset($clientescomp)){
								$kil=$info["Kilometraje"];
								$peaj=$info["Peajes"];
								$npasj=$info["NPasajeros"];
								$dinco=$clientescomp["Dinero_Cliente"];
								$suma=$kil * $dinco;
								$suma+= $peaj;	
															
							}
						}
						$acumuladomaxcob+= $suma;
					}
				}
				return $acumuladomaxcob;

			}


			public function union_pagar(){
				$confimar=1;
				$compcarrpag=$this->carreras->get_carreras($confimar);
				$idcarrxusu;
				$sumapag=0;
				$acumuladomaxpag=0;
				foreach ($compcarrpag as $info) {
					if($info["Estado"]==1){
						$idcarrxusu=$info["Cliente_idCliente"];
						$compidpag=$this->clientes->get_clientes_id($idcarrxusu);
						$sumapag=0;
						foreach ($compidpag as $clientescomp) {
							if(isset($clientescomp)){
								$kil=$info["Kilometraje"];
								$peaj=$info["Peajes"];
								$npasj=$info["NPasajeros"];
								$dinpag=$clientescomp["Dinero_Conductor"];
								$sumapag=$kil * $dinpag;
								$sumapag+= $peaj;	
															
							}
						}
						$acumuladomaxpag+= $sumapag;
					}
				}
				return $acumuladomaxpag;

				
			}

			public function union_cobrar_cli_face($idusu){
				$identregada=$idusu;
				$compcarrpag=$this->carreras->get_carreras_cobxpag_clientes($identregada);
				$idcarrxusu;
				$sumapag=0;
				$acumuladomaxpag=0;
				foreach ($compcarrpag as $info) {
					if($info["Estado"]==1){
						$idcarrxusu=$info["Cliente_idCliente"];
						$compidpag=$this->clientes->get_clientes_id($idcarrxusu);
						$sumapag=0;
						foreach ($compidpag as $clientescomp) {
							if(isset($clientescomp)){
								$kil=$info["Kilometraje"];
								$peaj=$info["Peajes"];
								$npasj=$info["NPasajeros"];
								$dinpag=$clientescomp["Dinero_Cliente"];
								$sumapag=$kil * $dinpag;
								$sumapag+= $peaj;	
															
							}
						}
						$acumuladomaxpag+= $sumapag;
					}
				}
				return $acumuladomaxpag;

				
			}

			public function union_pagar_cond_face($idcli, $idcond){
				//$identregada=[];
				//$identregada[]=["idCliente" => $idcli];
				$compcarrpag=$this->carreras->get_carreras_cobxpag_conductor($idcond);
				$sumapag=0;
				$acumuladomaxpag=0;
				foreach ($compcarrpag as $info) {
					if($info["Estado"]==1 && $info["Conductor_idConductor"]==$idcond){
						$sumapag=0;
						foreach ($idcli as $matriz) {
							if($info["idCliente"]==$matriz["idCliente"]){
							$kil=$info["Kilometraje"];
							$peaj=$info["Peajes"];
							$npasj=$info["NPasajeros"];
							$dinpag=$info["Dinero_Conductor"];
							$sumapag=$kil * $dinpag;
							$sumapag+= $peaj;	
															
							
							
								}
							}

						}
					$acumuladomaxpag+= $sumapag;
				}
				return $acumuladomaxpag;

				
			}



	}


?>