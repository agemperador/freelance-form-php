<?php

    if (isset($_POST['enviar'])){

    
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $mail = $_POST['email'];
        $tel = $_POST['telefono'];
        $link = $_POST['links'];
        $lugar = $_POST['lugar']

        $header = 'From: ' . $mail . " \r \n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mine-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";

        $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
        $mensaje .= "Su e-mail es: " . $mail . " \r\n";
        $mensaje .= "Mensaje: " . $lugar . " \r\n"
        $mensaje .= "Enviado el " . date('d/m/Y', time());


        $para = 'emperadoragustin@gmail.com'
        $asunto = 'Mensaje de prueba desde form'

        mail($para, $asunto,utf8_decode($lugar), $header)
    }
?>