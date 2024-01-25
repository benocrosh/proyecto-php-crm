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
                <h3>Edicion de Direcciónes</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edicion de Direcciónes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="Actualizar.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <!-- Aqui se puso el ingreso de la dirección-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="local_intro">Id Direccion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="iddireccion" name="iddireccion" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $getid ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <!-- Aqui se puso el ingreso de la dirección-->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direc_intro">Dirección <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="direc_registro" name="direc_registro" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $getdireccion ?>">
                        </div>
                      </div>
                        <!-- aqui termina el registro del usuario-->
                        <!-- aqui inicia el select-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Comuna </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="Comuna[]">
                            <option value="Santiago">Santiago</option>
                            <option value="Conchalí">Conchalí</option>
                            <option value="Huechuraba">Huechuraba</option>
                            <option value="Independencia">Independencia</option>
                            <option value="Quilicura">Quilicura</option>
                            <option value="Recoleta">Recoleta</option>
                            <option value="Renca">Renca</option>
                            <option value="Las Condes">Las Condes</option>
                            <option value="Lo Barnechea">Lo Barnechea</option>
                            <option value="Providencia">Providencia</option>
                            <option value="Vitacura">Vitacura</option>
                            <option value="La Reina">La Reina</option>
                            <option value="Macul">Macul</option>
                            <option value="Nunoa">Ñuñoa</option>
                            <option value="Penalolén">Peñalolén</option>
                            <option value="La Florida">La Florida</option>
                            <option value="La Granja">La Granja</option>
                            <option value="El Bosque">El Bosque</option>
                            <option value="La Cisterna">La Cisterna</option>
                            <option value="La Pintana">La Pintana</option>
                            <option value="San Ramón">San Ramón</option>
                            <option value="Lo Espejo">Lo Espejo</option>
                            <option value="Pedro Aguirre Cerda">Pedro Aguirre Cerda</option>
                            <option value="San Joaquín">San Joaquín</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="Cerrillos">Cerrillos</option>
                            <option value="Estación Central">Estación Central</option>
                            <option value="Maipú">Maipú</option>
                            <option value="Cerro Navia">Cerro Navia</option>
                            <option value="Lo Prado">Lo Prado</option>
                            <option value="Pudahuel">Pudahuel</option>
                            <option value="Quinta Normal">Quinta Normal</option>
                            <option value="San Bernardo">San Bernardo</option>
                            <option value="Calera de Tango">Calera de Tango</option>

                          </select>
                          
                        </div>
                      </div>
                      <!-- aqui termina el select-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input  class="btn btn-success" type="submit" name="upd_direccion" id="upd_direccion" value="Registrar Dirección">
                        </div>
                      </div>

                    </form>
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
