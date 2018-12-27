<?php

	$mysqli=new mysqli("localhost","root","AN3kbzshMq0iUQrx","mycctv"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
