<?php
	  	require_once("../src/modelo/administrador/ins/registro_usuario.php");
		
	  	try{
			$intento=new registro_usuario();
			$intento->set_usuarios();
		} catch(PDOException $e){
			echo "Fallo en el ingreso de la informacion " . $e->getMessage() . (int)$e->getCode();
			echo "Esta siendo redirigido...";
			$errcode=$e->getCode();
			sleep(5);
			header("location:Usuarios.php?errtiprev=$errcode");
		}
    
?>