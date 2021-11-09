<?php

class formMensaje
{

    public function mensajeShow($msg, $link)
    {   

        // session_start();
        // session_unset();
        // session_destroy();
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../shared/assets/css/mensaje.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <title>Mensaje</title>
        </head>

        <body>
            <div class="logo">
            </div>
            <div class="box bg-img">
                <div class="content">
                    <h2>Mensaje del <span> Sistema</span></h2>
                    <div>
                        <img class="logo-img" src="../shared/assets/modelos/icons/warning.svg" height="80px" width="80px" alt="">
                    </div>
                    <br>
                    <p><?php echo $msg; ?></p>
                    <br>
                    <span class="login-btn"><?= $link ?></span>
                </div>
            </div>

            <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
            <script src="../shared/assets/js/login.js"></script>
        </body>

        </html>
    <?php


    }

    public function mensajeOtroShow($msg, $link)
    {

    ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../shared/assets/css/mensaje.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <title>Mensaje</title>
        </head>

        <body>
            <div class="logo">
            </div>
            <div class="box bg-img">
                <div class="content">
                    <h2>Mensaje del <span> Sistema</span></h2>
                    <div>
                        <img class="logo-img" src="../shared/assets/modelos/icons/warning.svg" height="80px" width="80px" alt="">
                    </div>
                    <br>
                    <p><?php echo $msg; ?></p>
                    <br>
                    <span class="login-btn"><?= $link ?></span>
                </div>
            </div>

            <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
            <script src="../shared/assets/js/login.js"></script>
        </body>

        </html>

<?php
    }
}

?>