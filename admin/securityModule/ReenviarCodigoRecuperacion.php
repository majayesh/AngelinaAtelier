<?php

$correo=$_POST["btnVolverAEnviar"];

$codigorecuperacion=rand(100000,999999);
        
include_once './PHPMailer/EnviarCorreo.php';
$obEnviarCorreo = new EnviarCorreo();
$obEnviarCorreo->enviar($correo,$codigorecuperacion);

include_once '../model/EuUsuario.php';
$obUsuario = new EuUsuario();

$obUsuario->actualizar_codigo_recuperacion($codigorecuperacion,$correo);

echo "Reenviado";