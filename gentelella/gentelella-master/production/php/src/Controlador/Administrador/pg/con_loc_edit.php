<?php
      //session_start();
      //if(!isset($_SESSION["admin"])){
        //header("location:../index.php");
      //}else{
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/shw/mostrar_locales.php");
        require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        $privilegio=1;
        $locales=new mostrar_locales();
        $clientes=new mostrar_clientes();
        $direcciones=new mostrar_direcciones();
        $matrizclientes=$clientes->get_clientes();
        $matrizdirecciones=$direcciones->get_direcciones();
        $matrizlocales=$locales->get_locales();
        $getid=$_GET["Id"];
        $getlocal=$_GET["local"];
        require_once("../src/Vista/Administrador/edicion_local.php");

      //}


    ?>