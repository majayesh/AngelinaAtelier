<?php
if(!@include_once('../model/EuBot.php')) {
  include_once '../model/EuBot.php';
}

if(!@include_once('admin/model/EuBot.php')) {
  include_once 'admin/model/EuBot.php';
}

$bot = new EuBot;

if (isset($_GET['msg'])) {
    
    $msg = str_replace(' ', '', strtolower(trim($_GET['msg'])));
    
    
    $bot->hears($msg, function (EuBot $botty) {
        global $msg;
        global $questions;
        
        $obRespuesta = new EuBot();
        $msg = $obRespuesta->formatear_pregunta($msg);
        $obRespuesta = $obRespuesta->verificar_pregunta($msg);

        if (empty($obRespuesta)) {

            $botty->reply("Lo siento, no entendí tu pregunta.");

        } else {

            $botty->reply($obRespuesta);
            

        }
        
        /*
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hola');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Lo siento, Las preguntas deben estar relacionadas con coronavirus.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
        
        */
    });
}
