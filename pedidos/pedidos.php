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
            <?php 
                if(isset($_REQUEST['msg'])){
                    echo '<section class="alert alert-danger" id="msg">
                    ' . $_REQUEST['msg'] . '
                    </section>';
                } else if(isset($_REQUEST['success'])){
                    echo '<section class="alert alert-success" id="msg">
                    ' . $_REQUEST['success'] . '
                    </section>';
                }        
            ?>
            <section class="row p-4 pb-5 pe-lg-5 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <section class="container-fluid">
                        <section class="row px-5">
                            <section class="col-md-12">
                                <section class="shopping-cart">
                                    <h2>PEDIDOS REALIZADOS</h2>
                                </section>
                            </section>
                        </section>
                    </section>
            </section>
        </section>
<?php
        $resultado = mysqli_query($link, "SELECT * FROM pedidos P WHERE P.id_user = ".$_SESSION['id']) or
                die("Problemas en el select:" . mysqli_error($link));
            if($resultado ->num_rows > 0){  
                while ($row = mysqli_fetch_assoc($resultado)){
                    $id_pedido = $row['id_ped'];
                    $total = $row['total'];
                    $fecha = $row['fecha_compra'];
?>
        <section class="container my-5">
            <section class="row p-4 pb-5 pe-lg-5 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <section class="container-fluid">
                        <section class="row px-5">
                            <section class="col-md-12">
                                <section class="shopping-cart">
                                    <h5> Pedido Nº  <?= $id_pedido ?> - <small>Fecha de compra: <?= $fecha ?></small></h5><hr>
                                                <section class="row price-details">
                                                    <section class="col-md-5">
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
                                                </section>
                                    <?php

                                            $resultado2 = mysqli_query($link, "SELECT P.id, P.nombre,P.precio, P.imagen, C.cantidad
                                            FROM productos P INNER JOIN prodxped C ON P.id = C.id_pro WHERE C.id_ped = ".$id_pedido) or
                                            die("Problemas en el select:" . mysqli_error($link));

                                            while ($row2 = mysqli_fetch_assoc($resultado2)){
                                                $subtotal = $row2['precio'] * $row2['cantidad'];
                                            ?>

                                                <section class="row price-details">
                                                    <section class="col-md-2">
                                                        <h6><img src="<?= $row2['imagen']?>" width="100%"></h6>
                                                    </section>
                                                    <section class="col-md-3">
                                                        <h6><?= $row2['nombre']?></h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6><?= $row2['precio']?></h6>
                                                    </section>
                                                    <section class="col-md-2">
                                                        <h6><?= $row2['cantidad']?></h6>
                                                    </section>
                                                    <section class="col-md-3">
                                                        <h6><?= $subtotal?></h6>
                                                    </section>
                                                </section>
                                                <hr>
                                    <?php
                                            }
                                    ?>
                                        <section class="row price-details">
                                            <section class="col-md-8">
                                                
                                            </section>
                                            <section class="col-md-4">
                                                <h4>TOTAL: <?= $total ?> EUR</h4>
                                            </section>
                                        </section>
                                </section>
                            </section>
                        </section>
                    </section>
            </section>
        </section>
<?php
                }
            } else{
?>
        <section class="container my-5">
            <section class="row p-4 pb-5 pe-lg-5 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <section class="container-fluid">
                        <section class="row px-5">
                            <section class="col-md-12">
                                <section class="shopping-cart">
                                    <h6 class="text-danger"> NO HAS REALIZADO NINGUNA COMPRA</h6>
                                </section>
                            </section>
                        </section>
                    </section>
            </section>
        </section>
<?php
            }
?>
    </main>

<?php require '../footer.php' ?>
  </body>  
</html>
