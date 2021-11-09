<?php

if (strlen($_POST['codigo'])>8 && strlen($_POST['codigo'])<10) {
    include_once '../model/EuModelo.php';
    $obModelo = new EuModelo();
    $decision = $obModelo->verificar_codigo($_POST['codigo']);

    echo($decision);
    
} else {
    echo(0);
}