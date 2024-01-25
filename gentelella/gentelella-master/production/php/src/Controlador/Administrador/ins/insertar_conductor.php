<?php
		require_once("../src/modelo/administrador/ins/registro_conductor.php");

		try{
			$intento=new registro_conductor();
			$intento->set_conductor();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>