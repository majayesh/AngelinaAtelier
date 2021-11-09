<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_negocio.php';
    $obModificar = new CcNegocio();
    $obModificar->validarBtnPrivilegioModificarUsuario();
} elseif(isset($_POST['btnModificarNegocio'])){
    include_once './cc_negocio.php';
    $obModificar = new CcNegocio();
    
    $array = array(
        "descripcion" => $_POST['descripcion'],
        "email" => $_POST['email'],
        "telefono" => $_POST['telefono'],
        "ubicacion" => $_POST['ubicacion']
    );
    
    $obModificar->modificarNegocio($array);
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
