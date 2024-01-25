<?php
      session_start();
      if(!isset($_SESSION["admin"])){
        header("location:../index.php");

      } else{
        require_once("../src/modelo/administrador/shw/mostrar_conductores.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
        require_once("../src/modelo/administrador/shw/mostrar_empresa.php");
        require_once("../src/modelo/administrador/scr/pag.php");
        require_once("../src/modelo/administrador/scr/Exc_man.php");
        require_once("../src/modelo/administrador/scr/orders.php");
        //iniacilazacion objetos de paginacion
        $pag=new pag();
        $rows=new pag();
        $part=new pag();
        

        $privilegio=0;
        //inicializacion de objetos 
        $empresa=new mostrar_empresa();
        $usuarios=new mostrar_usuarios();
        $conductorespaginacion=new mostrar_conductores();
        $conductores=new mostrar_conductores();

        //ejecucion de objetos de pagina
        $matrizusuarios=$usuarios->get_usuarios($privilegio);
        $count=0;
        $matrizempresa=$empresa->get_empresa();
       
        //cantidad de paginas para paginacion
        $filas=$conductores->get_conductores();
        $cant=count($filas);
        $rows_count=$rows->tot_pag($cant);
        //creacion get pagina
        $inicio=$pag->paginacion($rows_count);

        $posicionrecibida=new orders();
        $posicionrecibidach=new orders();
        $positionchange=$posicionrecibidach->render_get_carrera_posicion();
        
        $position=$posicionrecibida->hold_get_posicion();
        if($position==1){
            $favicon="fa-long-arrow-up";
        }elseif($position==0){
            $favicon="fa-long-arrow-down";
        }else{
            $favicon="fa-long-arrow-up";
        }
        
        $orders=new orders();
        $validacion=new orders();
        $validacion2=new orders();

        $validacioncol=$validacion->validar_columna();
        $validacioncolumna=$validacion2->validar_columna_get();
        $ordenrecibido=$orders->render_get_conductores();

        //arreglo contenedor tabla
        $matrizconductores=$conductorespaginacion->get_conductores_paginacion($inicio, $cant, $ordenrecibido);
       

        //proceso paginas de inicio y termino en "Entradas desde"
        $partir=$part->emp_pag($inicio);
        if($partir==0){
          $partir=1;
          $terminar=10;
        }elseif($rows_count==$inicio){
          $terminar=$cant;
        } else{
          $terminar=$partir+10;
        }


        $union=new ue_union();
        $idxnomusu;
        $idxnomemp;

        if(isset($_GET["errtiprev"])){
        $manexc=new Exc_man();
        $displexc=$manexc->manejoexc();
        }
        require_once("../src/Vista/Administrador/Registro_Conductores.php");
      }


    ?>