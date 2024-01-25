<?php
	require_once("../src/modelo/administrador/ins/registro_local.php");
	try{
	$intento=new registro_local();
	$intento->set_local();
	}catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
		header("location:Locales.php?errtiprev=$errcode"); 
	}
?>