<?php
		require_once("../src/modelo/administrador/upd/del/borrar_empresas.php");
		
		try{
			$intento=new borrar_empresas();
			$intento->delete_empresa();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Conductores.php?errtiprev=$errcode");
		}
?>