<?php
		require_once("../src/modelo/administrador/upd/del/borrar_usuarios.php");
		require_once("../src/modelo/administrador/upd/del/borrar_conductores.php");
		require_once("../src/modelo/administrador/upd/del/borrar_clientes.php");

		try{
			$intento=new borrar_usuarios();
			$intento_conductor=new borrar_conductores();
			$intento_cliente=new borrar_clientes();
			$intento->delete_usuario();
			$intento_conductor->delete_conductor_usu();
			$intento_cliente->delete_cliente_usu();

		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Usuarios.php?errtiprev=$errcode");
		}
?>