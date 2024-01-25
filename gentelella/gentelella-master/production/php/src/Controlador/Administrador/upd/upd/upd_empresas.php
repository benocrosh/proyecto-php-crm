<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_empresas.php");
		try{
			$intento=new actualizar_empresas();
			$intento->update_empresa();
		}	catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>