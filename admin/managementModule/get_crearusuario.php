<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_usuarios.php';
    $obVer = new CcUsuarios();
    $obVer->validarBtnPrivilegioCrearUsuario();
} elseif (isset($_POST['btnCrearUsuario'])) {
    include_once './cc_usuarios.php';
    $obCrear = new CcUsuarios();
    
    $contador=0;
    
    foreach ($_SESSION['privilegios'] as $privilegio) :
        
        if (isset($_POST["privilegio".$privilegio->idprivilegio])) {
            
            $arrayasignados[$contador]=$privilegio->idprivilegio;
            $contador++;
            
        }
        
    endforeach;
    
    $array = array(
        "nombres" => $_POST['nombres'],
        "apaterno" => $_POST['apaterno'],
        "amaterno" => $_POST['amaterno'],
        "dni" => $_POST['dni'],
        "telefono" => $_POST['telefono'],
        "email" => $_POST['email'],
        "usuario" => $_POST['usuario'],
        "contrasena" => password_hash($_POST['contrasena'], PASSWORD_BCRYPT),
        "idestado" => $_POST['estado'],
        "privilegios" => $arrayasignados
    );
    
    $obCrear->crearUsuario($array);
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
