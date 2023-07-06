<?php

// Incluir config file
require_once "../login/config.php";
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda Ecko</title>
	
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- CSS de los iconos -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	<!-- CSS de la web -->
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Javascript del logo -->
	<script src="../js/logo.js"></script>
	
	<!-- Javascript del mapa -->
	<script src="../js/mapa.js"></script>

	<!-- Font Awesome (iconos) -->
    <script src="https://kit.fontawesome.com/12d24afdb2.js" crossorigin="anonymous"></script>

	<!-- Javascript Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	
	<script  language="javascript" type="text/javascript">
		window.onload = function() {
			dibujarLogo(document.getElementById("canvasLogo"));
			getLocation(document.getElementById("mapa"));
		};
	</script>

  </head>
  <body class="d-flex flex-column h-100">
  
  <?php require_once '../header.php' ?>
      
	<main>
		<section class="text-center container pt-2">
			  <h1>Buscar
			  <?php // Imprimimos el nombre de la categoría si se ha seleccionado una
			  if (isset($_GET['IdCategoria']) and $_GET["IdCategoria"] != '') {
				$registros = mysqli_query($link, "SELECT nombre FROM categorias WHERE idcategoria={$_GET["IdCategoria"]}") or
				  die("Problemas en el select:" . mysqli_error($link));
				$reg = mysqli_fetch_array($registros);
				echo $reg['nombre'];
			  } ?>
			  </h1>
			  <form method="GET" class="p-5 border rounded-3 bg-dark">
				<section class="input-group rounded">
				  <?php 
				  if (isset($_GET['Buscar']))
				    $buscar = $_GET['Buscar'];
				  else
				    $buscar = '';
				    
				  if (isset($_GET['IdCategoria'])) {?>
				    <input type="hidden" name="IdCategoria" value="<?= $_GET['IdCategoria'] ?>">
				  <?php } ?>
				  <input type="search" name="Buscar" class="form-control rounded" placeholder="Buscar" value="<?= $buscar ?>"/>
				  <button type="submit" class="btn btn-primary">
				    <i class="fas fa-search"></i>
				  </button>
				</section>
			  </form>
		</section>

		<section class="album py-5 bg-light">
			<section class="container">

			  <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				
				<?php
				$query = "SELECT id, resumen, precio, imagen
						FROM productos";
				
				if (isset($_GET["IdCategoria"]) and $_GET["IdCategoria"] != '')
					$query .= " WHERE categoria=" . $_GET["IdCategoria"];
					
				if (isset($_GET["Buscar"]) and $_GET["Buscar"] != ''){
					if(isset($_GET["IdCategoria"]) and $_GET["IdCategoria"] != '')
						$query .= " AND MATCH (resumen, nombre, descripcion1) AGAINST('{$_GET["Buscar"]}' IN NATURAL LANGUAGE MODE)";
					else
						$query .= " WHERE MATCH (resumen, nombre, descripcion1) AGAINST('{$_GET["Buscar"]}' IN NATURAL LANGUAGE MODE)";
				}
				
				$registros = mysqli_query($link, $query) or
				  die("Problemas en el select:" . mysqli_error($link));

				if ($registros->num_rows === 0){
				?>

				  No se han encontrado  productos en la base de datos.

				<?php
				} else {
					while ($reg = mysqli_fetch_array($registros)) {
						
				?>
				
				<article class="col">
				  <section class="card shadow-sm">
					<img src="<?= $reg['imagen'] ?>"> 

					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
							<a class="btn btn-sm btn btn-success" href="../productos/producto.php?id=<?= $reg['id'] ?>">Comprar</a>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>
				
				<?php
					}
				}
				?>
				
			  </section>
			</section>
		  </section>

	</main>
	<?php require '../footer.php' ?>
  </body>  
</html>
