<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_modelos.php';
    $obVer = new CcModelos();
    $obVer->validarBtnPrivilegioVerModelos();
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
