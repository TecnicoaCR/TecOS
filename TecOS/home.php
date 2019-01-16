<?php

    /*-------------------------
    Autor: TecnicoaCR
    Web: https://www.tecnicoacr.com
    Mail: info@tecnicoacr.com
    ---------------------------*/

    session_start();
    
    // Verificamos el login sino lo redireccionamos al login
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
        exit;
    }

    /* Connect To Database*/
    require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

    $active_productos="active";
    $title="Home | TecOS";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'assets/head.php' ?>
    </head>
<body>
    <div id="wrapper">
      <!-- Navigation -->
      <?php include 'assets/nav.php' ?>

      <!-- ----- Workspace ----- -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">
                  Dashboard <small>MyCCTV</small>
                </h1>
                <ol class="breadcrumb">
                  <li class="active">
                    <i class="fa fa-dashboard"><?php echo ' Bienvenid@ '.utf8_decode($row['nombre']); ?><br /><br />
                        El sistema web MyCCTV te ayudara a gestionar tus DVR a travez de su IP muy facilmente.</i>
                    </li>
                  </ol>
              </div>
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="fa fa-info-circle"></i>  <strong>Te gusta esta app?</strong> Escribínos formalmente tu solucitud, te ayudaremos con todo! <a href="" class="alert-link">Ingresa aquí! </a> para desplegar el formulario.!
              </div>
            </div>
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-video-camera fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Ver Cámaras!</div>
                            </div>
                        </div>
                    </div>
                    <a href="viewdevices.php">
                        <div class="panel-footer">
                            <span class="pull-left">Mostrar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-hdd-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge"></div>
                        <div>Gestionar DVR!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="devices.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Mostrar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Usuarios!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Mostrar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Ayuda!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="help.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Mostrar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper --> 
    </div><!-- /#wrapper -->

    <!--FOOTER -->
    <?php include 'assets/footer.php'; ?>

    </body>
</html>
