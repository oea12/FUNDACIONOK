<?php

if (isset($_POST)) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $dominio = $_SERVER["HTTP_HOST"];
    $to = "contacto@fdarv.mx";
    $subject = "Mensaje de contacto del sitio $dominio";
    $message = "
        <p>Datos recibidos del sitio <b>$dominio</b></p>
        <ul>
            <li>Nombre: <b>$nombre</b></li>
            <li>Correo electrónico: <b>$correo</b></li>
            <li>Teléfono: <b><a href='tel:$telefono' style='color: black'>$telefono</a></b></li>
            <li>Asunto: <b>$asunto</b></li>
            <li>Mensaje: $mensaje</li>
        </ul>
    ";

    $headers = "MIME-Version: 1.0\r\n"."Content-Type: text/html; charset=utf-8\r\n"."From: Envío Automatico No Responder <no-reply@$dominio>";

    $send_mail = mail($to, $subject, $message, $headers);

    if ($send_mail) {
        $res = [
            "err" => false,
            "message" => "Tus datos han sido enviados correctamente"
        ];
    } else {
        $res = [
            "err" => false,
            "message" => "Error al enviar tus datos, intenta nuevamente"
        ];
    }

    header('Content-type: application/json');
    echo json_encode($res);
    exit;
}

?>