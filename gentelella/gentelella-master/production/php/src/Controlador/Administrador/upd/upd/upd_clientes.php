<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_clientes.php");
		try{
			$intento=new actualizar_clientes();
			$intento->update_cliente();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Clientes.php?errtiprev=$errcode");
		}
?>