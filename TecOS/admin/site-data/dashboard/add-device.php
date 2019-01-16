<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  require "assets/sessionconfirm.php";
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
                  <div class="col-md-6  col-sm-8 col-sm-offset-2">
			               <div class="row mainbox">
				                   <h3 style="text-align:center">NUEVO DVR</h3>
			               </div>

			               <form class="form-horizontal" method="POST" action="save-device.php" autocomplete="off">
				                 <div class="form-group">
					                   <label for="nombre" class="col-sm-2 control-label">Nombre</label>
					                        <div class="col-sm-10">
						                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
					                         </div>
				                  </div>
                  				<div class="form-group">
					                    <label for="telefono" class="col-sm-2 control-label">URL</label>
					                       <div class="col-sm-10">
						                         <input type="text" class="form-control" id="ip" name="ip" placeholder="IP" required>
					                       </div>
				                  </div>

        <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Puerto</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="port" name="port" placeholder="Port" required>
					</div>
				</div>

        <div style="margin-bottom: 25px" class="form-group">
          <label for="telefono" class="col-sm-2 control-label">Usuario</label>
          <div class="col-sm-10">
          <input id="user" type="text" class="form-control" name="user" placeholder="User" required>
        </div>
        </div>

        <div style="margin-bottom: 25px" class="form-group">
          <label for="telefono" class="col-sm-2 control-label">contraseña</label>
          <div class="col-sm-10">
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        </div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
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
