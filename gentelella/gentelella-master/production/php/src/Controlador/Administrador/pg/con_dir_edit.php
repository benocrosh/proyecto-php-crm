<?php
	//session_start();
      //if(!isset($_SESSION["admin"])){
     //   header("location:../index.php");
    //  }else{
      	require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        $direcciones=new mostrar_direcciones();
        $matrizdirecciones=$direcciones->get_direcciones();
        $getid=$_GET["Id"];
        $getdireccion=$_GET["direccion"];
        require_once("../src/Vista/Administrador/edicion_direcciones.php");
    //  }
	
?>