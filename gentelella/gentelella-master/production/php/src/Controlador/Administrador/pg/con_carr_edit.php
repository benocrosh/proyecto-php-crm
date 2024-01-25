<?php
   //   session_start();
   //   if(!isset($_SESSION["admin"])){
    //    header("location:../index.php");
     // }else{
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/shw/mostrar_conductores.php");
        require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        $privilegio=1;
        $clientes=new mostrar_clientes();
        $conductores=new mostrar_conductores();
        $direcciones=new mostrar_direcciones();
        $matrizclientes=$clientes->get_clientes();
        $matrizconductores=$conductores->get_conductores();
        $matrizdirecciones=$direcciones->get_direcciones();
        $getid=$_GET["Id"];
        $getfecha=$_GET["fecha"];
        $getnumpas=$_GET["pasaj"];
        $getkilre=$_GET["kilo"];
        $getpea=$_GET["peaj"];
        require_once("../src/Vista/Administrador/edicion_carrera.php");

     // }


    ?>