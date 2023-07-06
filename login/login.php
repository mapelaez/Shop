<?php
// Inicilizar la sesión
session_start();
 
// Ver si se encuentra el usuario logueado y si es así redirigirlo al index
if(isset($_SESSION["logueado"]) && $_SESSION["logueado"] === true){
    header("location: ../index.php");
    exit;
}
 
// Incluir config file
require_once "config.php";
 
// Definir variables y inicializarlas con valores vacios
$usuario = $contraseña = "";
$usuario_err = $contraseña_err = $login_err = "";
 
// Procesa los datos del formulario cuando es enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Ver si el usuario esta vacio
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Por favor introduce un usuario";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    
    // Ver si la contraseña esta vacia
    if(empty(trim($_POST["contraseña"]))){
        $contraseña_err = "Por favor introduce una contraseña.";
    } else{
        $contraseña = trim($_POST["contraseña"]);
    }
    
    // Validar credenciales
    if(empty($usuario_err) && empty($contraseña_err)){
        // Preparar la declaración select
        $sql = "SELECT id, usuario, contraseña FROM usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Une las variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            // Establecer parámetros
            $param_usuario = $usuario;
            
            // Intento de ejecutar la declaración preparada. 
            if(mysqli_stmt_execute($stmt)){
                  /* almacenar resultado */
                mysqli_stmt_store_result($stmt);
                
                // Ver si existe el usuario, si existe, comprobar la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vincular variables de resultados
                    mysqli_stmt_bind_result($stmt, $id, $usuario, $contraseña_hash);
                    if(mysqli_stmt_fetch($stmt)){
                 

                        if($contraseña == $contraseña_hash){
                            // La contraseña es correcta por lo que comienza la sesión
                            session_start();
                            $resultado = mysqli_query($link, "SELECT COUNT(C.id_user) as 'cont' FROM carrito C WHERE C.id_user = ".$id) or
                                die("Problemas en el select:" . mysqli_error($link));

                                while ($row = mysqli_fetch_assoc($resultado)){
                                    $_SESSION['carrito'] = $row['cont'];
                                }
                            // Guardar la información en las variables de sesión
                            $_SESSION["logueado"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $usuario; 
                            
                            // Redirigir a la página principal
                            header("location:  ../index.php");
                        } else{
                            // La contraseña es invalida por lo que muestra este mensaje
                            $login_err = "Usuario o contraseña incorrecta";
                        }
                    }
                } else{
                    // EL usuario no existe por lo que muestra este mensaje
                    $login_err = "Usuario o contraseña incorrecta";
                }
            } else{
                echo "Algo fue mal. Intentalo más tarde";
            }

            // Cerrar declaración
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrar conexión
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title> Login de Usuario </title>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <!-- Javascript Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Estilo CSS --> 
    <link rel="stylesheet" href="../css/stylelogin.css">


</head>

<body >


<section class="container-fluid">
  <section class="row">
    <section class="col-12 col-lg-6 align-self-center">
      <section class="m-3 m-lg-5">
        <?php
            if(isset($_REQUEST['msg'])){
                $login_err = $_REQUEST['msg'];
            }
        ?>
        <section class="text-center mt-4">
          <h1 class="h3">Login</h1>
          <p class="lead">
            Empieza a comprar los mejores productos tecnológicos del mercado.
          </p>
        </section>

        <form action="login.php" method="post">


        <?php 
        if(!empty($login_err)){
            echo '<section class="alert alert-danger" id="msg">
            <div class="d-flex flex-row-reverse close-msg" onclick="ocultar()">x</div>
            ' . $login_err . '
            </section>';
        }        
        ?>

            <section class="mb-3">
                <label for="usuario" class="form-label"><b> Usuario </b> </label>
                <input type="text" class="form-control <?php echo (!empty($usuario_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $usuario; ?>" name="usuario">
                <span class="invalid-feedback"><?php echo $usuario_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="contraseña" class="form-label"> <b> Contraseña </b> </label>
                <input type="password" class="form-control <?php echo (!empty($contraseña_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contraseña; ?>" name="contraseña">
                <span class="invalid-feedback"><?php echo $contraseña_err; ?></span>
            </section>

            <section class="text-center mt-4">
                 <button type="submit" class="btn btn-block btn-success">Login</button>
            </section>

            <section class="text-center text-muted mt-2">
            ¿No tienes una cuenta?<a href="registro.php">Registrarse</a>
            </section>
        </form>
       </section> 
     </section>
   <section class="col-12 col-lg-6 d-none d-lg-flex col-img">
   </section>
 </section>
</section>
<script type="text/javascript">
        function ocultar(){
            var msg = document.getElementById('msg');
            msg.style.display = "none";
        }
    </script>
</body>

</html>