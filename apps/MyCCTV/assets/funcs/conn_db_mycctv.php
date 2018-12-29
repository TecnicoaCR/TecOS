<?php
    //$mysqli=new mysqli("localhost","root","AN3kbzshMq0iUQrx","mycctv"); Conexión Local
    
    try { // Conexión Remota -> Heroku PostgreSQL
        $db = parse_url(getenv("postgres://lxedzgjpgqoxuo:0134a1709b725c74b6ff4f0e8e14d8e72d080eb83dbfabe6e6e9d3b2f79777f7@ec2-54-225-150-216.compute-1.amazonaws.com:5432/dboib1mgrsnqa2"));
        $db["path"] = ltrim($db["path"], "/");
    } catch (Exception $ex) {
        echo 'Conexion Fallida : ';
        exit();
    }
?>
