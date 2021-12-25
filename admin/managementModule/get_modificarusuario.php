<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_usuarios.php';
    $obModificar = new CcUsuarios();
    $obModificar->validarBtnPrivilegioModificarUsuario();
} elseif(isset($_POST['btnFormModificarUsuario'])){
    include_once './cc_usuarios.php';
    $obModificar = new CcUsuarios();
    $obModificar->formModificarUsuario($_POST["btnFormModificarUsuario"]);
} elseif(isset($_POST['btnModificarUsuario'])){
    include_once './cc_usuarios.php';
    $obModificar = new CcUsuarios();
    
    $contador=0;
    
    foreach ($_SESSION['privilegios'] as $privilegio) :
        
        if (isset($_POST["privilegio".$privilegio->idprivilegio])) {
            
            $arrayasignados[$contador]=$privilegio->idprivilegio;
            $contador++;
            
        }
        
    endforeach;
    
    if (!empty($_POST['contrasena'])) {
        
        $array = array(
            "nombres" => $_POST['nombres'],
            "apaterno" => $_POST['apaterno'],
            "amaterno" => $_POST['amaterno'],
            "dni" => $_POST['dni'],
            "telefono" => $_POST['telefono'],
            "idtrabajador" => $_POST['btnModificarUsuario'],
            "email" => $_POST['email'],
            "usuario" => $_POST['usuario'],
            "contrasena" => md5($_POST['contrasena']),
            "idestado" => $_POST['estado'],
            "privilegios" => $arrayasignados
        );
        
    } else {
        
        $array = array(
            "nombres" => $_POST['nombres'],
            "apaterno" => $_POST['apaterno'],
            "amaterno" => $_POST['amaterno'],
            "dni" => $_POST['dni'],
            "telefono" => $_POST['telefono'],
            "idtrabajador" => $_POST['btnModificarUsuario'],
            "email" => $_POST['email'],
            "usuario" => $_POST['usuario'],
            "contrasena" => "null",
            "idestado" => $_POST['estado'],
            "privilegios" => $arrayasignados
        );
        
    }
    
    $obModificar->modificarUsuario($array);
} elseif(isset($_POST['btnCancelarModificar'])){
    include_once './cc_usuarios.php';
    $obModificar = new CcUsuarios();
    $obModificar->volverModificarUsuario();
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
