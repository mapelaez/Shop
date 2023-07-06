<?php
require_once('config.php');


// Define las variables y las inicializa con valores vacios 
$usuario = $contraseña = $confirmar_contraseña = "";
$usuario_err= $contraseña_err = $confirmar_contraseña_err = "";
$nombre=$nombre_err=$apellido=$apellido_err="";
$email= $email_err = ""; 

// Procesa los datos del formulario cuando es enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valida el usuario
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Porfavor introduce un usuario.";
    } else{
        // Prepara la declaración select
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Une las variables a la declaración preparada como parámetros

            mysqli_stmt_bind_param($stmt, "s", $param_usuario);
            
            // Establecer parámetros
            $param_usuario = trim($_POST["usuario"]);
            
            // Intento de ejecutar la declaración preparada. 
            if(mysqli_stmt_execute($stmt)){
                /* almacenar resultado */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $usuario_err = "Este usuario ya esta cogido.";
                } else{
                    $usuario = trim($_POST["usuario"]);
                }
            } else{
                echo "Algo fue mal. Intentalo más tarde.";
            }

            // Cerrar declaración
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Porfavor introduce un email";
    }
    else{
       
        // Prepara la declaración select
         $sql = "SELECT id FROM usuarios WHERE email = ?";
        
         if($stmt = mysqli_prepare($link, $sql)){
             // Une las variables a la declaración preparada como parámetros
 
             mysqli_stmt_bind_param($stmt, "s", $param_email);
             
             // Establecer parámetros
             $param_email= trim($_POST["email"]);
             
             // Intento de ejecutar la declaración preparada. 
             if(mysqli_stmt_execute($stmt)){
                 /* almacenar resultado */
                 mysqli_stmt_store_result($stmt);
                 
                 if(mysqli_stmt_num_rows($stmt) == 1){
                     $email_err = "Este email ya esta cogido.";
                 } else{
                     $email = trim($_POST["email"]);
                 }
             } else{
                 echo "Algo fue mal. Intentalo más tarde.";
             }
 
             // Cerrar declaración
             mysqli_stmt_close($stmt);
         }
    }

    //Validar nombre 
    if(empty(trim($_POST["nombre"]))){
        $nombre_err = "Por favor escribe un nombre";
    }
    else{
        $nombre = trim($_POST["nombre"]);
    }

    //Validar apellido
    if(empty(trim($_POST["apellido"]))){
        $apellido_err = "Por favor escribe un apellido";
    }
    else{
        $apellido = trim($_POST["apellido"]);
    }

    //Validar email
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor escribe un email";
    }
    else{
        $email = trim($_POST["email"]);
    }



    // Validar contraseña
    if(empty(trim($_POST["contraseña"]))){
        $contraseña_err = "Por favor escribe una contraseña";     
    } elseif(strlen(trim($_POST["contraseña"])) < 7){
        $contraseña_err = "La contraseña deberá de ser al menos de 7 caracteres";
    } else{
        $contraseña = trim($_POST["contraseña"]);
    }
    
    // Validar confirmar contraseña
    if(empty(trim($_POST["confirmar_contraseña"]))){
        $confirmar_contraseña_err = "Por favor confirma la contraseña";     
    } else{
        $confirmar_contraseña = trim($_POST["confirmar_contraseña"]);
        if(empty($contraseña_err) && ($contraseña != $confirmar_contraseña)){
            $confirmar_contraseña_err = "Las contraseñas no coinciden.";
        }
    }
    
    // Comprobar errores de entrada antes de insertarlos en la base de datos
    if(empty($usuario_err) && empty($contraseña_err) && empty($confirmar_contraseña_err) && empty($nombre_err) && empty($apellido_err) && empty($email_err)){
        
        // Preparar una declaración de insertar
        $sql = "INSERT INTO usuarios (usuario, contraseña, nombre, apellido, email) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            //  Une las variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "sssss", $param_usuario, $param_contraseña, $param_nombre, $param_apellido, $param_email);
            
            // Establecer parámetros
            $param_usuario = $usuario;
            $param_contraseña = $contraseña; // Crea una contraseña hash
            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_email = $email;
            
             // Intento de ejecutar la declaración preparada. 
            if(mysqli_stmt_execute($stmt)){
                // Redirigir al login 
                header("location: login.php");
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
    <title> Registro de Usuario </title>
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

<body>

<section class="container-fluid">
  <section class="row">
    <section class="col-12 col-lg-6 align-self-center"> 
      <section class="m-3 m-lg-5">

        <section class="text-center mt-4">
     
          <h1 class="h3">Registrarse</h1>
          <p class="lead">
            Empieza a comprar los mejores productos tecnológicos del mercado.
          </p>
        </section>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <section class="mb-3">
                <label for="usuario" class="form-label"><b> Usuario </b> </label>
                <input type="text" class="form-control <?php echo (!empty($usuario_err)) ? 'is-invalid' : ''; ?>" name="usuario" value="<?php echo $usuario; ?>">
                <span class="invalid-feedback"><?php echo $usuario_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="nombre" class="form-label"> <b> Nombre </b> </label>
                <input type="text" class="form-control <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" name="nombre" value="<?php echo $nombre; ?>">
                <span class="invalid-feedback"><?php echo $nombre_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="apellido" class="form-label"> <b> Apellido </b> </label>
                <input type="text" class="form-control <?php echo (!empty($apellido_err)) ? 'is-invalid' : ''; ?>" name="apellido" value="<?php echo $apellido; ?>">
                <span class="invalid-feedback"><?php echo $apellido_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="email" class="form-label"> <b> Email </b> </label>
                <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="contraseña" class="form-label"> <b> Contraseña </b> </label>
                <input type="password" class="form-control <?php echo (!empty($contraseña_err)) ? 'is-invalid' : ''; ?>" name="contraseña" value="<?php echo $contraseña; ?>">
                <span class="invalid-feedback"><?php echo $contraseña_err; ?></span>
            </section>

            <section class="mb-3">
                <label for="confirmar_contraseña" class="form-label"> <b> Confirmar Contraseña </b> </label>
                <input type="password" class="form-control <?php echo (!empty($confirmar_contraseña_err)) ? 'is-invalid' : ''; ?>" name="confirmar_contraseña" value="<?php echo $confirmar_contraseña; ?>">
                <span class="invalid-feedback"><?php echo $confirmar_contraseña_err; ?></span>
            </section>

            <section class="text-center mt-4">
                <input type="submit" class="btn btn-block btn-success" value="Registrarse">
            </section>

            <section class="text-center text-muted mt-2">
            ¿Ya tienes una cuenta?<a href="#">Iniciar Sesión</a>
            </section>
        </form>
       </section> 
     </section>
   <section class="col-12 col-lg-6 d-none d-lg-flex col-img">
   </section>
 </section>
</section>

</body>

</html>