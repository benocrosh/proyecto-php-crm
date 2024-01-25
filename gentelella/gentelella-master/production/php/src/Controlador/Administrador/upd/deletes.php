<?php
	$count=0;
	$countto=0;
	session_start();
      if(!isset($_SESSION["admin"])){
        header("location:../index.php");
		      } else{
		      	do{
		      		$countto++;
		      		if($countto==10){
		      			echo "Error al procesar la informacion";
						echo "<script>setTimeout(\"location.href = 'http://localhost/php/gentelella-master/production/php/administrador/index.php';\",1500);</script>";
		      			break;
		      		}
						      	if(isset($_GET["del_carrera"])){
						require_once("../src/controlador/administrador/upd/del/del_carreras.php");
						$count=1;
						}		if(isset($_GET["del_local"])){
						require_once("../src/controlador/administrador/upd/del/del_locales.php");
						$count=1;
						}		if(isset($_GET["del_pasajero"])){
						require_once("../src/controlador/administrador/upd/del/del_pasajeros.php");
						$count=1;
						}		if(isset($_GET["del_cliente"])){
						require_once("../src/controlador/administrador/upd/del/del_clientes.php");
						$count=1;
						}		if(isset($_GET["del_conductor"])){
						require_once("../src/controlador/administrador/upd/del/del_conductores.php");
						$count=1;
						}		if(isset($_GET["del_empresa"])){
						require_once("../src/controlador/administrador/upd/del/del_empresas.php");
						$count=1;
						}		if(isset($_GET["del_direccion"])){
						require_once("../src/controlador/administrador/upd/del/del_direcciones.php");
						$count=1;
						}		if(isset($_GET["del_usuario"])){
						require_once("../src/controlador/administrador/upd/del/del_usuarios.php");
						$count=1;
						}
								
				}while($count==0);
	}


?>