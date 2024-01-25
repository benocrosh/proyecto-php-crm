<?php
		require_once("../src/modelo/administrador/upd/del/borrar_locales.php");
		try{
		$intento=new borrar_locales();
		$intento->delete_local();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Locales.php?errtiprev=$errcode");
		}
?>