<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda Ecko - ¿Quénes somos?</title>
	
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
			dibujarLogo(document.getElementById("canvasLogo"),true);
			dibujarLogo(document.getElementById("canvasLogoGrande"),false);
			getLocation(document.getElementById("mapa"));
		};
	</script>
  </head>
  <body class="d-flex flex-column h-100">

      <?php require_once '../header.php' ?>
	  
      <main class="text-center container pt-2">
			<section class="container my-5">
			  <article class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
				<section class="col-lg-7 p-3 p-lg-5 pt-lg-3">
				  <h1 class="display-4 fw-bold lh-1">¿Quiénes somos?</h1>
				  <p class="lead">Ecko es una nueva empresa de distribución de dispositivos informáticos fundada en 2021. Nuestro personal está apasionado por la informática, por lo que si tienes cualquier pregunta, no dudes en <a href="../contacto/">contactar con nosotros.</a></p>
				</section>
				<section class="col-lg-4 offset-lg-1 p-0 position-relative overflow-hidden">
				  <section class="position-lg-absolute top-0 left-0 overflow-hidden">
					<canvas id="canvasLogoGrande" width="279" height="300"></canvas>
				  </section>
				</section>
			  </article>
			</section>
			<section class="container my-5">
				<article class="row p-4 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
					<section class="col-lg-4 p-0 position-relative overflow-hidden shadow-lg">
					  <section class="position-lg-absolute top-0 left-0 overflow-hidden">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d555.8618960228163!2d-1.1349549342288563!3d37.990435895441784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63821e3c449f4b%3A0x116721de453128e5!2sAv.%20de%20la%20Libertad%2C%207%2C%2030009%20Murcia!5e0!3m2!1ses!2ses!4v1619891098595!5m2!1ses!2ses" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</section>
					  </section>
					<section class="col-lg-7 p-3 p-lg-5 pt-lg-3">
					  <h1 class="display-4 fw-bold lh-1">¿Dónde nos encontramos?</h1>
					  <p class="lead">Nuestra empresa tiene su sede en Murcia, pero nos hemos expandido a lo largo de toda la Península, y cada día abrimos más tiendas.<br>¡Encuentra tu tienda más cercana!</p>
					</section>
				</article>
			</section>
	  </main>
	  
	  <?php require_once '../footer.php' ?>

  </body>  
</html>
