<?php
		require_once("../src/modelo/administrador/ins/registro_cliente.php");

		try{
			$intento=new registro_cliente();
			$intento->set_cliente();
		}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Clientes.php?errtiprev=$errcode");
		}
?>