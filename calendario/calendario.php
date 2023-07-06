<?php
// Incluir config file
require_once "../login/config.php";

// Inicilizar la sesión si no se ha inicializado antes
@session_start();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Flexbox Calendar w/ Retina Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <main>
<section>
 <time datetime="2021-11-01" class="blank"><span class="caldate">01</span></time>
 <time datetime="2021-11-02" class="blank"><span class="caldate">02</span></time>
 <time datetime="2021-11-03" class="blank"><span class="caldate">03</span></time>
 <time datetime="2021-11-04" class="blank"><span class="caldate">04</span></time>
 <time datetime="2021-11-05" class="blank"><span class="caldate">05</span></time>
 <time datetime="2021-11-06" class="blank"><span class="caldate">06</span></time>
 <time datetime="2021-11-07" class="blank"><span class="caldate">07</span></time>
 <time datetime="2021-11-08" class="blank"><span class="caldate">08</span></time>
 <time datetime="2021-11-09" class="blank"><span class="caldate">09</span></time>
 <time datetime="2021-11-10" class="blank"><span class="caldate">10</span></time>
 <time datetime="2021-11-11" class="blank"><span class="caldate">11</span></time>
 <time datetime="2021-11-12" class="blank"><span class="caldate">12</span></time>
 <time datetime="2021-11-13" class="blank"><span class="caldate">13</span></time>
 <time datetime="2021-11-14" class="blank"><span class="caldate">14</span></time>
 <time datetime="2021-11-15" class="blank"><span class="caldate">15</span></time>
 <time datetime="2021-11-16" class="blank"><span class="caldate">16</span></time>
 <time datetime="2021-11-17" class="blank"><span class="caldate">17</span></time>
 <time datetime="2021-11-18" class="blank"><span class="caldate">18</span></time>
 <time datetime="2021-11-19" class="blank"><span class="caldate">19</span></time>
 <time datetime="2021-11-20" class="blank"><span class="caldate">20</span></time>
 <time datetime="2021-11-21" class="blank"><span class="caldate">21</span></time>
 <?php
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=1 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-22" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">22</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=2 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-23" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">23</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=3 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-24" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">24</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=4 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-25" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">25</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=5 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-26" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">26</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
 ?>
 <time datetime="2021-11-27" class="blank"><span class="caldate">27</span></time>
 <time datetime="2021-11-28" class="blank"><span class="caldate">28</span></time>
 <?php
	$registros = mysqli_query($link, "SELECT id, nombre,resumen, precio, imagen
		FROM productos WHERE id=6 ") or
		die("Problemas en el select:" . mysqli_error($link));

	if ($reg = mysqli_fetch_array($registros)) {
 ?>
 <time datetime="2021-11-29" class="hidden">
  <a href="../productos/producto.php?id=<?= $reg['id'] ?>" target="_top"><img src="<?= $reg['imagen'] ?>" alt="<?= $reg['nombre'] ?>" > 
   <span
   class="caldate">29</span><span class="title">Oferta<br><?= $reg['nombre'] ?></span></a>
 </time>
 <?php
	}
 ?>
 <time datetime="2021-11-30" class="blank"><span class="caldate">30</span></time>
</section>
</main>
  
    <script src="js/index.js"></script>

</body>
</html>
