<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_conductores.php");
		try{
			$intento=new actualizar_conductores();
			$intento->update_conductor();
		}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>