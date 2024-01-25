<?php
		require_once("../src/modelo/administrador/ins/registro_empresa.php");

		try{
			$intento=new registro_empresa();
			$intento->set_empresa();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>