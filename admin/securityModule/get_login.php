<?php

$btn = $_POST['btnLogin'];

if(isset($btn)){

    include_once 'cc_autenticar.php';
    $obAutenticar = new CcAutenticarUsuario();
    $obAutenticar->validarDatos($_POST['username'], $_POST['password']);

}else{
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}

?>

