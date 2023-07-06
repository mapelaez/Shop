<?php
  // Inicializar la sesión
  session_start();
  
  // Comprobar que el usuario es el administrador
  if ($_SESSION["usuario"] !='admin'){
    header("Location: ../../login/login.php?msg=No tienes permiso para acceder a esta sección. Inicia sesión antes.");
    exit;
  }
  
  // Incluir config file
  require_once "../../login/config.php";
?>

<!doctype html>
<html>

<head>
  <title>Guardar cliente</title>
</head>

<body>
  <?php

  if (isset($_REQUEST['Id']) and $_REQUEST['Id'] != ''){
    // Modificamos el usuario
    mysqli_query($link, "UPDATE usuarios SET usuario='$_REQUEST[Usuario]', nombre='$_REQUEST[Nombre]',
                apellido='$_REQUEST[Apellidos]', email='$_REQUEST[Email]'
                             WHERE id = '$_REQUEST[Id]'")
      or die("Problemas en el update" . mysqli_error($link));
      
    // Modificamos la contraseña si se nos ha indicado una nueva
    if ($_REQUEST['Contrasena'] != ''){
      mysqli_query($link, "UPDATE usuarios SET contraseña='$_REQUEST[Contrasena]'
                             WHERE id = '$_REQUEST[Id]'")
        or die("Problemas en el update" . mysqli_error($link));
    }
  } else {
    // Creamos al usuario
    mysqli_query($link, "INSERT INTO usuarios (usuario, contraseña, nombre, apellido, email)
                           VALUES ('$_REQUEST[Usuario]', '$_REQUEST[Contrasena]', '$_REQUEST[Nombre]', '$_REQUEST[Apellidos]', '$_REQUEST[Email]')")
      or die("Problemas en el select " . mysqli_error($link));
  }
  
  mysqli_close($link);
  ?>

  <h2>El usuario fue guardado.<h2>
  <a href="index.php">Volver</a>
</body>

</html>
