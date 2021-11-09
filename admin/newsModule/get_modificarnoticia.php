<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_noticias.php';
    $obModificar = new CcNoticias();
    $obModificar->validarBtnPrivilegioModificarNoticia();
} elseif(isset($_POST['btnFormModificarNoticia'])){
    include_once './cc_noticias.php';
    $obModificar = new CcNoticias();
    $obModificar->formModificarNoticia($_POST["btnFormModificarNoticia"]);
} elseif(isset($_POST['btnModificarNoticia'])){
    include_once './cc_noticias.php';
    $obModificar = new CcNoticias();
    
    if (!empty($_POST['imagen'])) {
        
        $array = array(
            "titular" => $_POST['titular'],
            "resena" => $_POST['resena'],
            "contenido" => $_POST['contenido'],
            "idestado" => $_POST['estado'],
            "imagen" => $_POST['imagen'],
            "idnoticia" => $_POST['btnModificarNoticia']
        );
        
    } else {
        
        $array = array(
            "titular" => $_POST['titular'],
            "resena" => $_POST['resena'],
            "contenido" => $_POST['contenido'],
            "idestado" => $_POST['estado'],
            "imagen" => "null",
            "idnoticia" => $_POST['btnModificarNoticia']
        );
        
    }
    
    $obModificar->modificarNoticia($array);
} elseif(isset($_POST['btnCancelarModificar'])){
    include_once './cc_noticias.php';
    $obModificar = new CcNoticias();
    $obModificar->volverModificarNoticia();
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
