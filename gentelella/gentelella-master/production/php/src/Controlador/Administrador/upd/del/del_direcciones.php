<?php
		require_once("../src/modelo/administrador/upd/del/borrar_direcciones.php");
		try{
		$intento=new borrar_direcciones();
		$intento->delete_direccion();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Direcciones.php?errtiprev=$errcode");
		}
?>