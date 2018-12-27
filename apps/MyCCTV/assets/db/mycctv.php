<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.3
 */

/**
 * Database `mycctv`
 */

/* `mycctv`.`devices` */
$devices = array(
  array('id_device' => '1','name' => 'fam','ip' => '200.10.55.10','port' => '8080','user' => 'admin','password' => '1234','id_usuario' => '1')
);

/* `mycctv`.`tipo_usuario` */
$tipo_usuario = array(
  array('id_tipo' => '1','tipo' => 'Administrador'),
  array('id_tipo' => '2','tipo' => 'Usuario')
);

/* `mycctv`.`usuarios` */
$usuarios = array(
  array('id_usuario' => '1','usuario' => 'Testing','password' => '$2y$10$Xpifigm2D5Pg32EU4iP.0O9LiGkyhvw.rA1dUVYom59Vsy.uad0EG','nombre' => 'Testing','correo' => 'produccion.tecnicoacr@gmail.com','last_session' => '2018-12-22 23:45:15','activacion' => '1','token' => '2451943d7bfd9c3c7379947f12c57b46','token_password' => '','password_request' => '1','id_tipo' => '1')
);
