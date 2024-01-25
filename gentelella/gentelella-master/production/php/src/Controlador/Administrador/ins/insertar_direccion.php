<?php
		require_once("../src/modelo/administrador/ins/registro_direccion.php");
		try{
			$intento=new registro_direccion();
			$intento->set_direccion();
		}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Direcciones.php?errtiprev=$errcode");
	}
?>