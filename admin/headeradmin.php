<?php

// Inicilizar la sesión si no se ha inicializado antes
session_start();

// Dirección de la carpeta que contiene la web
$raiz = "/proyectoweb";

//Comprobar que el usuario es el administrador
if($_SESSION["usuario"] !='admin'){
  header("Location: ../../login/login.php?msg=No tienes permiso para acceder a esta sección. Inicia sesión antes.");
  exit;
}
?>

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
				  <a class="nav-link" href="<?= $raiz ?>">Inicio</a>
				  <a class="nav-link" href="<?= $raiz ?>/admin/productos/index.php">Productos</a>
                  <a class="nav-link" href="<?= $raiz ?>/admin/usuarios/index.php">Usuarios</a>
                  <a class="nav-link" href="<?= $raiz ?>/admin/categorias/index.php">Categorias</a>			  					
				</section>
			</section>
		  </section>
		</nav>
	</section>
</header>
