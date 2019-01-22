<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="index.php"style="color: #3498DB;"><i class="fa fa-globe"></i> TecnicoaCR - MyCCTV <i class="fa fa-video-camera" style="font-size:20px;color:red"></i></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <?php if($_SESSION['tipo_usuario']==1) { ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>


            <ul class="dropdown-menu message-dropdown"> <!-- NOTIFICACIONES -->
                <!--<li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>-->
            </ul>
        </li>


        <li class="dropdown"> <!-- ALERTAS -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <!--<li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>-->
            </ul>
        </li>
            <?php } ?>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><strong> <?php echo utf8_decode($row['nombre']); ?> </strong> <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li>
                    <a href="userinfo.php"><i class="fa fa-fw fa-user"></i>Cuenta</a>
                </li>

                <?php if($_SESSION['tipo_usuario']==1) { ?>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-envelope"></i>Notificaciones</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                  </li>

                <?php } ?>

                <li class="divider"></li>

                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesi&oacute;n</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="viewdevices.php"><i class="fa fa-fw fa-video-camera"></i> Ver MyCCTV</a>
            </li>
           
            <li>
                <a href="devices.php"><i class="fa fa-fw fa-upload"></i> Configuración DVR</a>
            </li>
            <!--
            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Gestionar Usuarios</a>
            </li>
            <?php if($_SESSION['tipo_usuario']==1) { ?>
            <li>
                <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Estadísticas</a>
            </li>-->
            <?php } ?>
            <li>
                <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-info-circle"></i> Ayuda <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                  <li>
                      <a href="#"><i class="fa fa-fw fa-file"></i>Ver Términos de Uso</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-file"></i>Ver Política de Privacidad</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-file"></i>Preguntas Frecuentes</a>
                  </li>
                  <li class="divider"></li>
                  <?php if($_SESSION['tipo_usuario']==1) { ?>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Documentación</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Reportar Problema</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Acerca de MyCCTV</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Acerca de TecnicoaCR</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Guía de Inicio</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
