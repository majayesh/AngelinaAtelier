<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_noticias.php';
    $obVer = new CcNoticias();
    $obVer->validarBtnPrivilegioVerNoticias();
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
