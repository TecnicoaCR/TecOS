<!-- Author: TecnicoaCR -->
<?php
    // $Author: 'TecnicoaCR';
    require "assets/sessionconfirm.php";

    $id_device = $_GET['id_device'];

    $sql = "SELECT * FROM devices WHERE id_device = '$id_device'";
    $resultado = $mysqli->query($sql);
    $row1 = $resultado->fetch_array(MYSQLI_ASSOC);

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
                            Modificar VideoGrabador <small>MyCCTV</small>
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
                  <div class="col-md-6  col-sm-8 col-sm-offset-2">
			               <div class="row mainbox">
				                   <h3 style="text-align:center;">Editar DVR</h3>
			               </div>
			               <form class="form-horizontal" method="POST" action="update-device.php" autocomplete="off">
				                 <div class="form-group">
					                   <label for="nombre" class="col-sm-2 control-label">Nombre</label>
					                        <div class="col-sm-10">
						                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $row1['name']; ?>" required>
					                         </div>
				                  </div>
                           <input type="hidden" id="id_device" name="id_device" value="<?php echo $row1['id_device']; ?>" />
                  				<div class="form-group">
					                    <label for="telefono" class="col-sm-2 control-label">URL</label>
					                       <div class="col-sm-10">
						                         <input type="text" class="form-control" id="ip" name="ip" placeholder="IP" value="<?php echo $row1['ip']; ?>" required>
					                       </div>
				                  </div>

        <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Puerto</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="port" name="port" placeholder="port" value="<?php echo $row1['port']; ?>" required>
					</div>
				</div>

        <div style="margin-bottom: 25px" class="form-group">
          <label for="telefono" class="col-sm-2 control-label">Usuario</label>
          <div class="col-sm-10">
          <input id="user" type="text" class="form-control" name="user" placeholder="User" value="<?php echo $row1['user']; ?>" required>
        </div>
        </div>

        <div style="margin-bottom: 25px" class="form-group">
          <label for="telefono" class="col-sm-2 control-label"> Contraseña </label>
          <div class="col-sm-10">
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row1['password']; ?>" required>
        </div>
        </div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="devices.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
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
