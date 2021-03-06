<?php

class FormPrincipalModificarNoticia
{

    public function modificarNoticiaShow()
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
            <link rel="stylesheet" href="../shared/assets/css/estilos.css">
            <title>Modificar Noticia</title>
        </head>
        
        <body class="container ">
            
            <div class="menu container-fluid z-index">
                <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <span class="navbar-brand"><?php echo $_SESSION['usuario']->idtrabajador->nombre . ' ' . $_SESSION['usuario']->idtrabajador->apaterno . ' ' . $_SESSION['usuario']->idtrabajador->amaterno; ?></span>
                            
                            <div class="nav-item">
                                <span class="fs-4">Modificar Noticia</span>
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

            <h1 class="page-header">Noticias</h1>
            <form action="./get_modificarnoticia.php" method="post">
                <div class="well form-horizontal">
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>Titular</th>
                                <th>Rese??a</th>
                                <th>Contenido</th>
                                <th>Estado</th>
                                <th>Noticia</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($_SESSION['noticias'] as $noticia): ?>
                            <tr>
                                <td><?php echo $noticia->titular ?></td>
                                <td><?php echo $noticia->resena ?></td>
                                <td><?php echo $noticia->contenido ?></td>
                                <td>
                                    <?php if ($noticia->estado=="Activo") {
                                        echo("Visible");
                                    } else {
                                        echo("No visible");
                                    } ?>
                                </td>
                                <td><?php echo $noticia->fecha ?></td>
                                <td><img src="<?php echo $noticia->imagen ?>" width="120" height="120"></td>
                                <td><button name="btnFormModificarNoticia" type="submit" value="<?php echo $noticia->idnoticia ?>"><img src="../shared/assets/modelos/icons/modificar.svg" height="25px" width="25px" alt=""></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>


            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        </body>

        </html>




<?php

    }
}


?>