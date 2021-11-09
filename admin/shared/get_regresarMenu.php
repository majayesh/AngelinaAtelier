<?php

session_start();

if (isset($_SESSION['usuario'])) {
    include_once '../securityModule/ci_bienvenida.php';
    $obBienvenida = new CiBienvenida();
    $obBienvenida->bienvenidaShow();
} else {

    session_unset();
    session_destroy();

    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
