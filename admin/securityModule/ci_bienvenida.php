<?php

class CiBienvenida
{

    public function bienvenidaShow()
    {

        // session_start();

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <link rel="stylesheet" href="../shared/assets/css/ci_bienvenida.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
            <title>Bienvenida</title>
        </head>

        <body class="container ">

            <div class="menu container-fluid">
                <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <span class="navbar-brand"><?php echo $_SESSION['usuario']->idtrabajador->nombre . ' ' . $_SESSION['usuario']->idtrabajador->apaterno . ' ' . $_SESSION['usuario']->idtrabajador->amaterno; ?></span>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            </ul>
                            <a href="../shared/logout.php"><img src="../shared/assets/modelos/icons/salir.svg" alt="" height="40px" width="40px"></a>
                        </div>
                    </div>
                </nav>
            </div>
            
            
            <div class="container contenido">
                <?php foreach ($_SESSION['clasificacion_privilegio'] as $clasiprivi) : ?>
                    <h1 style="color: white"><?= ucfirst($clasiprivi->nombre);?></h1><br>
                    <div id="privilegios">
                        <?php foreach ($_SESSION['privilegio'] as $privi) : ?>
                            <?php if($clasiprivi->nombre==$privi->nombrecp): ?>
                                <div class="card card-h">
                                    <header>
                                        <h4><?= $privi->nombrep;?></h4>
                                    </header>
                                    <main>
                                        <form action="<?= $privi->path; ?>" method="POST">
                                            <button name="btnPrivilegio" class="btnPrivilegio"><img src="../shared/assets/modelos/icons/<?= (str_replace('ñ','n',str_replace(' ', '_', strtolower(trim($privi->nombrep))))) ?>.svg" alt="" height="90px" width="90px"></button>
                                        </form>
                                    </main>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
                    
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        </body>

        </html>
<?php
    }
}

?>