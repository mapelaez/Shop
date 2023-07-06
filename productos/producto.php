

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

  	<!-- CSS de la web -->
    <link rel="stylesheet" href="imagenes2.css">
    
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

  
<?php
  require_once '../header.php' ;
  // Incluir config file
  require_once "../login/config.php";
?>


<main>
      
<?php 
 
        if(isset($_REQUEST['msg'])){
            echo '<script>
            alert("' . $_REQUEST['msg'] . '");
            </script>';
        }  
        $registros = mysqli_query($link, "SELECT productos.id, productos.nombre,productos.resumen,productos.descripcion1
        ,productos.descripcion2, productos.precio, productos.imagen, fotos.foto1, fotos.foto2, fotos.foto3
        FROM productos INNER JOIN fotos ON productos.id = fotos.idproducto WHERE productos.id={$_REQUEST['id']}") or
        die("Problemas en el select:" . mysqli_error($link));

				while ($reg = mysqli_fetch_array($registros)) {
?>


  <!--Main layout-->
  <main class="mt-5 pt-4">
    <section class="container dark-grey-text mt-5">

      <!--Grid row-->
      <section class="row wow fadeIn">
     
        <!--Grid column-->
        <section class="col-md-6 mb-4">

          <img src="<?= $reg['imagen'] ?>" class="img-fluid" id="fotoprincipal">

          </section>
        <!--Grid column-->

        <!--Grid column-->
        <section class="col-md-6 mb-4">

       
          <!--Content-->
          <section class="p-4">

          <section class="col-md-6 ">

          <h4 class="my-4 h4"><?= $reg['nombre']?></h4>

          </section>
            <p class="lead">
              <span class="mr-1">
                <del class="text-danger"><?= $reg['precio'] * 1.2?>€</del>
              </span>
              <span  class="text-primary"><?= $reg['precio']?>€</span>
            </p>

            <p class="lead font-weight-bold">Descripción</p>

            <p><?= $reg['descripcion1'] ?></p>

            <form action="../carrito/functionsCar.php" class="d-flex justify-content-left" method="POST">
              <!-- Default input -->
              <button class="btn btn-primary btn-md my-0 p" type="submit" name="agregarCar" >Agregar al carrito</button>
              <input type="hidden" value="<?= $reg['id'] ?>" name="id">
            </form>

          </section>
          <!--Content-->

          </section>
        <!--Grid column-->

      </section>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <section class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <section class="col-md-6 text-center">

          <h4 class="my-4 h4">Información</h4>

          <p><?= $reg['descripcion2'] ?></p>

          </section>
        <!--Grid column-->

      </section>
      <!--Grid row-->

      <!--Grid row-->
      <section class="row wow fadeIn">

        <!--Grid column-->
        <section class="col-lg-4 col-md-12 mb-4">

          <img src="<?= $reg['foto1'] ?>" class="img-fluid" alt="" id="fotosecundaria">

        </section>
        <!--Grid column-->

        <!--Grid column-->
        <section class="col-lg-4 col-md-6 mb-4">

          <img src="<?= $reg['foto2'] ?>" class="img-fluid" alt="" id="fotosecundaria">

          </section>
        <!--Grid column-->

        <!--Grid column-->
        <section class="col-lg-4 col-md-6 mb-4">

          <img src="<?= $reg['foto3'] ?>" class="img-fluid" alt="" id="fotosecundaria">

        </section>
        <!--Grid column-->

      </section>
      <!--Grid row-->

    </section>



  </main>
  <!--Main layout-->  
    <?php
      }
    ?>


    </main>
      

    <?php require_once '../footer.php' ?>
   

    </body>  
</html>


