<?php

class FormModificarModelo
{

    public function formModificarModeloShow()
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
            <link rel="stylesheet" href="../shared/assets/css/ci_formmodelo.css">
            <link rel="stylesheet" href="../shared/assets/css/estilos.css">
            <script src="../shared/assets/js/ci_formmodificarmodelo.js" type="text/javascript"></script>
            <title>Formulario Modificar Modelo</title>
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
                                <span class="fs-4">Formulario Modificar Modelo</span>
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

            <h1 class="page-header">Modificar Modelo</h1>
                
                <div class="container">
            
                    <form class="well form-horizontal" action="./get_modificarmodelo.php" method="post"  id="contact_form">
                        
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Modificar Modelo</legend>

                    <!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">C??digo(*)</label>  
                      <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="codigo" placeholder="BLUS-0001" class="form-control" type="text" value="<?php echo $_SESSION["modelo"][0]->codigo ?>">
                        </div>
                      </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Nombre(*)</label>  
                      <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input name="nombre" placeholder="Blusa Verano Roja" class="form-control" type="text" value="<?php echo $_SESSION["modelo"][0]->nombre ?>">
                        </div>
                      </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label" >Descripci??n(*)</label> 
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <textarea name="descripcion" cols="40" rows="5" maxlength="300" placeholder="Blusa de mujer de color rojo. Nueva moda verano 2021." class="form-control"><?php echo $_SESSION["modelo"][0]->descripcion ?></textarea>
                        </div>
                      </div>
                    </div>

                    <!-- Select input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Color Primario(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                            <select name="colorprimario" class="form-control">
                                <option value="">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['colores'] as $colorprimario) : ?>
                                    <?php if($colorprimario->idcolor==$_SESSION['modelo'][0]->idcolorprimario): ?>
                                        <option value="<?= $colorprimario->idcolor ?>" selected><?= $colorprimario->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $colorprimario->idcolor ?>"><?= $colorprimario->nombre ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- Select input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Color Secundario</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                            <select name="colorsecundario" class="form-control">
                                <option value="0">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['colores'] as $colorsecundario) : ?>
                                    <?php if($colorsecundario->idcolor==$_SESSION['modelo'][0]->idcolorsecundario): ?>
                                        <option value="<?= $colorsecundario->idcolor ?>" selected><?= $colorsecundario->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $colorsecundario->idcolor ?>"><?= $colorsecundario->nombre ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- Select input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Tipo de Prenda(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                            <select name="tipoprenda" class="form-control">
                                <option value="">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['tiposprenda'] as $tipoprenda) : ?>
                                    <?php if($tipoprenda->idtipoprenda==$_SESSION['modelo'][0]->idtipoprenda): ?>
                                        <option value="<?= $tipoprenda->idtipoprenda ?>" selected><?= $tipoprenda->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $tipoprenda->idtipoprenda ?>"><?= $tipoprenda->nombre ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- Select input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Tipo de Tela(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                            <select name="tela" class="form-control">
                                <option value="">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['telas'] as $tela) : ?>
                                    <?php if($tela->idtela==$_SESSION['modelo'][0]->idtela): ?>
                                        <option value="<?= $tela->idtela ?>" selected><?= $tela->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $tela->idtela ?>"><?= $tela->nombre ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                    </div>

                    <!-- Select input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">Sexo(*)</label>  
                        <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                            <select name="sexo" class="form-control">
                                <option value="">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['sexos'] as $sexo) : ?>
                                    <?php if($sexo->idsexo==$_SESSION['modelo'][0]->idsexo): ?>
                                        <option value="<?= $sexo->idsexo ?>" selected><?= $sexo->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $sexo->idsexo ?>"><?= $sexo->nombre ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
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
                                <option value="">Seleccione una opci??n</option>
                                <?php foreach ($_SESSION['estados'] as $estado) : ?>
                                    <?php if($estado->idestado==$_SESSION['modelo'][0]->idestado): ?>
                                        <option value="<?= $estado->idestado ?>" selected>
                                        <?php if ($estado->nombre=="Activo") {
                                            echo("Visible");
                                        } else {
                                            echo("No visible");
                                        } ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $estado->idestado ?>">
                                        <?php if ($estado->nombre=="Activo") {
                                            echo("Visible");
                                        } else {
                                            echo("No visible");
                                        } ?>
                                        </option>
                                    <?php endif; ?>
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
                            <img src="<?= $_SESSION['modelo'][0]->imagen ?>" alt="" id="image" width="305" height="305" id="btn-image">
                            <input name="imagen" id="imagen" class="form-control" type="text" readonly>
                        </div>
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                        <button name="btnModificarModelo" type="submit" class="btn btn-warning" value="<?php echo $_SESSION["modelo"][0]->idmodelo ?>">Modificar modelo &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-saved"></span></button>
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
                        console.log('Imagen subida con ??xito a cloudinary.', result.info);
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