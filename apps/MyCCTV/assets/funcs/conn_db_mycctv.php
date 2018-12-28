<?php

	//$mysqli=new mysqli("localhost","root","AN3kbzshMq0iUQrx","mycctv"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
        
        //$mysqli=new mysqli("ec2-54-225-150-216.compute-1.amazonaws.com","lxedzgjpgqoxuo","0134a1709b725c74b6ff4f0e8e14d8e72d080eb83dbfabe6e6e9d3b2f79777f7","dboib1mgrsnqa2");
	$db = parse_url(getenv("postgres://lxedzgjpgqoxuo:0134a1709b725c74b6ff4f0e8e14d8e72d080eb83dbfabe6e6e9d3b2f79777f7@ec2-54-225-150-216.compute-1.amazonaws.com:5432/dboib1mgrsnqa2
"));
        $db["path"] = ltrim($db["path"], "/");
        
    if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
