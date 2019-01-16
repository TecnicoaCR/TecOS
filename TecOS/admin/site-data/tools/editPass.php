<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  require '../assets/funcs/funcs.php';
  require '../assets/funcs/conn_db_mycctv.php';

  if (empty($_GET['user_id'])) {
    // code...
    header('Location: ../index.php');

  }

  if (empty($_GET['token'])) {
    // code...
    header('Location: ../index.php');
  }

  $user_id = $mysqli->real_escape_string($_GET['user_id']);
  $token = $mysqli->real_escape_string($_GET['token']);

  if (!verificaTokenPass($user_id, $token)) {
    // code...
    echo "No se pudo verificar los datos";
    exit;
  }

?>

<html>
	<head>
		<title>Reset Passworf</title>

		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="../assets/css/base.css" >
		<script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/nocopy.js"></script>

	</head>

	<body>

		<div class="container">
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Modificar Password</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../index.php">Iniciar Sesi&oacute;n</a></div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<form id="loginform" class="form-horizontal" role="form" action="savePass.php" method="POST" autocomplete="off">

              <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
              <input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />


							<div class="form-group">
                <label for="password" class="col-md-3 control-label"> Nueva Contraseña</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>
							</div>

              <div class="form-group">
                <label for="con_password" class="clo-md-3 control-label">Confirmar Contraseña</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="con_password" placeholder="Confirm password" required />
                  </div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
    <?php include '../assets/footer.php' ?>
	</body>
</html>
