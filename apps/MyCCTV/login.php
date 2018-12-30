<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
	session_start();

	require 'assets/funcs/conn_db_mycctv.php';
	require 'assets/funcs/funcs.php';

	$errors = array();

	if (!empty($_POST)) {
		// code...
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		if(isNullLogin($usuario, $password)){
			$errors[] = 'Debe de llenar todos los campos';
		}
		$errors[] = login($usuario, $password);
	}

 ?>
<html>
	<head>
		<title>Login - MyCCTV</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="assets/css/base.css" >
		<script src="assets/js/bootstrap.min.js" ></script>
		<script src="assets/js/nocopy.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Iniciar Sesi&oacute;n</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="tools/recoverypass.php">¿Se te olvid&oacute; tu contraseña?</a></div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario o email" required>
							</div>

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" type="password" class="form-control" name="password" placeholder="password" required>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</a>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="tools/registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors) ?>
					</div>
				</div>
			</div>
		</div>
		<?php include 'assets/footer.php' ?>
	</body>
</html>
