<?php

if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if( empty(trim($telefono)) ) $telefono = '';
if( empty(trim($asunto)) ) $asunto = '';

$body = <<<HTML
    <h1>Consulta desde el sitio web</h1>
    <p>De: $nombre / $email</p>
    <h2>Teléfono de contacto</h2>
    $telefono
    <h2>Mensaje</h2>
    $mensaje
HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre <$email> \r\n";
$headers.= "To: Sitio web <info@paglialungaehijos.com.uy> \r\n";

$para = 'info@paglialungaehijos.com.uy';

$rta = mail($para, "Mensaje web: $asunto", $body, $headers );

header("Location: exito.html");

?>