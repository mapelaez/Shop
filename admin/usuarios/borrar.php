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
  <title>Borrar cliente</title>
</head>

<body>
  <?php
  $registros = mysqli_query($link, "SELECT id FROM usuarios WHERE id='$_GET[Id]'") or
    die("Problemas en el select:" . mysqli_error($link));
  if ($reg = mysqli_fetch_array($registros)) {
    mysqli_query($link, "DELETE FROM usuarios WHERE id='$_GET[Id]'") or
      die("Problemas en el select:" . mysqli_error($link));
  ?>

    <h2>Se borró al usuario.</h2>

  <?php
  } else {
  ?>

    <h2>Usuario no encontrado.</h2>

  <?php
  }
  mysqli_close($link);
  ?>

  <a href="index.php">Volver</a>
</body>

</html>
