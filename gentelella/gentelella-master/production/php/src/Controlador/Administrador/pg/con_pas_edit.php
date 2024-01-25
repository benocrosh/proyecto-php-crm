<?php
      //session_start();
      //if(!isset($_SESSION["admin"])){
       // header("location:../index.php");
      //}else{
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/shw/mostrar_pasajeros.php");
        require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        $privilegio=1;
        $pasajeros=new mostrar_pasajeros();
        $clientes=new mostrar_clientes();
        $direcciones=new mostrar_direcciones();
        $matrizclientes=$clientes->get_clientes();
        $matrizdirecciones=$direcciones->get_direcciones();
        $matrizpasajeros=$pasajeros->get_pasajeros();
        $getid=$_GET["Id"];
        $getnombre=$_GET["nombre"];
        $getapepa=$_GET["Ape_pat"];
        $getapema=$_GET["Ape_mat"];
        $gettel=$_GET["Tel"];
        require_once("../src/Vista/Administrador/edicion_pasajero.php");
      //}


    ?>