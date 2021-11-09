<?php

class FormModificarNegocio
{

    public function formModificarNegocioShow()
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
            <link rel="stylesheet" href="../shared/assets/css/estilos.css">
            <script src="../shared/assets/js/ci_formmodificarnegocio.js" type="text/javascript"></script>
            <title>Formulario Modificar Información del Negocio</title>
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
                            <br>
                            <br>
                            <br>
                            <div class="nav-item">
                                <span class="fs-4">Formulario Modificar Información del Negocio</span>
                            </div>
                            <br>
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

            <h1 class="page-header">Modificar Información del Negocio</h1>
                
                <div class="container">
            
                    <form class="well form-horizontal" action="./get_modificarinformacionnegocio.php" method="post" id="contact_form">
                        
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Modificar Información del Negocio</legend>

                    <!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label" >Descripción(*)</label> 
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <textarea name="descripcion" cols="40" rows="5" maxlength="500" placeholder="Escribe la información del negocio..." class="form-control"><?php echo $_SESSION["negocio"][0]->descripcion ?></textarea>
                        </div>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label">Email(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="AngelinaAtelierConfection@gmail.com" class="form-control" type="text" value="<?php echo $_SESSION["negocio"][0]->email ?>">
                        </div>
                      </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label">Teléfono(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="telefono" placeholder="975426153" class="form-control" type="text" value="<?php echo $_SESSION["negocio"][0]->telefono ?>">
                        </div>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label">Ubicación(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <textarea name="ubicacion" cols="40" rows="5" maxlength="500" placeholder="Ingresa la ubicación de google maps.." class="form-control"><?php echo $_SESSION["negocio"][0]->ubicacion ?></textarea>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                        <button name="btnModificarNegocio" type="submit" class="btn btn-warning" value="<?php echo $_SESSION["negocio"][0]->idnegocio ?>">Modificar Negocio &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></button>
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