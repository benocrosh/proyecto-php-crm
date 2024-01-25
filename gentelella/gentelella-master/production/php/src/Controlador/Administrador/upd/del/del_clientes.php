<?php
		require_once("../src/modelo/administrador/upd/del/borrar_clientes.php");
		try{
		$intento=new borrar_clientes();
		$intento->delete_cliente();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Clientes.php?errtiprev=$errcode");
		}
?>