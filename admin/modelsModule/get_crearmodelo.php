<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_modelos.php';
    $obVer = new CcModelos();
    $obVer->validarBtnPrivilegioCrearModelo();
} elseif (isset($_POST['btnCrearModelo'])) {
    include_once './cc_modelos.php';
    $obCrear = new CcModelos();
    
    $array = array(
        "codigo" => $_POST['codigo'],
        "nombre" => $_POST['nombre'],
        "descripcion" => $_POST['descripcion'],
        "idcolorprimario" => $_POST['colorprimario'],
        "idcolorsecundario" => $_POST['colorsecundario'],
        "idtipoprenda" => $_POST['tipoprenda'],
        "idtela" => $_POST['tela'],
        "idsexo" => $_POST['sexo'],
        "idestado" => $_POST['estado'],
        "imagen" => $_POST['imagen']
    );
    
    $obCrear->crearModelo($array);
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
