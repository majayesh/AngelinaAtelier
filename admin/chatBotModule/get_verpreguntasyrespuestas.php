<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_chatbot.php';
    $obVer = new CcChatbot();
    $obVer->validarBtnPrivilegioVerPreguntasyRespuestas();
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
