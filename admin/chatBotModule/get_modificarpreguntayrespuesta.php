<?php

if (isset($_POST['btnPrivilegio'])) {
    include_once './cc_chatbot.php';
    $obModificar = new CcChatbot();
    $obModificar->validarBtnPrivilegioModificarPreguntayRespuesta();
} elseif(isset($_POST['btnFormModificarPreguntayRespuesta'])){
    include_once './cc_chatbot.php';
    $obModificar = new CcChatbot();
    $obModificar->formModificarPreguntayRespuesta($_POST["btnFormModificarPreguntayRespuesta"]);
} elseif(isset($_POST['btnModificarPreguntayRespuesta'])){
    include_once './cc_chatbot.php';
    $obModificar = new CcChatbot();
        
    $array = array(
        "pregunta" => $_POST['pregunta'],
        "respuesta" => $_POST['respuesta'],
        "idchatbot" => $_POST['btnModificarPreguntayRespuesta']
    );
    
    $obModificar->modificarPreguntayRespuesta($array);
} elseif(isset($_POST['btnCancelarModificar'])){
    include_once './cc_chatbot.php';
    $obModificar = new CcChatbot();
    $obModificar->volverModificarPreguntayRespuesta();
} else {
    include_once '../shared/formMensaje.php';
    $obMensaje = new formMensaje();
    $obMensaje->mensajeShow('Acceso no permitido', '<a href="../index.php">Inicio</a>');
}
