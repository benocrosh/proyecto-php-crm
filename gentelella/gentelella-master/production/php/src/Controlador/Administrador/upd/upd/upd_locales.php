<?php
			require_once("../src/modelo/administrador/upd/upd/actualizar_locales.php");
			try{
				$intento=new actualizar_locales();
				$intento->update_local();
			} catch(PDOException $e){
				echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
				echo "Esta siendo redirigido...";
				$errcode=$e->getCode();
				sleep(5);
				header("location:Locales.php?errtiprev=$errcode");
			}
?>	