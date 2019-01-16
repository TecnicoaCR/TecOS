<?php
    /* $Author: 'TecnicoaCR';
     * Esta aplicación siendo desarrollada por Eddy Alfaro, estudiante de ingenieria en sistemas de información
     * para TecnicoaCR Professional Servicios.
     * Consultas, sugerencias o comentarios acerca de todo este monton de codigo, enviarlas a :
     * info@tecnicoacr.com - TecnicoaCR-Team
     * ealfarov02@gmail.com - Desarrollador
     * 
     * 15/01/2019
     * 23:00
     * 
     */

    // Chequeamos que se tenga la minima version de PHP 
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit("Lo sentimos, no soportamos versiones de PHP menores a v5.3.7 !");
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
       // si está utilizando PHP 5.3 o PHP 5.4, tendremos que incluir la password_api_compatibility_library.php
        // (esta biblioteca agrega las funciones de hashing de contraseña de PHP 5.5 a versiones anteriores de PHP)
        require_once("assets/libraries/password_compatibility_library.php");
    }

    // Se incluyen las configuraciones / constantes para la conexión de base de datos.
    require_once("assets/config/db.php");

    // Cargamos la Clase Login
    require_once("assets/classes/Login.php");

    // Se crea un objeto de inicio de sesión. cuando se crea este objeto, hará todo el inicio de sesión / cierre de sesión automáticamente
    // así que esta línea única maneja todo el proceso de inicio de sesión. en consecuencia, puedes simplemente ...
    $login = new Login();

    // ... pregunta si hemos iniciado sesión aquí:
    if ($login->isUserLoggedIn() == true) {
        // El usuario ha iniciado sesión. Puedes hacer lo que quieras aquí.
        // para fines de demostración, simplemente mostramos la vista "usted está conectado".
       header("location: admin/home.php");
       } else {
        // el usuario no está conectado. puedes hacer lo que quieras aquí.
        // para fines de demostración, simplemente mostramos la vista "no ha iniciado sesión".
        
?>
<!DOCTYPE html>
    <html lang="es">   
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
            <title>Login - TecOS</title>
        
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
            <!-- CSS  -->
            <link href="site-data/assets/css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>     
        </head>
        <body>
            <div class="container">
                <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="assets/img/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"></p>
                    <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			<?php
                            // show potential errors / feedback (from login object)
                            if (isset($login)) {
                                if ($login->errors) {
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Error!</strong> 					
                            <?php 
                                foreach ($login->errors as $error) {
                                    echo $error;
                                }
                            ?>
                        </div>
                        <?php
                                }
                                if ($login->messages) {
                        ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Aviso!</strong>
                            <?php
                                foreach ($login->messages as $message) {
                                    echo $message;
                                }
                            ?>
                        </div> 
                        <?php 
                                }
                            }
                        ?>
                        <span id="reauth-email" class="reauth-email"></span>
                        <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
                        <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
                        <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
                    </form><!-- /form -->
                    <a class="copyright_url" href="https://www.tecnicoacr.com">Volver a TecnicoaCR</a>
                    
                    <div class="text-center">
          <a class="d-block small" href="forgot-password.php">Recuperar contraseña</a>
        </div>
            
        </div><!-- /card-container -->
    </div><!-- /container -->
		<?php include 'site-data/assets/footer.php' ?>
	</body>
</html>
<?php
    }