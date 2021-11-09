<?php

if(!empty($_GET['idmodelo'])){
    
    include_once 'admin/model/EuModelo.php';

    $obModelo = new EuModelo();
    $obModelo = $obModelo->obtener_modelo_cliente($_GET['idmodelo']);
    
}

?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex" />
        <link href="static/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="static/js/verModelo.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            //alert(parent.window.innerWidth);
            if(parent.window.innerWidth<823){
                var modalHeight = (screen.height * 58)/100;
                $("#imagen").css('width', '100%');
                $("#imagen").parent().css('padding-right', '0');
                $("#imagen").height(modalHeight - $("#info-tela").height());
            }else{
                $('h3').css('margin-top', '0');
                if(screen.height<500){
                    $("#imagen").height((screen.height * 58)/100);
                }else{
                    $("#imagen").height(500);
                }
            }
        });
        </script>
        <style>
            .row .col-sm-7:last-of-type{
                padding-left: 0;
            }
            .bp-vcenter {
                float: none;
                display: inline-block;
                vertical-align: middle;
                margin-right: -4px;
            }
            p,h4{
                float: left;
                color: black;
            }
            .color-icon{
                width: 22px;
                height: 15px;
                margin: 2px 10px;
                border: 1px grey solid;
/*                border-radius: 50%;*/
/*                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;*/
            }
            .image-icon{
                margin: 0 10px;
            }
            .color-primario{
                background-color: <?php echo $obModelo[0]->hexadecimalcolorprimario ?>;
            }
            .color-secundario{
                background-color: <?php echo $obModelo[0]->hexadecimalcolorsecundario ?>;;
            }
    </style>
    </head>

    
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="info-tela" class="col-xs-12 col-sm-5 col-sm-push-7 bp-vcenter">
                    <h3> <?php echo $obModelo[0]->codigo ?> </h3>
                    <div class="row">
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <label>Nombre:</label> <?php echo $obModelo[0]->nombre ?>
                            </p>
                        </div>
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <label>Descripci&oacute;n</label> <span> <?php echo $obModelo[0]->descripcion ?> </span>
                            </p>
                        </div>
                        <div class="color col-xs-6 col-sm-12">
                            <p>
                                <label>Color Primario:</label>
                            </p>
                                                        <p class="color-icon color-primario"></p> <p> <?php echo $obModelo[0]->colorprimario ?> </p>
                        </div>
                        <div class="color col-xs-6 col-sm-12">
                            <p>
                                <label>Color Secundario:</label>
                            </p>
                                                        <p class="color-icon color-secundario"></p> <p> <?php echo $obModelo[0]->colorsecundario ?> </p>
                        </div>
                                                <div class="col-xs-6 col-sm-12">
                            <p>
                                <label>Tipo de Prenda:</label> <?php echo $obModelo[0]->tipoprenda ?> </p>
                        </div>
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <strong>Tela:</strong> <?php echo $obModelo[0]->tela ?> </p>
                        </div>
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <strong>Sexo:</strong> <?php echo $obModelo[0]->sexo ?> 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-sm-pull-5 bp-vcenter">
                    <img id="imagen" class="img-responsive" src="<?php echo $obModelo[0]->imagen ?>"/>
                </div>
            </div>
        </div>
    </body>

</html>