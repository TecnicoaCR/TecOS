<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Iniciar sesión</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html">
        <meta name="author" content="">
        <link rel="shortcut icon" href="img/logocamera.ico" /> <!-- ------- Aqui va el logo de la Pestaña ------ -->
            <!-- ----------------------- Estilos -------------------- -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
            <!-- --------------------- JavaScript ------------------- -->
        <script src="scripts/nocopy.js"></script> <!-- ------- click derecho no permitido ----------- -->
    </head>
    <body>
        <?php require 'partials/header.php' ?> <!-- -------- header -------- -->
        <hr/>
        <?php if (!empty($message)) {
          echo $message;
          }
        ?>
        <form name="form_signup" action="signup.php" method="post">
              <h3>Crear cuenta</h3>
              <p> ó <a href="login.php"> iniciar sesión </a></p>
              <input name="email" type="text" id="username" placeholder="Enter your mail"/>
              <input name="password" type="password" placeholder="&#128272;Enter your password"/>
              <input name="cfpassword" type="password" placeholder="&#128272;Confirm your password"/>
              <input type="submit" value="Registrarse"/>
              <p>Al <strong>Registrarse</strong>, aceptas nuestro Contrato de servicio y la Declaración de privacidad<a href="">.</a></p>
          </form>
        <?php require 'partials/footer.php'?> <!-- -------- footer -------- -->
    </body>
</html>
