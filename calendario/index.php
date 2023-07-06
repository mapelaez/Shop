<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda Ecko - Ofertas</title>
	
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
	  
      <main class="text-center container pt-2">
			<section class="container my-5">
			  <section class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg embed-responsive">
			  	<h1>Ofertas del mes</h1>
				<iframe class="embed-responsive-item" src="calendario.php" height="1050"></iframe>
			  </section>
			</section>
	  </main>
	  
	  <?php require_once '../footer.php' ?>

  </body>  
</html>
