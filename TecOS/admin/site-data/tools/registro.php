<?php

		require '../assets/funcs/conn_db_mycctv.php';
		require '../assets/funcs/funcs.php';

		$errors = array();

		if(!empty($_POST)){
			$nombre = $mysqli->real_escape_string($_POST['nombre']);
			$usuario = $mysqli->real_escape_string($_POST['usuario']);
			$password = $mysqli->real_escape_string($_POST['password']);
			$con_password = $mysqli->real_escape_string($_POST['con_password']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);

			$activo = 0;
			$tipo_usuario = 2;
			$secret = '6Lem4oAUAAAAAFWDegOV9uzjOpK6aWZFscegQgyx';

			if (!$captcha){
				$errors[] = "Verificar Catcha.";
			}

			if (isNull($nombre, $usuario, $password, $con_password,$email)){
				$errors[] = "Todos los datos son necesarios.";
			}

			if (!isEmail($email)){
				$errors[] = "Email Incorrecto.";
			}

			if (!validaPassword($password, $con_password)){
				$errors[] = "Las Contraseñas NO coinciden.";
			}

			if (usuarioExiste($usuario)){
				$errors[] = "El nombre de Usuario: $usuario ya existe.";
			}

			if (emailExiste($email)) {
				$errors[] = "Esta direccion de email: $email ya existe.";
			}

			if (count($errors) == 0) {
				$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

				$arr = json_decode($response, TRUE);

				if($arr['success']){
					$pass_hash = hashPassword($password);
					$token = generateToken();
					$registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);

					if ($registro > 0){
						$url = 'https://'.$_SERVER["SERVER_NAME"].'/apps/MyCCTV/tools/activar.php?id='.$registro.'&val='.$token;
						$asunto = '[MyCCTV] Por favor, verifique su direccion de correo electronico';
						$cuerpo = "
							<body bgcolor='#DADDE9'>
								<div>
									<img src=''></img> <!-- FALTA LOGO -->
								</div>

								<div bgcolor='#FFFFFF'>
													<h3>Casi terminado, @$nombre! Para completar su registro <br />
													en MyCCTV, solo necesitamos verificar su dirección de correo <br />
													electrónico:<strong> $email.</strong><br /></h3>

													<a href='$url'><button bgcolor='#2356FC' type='submit' class='btn btn-info'><i class='icon-hand-right'></i>Confirme su direccion de correo electronico</button></a>
													<br /><br />
													Una vez verificado, puede comenzar a utilizar todas las funciones de MyCCTV para explorar, crear y gestionar sus proyectos CCTV.
													<br />
													Está recibiendo este correo electrónico porque recientemente creó una nueva cuenta de MyCCTV o agregó una nueva dirección de correo electrónico. Si no eras tú, ignora este correo electrónico.

													</div>
												</body>";

						if(enviarEmail($email, $nombre, $asunto, $cuerpo)){

							echo "
								<body bgcolor='#DADDE9'>

									<div bgcolor='#FFFFFF'>
										<h3>Casi terminado, @$nombre! Para continuar con el proceso de registro <br />
										en MyCCTV, siga las instrucciones que le hemos enviado a la dirección de correo<br />
										electrónico:<strong> $email.</strong><br /><br /></h3>
										<a href='../login.php'><button bgcolor='#2356FC' type='submit' class='btn btn-info'><i class='icon-hand-right'></i>Volver al Login</button></a>
										<br /><br />
										Una vez verificado, puede comenzar a utilizar todas las funciones de MyCCTV para explorar, crear y gestionar sus proyectos CCTV.
									</div>
								</body>";
								exit;

						} else {
							$errors[] = "Error al enviar Email.";
						}

					}	else {
						$errors[] = "Error al registrar.";
					}

				} else {
					$errors[] = 'Error al comprobar el Catcha, por favor intentelo nuevamente.';
				}

			}
		}
 ?>

<html>
	<head>
		<title>Registro-MyCCTV</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="../assets/css/base.css" >
		<script src="../assets/js/bootstrap.min.js" ></script>
		<script src="../assets/js/nocopy.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<div class="container">
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Reg&iacute;strate</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="../login.php">Iniciar Sesi&oacute;n</a></div>
					</div>

					<div class="panel-body" >
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>

							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="captcha" class="col-md-3 control-label"></label>
								<div class="col-md-3 g-recaptcha" data-sitekey="6Lem4oAUAAAAAJ3ZkMw5N0SF3ukQXDtMg3iGurAg"></div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button>
								</div>
							</div>
						</form>

						<?php
						// Imprimir errores registrados
							echo resultBlock($errors);
						?>

					</div>
				</div>
			</div>
		</div>
		<?php include '../assets/footer.php' ?>
	</body>
</html>
