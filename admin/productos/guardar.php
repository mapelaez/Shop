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
  <title>Guardar producto</title>
</head>

<body>
  <?php

  if (isset($_REQUEST['Id']) and $_REQUEST['Id'] != ''){
    // Actualizamos el producto si ya existe
    mysqli_query($link, "UPDATE productos SET nombre='$_REQUEST[Nombre]', resumen='$_REQUEST[Resumen]',
                                descripcion1='$_REQUEST[Descripcion1]', descripcion2='$_REQUEST[Descripcion2]',
                                precio='$_REQUEST[Precio]', imagen='$_REQUEST[Imagen]', categoria='$_REQUEST[Categoria]'
                         WHERE id = '$_REQUEST[Id]'")
      or die("Problemas en el update " . mysqli_error($link));
      
    // Actualizamos la entrada para las fotos
    mysqli_query($link, "UPDATE fotos SET foto1='$_REQUEST[Foto1]', foto2='$_REQUEST[Foto2]',
                                              foto3='$_REQUEST[Foto3]'
                         WHERE idproducto = '$_REQUEST[Id]'")
      or die("Problemas en el update " . mysqli_error($link));
  } else {
    // Creamos el producto
    mysqli_query($link, "INSERT INTO productos(nombre, resumen, descripcion1, descripcion2,
                                               precio, imagen, categoria)
                         VALUES ('$_REQUEST[Nombre]', '$_REQUEST[Resumen]', '$_REQUEST[Descripcion1]',
                                '$_REQUEST[Descripcion2]', $_REQUEST[Precio],
                                '$_REQUEST[Imagen]', $_REQUEST[Categoria])")
      or die("Problemas en el insert del producto" . mysqli_error($link));
      
    // Creamos la entrada en la tabla de fotos
    mysqli_query($link, "INSERT INTO fotos(idproducto, foto1, foto2, foto3)
                         VALUES (LAST_INSERT_ID(), '$_REQUEST[Foto1]', '$_REQUEST[Foto2]',
                                '$_REQUEST[Foto3]')")
      or die("Problemas en el insert de la imagen" . mysqli_error($link));
  }
  
  mysqli_close($link);
  ?>

  <h2>El producto fue guardado.<h2>
  <a href="index.php">Volver</a>
</body>

</html>
