<?php
		require_once("../src/modelo/administrador/upd/upd/actualizar_usuarios.php");
		try{
			$intento=new actualizar_usuarios();
			$intento->update_usuario();
		}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Usuarios.php?errtiprev=$errcode");
		}

?>