<?php
// Inicializar la sesión
session_start();
 
// Limpiar todas las variables de sesión
$_SESSION = array();
 
// Destrozar la sesión
session_destroy();
 
// Redirigir a la página de login
header("location: login.php");
exit;
?>
