<?php
// Incluir config file
require_once "login/config.php";

// Inicilizar la sesión si no se ha inicializado antes
@session_start();

// Dirección de la carpeta que contiene la web
$raiz = "/proyectoweb"
?>

<script language="javascript" type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		// make it as accordion for smaller screens
		if (window.innerWidth > 992) {

			document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

				everyitem.addEventListener('mouseover', function(e){

					let el_link = this.querySelector('a[data-bs-toggle]');

					if(el_link != null){
						let nextEl = el_link.nextElementSibling;
						el_link.classList.add('show');
						nextEl.classList.add('show');
					}

				});
				everyitem.addEventListener('mouseleave', function(e){
					let el_link = this.querySelector('a[data-bs-toggle]');

					if(el_link != null){
						let nextEl = el_link.nextElementSibling;
						el_link.classList.remove('show');
						nextEl.classList.remove('show');
					}


				});
				everyitem.addEventListener('click', function(e){
					window.location="<?= $raiz ?>/tienda/";
				});
			});

		}
	// end if innerWidth
	}); 
	// DOMContentLoaded  end
</script>

<header>
	<section class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
		  <section class="container-fluid">
			  
			<a class="navbar-brand" href="<?= $raiz ?>/">
				<canvas id="canvasLogo" width="47" height="47"></canvas>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<section class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<section class="navbar-nav ms-auto text-center">
				  <a class="nav-link" href="<?= $raiz ?>/">Inicio</a>
				  <?php 
				  	//Comprobamos si se encuentra logueado o no
				  	if(isset($_SESSION["logueado"]) && $_SESSION["logueado"] === true){
						echo '<a class="nav-link" href="'.$raiz.'/pedidos/pedidos.php">Pedidos</a>
						<a class="nav-link" href="'.$raiz.'/login/logout.php">Cerrar Sesión</a>';
					  }
					  else{
						echo '<a class="nav-link" href="'.$raiz.'/login/login.php">Login</a>';
					  }
				  ?>
				  <?php 
				  //Comprobamos si se encuentra logueado o no
					if(isset($_SESSION["logueado"]) && $_SESSION["logueado"] === true){
						if($_SESSION["usuario"] == 'admin'){
							echo "<a class='nav-link' href='{$raiz}/admin/productos/index.php'>Panel Admin</a>";
						}
					}
				  ?>
				  <a class="nav-link" href="<?= $raiz ?>/quienes_somos/">¿Quienes Somos?</a>
				  
				  <li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="<?= $raiz ?>/tienda/" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
					    Tienda
					  </a>
					  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
					    <?php
						  $registros = mysqli_query($link, "SELECT idcategoria, nombre FROM categorias") or
						    die("Problemas en el select:" . mysqli_error($link));

						  if ($registros->num_rows === 0){
						    echo '<li>No se han encontrado categorías en la base de datos.</li>';
						  } else {
						    while ($reg = mysqli_fetch_array($registros)) {
					    ?>
						      <li><a class="dropdown-item" href="<?= $raiz ?>/tienda/?IdCategoria=<?= $reg['idcategoria'] ?>"><?= $reg['nombre'] ?></a></li>
					    <?php
						    }
						  }
					    ?>
					  </ul>
				  </li>
				  
					<a class="nav-link" href="<?= $raiz ?>/contacto/">Contacto</a>
					<button class="navbar-toggler"
						type="button"
							data-toggle="collapse"
							data-target = "#navbarNavAltMarkup"
							aria-controls="navbarNavAltMarkup"
							aria-expanded="false"
							aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>

					<section class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<section class="mr-auto"></section>
						<section class="navbar-nav">
							<a href="<?= $raiz ?>/carrito/carrito.php" class="nav-item nav-link active">
								<h5 class="px-5 cart">
									<i class="fas fa-shopping-cart"></i> Carrito
									<?php
									
									if(isset($_SESSION['carrito'])){
										$contar = $_SESSION['carrito'];
										echo "<span id=\"contar_carrito\" class=\"text-warning\">$contar</span>";
									} 
									else{
										echo "<span id=\"contar_carrito\" class=\"text-warning\">0</span>";
									}

									?>
								</h5>
							</a>
						</section>
					</section>
				</section>
			</section>
		  </section>
		</nav>
	</section>
</header>
