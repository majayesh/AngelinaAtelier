<?php

class FormCodigoRecuperacion
{
    
    public function form_codigo_recuperacion_show($correo)
    {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../shared/assets/css/login.css">
            <link rel="stylesheet" href="../shared/assets/css/ci_formIngresarCodigoRecuperacion.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="./shared/assets/js/login.js"></script>
            <script src="../shared/assets/js/ci_formIngresarCodigoRecuperacion.js" type="text/javascript"></script>
            <script>
                
                function deshabilitar() {
                    $("#btnVolverAEnviar").removeClass();
                    $("#btnVolverAEnviar").addClass("btnDisable");
                }
                
                function reenviar() {
                    $.ajax({
                        data: { "btnVolverAEnviar": $("#btnVolverAEnviar").val()},
                        url: 'ReenviarCodigoRecuperacion.php',
                        type: 'post',
                        beforeSend: function () {
                            $("#btnVolverAEnviar").prop("disabled", true);
                            $("#btnVolverAEnviar").html("Enviando...");
                        },
                        success: function (response) {
                            $("#btnVolverAEnviar").text(response);
                            deshabilitar();
                        }
                    });
                }
                
            </script>
            <title>Login</title>
        </head>

        <body>
            <div class="logo">

            </div>
            <div class="box bg-img">
                <div class="content">

                    <h2>Ingrese el código de recuperación enviado a su correo</h2>

                    <form action="./get_recuperarcontrasena.php" class="form" method="POST">

                        <div class="user-input">
                            <input type="text" class="login-input" placeholder="Código de Recuperación" name="codigorecuperacion" id="codigorecuperacion">
                            <i class="fas fa-user"></i>
                        </div>
                        
                        <button value="<?php echo $correo ?>" name="btnSiguienteFormCodigoRecuperacion" class="login-btn">Siguiente</button>
                    </form>
                    
                    <button value="<?php echo $correo ?>" class="btnDisable" name="btnVolverAEnviar" id="btnVolverAEnviar" class="login-btn" onClick="reenviar()" disabled>Volver a Enviar</button>

                </div>
            </div>
            
        </body>

        </html>
<?php
    }
}



?>