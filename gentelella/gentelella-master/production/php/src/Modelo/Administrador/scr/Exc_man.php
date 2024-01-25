<?php
	class Exc_man{
		private $varurl;
		public function __construct(){
			$this->varurl= isset($_GET["errtiprev"]) ? $_GET["errtiprev"] : null;
		}
		public function manejoexc(){
			if($this->varurl==400){
				$mensaje="Error al procesar la información";
			}
			elseif($this->varurl==500){
				$mensaje="El nombre del usuario ya existe";
			}elseif($this->varurl==600){
				$mensaje="El mail ya existe";
			}elseif($this->varurl==700){
				$mensaje="El nombre ingresado ya existe";
			}elseif($this->varurl==800){
				$mensaje="Falta información para determinar el error";
			}elseif($this->varurl==900){
				$mensaje="Información ingresada faltante o corrupta";
			}elseif($this->varurl==1000){
				$mensaje="Error al ingresar la información en la base de datos";
			}elseif($this->varurl==23000){
				$mensaje="Usuario inactivo, posible duplicado de palabra en índice";
			}elseif($this->varurl==30000){
				$mensaje="Usuario y/o Contraseña incorrectos";
			}else{
				$mensaje="No se concreta el error";
			}
			return $mensaje;
		}
	}

?>