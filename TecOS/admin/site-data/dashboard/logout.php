<!-- Author: TecnicoaCR -->
<?php
// $Author: 'TecnicoaCR';
  session_start();
  session_unset();
  session_destroy();
  header('Location: ../login.php');
 ?>
