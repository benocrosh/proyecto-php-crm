<?php
      session_start();
      if(!isset($_SESSION["driver"])){
        header("location:../index.php");
      } else{
      	require_once("../src/modelo/administrador/shw/mostrar_conductores.php");
      	require_once("../src/modelo/administrador/shw/mostrar_usuarios.php");
        require_once("../src/modelo/administrador/shw/mostrar_carreras.php");
        require_once("../src/modelo/administrador/scr/uca_union.php");
        require_once("../src/modelo/administrador/scr/ue_union.php");
        require_once("../src/modelo/administrador/scr/dates.php");
        require_once("../src/modelo/administrador/scr/pag.php");
        require_once("../src/modelo/administrador/scr/orders.php");

        $pag=new pag();
        $rows=new pag();
        $part=new pag();

        $unionusu= new ue_union();

        $usu=trim($_SESSION["driver"]);
        $idusu;
        $usuarios=new mostrar_usuarios();
        $matrizusuarios=$usuarios->get_usuarios_conductor($usu);
        foreach ($matrizusuarios as $var) {
        	$idusu=$var["idUsuarios"];
        }

        $conductores=new mostrar_conductores();
		$carreras=new mostrar_carreras();
        $carreraspaginacion=new mostrar_carreras();


        $matrizconductores=$conductores->get_conductores();

        $nomcond;
        $idcond;

        foreach ($matrizconductores as $var) {

        	if($var["Usuarios_idUsuarios"]==$idusu){
        		$nomcond=$var["Nombre"] . " " . $var["Apellido_Paterno"];
        		$idcond=$var["idConductor"];
        		break;
        	} else{
        		$nomcond=$_SESSION["driver"];
        	}
        }

        $confirmar=1;
        $filas_cli=[];
        $cliente=[];
        

        $filas=$carreras->get_carreras($confirmar);
        foreach ($filas as $vardis) {
        	if($vardis["Conductor_idConductor"]==$idcond){
        			$filas_cli[]=$vardis;
        			$cliente[]=["idCliente" => $vardis["Cliente_idCliente"]];
        		}
       	}
        $cant=count($filas_cli);
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
        $ordenrecibido=$orders->render_get_carrera();

        $matrizcarreras=$carreraspaginacion->get_carreras_paginacion_conductor($inicio, $idusu, $ordenrecibido);
        

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
        $idxnomcond;
        
        $prueba=new dates();
        $mostrarprueba=$prueba->show();

        $unionpagar=new uca_union();
        $pag=$unionpagar->union_pagar_cond_face($cliente, $idcond);
        

      	require_once("../src/Vista/Conductores/Conductor.php");
      }


    ?>