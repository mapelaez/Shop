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

      <?php require '../header.php' ?>
	  
      <main class="container col-xl-10 col-xxl-8 px-4 py-5">
		  <section class="row align-items-center g-5 py-5">
			<section class="col-lg-7 text-center text-lg-start">
			  <h1 class="display-4 fw-bold lh-1 mb-3">Formulario de contacto</h1>
			  <p class="col-lg-10 fs-4">Rellene nuestro formulario de contacto y resolveremos sus dudas lo antes posible.</p>
			</section>
			<section class="col-10 mx-auto col-lg-5">
			  <form method="post" class="p-5 border rounded-3 bg-light" action="script-email.php">
			  	<section class="form-floating mb-3">
				  <input  type="text" name="titulo" class="form-control" id="floatingInput" placeholder="Titulo" required>
				  <label for="floatingInput">Título</label>
				</section>
				<section class="form-floating mb-3">
				  <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com" required>
				  <label for="floatingInput">Correo electrónico</label>
				</section>
				<section class="form-floating mb-3">
				  <textarea class="form-control" name="mensaje" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
				  <label for="floatingTextarea2">Su mensaje</label>
				</section>
				<button class="w-100 btn btn-lg btn-primary" type="submit" name="enviar">Enviar mensaje</button>
				<hr class="my-4">
				<small class="text-muted">Al hacer click en "Enviar mensaje", usted acepta nuestros términos y condiciones.</small>
			  </form>
			</section>
		  </section>
	  </main>
	  
	  <?php require '../footer.php' ?>
  </body>  
</html>
