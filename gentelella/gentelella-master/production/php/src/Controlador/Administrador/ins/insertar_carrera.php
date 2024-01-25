<?php
		require_once("../src/modelo/administrador/ins/ingreso_carrera.php");
		
	  	try{
			$intento=new ingreso_carrera();
			$intento->set_carrera();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Carreras.php?errtiprev=$errcode");
	}
	
?>