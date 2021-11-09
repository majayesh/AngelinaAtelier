<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_modelos.php';
    $obModificar = new CcModelos();
    $obModificar->validarBtnPrivilegioModificarModelo();
} elseif(isset($_POST['btnFormModificarModelo'])){
    include_once './cc_modelos.php';
    $obModificar = new CcModelos();
    $obModificar->formModificarModelo($_POST["btnFormModificarModelo"]);
} elseif(isset($_POST['btnModificarModelo'])){
    include_once './cc_modelos.php';
    $obModificar = new CcModelos();
    
    if (!empty($_POST['imagen'])) {
        
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
            "imagen" => $_POST['imagen'],
            "idmodelo" => $_POST['btnModificarModelo']
        );
        
    } else {
        
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
            "imagen" => "null",
            "idmodelo" => $_POST['btnModificarModelo']
        );
        
    }
    
    $obModificar->modificarModelo($array);
} elseif(isset($_POST['btnCancelarModificar'])){
    include_once './cc_modelos.php';
    $obModificar = new CcModelos();
    $obModificar->volverModificarModelo();
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
