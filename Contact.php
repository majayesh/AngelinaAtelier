<?php

include_once 'admin/model/EuNegocio.php';

$obNegocio = new EuNegocio();
$obNegocio = $obNegocio->obtener_negocio();

?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Contact</title>
    <link rel="icon" type="image/png" href="static/images/default-logo.png"/>
    <link rel="stylesheet" href="static/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="static/css/Contact.css" media="screen">
    <script class="u-script" type="text/javascript" src="static/js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="static/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.17.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "static/images/default-logo.png"
}</script>
    <meta property="og:title" content="Contact">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-9131"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        
        <a href="/index.php" class="u-image u-logo u-image-1">
          <img src="static/images/default-logo.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Inicio</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="News.php" style="padding: 10px 20px;">Noticias</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Catalog.php" style="padding: 10px 20px;">Catálogo</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.php" style="padding: 10px 20px;">Contáctanos</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Inicio</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="News.php">Noticias</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Catalog.php">Catálogo</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Contáctanos</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
      
      <div>
        <p> <?php echo $obNegocio[0]->descripcion ?> </p>
      </div>
      <br>
      <div>
        <h3> Correo </h3> <p> <?php echo $obNegocio[0]->email ?> </p>
      </div>
      <br>
      <div>
        <h3> Teléfono </h3> <p> <?php echo $obNegocio[0]->telefono ?> </p>
      </div>
    
      <div class="mapresponsive">
        <?php echo $obNegocio[0]->ubicacion ?>
      </div>
      
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-3dc0"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Contáctanos a través de nuestras redes sociales</p>
        <a href="https://www.facebook.com/Angelina-Atelier-104636548527681/"><img src="static/images/facebook32.png" alt="" class="social-network-image"></a>
        <a href="https://wa.me/51993665517"><img src="static/images/whatsapp32.png" alt="" class="social-network-image"></a>
        <a href="mailto:AngelinaAtelierConfection@gmail.com"><img src="static/images/gmail32.png" alt="" class="social-network-image"></a>
    </div><br></footer>
      
      
  </body>
</html>