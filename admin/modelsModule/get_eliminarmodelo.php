<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_modelos.php';
    $obVer = new CcModelos();
    $obVer->validarBtnPrivilegioEliminarModelo();
} elseif(isset($_POST['btnEliminarModelo'])){
    include_once './cc_modelos.php';
    $obVer = new CcModelos();
    $obVer->eliminarModelo($_POST['btnEliminarModelo']);
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
