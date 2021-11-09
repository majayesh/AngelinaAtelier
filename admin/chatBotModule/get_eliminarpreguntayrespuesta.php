<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_chatbot.php';
    $obVer = new CcChatbot();
    $obVer->validarBtnPrivilegioEliminarPreguntayRespuesta();
} elseif(isset($_POST['btnEliminarPreguntayRespuesta'])){
    include_once './cc_chatbot.php';
    $obVer = new CcChatbot();
    $obVer->eliminarPreguntayRespuesta($_POST['btnEliminarPreguntayRespuesta']);
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
