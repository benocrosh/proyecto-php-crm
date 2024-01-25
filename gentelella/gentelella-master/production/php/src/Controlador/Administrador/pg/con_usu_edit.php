<?php
	//session_start();
      //if(!isset($_SESSION["admin"])){
      //  header("location:../index.php");
    //  }else{
      	
      	require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
		$usuarios=new mostrar_usuarios();
		$matrizusuarios=$usuarios->get_usuarios_estado();
        $getid=$_GET["Id"];
        $getusuario=$_GET["user"];
        $getmail=$_GET["mail"];

		require_once("../src/Vista/Administrador/edicion_usuarios.php");
  //    }
	
?>