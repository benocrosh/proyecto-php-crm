<?php
      //session_start();
      //if(!isset($_SESSION["admin"])){
       // header("location:../index.php");

     // } else{
        require_once("../src/modelo/administrador/shw/mostrar_conductores.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
        require_once("../src/modelo/administrador/shw/mostrar_empresa.php");
        $privilegio=0;
        $empresa=new mostrar_empresa();
        $usuarios=new mostrar_usuarios();
        $conductores=new mostrar_conductores();
        $matrizusuarios=$usuarios->get_usuarios($privilegio);
        $matrizempresa=$empresa->get_empresa();
        $matrizconductores=$conductores->get_conductores();
        $getid=$_GET["Id"];
        $getnombre=$_GET["nombre"];
        $getapepa=$_GET["Ape_pat"];
        $getapema=$_GET["Ape_mat"];
        require_once("../src/Vista/Administrador/edicion_conductores.php");
     // }


    ?>