<?php


class FormEstablecerNuevaContrasena
{

    public function form_Nueva_Contrasena_show($correo)
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
            <script src="../shared/assets/js/ci_formcambiarcontrasena.js" type="text/javascript"></script>
            <title>Recuperar Contraseña</title>
        </head>

        <body>
            <div class="logo">

            </div>
            <div class="box bg-img">
                <div class="content">

                    <h2>Cambio de Contraseña</h2>
                    
                    <p style="color:white">La contraseña debe contener por lo menos una mayúscula, una minúscula, un número, un caracter especial y no debe contener espacios..</p>
                    <br>
                    <form action="./get_recuperarcontrasena.php" class="form" method="POST">
                        
                        <div class="pass-input">
                            <input type="password" class="login-input" placeholder="Contraseña Nueva" name="contrasenanueva" id="my-password" required>

                            <span class="eye" onclick="myFunction()">
                                <i id="hide-1" class="fas fa-eye-slash"></i>
                                <i id="hide-2" class="fas fa-eye"></i>
                            </span>
                        </div>
                        
                        <div class="pass-input">
                            <input type="password" class="login-input" placeholder="Confirmar Contraseña Nueva" name="contrasenanuevaconfirmar" id="my-password" required>

                            <span class="eye" onclick="myFunction()">
                                <i id="hide-1" class="fas fa-eye-slash"></i>
                                <i id="hide-2" class="fas fa-eye"></i>
                            </span>
                        </div>
                        
                        <button value="<?php echo $correo ?>" name="btnCambiarContrasena" class="login-btn">Aceptar</button>
                    </form>

                </div>
            </div>

            <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="../shared/assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}



?>