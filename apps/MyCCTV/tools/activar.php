<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  require '../assets/funcs/conn_db_mycctv.php';
  require '../assets/funcs/funcs.php';

  if(isset($_GET["id"]) AND isset($_GET['val'])){
    $idUsuario = $_GET['id'];
    $token = $_GET['val'];

    $mensaje = validaIdToken($idUsuario, $token);
  }

 ?>

<html>
  <head>
 		<title>Activacion - MyCCTV</title>
 		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
 		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="../assets/css/base.css" >
 		<script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/nocopy.js"></script>
 		<script src='https://www.google.com/recaptcha/api.js'></script>
 	</head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1><?php echo $mensaje; ?></h1>
        <br />
        <p><a class="btn btn-primary btn-lg" href="../login.php" role="button">
        Iniciar Sesion</a></p>
      </div>
    </div>
    <?php include '../assets/footer.php' ?>
  </body>
</html>
