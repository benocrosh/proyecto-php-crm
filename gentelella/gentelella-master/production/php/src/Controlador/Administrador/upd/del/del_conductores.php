<?php
		require_once("../src/modelo/administrador/upd/del/borrar_conductores.php");
		try{
		$intento=new borrar_conductores();
		$intento->delete_conductor();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>