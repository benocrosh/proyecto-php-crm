<?php
	class send{
		private $fecha;
		private $nom_pasajero;
		private $dir_ingreso;
		private $dir_salida;
		private $notas;
		private $body_text;
		private $destinatario;
		private $asunto;
		private $headers;
		private $sesiondada;

		public function __construct(){
			$this->fecha= isset($_POST["Fecha"]) ? $_POST["Fecha"] : null;
			$this->nom_pasajero= isset($_POST["nom_pasajero"]) ? $_POST["nom_pasajero"] : null;
			$this->dir_ingreso= isset($_POST["dir_ingreso"]) ? $_POST["dir_ingreso"] : null;
			$this->dir_salida= isset($_POST["dir_salida"]) ? $_POST["dir_salida"] : null;
			$this->notas= isset($_POST["notas"]) ? $_POST["notas"] : null;
			$this->sesiondada= isset($_POST["nom_client"]) ? $_POST["nom_client"] : null;
		}

		public function enviar_mail(){
			if(isset($this->fecha) && isset($this->nom_pasajero) && isset($this->dir_ingreso) && isset($this->dir_salida)){
				$this->body_text="Fecha y Hora: " . trim($this->fecha) . "\r\n";
				$this->body_text.="Nombre Pasajero: " . trim($this->nom_pasajero) . "\r\n";
				$this->body_text.="Direccion Ingreso: " . trim($this->dir_ingreso) . "\r\n";
				$this->body_text.="Direccion Salida: " . trim($this->dir_salida) . "\r\n";
				if(isset($this->notas)){
					$this->body_text.="Notas: " . trim($this->notas) . "\r\n";	
				}else{
					$this->body_text.="Notas: Nada\r\n";
				}
				
				

				$this->asunto="Solicitud de carrera: " . trim($this->sesiondada);
				$this->destinatario="nestor@transportesagma.cl";

				$this->headers="MIME-Version: 1.0\r\n";
				$this->headers.="Content-type: text/html; charset=iso-8859-1\r\n";
				$this->headers.="From: " . trim($this->sesiondada) . " < Solicitud@transportesagma.cl > \r\n";

				$envio=mail($this->destinatario, $this->asunto, $this->body_text, $this->headers);

				if(!$envio){
					echo "Se presento un problema al enviar la información";
					sleep(5);
					header("location:index.php");
				}else{
					echo "Envio exitoso";
					sleep(5);
					header("location:index.php#request_travel");
				}
			} else{
				echo "Error en el ingreso de la información";
				sleep(5);
				header("location:index.php");
			}
			


		}
	}

?>