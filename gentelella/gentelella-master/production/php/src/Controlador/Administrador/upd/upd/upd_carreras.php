<?php
	require_once("../src/modelo/administrador/upd/upd/actualizar_carrera.php");
	try{
			$intento=new actualizar_carrera();
			$intento->update_carrera();
	}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Carreras.php?errtiprev=$errcode");
	}
?>