<?php

if(!empty($_GET['idnoticia'])){
    
    include_once 'admin/model/EuNoticia.php';

    $obNoticia = new EuNoticia();
    $obNoticia = $obNoticia->obtener_noticia($_GET['idnoticia']);
    
}

?>


<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex" />
        <link href="static/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="static/js/verNoticia.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            //alert(parent.window.innerWidth);
            if(parent.window.innerWidth<823){
                var modalHeight = (screen.height * 58)/100;
                $("#imagen").css('width', '100%');
                $("#imagen").parent().css('padding-right', '0');
                $("#imagen").height(modalHeight - $("#info-new").height());
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
            .img-responsive{
                background-repeat: no-repeat;
                background-position: 50%;
                border-radius: 50%;
                background-size: 100% auto;
            }
    </style>
    </head>

    
    <body>
        <!-- INICIO FACEBOOK COMENTARIOS -->
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v11.0&appId=942747606282397&autoLogAppEvents=1" nonce="EZAnr6ds"></script>
        <!-- FIN FACEBOOK COMENTARIOS -->
        <div class="container-fluid">
            <div class="row">
                <div id="info-new" class="col-xs-12 col-sm-5 col-sm-push-7 bp-vcenter">
                    <h3> <?php echo $obNoticia[0]->titular ?> </h3>
                    <div class="row">
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <label>Reseña:</label> <?php echo $obNoticia[0]->resena ?>
                            </p>
                        </div>
                        <div class="col-xs-6 col-sm-12">
                            <p>
                                <label>Contenido:</label> <span> <?php echo $obNoticia[0]->contenido ?> </span>
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-7 col-sm-pull-5 bp-vcenter">
                    <img id="imagen" class="img-responsive" src="<?php echo $obNoticia[0]->imagen ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-12">
                <!-- INICIO FACEBOOK COMENTARIOS -->
                    <div class="fb-comments" data-href="https://www.facebook.com/Angelina-Atelier-104636548527681" data-width="100%" data-numposts="5"></div>
                <!-- FIN FACEBOOK COMENTARIOS -->
                </div>
            </div>
        </div>
        
    </body>

</html>