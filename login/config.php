<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'trabajoweb');
 
/* Conectarse a la base de datos SQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Comprbar Conexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}