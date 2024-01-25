<?php
	require_once("src/modelo/comprueba_login.php");

	if($_POST["enviar"]){
			try {
			$intento=new comprueba_login();
			$intento->comprobar_login();
			
			} catch (Exception $e) {
				$errcode=$e->getCode();
				header("location:index.php?errtiprev=$errcode");
			}
		}else{
			header("location:index.php");
		}
?>