<?php

class FormCrearNoticia
{

    public function crearNoticiaShow()
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
            <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
            
            <link rel="stylesheet" href="../shared/assets/css/ci_formnoticia.css">
            <link rel="stylesheet" href="../shared/assets/css/estilos.css">
            <script src="../shared/assets/js/ci_formnoticia.js" type="text/javascript"></script>
            <title>Crear Noticia</title>
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
                                <span class="fs-4">Crear Noticia</span>
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

            <h1 class="page-header">Crear Noticia</h1>
                
            <div class="container">

                <form class="well form-horizontal" action="./get_crearnoticia.php" method="post" id="contact_form">

                <fieldset>

                <!-- Form Name -->
                <legend>Registrar Noticia</legend>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Titular(*)</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="titular" placeholder="Nuevos métodos de pago en Angelina Atelier" class="form-control" type="text" maxlength="70">
                    </div>
                  </div>
                </div>
                
                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Reseña(*)</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="resena" placeholder="Yape,Plin llegan a Angelina Atelier como métodos de pago opcionales." class="form-control" type="text" maxlength="100">
                    </div>
                  </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label" >Contenido(*)</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <textarea name="contenido" cols="40" rows="5" maxlength="1000" placeholder="Recientemente se vió una gran disgusto de los clientes debido a que para ellos no era accesible pagar con efectivo, y más con la inseguridad de esta pandemia. Es por eso que Angelina Atelier incorporó Yape y Plin como métodos de pago para la comodidad de los clientes." class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                
                <!-- Select input-->
                
                <div class="form-group">
                  <label class="col-md-4 control-label">Estado(*)</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <select name="estado" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <?php foreach ($_SESSION['estados'] as $estado) : ?>
                                <option value="<?= $estado->idestado ?>">
                                    <?php if ($estado->nombre=="Activo") {
                                        echo("Visible");
                                    } else {
                                        echo("No visible");
                                    } ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                </div>
                
                <!-- File input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">Imagen(*)</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <button name="btnimagen" class="form-control" id="btn-image" value="">Subir imagen</button>
                        <img src="../shared/assets/modelos/icons/subir_imagen.png" alt="" id="image" width="305" height="305" id="btn-image">
                        <input name="imagen" id="imagen" class="form-control" type="text" readonly>
                    </div>
                  </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                    <button name="btnCrearNoticia" type="submit" class="btn btn-warning">Registrar noticia &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-saved"></span></button>
                  </div>
                </div>

                </fieldset>
                </form>

            </div>


            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script type="text/javascript">
                'use strict';
                const boton_foto = document.querySelector('#btn-image');
                const boton_prueba = document.querySelector('#btn-prueba');
                const imagen = document.querySelector('#image');
                let widget_cloudinary = cloudinary.createUploadWidget({
                    cloudName: 'majayesh',
                    uploadPreset: 'x65hztpr'
                }, (err, result) => {
                    if (!err && result && result.event === 'success') {
                        console.log('Imagen subida con éxito a cloudinary.', result.info);
                        imagen.src = result.info.secure_url;
                        $("#imagen").val(imagen.src);
                        $("#contact_form").data('bootstrapValidator').resetForm();
                    }
                });
                boton_foto.addEventListener('click', () => {
                    widget_cloudinary.open();
                }, false);
            </script>
        </body>

        </html>




<?php

    }
}


?>