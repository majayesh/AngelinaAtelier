<?php


class FormIngresarCorreo
{

    public function form_ingresarcorreo_show()
    {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../shared/assets/css/login.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <title>Recuperar Contraseña</title>
        </head>

        <body>
            <div class="logo">

            </div>
            <div class="box bg-img">
                <div class="content">

                    <h2>Ingrese su Correo Electrónico</h2>

                    <form action="./get_recuperarcontrasena.php" class="form" method="POST">

                        <div class="user-input">
                            <input type="email" class="login-input" placeholder="user@example.com" name="correo" id="correo" required>
                            <i class="fas fa-user"></i>
                        </div>

                        <button name="btnSiguienteFormCorreo" class="login-btn">Siguiente</button>
                    </form>

                </div>
            </div>

            <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="./shared/assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}



?>