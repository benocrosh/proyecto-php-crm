<?php
		require_once("../src/modelo/administrador/upd/del/borrar_carreras.php");
		try{
			$intento=new borrar_carreras();
			$intento->delete_carrera();
		} catch(PDOException $e){
				echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
				echo "Esta siendo redirigido...";
				$errcode=$e->getCode();
				sleep(5);
				header("location:Carreras.php?errtiprev=$errcode");
			}
?>