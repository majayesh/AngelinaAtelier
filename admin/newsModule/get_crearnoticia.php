<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_noticias.php';
    $obVer = new CcNoticias();
    $obVer->validarBtnPrivilegioCrearNoticia();
} elseif (isset($_POST['btnCrearNoticia'])) {
    include_once './cc_noticias.php';
    $obCrear = new CcNoticias();
    
    $array = array(
        "titular" => $_POST['titular'],
        "resena" => $_POST['resena'],
        "contenido" => $_POST['contenido'],
        "idestado" => $_POST['estado'],
        "imagen" => $_POST['imagen']
    );
    
    $obCrear->crearNoticia($array);
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
