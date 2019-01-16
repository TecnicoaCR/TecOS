<?php

    $mysqli = new mysqli("sql9.freesqldatabase.com:3306","sql9271986","cuTxxQAeQK","sql9271986"); // Conexión Remota a FreeSQL

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
