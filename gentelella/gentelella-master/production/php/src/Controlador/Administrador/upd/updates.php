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
						      	if(isset($_POST["upd_carrera"])){
						require_once("../src/controlador/administrador/upd/upd/upd_carreras.php");
						$count=1;
						}
								if(isset($_POST["upd_local"])){
						require_once("../src/controlador/administrador/upd/upd/upd_locales.php");
						$count=1;
						}
								if(isset($_POST["upd_pasajero"])){
						require_once("../src/controlador/administrador/upd/upd/upd_pasajeros.php");
						$count=1;
						}
								if(isset($_POST["upd_cliente"])){
						require_once("../src/controlador/administrador/upd/upd/upd_clientes.php");
						$count=1;
						}
								if(isset($_POST["upd_conductor"])){
						require_once("../src/controlador/administrador/upd/upd/upd_conductores.php");
						$count=1;
						}
								if(isset($_POST["upd_empresa"])){
						require_once("../src/controlador/administrador/upd/upd/upd_empresas.php");
						$count=1;
						}
								if(isset($_POST["upd_direccion"])){
						require_once("../src/controlador/administrador/upd/upd/upd_direcciones.php");
						$count=1;
						}
								if(isset($_POST["upd_usuario"])){
						require_once("../src/controlador/administrador/upd/upd/upd_usuarios.php");
						$count=1;
						}

				}while($count==0);
	}


?>