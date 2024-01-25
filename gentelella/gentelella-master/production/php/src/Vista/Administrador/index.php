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
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
  </head>

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
          <!-- top tiles-->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
              <h2><i class="fa fa-dollar"></i> Total a Cobrar: </h2>
              <!-- en esta seccion se tiene que agregas las etiquetas para el manejo de la informacion-->
              <div class="col-md-3 col-sm-3 col-xs-3 count">$<?php echo number_format($cob) ?></div>
              <!-- en esta seccion se tiene que agregas las etiquetas para el manejo de la informacion-->
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
              <h2><i class="fa fa-dollar"></i> Total a Pagar: </h2>
              <!-- en esta seccion se tiene que agregas las etiquetas para el manejo de la informacion-->
              <div class="col-md-3 col-sm-3 col-xs-3 count">$<?php echo number_format($pag) ?></div>
              <!-- en esta seccion se tiene que agregas las etiquetas para el manejo de la informacion-->
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
            <h2><i class="fa fa-calendar"></i> Fecha de facturación actual: </h2>
              <div class="col-md-3 col-sm-3 col-xs-3 count">
              <?php foreach($mostrarprueba as $var):
                    $tiempoactual=time();
                    $tiempo=date('Y-m-d', $tiempoactual);

                    if ($tiempo>$var["Quincena"]) {
                      $facturacion=$var["FinMes"];
                    } elseif($tiempo<=$var["Quincena"]){
                      $facturacion=$var["Quincena"];
                    } else{
                      continue;
                    }
                    $fechasalida=new DateTime($facturacion);
                    ?>
                    <div>
                      <p> <?php echo $fechasalida->format('d/m/Y')?> </p>
                    </div>
                  <?php endforeach;?>
                  </div>
              </div>
          </div>
          <!-- end top tiles-->
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inicio </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Panel de Inicio </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>


                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title"> <h2> Usuarios </h2>
                        <div class="clearfix"></div> 
                        </div>
                        <div class="x_content">
                          <div>
                            <ul class="quick-list" style="width: 100%">
                            <li><i class="fa fa-plus-circle"></i><a href="Usuarios.php">Registrar</a></li>
                            <li><i class="fa fa-pencil"></i><a href="Usuarios.php#Edit">Editar</a></li>
                            <li><i class="fa fa-close"></i><a href="Usuarios.php#Edit">Eliminar</a></li>
                            </ul>
                          </div>
                        </div>
                      </div> 
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title"> <h2> Conductores </h2>
                        <div class="clearfix"></div> 
                        </div>
                        <div class="x_content">
                          <div class="x_content">
                          <div>
                            <ul class="quick-list" style="width: 100%">
                            <li><i class="fa fa-car"></i><a data-toggle="collapse" href="#coll_drivers">Conductores <span class="fa fa-chevron-down"></span></a></li>
                            <div id="coll_drivers" class="collapse">
                            <ul>
                              <li><i class="fa fa-plus-circle"></i><a href="Conductores.php">Registrar</a></li>
                              <li><i class="fa fa-pencil"></i><a href="Conductores.php#Edit">Editar</a></li>
                              <li><i class="fa fa-close"></i><a href="Conductores.php#Edit">Eliminar</a></li>
                            </ul>
                            </div>
                            <li><i class="fa fa-map-marker"></i><a data-toggle="collapse" href="#coll_address">Direcciones <span class="fa fa-chevron-down"></span></a></li>
                            <div id="coll_address" class="collapse">
                              <ul>
                                <li><i class="fa fa-plus-circle"></i><a href="Direcciones.php">Registrar</a></li>
                                <li><i class="fa fa-pencil"></i><a href="Direcciones.php#Edit">Editar</a></li>
                                <li><i class="fa fa-close"></i><a href="Direcciones.php#Edit">Eliminar</a></li>
                              </ul>
                            </div>
                            </ul>
                          </div>
                        </div>
                        </div>
                      </div> 
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title"> <h2> Clientes </h2>
                        <div class="clearfix"></div> 
                        </div>
                        <div class="x_content">
                          <div class="x_content">
                            <div>
                              <ul class="quick-list" style="width: 100%">
                              <li><i class="fa fa-briefcase"></i><a data-toggle="collapse" href="#coll_clients"> Clientes <span class="fa fa-chevron-down"></span></a></li>
                                <div id="coll_clients" class="collapse">
                                <ul>
                                  <li><i class="fa fa-plus-circle"></i><a href="Clientes.php">Registrar</a></li>
                                  <li><i class="fa fa-pencil"></i><a href="Clientes.php#Edit">Editar</a></li>
                                  <li><i class="fa fa-close"></i><a href="Clientes.php#Edit">Eliminar</a></li>
                                </ul>
                                </div>
                              <li><i class="fa fa-map-marker"></i><a data-toggle="collapse" href="#coll_locals"> Locales <span class="fa fa-chevron-down"></span></a></li>
                                <div id="coll_locals" class="collapse">
                                <ul>
                                  <li><i class="fa fa-plus-circle"></i><a href="Locales.php">Registrar</a></li>
                                  <li><i class="fa fa-pencil"></i><a href="Locales.php#Edit">Editar</a></li>
                                  <li><i class="fa fa-close"></i><a href="Locales.php#Edit">Eliminar</a></li>
                                </ul>
                                </div>
                              <li><i class="fa fa-male"></i><a data-toggle="collapse" href="#coll_passengers"> Pasajeros <span class="fa fa-chevron-down"></span></a></li>
                                <div id="coll_passengers" class="collapse">
                                <ul>
                                  <li><i class="fa fa-plus-circle"></i><a href="Pasajeros.php">Registrar</a></li>
                                  <li><i class="fa fa-pencil"></i><a href="Pasajeros.php#Edit">Editar</a></li>
                                  <li><i class="fa fa-close"></i><a href="Pasajeros.php#Edit">Eliminar</a></li>
                                </ul>
                                </div>
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
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Created by Ottertech <a href="https://colorlib.com">| Transportes AGMA</a>
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
  </body>
</html>
