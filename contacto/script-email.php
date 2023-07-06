
<?php
    if(isset($_POST['enviar'])){
        $email_cliente = $_POST['correo'];
        $titulo = $_POST['titulo'];
        $mensaje = "Correo de cliente: $email_cliente\n";
        $mensaje .= $_POST['mensaje'];
        $email_destino = "proyectowebucam@gmail.com";
        $email_empresa = "proyectowebucam@gmail.com";

        $headers = "From: $email_empresa \r\n";
        $headers .= "Reply-To: $email_empresa \r\n";
        $headers .= "X-Mailer: PHP/". phpversion();

        mail($email_destino,$titulo,$mensaje,$headers);
        header("Location:index.php");
    }
?>


