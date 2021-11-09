<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_chatbot.php';
    $obVer = new CcChatbot();
    $obVer->validarBtnPrivilegioCrearPreguntayRespuesta();
} elseif (isset($_POST['btnCrearPreguntayRespuesta'])) {
    include_once './cc_chatbot.php';
    $obCrear = new CcChatbot();
    
    $array = array(
        "pregunta" => $_POST['pregunta'],
        "respuesta" => $_POST['respuesta']
    );
    
    $obCrear->crearPreguntayRespuesta($array);
    
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
