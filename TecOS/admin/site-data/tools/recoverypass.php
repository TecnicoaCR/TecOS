<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
	require '../assets/funcs/funcs.php';
	require '../assets/funcs/conn_db_mycctv.php';

	$errors = array();

	if (!empty($_POST)) {
		// code...
		$email = $mysqli->real_escape_string($_POST['email']);


		if (!isEmail($email)) {
			// code...
			$errors[] = "Correo electronico invalido";
		}

			if (emailExiste($email)) {
				// code...
				$user_id = getValor('id_usuario', 'correo', $email);
				$nombre = getValor('nombre', 'correo', $email);

				$token = generaTokenPass($user_id);

				$url = 'https://'.$_SERVER["SERVER_NAME"].'/apps/MyCCTV/tools/editpass.php?user_id='.$user_id.'&token='.$token;
				$asunto = '[MyCCTV] Recuperar password - Sistema de Usuarios';
				$cuerpo = "
					<body>
						<div bgcolor='#FFFFFF'>
							<h3>Hola @$nombre: <br /><br /></h3>
							Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>
							Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n:
							<a href='$url'>Cambiar Password</a>";

				if(enviarEmail2($email, $nombre, $asunto, $cuerpo))
				{
					echo "Hemos enviado un correo electronico a la direccion: $email para restablecer tu password.<br/>";
					echo "<a href='index.php'>Iniciar Sesion</a>";
					exit;

				} else {
						$errors [] = "Error al enviar instruciones al email.";
				}

			} else {
				// code...
				$errors [] = "No existe ese correo electronico.";
			}
		}
 ?>

<html>
	<head>
		<title>Recuperar Password</title>

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
						<div class="panel-title">Recuperar Password</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../index.php">Iniciar Sesi&oacute;n</a></div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
					</div>
				</div>
			</div>
		</div>
		<?php include '../assets/footer.php' ?>
	</body>
</html>
