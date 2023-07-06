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
  <title>Borrar producto</title>
</head>

<body>
  <?php
  // Buscamos al producto
  $registros = mysqli_query($link, "SELECT id FROM productos WHERE id='$_GET[Id]'") or
    die("Problemas en el select:" . mysqli_error($link));
  if ($reg = mysqli_fetch_array($registros)) {
    // Eliminamos la entrada de fotos asociada
    mysqli_query($link, "DELETE FROM fotos WHERE idproducto='$_GET[Id]'") or
      die("Problemas en el select:" . mysqli_error($link));
    // Eliminamos el producto
    mysqli_query($link, "DELETE FROM productos WHERE id='$_GET[Id]'") or
      die("Problemas en el select:" . mysqli_error($link));
  ?>

    <h2>Se borró el producto.</h2>

  <?php
  } else {
  ?>

    <h2>Producto no encontrado.</h2>

  <?php
  }
  mysqli_close($link);
  ?>

  <a href="index.php">Volver</a>
</body>

</html>
