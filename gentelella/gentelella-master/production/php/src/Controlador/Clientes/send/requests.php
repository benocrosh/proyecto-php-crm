<?php
	$count=0;
	$countto=0;
	session_start();
      if(!isset($_SESSION["client"])){
        header("location:../index.php");
		      } else{
		      	do{
		      		$countto++;
		      		if($countto==10){
		      			echo "Error al ingresar información";
		      			header("location:../index.php");
		      			break;
		      		}
						      	if(isset($_POST["solicitar_viaje"])){
						      	require_once("../src/controlador/clientes/send/envio.php");
								$count=1;
								}
				}while($count==0);
	}


?>