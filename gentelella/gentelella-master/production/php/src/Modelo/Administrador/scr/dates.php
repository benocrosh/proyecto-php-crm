<?php 
	class dates{
		private $cantidaddias;
		private $fechaactual;
		private $base;
		private $quincena;
		private $findemes;
		private $fechas;

		public function __construct(){
			date_default_timezone_set("America/Santiago");
			$this->fechaactual=time();

			
		}

		public function show(){
			$this->cantidaddias=date('t', $this->fechaactual);
			$this->base=strtotime(date('Y-m-01', $this->fechaactual));
			$this->quincena= date('Y-m-15', $this->base);
			$this->findemes= date('Y-m-'.min(date('t', $this->base), 30), $this->base);
			$this->fechas=[];
			$this->fechas[]=["Quincena" => $this->quincena, "FinMes" => $this->findemes];
			return $this->fechas;
		}

		public function render_date($fecha){
			//es un metodo no creado pero en el caso de que sea necesario se haría para cambiar algo de la fecha que se obtendria
			//
				foreach($fecha as $var){
                    $tiempoactual=time();
                    $tiempo=date('Y-m-d', $tiempoactual);

                    if ($tiempo>$var["Quincena"]) {
                      $facturacion=$var["FinMes"];
                    } elseif($tiempo<=$var["Quincena"]){
                      $facturacion=$var["Quincena"];
                    } else{
                      continue;
                    }
                    $fechasalida=new DateTime($facturacion);
                    $fechasalidafinal=$fechasalida->format('Y-m-d');
                    
                }
                
                return $fechasalidafinal;
		}




	}



?>