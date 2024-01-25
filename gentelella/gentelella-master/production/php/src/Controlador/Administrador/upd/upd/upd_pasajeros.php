<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_pasajeros.php");
		try{	
		$intento=new actualizar_pasajeros();
		$intento->update_pasajero();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Pasajeros.php?errtiprev=$errcode");
		}
?>