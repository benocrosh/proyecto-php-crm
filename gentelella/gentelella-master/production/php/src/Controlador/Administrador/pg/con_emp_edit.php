<?php
      //session_start();
      //if(!isset($_SESSION["admin"])){
       // header("location:../index.php");

     // } else{
        require_once("../src/modelo/administrador/shw/mostrar_empresa.php");
        $privilegio=0;
        $empresa=new mostrar_empresa();
        $matrizempresa=$empresa->get_empresa();
        $getid=$_GET["Id"];
        $getnombre=$_GET["nombre"];
        require_once("../src/Vista/Administrador/edicion_empresa.php");
     // }


    ?>