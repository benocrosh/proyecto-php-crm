<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Transportes AGMA | </title>

    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet"></head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <!-- aqui hay que poner una etiqueta php para poder mostrar quien es el que ingreso(referente al privilegio)-->
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Administrador</span></a>
            </div>

            <div class="clearfix"></div>

                        <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Bienvenido,</span>
                <!-- aqui hay que poner una etiqueta php para ingresar el usuario registrado-->
                <h2><?php echo $_SESSION["admin"]; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                  <li><a><i class="fa fa-list-alt"></i> Ingresos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Usuarios.php">Usuarios</a></li>
                      <li><a href="Clientes.php">Clientes</a></li>
                      <li><a href="Conductores.php">Conductores</a></li>
                      <li><a href="Direcciones.php">Direcciónes</a></li>
                      <li><a href="Locales.php">Locales</a></li>
                      <li><a href="Pasajeros.php">Pasajeros</a></li>
                      <li><a href="Carreras.php">Carreras</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <?php echo $_SESSION["admin"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Carreras</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ingreso de Carreras</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if(isset($displexc)):?>
                  <div class="x_content bs-example-popovers">
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>A ocurrido un error en el ingreso...</strong> Has tenido un error tipo <?php echo $displexc;?>
                  </div>
                  </div>
                  <?php endif;?>
                    <br />
                    <form action="inusform.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Conductor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="ConductorIngreso[]">
                            <?php foreach($matrizconductores as $registro):?>
                              <option value="<?php echo $registro["idConductor"];?>"><?php echo $registro["Nombre"] . " " . $registro["Apellido_Paterno"];?></option>
                            <?php
                            endforeach; 
                            ?>
                          </select>
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                        <div class="form-group">
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Cliente <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="ClienteIngreso[]">
                            <?php foreach($matrizclientes as $registro):?>
                            <option value="<?php echo $registro["Nombre"];?>"><?php echo $registro["Nombre"];?></option>
                            <?php
                            endforeach; 
                            ?>
                          </select>
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                        <div class="form-group">
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Fecha </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type='text' class="form-control" name="Ingreso_Fecha" id="Ingreso_Fecha" />
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                        </div>
                      </div>
                      <!-- aqui termina el registro del usuario-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección de Inicio</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="MDireccionini[]">
                            <?php foreach($matrizdirecciones as $registro):?>
                            <option value="<?php echo $registro["Direccion"];?>"><?php echo $registro["Direccion"];?></option>
                            <?php
                            endforeach; 
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección de Término </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="MDireccionter[]">
                            <?php foreach($matrizdirecciones as $registro):?>
                            <option value="<?php echo $registro["Direccion"];?>"><?php echo $registro["Direccion"];?></option>
                            <?php
                            endforeach; 
                            ?>
                          </select>
                        </div>
                      </div>
                        <div class="form-group">
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Numero de Pasajeros <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="num_pasajeros" name="num_pasajeros" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                        <div class="form-group">
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Kilometros Recorridos <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step="0.01" id="kilometros" name="kilometros" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                        <!-- Aqui se puso el ingreso de la nombre del pasajero-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Peajes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="peajes" name="peajes" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input  class="btn btn-success" type="submit" name="enviar_carrera" value="Registrar Carrera">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Carrera</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="Edit" name="Edit">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="overflow-x: auto">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=id&pos=<?php echo $positionchange;?>#Edit">Id <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=fecha&pos=<?php echo $positionchange;?>#Edit">Fecha <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=dir_ini&pos=<?php echo $positionchange;?>#Edit">Dirección Inicial <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=dir_fin&pos=<?php echo $positionchange;?>#Edit">Dirección Final <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=kil&pos=<?php echo $positionchange;?>#Edit">Kilometros Recorridos <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=pas&pos=<?php echo $positionchange;?>#Edit">Cantidad Pasajeros <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=peaj&pos=<?php echo $positionchange;?>#Edit">Peajes <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=cond&pos=<?php echo $positionchange;?>#Edit">Conductor <i class="fa <?php echo $favicon;?>"></i></a></th>
                                    <th><a href="Carreras.php?pag=<?php echo $inicio?>&col=clie&pos=<?php echo $positionchange;?>#Edit">Cliente <i class="fa <?php echo $favicon;?>"></i></a></th>
                                  </tr>
                                </thead>


                                <tbody>
                                  <?php foreach($matrizcarreras as $datos):
                                      if(isset($datos["Conductor_idConductor"]) && isset($datos["Cliente_idCliente"])){
                                        $var=$datos["Cliente_idCliente"];
                                        $idxnomclie=$union->union_idxnom_cliente($var);
                                        $idxnomcond=$union->union_idxnom_conductor($datos);
                                        $date=new DateTime($datos["Fecha"]);

                                        
                                      }
                                    ?>
                                  <tr>
                                    <td><?php echo $datos["idCarrera"];?></td>
                                    <td><?php echo $date->format('d/m/Y');?></td>
                                    <td><?php echo $datos["Direccion_Inicial"];?></td>
                                    <td><?php echo $datos["Direccion_Final"];?></td>
                                    <td><?php echo $datos["Kilometraje"];?></td>
                                    <td><?php echo $datos["NPasajeros"];?></td>
                                    <td><?php echo $datos["Peajes"];?></td>
                                    <td><?php echo $idxnomcond;?></td>
                                    <td><?php echo $idxnomclie;?></td>

                                    <td><a href="borrar.php?Id=<?php echo $datos["idCarrera"] ?> & del_carrera=1"><input class='btn btn-success' type='button' name='del_carrera' id='del_carrera' value='Borrar' onclick='return confirm("¿Estas seguro de querer borrar el registro?");'/></a></td>
                                    <td><a href="Edicion.php?Id=<?php echo $datos["idCarrera"] ?> & fecha=<?php echo $datos["Fecha"] ?> & pasaj=<?php echo $datos["NPasajeros"] ?> & kilo=<?php echo $datos["Kilometraje"] ?> & peaj=<?php echo $datos["Peajes"] ?> & upd_carrera=1"><input class='btn btn-success' type='button' name='upd_carrera' id='upd_carrera' value='Editar'/></td>
                                  </tr>
                                <?php endforeach; 
                                ?>
                                </tbody>
                              </table>
                              </div>
                              <div class="clearfix"></div>
                             <div class="row">
                               <div class="col-md-12 col-sm-5">
                                 <a href="Historico.php"><button type="button" class="btn btn-success btn-sm pull-right" id="historic" name="historic"><h4>Historial Historico</h4></button></a>
                               </div>
                             </div>
                              <div class="row">
                                <div class="col-sm-5">
                                  <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Entradas <?php echo $partir;?> a la <?php echo $terminar; ?> de <?php echo $cant; ?></div>
                                </div> <?php?>
                                <div class="col-sm-7">
                                  <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                  <ul class="pagination">
                                    <?php for($i=1;$i<=$rows_count; $i++):?>
                                      <?php if($i==$inicio && $validacioncol==1):?>
                                      <li class="paginate_button active"><a href="Carreras.php?pag=<?php echo $i?>&col=<?php echo $validacioncolumna?>&pos=<?php echo $position;?>#Edit" aria-controls="datatable" data-dt-idx="<?php echo $i?>" tabindex="0"><?php echo $i?></a></li>
                                      <?php elseif($validacioncol==1):?>
                                        <li class="paginate_button"><a href="Carreras.php?pag=<?php echo $i?>&col=<?php echo $validacioncolumna?>&pos=<?php echo $position;?>#Edit" aria-controls="datatable" data-dt-idx="<?php echo $i?>" tabindex="0"><?php echo $i?></a></li>
                                      <?php elseif($i==$inicio):?>
                                        <li class="paginate_button active"><a href="Carreras.php?pag=<?php echo $i?>" aria-controls="datatable" data-dt-idx="<?php echo $i?>" tabindex="0"><?php echo $i?></a></li>
                                        <?php else:?>
                                        <li class="paginate_button"><a href="Carreras.php?pag=<?php echo $i?>#Edit" aria-controls="datatable" data-dt-idx="<?php echo $i?>" tabindex="0"><?php echo $i?></a></li>
                                      <?php endif;?>
                                    <?php endfor;?>
                                  </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Created by OtterTech <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../../../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../../vendors/starrr/dist/starrr.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>

    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  </body>
</html>