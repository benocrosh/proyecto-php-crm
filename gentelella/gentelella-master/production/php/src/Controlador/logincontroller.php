<?php
	session_start();
	if(isset($_SESSION["admin"])){
		header("location:administrador/index.php");
	} else{
			if(isset($_SESSION["client"])){
			header("location:cliente/index.php");
			} else{ 
					if(isset($_SESSION["driver"])){
					header("location:conductor/index.php");
					}else{
						session_destroy();
						require_once("src/modelo/administrador/scr/Exc_man.php");
						if(isset($_GET["errtiprev"])){
				        $manexc=new Exc_man();
				        $displexc=$manexc->manejoexc();
				        }
						require_once("src/Vista/login.php");
					}
			}
			
		}
	

?>