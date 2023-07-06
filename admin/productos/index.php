<?php
  // Incluir config file
  require_once "../../login/config.php";
?>

<!doctype html>
<html>

<head>
  <title>Administración productos</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- CSS de los iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
  <!-- CSS de la web -->
  <link rel="stylesheet" href="../../css/style.css">
    
  <!-- Javascript del logo -->
  <script src="../../js/logo.js"></script>
	
  <!-- Javascript del mapa -->
  <script src="../../js/mapa.js"></script>
  	
  <!-- CSS del admin -->
  <link rel="stylesheet" href="../estiloadmin.css">

  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	
  <script  language="javascript" type="text/javascript">
  window.onload = function() {
    dibujarLogo(document.getElementById("canvasLogo"));
    getLocation(document.getElementById("mapa"));
  };
  </script>
  
  <script type="text/javascript">
    function AlertaBorrar(id, nombre) {
      var respuesta = confirm ("¿Confirma eliminación del producto " + nombre + "?")
      if (respuesta)
        window.location="borrar.php?Id=" + id;
    }
  </script>
</head>

<body class="d-flex flex-column h-100">

  <?php require '../headeradmin.php'; ?>

  <main class="text-center container pt-2">
  <?php
  $registros = mysqli_query($link, "SELECT id, nombre, precio
                                        FROM productos") or
    die("Problemas en el select:" . mysqli_error($link));

  if ($registros->num_rows === 0){
  ?>

    No se han encontrado  clientes en la base de datos.

  <?php
  } else {
  ?>

    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Editar</th>
        <th>Borrar</th>
      </tr>

  <?php
    while ($reg = mysqli_fetch_array($registros)) {
  ?>

      <tr>
        <td><?= $reg['id'] ?></td>
        <td><?= $reg['nombre'] ?></td>
        <td><?= $reg['precio'] ?></td>
        <td><a type="button" class="btn btn-secondary" href="index.php?Id=<?= $reg['id'] ?>">Editar</a></td>
        <td><a type="button" class="btn btn-danger" href="javascript:AlertaBorrar(<?= $reg['id'] ?>, '<?= $reg['nombre'] ?>');">Borrar</a></td>
      </tr>

  <?php
    }
  ?>

    </table><br>

  <?php
  }
  
  // Mostramos los campos de edición en caso de que se nos indique un ID
  if(isset($_GET['Id']))
  {
    $registros = mysqli_query($link, "SELECT nombre, resumen, descripcion1, descripcion2, precio, imagen, categoria
                                      FROM productos
                                      WHERE id='$_GET[Id]'") or
    die("Problemas en el select:" . mysqli_error($link));
    
    if ($reg = mysqli_fetch_array($registros)) {
      $nombre = $reg['nombre'];
      $resumen = $reg['resumen'];
      $descripcion1 = $reg['descripcion1'];
      $descripcion2 = $reg['descripcion2'];
      $precio = $reg['precio'];
      $imagen = $reg['imagen'];
      $categoria = $reg['categoria'];
      $registrosFotos = mysqli_query($link, "SELECT foto1, foto2, foto3
                                      FROM fotos
                                      WHERE idproducto='$_GET[Id]'") or
        die("Problemas en el select:" . mysqli_error($link));
      $regFotos = mysqli_fetch_array($registrosFotos);
      $foto1 = $regFotos['foto1'];
      $foto2 = $regFotos['foto2'];
      $foto3 = $regFotos['foto3'];
    }
  ?>
  
    <h1>Editar producto</h1>
  
  <?php  
  } else {
      $nombre = "";
      $resumen = "";
      $descripcion1 = "";
      $descripcion2 = "";
      $precio = "";
      $imagen = "";
      $categoria = "";
      $foto1 = "";
      $foto2 = "";
      $foto3 = "";
  ?>
  
    <h1>Crear producto</h1>

  <?php
  }
  ?>
  
  
  <form action="guardar.php" method="post" class="p-5 border rounded-3 bg-light">
    <?php
      if(isset($_GET['Id']))
        echo '<input type="hidden" name="Id" value="' . $_GET['Id'] . '">';
    ?>
    <section class="form-floating mb-3">
      <input type="text" name="Nombre" class="form-control" placeholder="Nombre" value="<?= $nombre ?>">
      <label>Nombre</label>
    </section>
    <section class="form-floating mb-3">
      <textarea type="text" name="Resumen" class="form-control" placeholder="Resumen"><?= $resumen ?></textarea>
      <label>Resumen</label>
    </section>
    <section class="form-floating mb-3">
      <textarea type="text" name="Descripcion1" class="form-control" placeholder="Descripción"><?= $descripcion1 ?></textarea>
      <label>Descripción</label>
    </section>
    <section class="form-floating mb-3">
      <textarea type="text" name="Descripcion2" class="form-control" placeholder="Descripción adicional"><?= $descripcion2 ?></textarea>
      <label>Descripción adicional</label>
    </section>
    <section class="form-floating mb-3">
      <input type="number" step="0.01" name="Precio" class="form-control" placeholder="Precio" value="<?= $precio ?>">
      <label>Precio</label>
    </section>
    <section class="form-floating mb-3">
      <input type="text" name="Imagen" class="form-control" placeholder="Imagen principal" value="<?= $imagen ?>">
      <label>Imagen principal</label>
    </section>
    <section class="form-floating mb-3">
      <input type="text" name="Foto1" class="form-control" placeholder="Imagen adicional 1" value="<?= $foto1 ?>">
      <label>Imagen adicional 1</label>
    </section>
    <section class="form-floating mb-3">
      <input type="text" name="Foto2" class="form-control" placeholder="Imagen adicional 2" value="<?= $foto2 ?>">
      <label>Imagen adicional 2</label>
    </section>
    <section class="form-floating mb-3">
      <input type="text" name="Foto3" class="form-control" placeholder="Imagen adicional 3" value="<?= $foto3 ?>">
      <label>Imagen adicional 3</label>
    </section>
    <section class="form-group mb-3">
      <select class="form-select" name="Categoria">
        <option value="" selected disabled>Selecciona el tipo de producto</option>
        <?php
        $registros = mysqli_query($link, "SELECT idcategoria, nombre FROM categorias") or
          die("Problemas en el select:" . mysqli_error($link));
        while ($reg = mysqli_fetch_array($registros)) {
        ?>

          <option value="<?= $reg['idcategoria'] ?>" <?= ($reg['idcategoria'] === $categoria) ? 'selected="selected"' : '' ?>><?= $reg['nombre'] ?></option>

        <?php
        }
        mysqli_close($link);
        ?>
      </select>
    </section>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Guardar">
  </form>
  
  </main>
  
  <?php require '../../footer.php' ?>

</body>

</html>
