<?php
    $server = 'localhost:3306';
    $username = 'admin';
    $password = 'Admin11/';
    $database = 'CCTV_IS_database';

    try {
      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
    }

 ?>
