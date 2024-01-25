<?php
	session_start();
      if(!isset($_SESSION["admin"])){
        header("location:../index.php");
      }else{
      	require_once("../src/modelo/administrador/shw/mostrar_direcciones.php");
        require_once("../src/modelo/administrador/scr/pag.php");
        require_once("../src/modelo/administrador/scr/Exc_man.php");
        require_once("../src/modelo/administrador/scr/orders.php");
        $pag=new pag();
        $rows=new pag();
        $part=new pag();

        


        $direcciones=new mostrar_direcciones();
        $direccionespaginacion=new mostrar_direcciones();


        $filas=$direcciones->get_direcciones();
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
        $ordenrecibido=$orders->render_get_direcciones();

        $matrizdirecciones=$direccionespaginacion->get_direcciones_paginacion($inicio, $cant, $ordenrecibido);
        

        $partir=$part->emp_pag($inicio);
        if($partir==0){
          $partir=1;
          $terminar=10;
        }elseif($rows_count==$inicio){
          $terminar=$cant;
        } else{
          $terminar=$partir+10;
        }
        
        if(isset($_GET["errtiprev"])){
        $manexc=new Exc_man();
        $displexc=$manexc->manejoexc();
        }
        require_once("../src/Vista/Administrador/Registro_Direcciones.php");
      }
	
?>