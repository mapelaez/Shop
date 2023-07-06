<?php
	session_start();
	require_once "../login/config.php";
	
	if (isset($_REQUEST['comprar'])) {
		$registros = mysqli_query($link, "SELECT * FROM carrito WHERE id_user = {$_SESSION['id']}") or
        die("Problemas en el select:" . mysqli_error($link));
 
        if ($registros -> num_rows > 0) {
        	    $date = getdate();
				$date =  $date['year']."-".$date['mon']."-".$date['mday'] ;
				echo $date;
        	$sql = "INSERT INTO pedidos (total, id_user,fecha_compra) VALUES (".$_REQUEST['comprar'].",".$_SESSION["id"].",'".$date."') ";
        	echo $sql;
			mysqli_query($link, $sql) or die("Problemas en el insert " . mysqli_error($link));
      		
      		$registros2 = mysqli_query($link, "SELECT id_ped FROM pedidos WHERE id_user = ".$_SESSION['id']." ORDER BY id_ped DESC LIMIT 1") or
        		die("Problemas en el select:" . mysqli_error($link));
      		if($registros2 -> num_rows == 1){
			    	$row = mysqli_fetch_assoc($registros2);
			    	$id_pedido = $row['id_ped'];
			    	$resultado = mysqli_query($link, "SELECT * FROM carrito WHERE id_user = ".$_SESSION['id']) or
	                    die("Problemas en el select:" . mysqli_error($link));

	                    while ($row = mysqli_fetch_assoc($resultado)){
	                    	$id_pro = $row['id_pro'];
	                    	$cantidad = $row['cantidad'];
	                    	$insertProdxPed = mysqli_query($link, "INSERT INTO prodxped (id_pro, id_ped, cantidad) VALUES ($id_pro, $id_pedido, $cantidad)") or
	                    		die("Problemas en el insert:" . mysqli_error($link));
	                    }
	                    $insertProdxPed = mysqli_query($link, "DELETE FROM carrito WHERE id_user = ".$_SESSION['id']) or
	                    		die("Problemas en el delete:" . mysqli_error($link));
			    	$_SESSION["carrito"] = 0;
			    
			}
      		header("Location: ../pedidos/pedidos.php?success=Compra realizada con exito");
        }else{
        	header("Location: ../pedidos/pedidos.php?msg=No se puedo completar la compra");
        }
		
      //
	}else{
		header("Location: ../login/login.php?msg=Para comprar productos inicia sesión");
	}
?>