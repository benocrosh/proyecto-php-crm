<?php
	session_start();
      if(!isset($_SESSION["admin"])){
        header("location:../index.php");
      }else{
      	require_once("../src/modelo/administrador/scr/uca_union.php");
            require_once("../src/modelo/administrador/scr/dates.php");
      	$unionpagar=new uca_union();
      	$unioncobrar=new uca_union();
      	$pag=$unionpagar->union_pagar();
      	$cob=$unioncobrar->union_cobrar();

            $prueba=new dates();
            $mostrarprueba=$prueba->show();
      	
      	require_once("../src/Vista/Administrador/index.php");
      }
	
?>