<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
session_start();

require 'funcs/conn_db_mycctv.php';
require 'funcs/funcs.php';

if (!isset($_SESSION["id_usuario"])) {
  // code...
  header("Location: ../login.php");
}

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT id_usuario, nombre FROM usuarios WHERE id_usuario = '$id_usuario' ";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

 ?>
