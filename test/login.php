<?php //$Author: 'TecnicoaCR';

    SESSION_start();

    //require 'database.php';
    if (!empty($_POST['email']) && !empty('password')) { //sí los campus no estan vacios
      $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email'); // obtener datos de la database
      $records->bindParam(':email',$_POST['email']);// obtener y vincular
      $records->execute(); // ejecutando consulta
      $results = $records->fetch(PDO::FETCH_ASSOC);// obtener datos de usuario

      $message = '';

      if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) { // Si el resultado (usuario) existe y las contraseñas coinciden ...
        $_SESSION['users_id'] = $results['id'];
        header('Location: /CCTV_IS/home.php');
      }else {
        $message = 'Sorry, those credentials do not match';
      }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title lan-content="Login-MyCCTV"></title>

    <!-- ---------- METADATA ---------- -->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="TecnicoaCR">
    <meta name="title" content="MyCCTV">
    <meta name="description" content="El sistema web que te ayudara a gestionar tus DVR a travez de su IP.">

    <link rel="shortcut icon" href="assets/img/logocamera.ico" />

    <!-- ---------- CSS ---------- -->
    <link href="assets/css/base.css" rel="stylesheet">

</head>

<body class="login_mall">

  <!-- ---------- HEADER ---------- -->
  <?php include 'assets/header.php'?>


  <!-- ---------------------- parallax -------------------------- -->

  <hr/>
  <?php if (!empty($message)) {
    echo $message;
    }
  ?>
  <form name="form_login" action="login.php" method="post">
    <h3>Iniciar sésion</h3>
    <input name="email" type="text" placeholder="Enter your mail"/>
    <input name="password" type="password" placeholder="&#128272; Enter your password"/>
    <a href="./RecoveryPass/retrievePass.html" target="_blank">
    <p>Olvidó la contraseña?</p><a/>
    <input type="submit" value="Iniciar sesión"/>
    <p>¿No tiene una cuenta? <a href="signup.php">Cree una.</a></p>
  </form>

  <!-- ---------------------- FOOTER -------------------------- -->
  <?php include 'assets/footer.php'?>

  <!-- ---------------------- COOKIES -------------------------- -->


  <!-- ---------------------- SCRIPTS -------------------------- -->


  </body>
</html>

<?php //$Author: 'TecnicoaCR'; ?>
