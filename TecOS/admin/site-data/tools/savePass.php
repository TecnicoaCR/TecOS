<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
require '../assets/funcs/funcs.php';
require '../assets/funcs/conn_db_mycctv.php';

$user_id = $mysqli->real_escape_string($_POST['user_id']);
$token = $mysqli->real_escape_string($_POST['token']);
$password = $mysqli->real_escape_string($_POST['password']);
$con_password = $mysqli->real_escape_string($_POST['con_password']);

if (validaPassword($password, $con_password)) {
  $pass_hash = hashPassword($password);

  if (cambiaPassword($pass_hash, $user_id, $token)) {
    // code...
    echo "La contraseña a sido mudificada con exito";
    echo "<br> <a href='../login.php' >Iniciar Sesion</a>";

  } else {
    // code...
    echo "Error al modificar contraseña.";
  }

} else {
  // code...
  echo 'Las contraseñas no coinciden';
}

  ?>
