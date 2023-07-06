
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
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Javascript del logo -->
	<script src="js/logo.js"></script>
	
	<!-- Javascript del mapa -->
	<script src="js/mapa.js"></script>

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
  
  <?php require_once 'header.php' ?>
      
      <main>
		  <section class="text-center container pt-2">
			<section class="p-lg-5 mb-4 text-white rounded bg-dark">
			  <section class="col-md-6 mx-auto">
					<h1 class="fw-light">Tienda</h1>
					<p class="lead text-muted">Traemos los mejores productos del mercado <br> al mejor precio y con la mejor calidad. Vendemos dispositivos <br> electrónicos y trabajamos con las mejores marcas</p>
					<p>
					<a href="calendario/" class="btn btn-primary my-2">Calendario</a>
					<a href="quienes_somos/" class="btn btn-secondary my-2">¿Quienes somos?</a>
					</p>
			  </section>
			</section>
		</section>


					
		  <section class="album py-5 bg-light">
			<section class="container">

	

			  <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				
			  
				<?php

				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
				FROM productos WHERE id=1 ") or
				die("Problemas en el select:" . mysqli_error($link));

				while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>	
				  </section>
				</article>
					
				<?php
					}
				?>

				<?php

				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id=2 ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
					?>

				<article class="col">
				  <section class="card shadow-sm">
				  <img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success"  onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>
				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='3' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
					?>
				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>
					
				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='4' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				  <article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='5' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='6' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='7' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='8' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				<?php
				$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
					FROM productos WHERE id='9' ") or
					die("Problemas en el select:" . mysqli_error($link));

					while ($reg = mysqli_fetch_array($registros)) {
				?>

				<article class="col">
				  <section class="card shadow-sm">

					<img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
					
					<section class="card-body">
					  <p class="card-text"><?= $reg['resumen'] ?></p>
					  <section class="d-flex justify-content-between align-items-center">
						<section class="btn-group">
						  <button type="button" class="btn btn-sm btn btn-success" onclick="location.href='productos/producto.php?id=<?= $reg['id'] ?>'">Comprar</button>
						</section>
						<small class="text-muted"><?= $reg['precio'] ?>€</small>
					  </section>
					</section>
				  </section>
				</article>

				<?php
					}
				?>

				
			  </section>
			</section>
		  </section>

		
		</main>
		<?php require 'footer.php' ?>
  </body>  
</html>
