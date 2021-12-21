<?php

class FormCrearUsuario
{

    public function crearUsuarioShow()
    {
        

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
            <link rel="stylesheet" href="../shared/assets/css/ci_formusuario.css">
            <link rel="stylesheet" href="../shared/assets/css/estilos.css">
            <script src="../shared/assets/js/ci_formusuario.js" type="text/javascript"></script>
            <title>Crear Usuario</title>
        </head>
        
        <body class="container">
            
            <div class="menu container-fluid z-index">
                <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <span class="navbar-brand"><?php echo $_SESSION['usuario']->idtrabajador->nombre . ' ' . $_SESSION['usuario']->idtrabajador->apaterno . ' ' . $_SESSION['usuario']->idtrabajador->amaterno; ?></span>
                            
                            <div class="nav-item">
                                <span class="fs-4">Crear Usuario</span>
                            </div>
                            <div class="nav-item">
                                <form action="<?php echo '../shared/get_regresarMenu.php' ?>" method="POST">
                                    <button name="btnRegresarMenu" id="btnRegresarMenu">
                                        <img src="../shared/assets/modelos/icons/menu.svg" height="40px" width="40px" alt="">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <h1 class="page-header">Crear Usuario</h1>
                
            <div class="container">

                <form class="well form-horizontal" action="./get_crearusuario.php" method="post"  id="contact_form">

                <fieldset>

                <!-- Form Name -->
                <legend>Registrar Usuario</legend>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Nombres</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="nombres" placeholder="Lorena Andrea" class="form-control" type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Apellido Paterno</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="apaterno" placeholder="Zavaleta" class="form-control" type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label" >Apellido Materno</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="amaterno" placeholder="Ramirez" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                
                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">DNI/CE</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input name="dni" placeholder="75316587" class="form-control" type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->
                       <div class="form-group">
                  <label class="col-md-4 control-label">Email</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="lore22@gmail.com" class="form-control" type="text">
                    </div>
                  </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Teléfono</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="telefono" placeholder="975426153" class="form-control" type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->
                       <div class="form-group">
                  <label class="col-md-4 control-label">Nombre de Usuario</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="usuario" placeholder="alzr22" class="form-control" type="text">
                    </div>
                  </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Contraseña</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="contrasena" placeholder="••••••••••" class="form-control" type="password">
                    </div>
                  </div>
                </div>
                
                <!-- Select input-->
                <div class="form-group">
                  <label class="col-md-4 control-label">Estado</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <select name="estado" class="form-control">
                            <?php foreach ($_SESSION['estados'] as $estado) : ?>
                                <option value="<?= $estado->idestado ?>"><?= $estado->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                </div>

                <!-- checkboxes checks -->
                <div class="form-group checks">
                    <label class="col-md-4 control-label">Seleccionar privilegios</label>
                    <div class="col-md-4" id="privilegios_lista">
                        <?php foreach ($_SESSION['privilegios'] as $privilegio) : ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="privilegio<?= $privilegio->idprivilegio ?>" value="<?= $privilegio->idprivilegio ?>" /> <?= $privilegio->nombre ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                    <button name="btnCrearUsuario" type="submit" class="btn btn-warning">Registrar usuario &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-saved"></span></button>
                  </div>
                </div>

                </fieldset>
                </form>

            </div>


            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        </body>

        </html>




<?php

    }
}


?>