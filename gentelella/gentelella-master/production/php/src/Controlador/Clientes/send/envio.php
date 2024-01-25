<?php
		session_start();
		require_once("../src/modelo/clientes/scr/send.php");

		try{
			$intento=new send();
			$intento->enviar_mail();
		}catch(Exception $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . $e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:index.php?errtiprev=$errcode");
		}

?>