<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_direcciones.php");
		try{
		$intento=new actualizar_direcciones();
		$intento->update_direccion();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Direcciones.php?errtiprev=$errcode");
		}
?>