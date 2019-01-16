<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  require "assets/sessionconfirm.php";

  $errors = array();

    $id_device = $mysqli->real_escape_string($_POST['id_device']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $ip = $mysqli->real_escape_string($_POST['ip']);
    $port = $mysqli->real_escape_string($_POST['port']);
    $user = $mysqli->real_escape_string($_POST['user']);
    $password = $mysqli->real_escape_string($_POST['password']);


    if (isNull($name, $ip, $port, $user,$password)){
      $errors[] = "Todos los datos son necesarios.";
    }

  $sql = "UPDATE devices SET name='$name', ip='$ip', port='$port', user='$user', password='$password' WHERE id_device = '$id_device'";
	$resultado = $mysqli->query($sql);


 ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Head -->
    <?php include 'assets/head.php' ?>
    <title>Editar Camaras - MyCCTV</title>
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
                            Anadir VideoGrabadores <small>MyCCTV</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-upload"></i> Configuración DVR
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="container">
                  <div class="col-md-6">
			               <div class="row mainbox">
                       <?php if($resultado > 0) { ?>
                         <h3>DVR MODIFICADO</h3>
                       <?php } else { ?>
                         <h3>ERROR AL MODIFICAR</h3>
                       <?php } ?>

                       <a href="devices.php" class="btn btn-primary">Regresar</a>
			               </div>
		                 </div>
                   </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- footer -->
        <?php include 'assets/footer.php'; ?>

    </div>
    <!-- /#wrapper -->

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
