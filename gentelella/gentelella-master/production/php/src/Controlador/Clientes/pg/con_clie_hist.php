<?php
      session_start();
      if(!isset($_SESSION["client"])){
        header("location:../index.php");
      } else{

        require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
        require_once("../src/modelo/administrador/shw/mostrar_clientes.php");
        require_once("../src/modelo/administrador/shw/mostrar_carreras.php");
        require_once("../src/modelo/administrador/scr/dates.php");
        require_once("../src/modelo/administrador/scr/uca_union.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        require_once("../src/modelo/administrador/scr/pag.php");
        require_once("../src/modelo/administrador/scr/orders.php");
        $pag=new pag();
        $rows=new pag();
        $part=new pag();

        

        $usuarios=new mostrar_usuarios();
        $clientes=new mostrar_clientes();
        $carreras=new mostrar_carreras();
        $carreraspaginacion=new mostrar_carreras();

        //obtencion de la idusuario afiliada a la sesion
        $usu=trim($_SESSION["client"]);
        $idusu;
        $matrizusuarios=$usuarios->get_usuarios_conductor($usu);
        foreach ($matrizusuarios as $var) {
        	$idusu=$var["idUsuarios"];
        }


        //obtencion de la tabla clientes filtrada por la idusuario y guardada en el array para filtracion futura

        $matrizclientes=$clientes->get_clientes();
        $idcli=array();
        foreach ($matrizclientes as $var) {
        	if($var["Usuarios_idUsuarios"]==$idusu){
        	$idcli[]=['idCliente' => $var["idCliente"]];
        	}
        }


        //obtencion de la cantidad de filas de carrera mediante la filtracion para la futura paginacion
        $confirmar=0;
        $tamano=100;
        $filas_cli=[];
        $filas=$carreras->get_carreras($confirmar);
        foreach ($filas as $vardis) {
        	foreach ($idcli as $vardad) {
        		if($vardis["Cliente_idCliente"]==$vardad["idCliente"]){
        			$filas_cli[]=$vardis;
        		}
        	}
        }

        //obtencion de los numeros necesarios para poder hacer la paginacion correctamente
        $cant=count($filas_cli);
        $rows_count=$rows->tot_pag_historico($cant, $tamano);
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
        $ordenrecibido=$orders->render_get_carrera();
        

        $matrizcarreras=$carreraspaginacion->get_carreras_paginacion_clientes_historico($inicio, $idusu, $ordenrecibido, $tamano);
        
        //calculo de la paginacion
        $partir=$part->emp_pag_historico($inicio, $tamano);
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
        $idxnomcond;

        $unioncobrar=new uca_union();
        $cob=$unioncobrar->union_cobrar_cli_face($idusu);

        $prueba=new dates();
        $mostrarprueba=$prueba->show();

        if(isset($_GET["errtiprev"])){
        $manexc=new Exc_man();
        $displexc=$manexc->manejoexc();
        }

      	require_once("../src/Vista/Clientes/Cliente_Historico.php");
      }


    ?>