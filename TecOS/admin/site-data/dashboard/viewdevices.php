<!-- Author: TecnicoaCR -->
<?php
    // $Author: 'TecnicoaCR';
    require "assets/sessionconfirm.php";
    $where = "";
    $sql = "SELECT * FROM devices WHERE id_usuario = '$id_usuario' ORDER BY name DESC";
    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Head -->
        <?php include 'assets/head.php' ?>
        <title>Ver Camaras - MyCCTV</title>
    </head>
    <body>
        <div id="wrapper">
            <?php include 'assets/nav.php'; ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Ver Camaras <small>MyCCTV</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                     <i class="fa fa-home"></i>  <a href="index.php"> Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-video-camera"></i> Ver Camaras
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-video-camera"></i> Lista de Grabadores</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-bar-chart">
                                            <div class="row table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>IP</th>
                                                        <th>Puerto</th>
                                                        <th></th>
                                                     </thead>
                                                    <tbody>
                                                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                                            <tr>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['ip']; ?></td>
                                                                <td><?php echo $row['port']; ?></td>
                                                                <td><a href="http://<?php echo $row['ip']; ?>:<?php echo $row['port']; ?>" class="btn btn-info" target="_blank">
                                                                    <span class="glyphicon glyphicon-facetime-video"></span> Ver CCTV </a></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->
                </div>
            <!-- /#page-wrapper -->
            </div>
        <!-- /#wrapper -->

    <!-- FOOTER -->
    <?php include 'assets/footer.php'; ?>


    <!-- SCRIPTS -->
    <?php require 'assets/scripts.php'; ?>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="assets/js/plugins/flot/flot-data.js"></script>

    </body>
</html>
