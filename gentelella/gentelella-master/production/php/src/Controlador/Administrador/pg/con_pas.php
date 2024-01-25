<?php
      session_start();
      if(!isset($_SESSION["admin"])){
        header("location:../index.php");
      }else{
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/shw/mostrar_pasajeros.php");
        require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        require_once("../src/modelo/administrador/scr/orders.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        require_once("../src/modelo/administrador/scr/pag.php");
        $pag=new pag();
        $rows=new pag();
        $part=new pag();

        

        $privilegio=1;


        $pasajeros=new mostrar_pasajeros();
        $pasajerospaginacion=new mostrar_pasajeros();
        $clientes=new mostrar_clientes();
        $direcciones=new mostrar_direcciones();


        $matrizclientes=$clientes->get_clientes();
        $matrizdirecciones=$direcciones->get_direcciones();
       


        $filas=$pasajeros->get_pasajeros();
        $cant=count($filas);
        $rows_count=$rows->tot_pag($cant);
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
        $ordenrecibido=$orders->render_get_pasajeros();

        $matrizpasajeros=$pasajerospaginacion->get_pasajeros_paginacion($inicio, $cant, $ordenrecibido);
        

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
        $idxnomclie;
        $idxnomdir;
        
        if(isset($_GET["errtiprev"])){
        $manexc=new Exc_man();
        $displexc=$manexc->manejoexc();
        }
        require_once("../src/Vista/Administrador/Registro_Pasajeros.php");
      }


    ?>