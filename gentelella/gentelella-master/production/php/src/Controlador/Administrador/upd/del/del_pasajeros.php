<?php
		require_once("../src/modelo/administrador/upd/del/borrar_pasajeros.php");
		try{
		$intento=new borrar_pasajeros();
		$intento->delete_pasajero();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Pasajeros.php?errtiprev=$errcode");
		}
?>