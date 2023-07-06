<?php
@session_start();
if(!isset($_SESSION["logueado"])){
    echo "<script> window.location = '/proyectoweb/login/login.php?msg=Inicia sesión para agregar este producto' </script>";
}

// Incluir config file
require_once "../login/config.php";
//require_once "funcionlistar.php";
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

    <main class="text-center container pt-2">
        <section class="container my-5">
            <section class="row p-4 pb-5 pe-lg-5 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <section class="container-fluid">
                        <section class="row px-5">
                            <section class="col-md-7">
                                <section class="shopping-cart">
                                    <h6>Mi Carrito</h6>
                                    <hr>
                                                <section class="row price-details">
                                                    <section class="col-md-4">
                                                        <h6>Producto</h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6>Precio Unitario</h6>
                                                    </section>
                                                    <section class="col-md-3">
                                                        <h6>Cantidad </h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6>Subtotal</h6>
                                                    </section>
                                                    <section class="col-md-1">
                                                        Eliminar
                                                    </section>
                                                </section>
                                    <?php

                                        $total = 0;
                                        $num_productos = 0;
                                        if (isset($_SESSION['carrito']) && $_SESSION['carrito'] > 0){
                                            $resultado = mysqli_query($link, "SELECT P.id, P.nombre,P.precio, P.imagen, C.cantidad, C.id_car
                                            FROM productos P INNER JOIN carrito C ON P.id = C.id_pro WHERE C.id_user = ".$_SESSION['id']) or
                                            die("Problemas en el select:" . mysqli_error($link));

                                            while ($row = mysqli_fetch_assoc($resultado)){
                                                $id_carrito = $row['id_car'];
                                                $subtotal = $row['precio'] * $row['cantidad'];
                                                if($row['cantidad'] > 1)
                                                    $restar = "functionsCar.php?resCar=$id_carrito";
                                                else 
                                                    $restar = '#';
                                            ?>

                                                <section class="row price-details">
                                                    <section class="col-md-2">
                                                        <img src="<?= $row['imagen']?>" width="100%">
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6><?= $row['nombre']?></h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6><?= $row['precio']?></h6>
                                                    </section>
                                                    <section class="col-md-3">
                                                        <h6><a href="<?= $restar ?>" class="btn btn-secondary"> - </a>
                                                            &nbsp;<?= $row['cantidad']?>&nbsp;
                                                            <a href="functionsCar.php?sumCar=<?= $id_carrito ?>" class="btn btn-secondary"> + </a>
                                                        </h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6><?= $subtotal?></h6>
                                                    </section>
                                                    <section class="col-md-1">
                                                        <a href="functionsCar.php?delCar=<?= $id_carrito ?>" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </a>
                                                    </section>
                                                </section>
                                                <hr>
                                            <?php

                                                $total += $subtotal;
                                                $num_productos++;
                                            }
                                        }else{
                                            echo "<h5>El carrito esta vacio </h5>";
                                        }

                                    ?>

                                </section>
                            </section>
                            <section class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                                <section class="pt-4">
                                    <h6>DETALLES DEL PRECIO</h6>
                                    <hr>
                                    <section class="row price-details">
                                        <section class="col-md-6">
                                            <?php
                                               if(isset($_SESSION['carrito'])){
                                                    echo "<h6>Precio ($num_productos productos)</h6>";
                                                }else{
                                                    echo "<h6>Precio (0 productos)</h6>";
                                                }
                                            ?>
                                            <h6>Cargos de Envio</h6>
                                            <hr>
                                            <h6>Cantidad pagable</h6>
                                        </section>
                                        <section class="col-md-6">
                                            <h6>$<?php echo $total; ?></h6>
                                            <h6 class="text-success">GRATIS</h6>
                                            <hr>
                                            <h6>$<?php
                                                echo $total;
                                                ?></h6>
                                        </section>
                                        <hr>
                                        <?php if($_SESSION['carrito'] > 0){ ?>
                                        <section class="col-md-12">
                                            <a href="/proyectoweb/pedidos/functionsPed.php?comprar=<?= $total ?>" class="btn btn-primary"> Completar pedido </a>
                                            <br><br>
                                        </section>
                                        <?php } ?>
                                    </section>
                                </section>

                            </section>
                        </section>
                    </section>
            </section>
        </section>
    </main>

<?php require '../footer.php' ?>
  </body>  
</html>
   
