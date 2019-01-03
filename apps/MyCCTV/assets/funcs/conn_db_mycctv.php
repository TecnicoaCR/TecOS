<?php
    $mysqli=new mysqli("localhost","root","AN3kbzshMq0iUQrx","mycctv"); //Conexión Local
    
    //$mysqli = new mysqli("sql9.freesqldatabase.com:3306","sql9271986","cuTxxQAeQK","sql9271986"); // Conexión Remota a FreeSQL
    
    if($mysqli->connect_error){
        die('Error de Conexxion' . $mysqli->connect_error);
    }

?>
