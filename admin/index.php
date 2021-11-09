<?php
include './securityModule/ci_autentication.php';

session_start();

if(isset($_SESSION['usuario'])){
    header('Location: ./shared/get_regresarMenu.php');
}else{
    $controller = new CiAutentication();
    $controller->form_login();
}


?>