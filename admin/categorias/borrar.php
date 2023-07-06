


<!doctype html>
<html>

<head>
  <title>Borrar categoría</title>
</head>



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

<body>
  <?php
  // Buscamos la categoría
  $registros = mysqli_query($link, "SELECT idcategoria FROM categorias WHERE idcategoria='$_GET[Id]'") or
    die("Problemas en el select:" . mysqli_error($link));
  if ($reg = mysqli_fetch_array($registros)) {
    // Eliminamos el categoria
    mysqli_query($link, "DELETE FROM categorias WHERE idcategoria='$_GET[Id]'") or
      die("Problemas en el select:" . mysqli_error($link));
  ?>

    <h2>Se borró la categoria.</h2>

  <?php
  } else {
  ?>

    <h2>Categoría no encontrada.</h2>

  <?php
  }
  mysqli_close($link);
  ?>

  <a href="index.php">Volver</a>
</body>

</html>
