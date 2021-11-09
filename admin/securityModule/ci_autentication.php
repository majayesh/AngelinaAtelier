<?php


class CiAutentication
{

    public function form_login()
    {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./shared/assets/css/login.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <title>Login</title>
        </head>

        <body>
            <div class="logo">

            </div>
            <div class="box bg-img">
                <div class="content">

                    <h2>Sign<span> In</span></h2>

                    <form action="./securityModule/get_login.php" class="form" method="POST">

                        <div class="user-input">
                            <input type="text" class="login-input" placeholder="user name" name="username" id="name" required>
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="pass-input">
                            <input type="password" class="login-input" placeholder="password" name="password" id="my-password" required>

                            <span class="eye" onclick="myFunction()">
                                <i id="hide-1" class="fas fa-eye-slash"></i>
                                <i id="hide-2" class="fas fa-eye"></i>
                            </span>
                        </div>
                        <button name="btnLogin" class="login-btn">Sign In</button>
                    </form>
                    <p class="f-pass">
                        <a href="./securityModule/get_recuperarcontrasena.php">Recuperar contraseña</a>
                    </p>

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