<?php
      //session_start();
      //if(!isset($_SESSION["admin"])){
       // header("location:../index.php");
      //} else{
        require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        $privilegio=1;
        $usuarios=new mostrar_usuarios();
        $clientes=new mostrar_clientes();
        $matrizusuarios=$usuarios->get_usuarios($privilegio);
        $matrizclientes=$clientes->get_clientes();
        $getid=$_GET["Id"];
        $getnombre=$_GET["nombre"];
        $getdincond=$_GET["din_cond"];
        $getdincli=$_GET["din_cli"];
        require_once("../src/Vista/Administrador/edicion_clientes.php");
      //}


    ?>