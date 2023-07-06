<?php
	session_start();
	require_once "../login/config.php";
	
	if (isset($_REQUEST['agregarCar']) && isset($_SESSION['id'])) {
		$registros = mysqli_query($link, "SELECT * FROM carrito WHERE id_pro = {$_REQUEST['id']}") or
        die("Problemas en el select:" . mysqli_error($link));
 
        if ($registros -> num_rows == 0) {
        	$sql = "INSERT INTO carrito (id_pro, id_user) VALUES (".$_REQUEST['id'].",".$_SESSION["id"].") ";
			mysqli_query($link, $sql)
      			or die("Problemas en el select " . mysqli_error($link));
      		$_SESSION["carrito"]++;
      		header("Location: ../carrito/carrito.php");
        }else{
        	header("Location: ../productos/producto.php?id=".$_REQUEST['id']."&msg=Ya has añadido este producto al carrito");
        }
		
      //
	} else if (isset($_REQUEST['resCar']) && isset($_SESSION['id'])) {

        	$sql = "UPDATE carrito SET cantidad = cantidad - 1 WHERE id_car = ".$_REQUEST['resCar'];
			mysqli_query($link, $sql)
      			or die("Problemas en el select " . mysqli_error($link));
      		header("Location: ../carrito/carrito.php");
        
		
      //
	}else if (isset($_REQUEST['sumCar']) && isset($_SESSION['id'])) {

        	$sql = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_car = ".$_REQUEST['sumCar'];
			mysqli_query($link, $sql)
      			or die("Problemas en el select " . mysqli_error($link));
      		header("Location: ../carrito/carrito.php");
        
		
      //
	}else if (isset($_REQUEST['delCar']) && isset($_SESSION['id'])) {

        	$sql = "DELETE FROM carrito WHERE id_car = ".$_REQUEST['delCar'];
			mysqli_query($link, $sql)
      			or die("Problemas en el select " . mysqli_error($link));
      		$_SESSION["carrito"]--;
      		header("Location: ../carrito/carrito.php");
        
		
      //
	}else{
		header("Location: ../login/login.php?msg=Para hacer uso del carrito inicia sesión");
	}
?>