<?php

if (isset($_POST['btnSiguienteFormCorreo'])) {
    
    include_once './cc_recuperarcontrasena.php';
    $obValidarCorreo = new CcRecuperarContrasena();
    $respuesta = $obValidarCorreo->validarCorreo($_POST["correo"]);
    
    if ($respuesta!=0) {
        $obValidarCorreo->ingresarCodigoRecuperacion($_POST["correo"]);
    } else {
        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('El correo ingresado no existe en la base de datos.','<a href="../index.php">Inicio</a>');
    }
    
} elseif(isset($_POST['btnSiguienteFormCodigoRecuperacion'])){
    include_once './cc_recuperarcontrasena.php';
    $obValidarCodigo = new CcRecuperarContrasena();
    $respuesta = $obValidarCodigo->validarCodigoRecuperacion($_POST["codigorecuperacion"]);
    
    if ($respuesta!=0) {
        $obValidarCodigo->verificarCodigoRecuperacion($_POST["btnSiguienteFormCodigoRecuperacion"],$_POST["codigorecuperacion"]);
    } else {
        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('El código ingresado no es válido para cotejar.', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
    }
}  elseif(isset($_POST['btnVolverAEnviar'])){
    include_once './cc_recuperarcontrasena.php';
    $obVolverEnviar = new CcRecuperarContrasena();
    $obVolverEnviar->actualizarCodigoRecuperacion($_POST["btnVolverAEnviar"]);
    
} elseif(isset($_POST['btnCambiarContrasena'])){
    include_once './cc_recuperarcontrasena.php';
    $obValidarRespuesta = new CcRecuperarContrasena();
    $respuesta = $obValidarRespuesta->verificarContrasenas($_POST["contrasenanueva"],$_POST["contrasenanuevaconfirmar"]);
    
    if ($respuesta!=0) {
        $obValidarRespuesta->establecerNuevaContrasena($_POST["btnCambiarContrasena"],password_hash($_POST["contrasenanueva"], PASSWORD_BCRYPT));
    } else {
        include_once '../shared/formMensaje.php';
        $obMensaje = new formMensaje();
        $obMensaje->mensajeShow('Las contraseñas ingresadas no coinciden o no son validas.', '<a href="../shared/get_regresarMenu.php">Inicio</a>');
    }
} else {
    include_once './cc_recuperarcontrasena.php';
    $obRecuperar = new CcRecuperarContrasena();
    $obRecuperar->formIngresarCorreo();
}