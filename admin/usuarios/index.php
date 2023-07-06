<?php
  // Incluir config file
require_once "../../login/config.php";
?>

<!doctype html>
<html>

<head>
  <title>Administración usuarios</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- CSS de los iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
  <!-- CSS de la web -->
  <link rel="stylesheet" href="../../css/style.css">
    
  <!-- Javascript del logo -->
  <script src="../../js/logo.js"></script>
  	
  <!-- CSS del admin -->
  <link rel="stylesheet" href="../estiloadmin.css">
	
  <!-- Javascript del mapa -->
  <script src="../../js/mapa.js"></script>
	
  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	
  <script  language="javascript" type="text/javascript">
  window.onload = function() {
    dibujarLogo(document.getElementById("canvasLogo"));
    getLocation(document.getElementById("mapa"));
  };
  </script>

  <script type="text/javascript">
    function AlertaBorrar(id, usuario) {
      var respuesta = confirm ("¿Confirma eliminación del usuario " + usuario + "?")
      if (respuesta)
        window.location="borrar.php?Id=" + id;
    }
  </script>
</head>

<body class="d-flex flex-column h-100">

  <?php require '../headeradmin.php' ?>
  
  <?php
  // Comprobar que el usuario es el administrador
  if ($_SESSION["usuario"] !='admin'){
    header("Location: ../../login/login.php?msg=No tienes permiso para acceder a esta sección. Inicia sesión antes.");
    exit;
  }
  

  ?>

  <main class="text-center container pt-2">
  <?php
  $registros = mysqli_query($link, "SELECT id, usuario, nombre, apellido, email
                                        FROM usuarios") or
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
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Editar</th>
        <th>Borrar</th>
      </tr>

  <?php
    while ($reg = mysqli_fetch_array($registros)) {
  ?>

      <tr>
        <td><?= $reg['id'] ?></td>
        <td><?= $reg['usuario'] ?></td>
        <td><?= $reg['nombre'] ?></td>
        <td><?= $reg['apellido'] ?></td>
        <td><?= $reg['email'] ?></td>
        <td><a type="button" class="btn btn-secondary" href="index.php?Id=<?= $reg['id'] ?>">Editar</a></td>
        <td><a type="button" class="btn btn-danger" href="javascript:AlertaBorrar(<?= $reg['id'] ?>, '<?= $reg['nombre'] ?>');">Borrar</a></td>
      </tr>

  <?php
    }
  ?>

    </table>

  <?php
  }
  
  // Mostramos los campos de edición en caso de que se nos indique un ID
  if(isset($_GET['Id']))
  {
    $registros = mysqli_query($link, "SELECT id, usuario, nombre, apellido, email
                                      FROM usuarios WHERE id='$_GET[Id]'") or
    die("Problemas en el select:" . mysqli_error($link));
    
    if ($reg = mysqli_fetch_array($registros)) { 
      $usuario = $reg['usuario'];
      $nombre = $reg['nombre'];
      $apellidos = $reg['apellido'];
      $email = $reg['email'];
    }
  ?>
    <br><h1>Editar usuario</h1>
  
  <?php
  } else {
      $usuario = "";
      $nombre = "";
      $apellidos = "";
      $email = "";
  ?>
  
    <br><h1>Crear usuario</h1>
    
  <?php
  }
  mysqli_close($link);
  ?>
  
    <form action="guardar.php" method="post" class="p-5 border rounded-3 bg-light">
      <?php
        if(isset($_GET['Id']))
          echo '<input type="hidden" name="Id" value="' . $_GET['Id'] . '">';
      ?>
      <section class="form-floating mb-3">
        <input type="text" name="Usuario" class="form-control" placeholder="Usuario" value="<?= $usuario ?>">
        <label>Usuario</label>
      </section>
      <section class="form-floating mb-3">
        <input type="text" name="Nombre" class="form-control" placeholder="Nombre" value="<?= $nombre ?>">
        <label>Nombre</label>
      </section>
      <section class="form-floating mb-3">
        <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos" value="<?= $apellidos ?>">
        <label>Apellidos</label>
      </section>
      <section class="form-floating mb-3">
        <input type="email" name="Email" class="form-control" placeholder="Email" value="<?= $email ?>">
        <label>Email</label>
      </section>
      <section class="form-floating mb-3">
        <input type="password" name="Contrasena" class="form-control" placeholder="Contraseña">
        <label>Contraseña</label>
      </section>
      <input class="w-100 btn btn-lg btn-primary" type="submit" value="Guardar">
    </form>
  
  </main>
  
  <?php require '../../footer.php' ?>

</body>

</html>
