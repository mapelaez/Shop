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
  <title>Guardar categoría</title>
</head>

<body>
  <?php

  if (isset($_REQUEST['Id']) and $_REQUEST['Id'] != ''){
    // Actualizamos la categoría si ya existe
    mysqli_query($link, "UPDATE categorias SET nombre='$_REQUEST[Nombre]'
                         WHERE idcategoria = '$_REQUEST[Id]'")
      or die("Problemas en el update " . mysqli_error($link));
  } else {
    // Creamos la categoría
    mysqli_query($link, "INSERT INTO categorias(nombre)
                         VALUES ('$_REQUEST[Nombre]')")
      or die("Problemas en el select " . mysqli_error($link));
  }
  
  mysqli_close($link);
  ?>

  <h2>El categoría fue guardada.<h2>
  <a href="index.php">Volver</a>
</body>

</html>
