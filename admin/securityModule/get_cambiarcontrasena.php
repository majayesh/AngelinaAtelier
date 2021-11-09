<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_cambiarcontrasena.php';
    $obCambiar = new CcCambiarContrasena();
    $obCambiar->validarBtnCambiarContrasena();
} elseif(isset($_POST['btnCambiarContrasena'])){
    include_once './cc_cambiarcontrasena.php';
    $obCambiar = new CcCambiarContrasena();
    $respuesta = $obCambiar->verificarContrasenas($_POST["contrasenanueva"],$_POST["contrasenanuevaconfirmar"]);
    
    if ($respuesta!=0) {
        $obCambiar->cambiarContrasena($_POST["contrasenaanterior"],password_hash($_POST["contrasenanueva"], PASSWORD_BCRYPT));
    } else {
        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('Las contrasenas nuevas ingresadas no coinciden o los campos no son validos', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
    }
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}