<?php
		require_once("../src/modelo/administrador/ins/registro_pasajero.php");
		try{
			$intento=new registro_pasajero();
			$intento->set_pasajero();
		}catch(PDOException $e){
				echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
				echo "Esta siendo redirigido...";
				$errcode=$e->getCode();
				sleep(5);
				header("location:Pasajeros.php?errtiprev=$errcode");

		}
?>