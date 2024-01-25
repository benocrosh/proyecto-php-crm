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
						      	if(isset($_GET["upd_carrera"])){
						require_once("con_carr_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_local"])){
						require_once("con_loc_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_pasajero"])){
						require_once("con_pas_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_cliente"])){
						require_once("con_cli_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_conductor"])){
						require_once("con_cond_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_empresa"])){
						require_once("con_emp_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_direccion"])){
						require_once("con_dir_edit.php");
						$count=1;
						}
								if(isset($_GET["upd_usuario"])){
						require_once("con_usu_edit.php");
						$count=1;
						}

				}while($count==0);
	}


?>	