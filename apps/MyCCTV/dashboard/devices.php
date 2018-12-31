<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  require "assets/sessionconfirm.php";

  $where = "";

  $sql = "SELECT * FROM devices WHERE id_usuario = '$id_usuario' ";
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
                            Configuración de VideoGrabadores <small>MyCCTV</small>
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

                <div class="row">

                  <div class="col-lg-3 col-md-6">
                      <div class="panel panel-green">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-download fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"></div>
                                      <div></div>
                                  </div>
                              </div>
                          </div>
                          <a href="add-device.php">
                              <div class="panel-footer">
                                  <span class="pull-left">Añadir un Grabador</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                              <h3 class="panel-title"><i class="fa fa-download"></i> Gestión de Grabadores</h3>
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
                                          <th>Usuario</th>
                                          <th>Contraseña</th>
                                          <th></th>
                                          <th></th>
                                        </thead>
                                        <tbody>
                                          <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                            <tr>
                                              <td><?php echo $row['name']; ?></td>
                                              <td><?php echo $row['ip']; ?></td>
                                              <td><?php echo $row['port']; ?></td>
                                              <td><?php echo $row['user']; ?></td>
                                              <td><?php echo $row['password']; ?></td>
                                              <td><a href="edit-device.php?id_device=<?php echo $row['id_device']; ?>">
                                                <span class="glyphicon glyphicon-pencil"></span></a></td>
                                              <td><a href="#" data-href="supr-device.php?id_device=<?php echo $row['id_device']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                                <span class="glyphicon glyphicon-trash"></span></a></td>
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- footer -->
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

    <!-- MODAL -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Eliminar Dispositivo</h4>
          </div>
          <div class="modal-body">
            ¿Desea eliminar la configuración de este Dispositivo?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        
        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
      });
    </script>

</body>

</html>
