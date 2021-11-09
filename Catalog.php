<?php

include_once 'admin/model/EuModelo.php';

$obModelos = new EuModelo();
$obModelos = $obModelos->listar_modelos_clientes();

include_once 'admin/model/EuSexo.php';

$obSexos = new EuSexo();
$obSexos = $obSexos->listar_sexos();

include_once 'admin/model/EuTipoPrenda.php';

$obTiposPrendas = new EuTipoPrenda();
$obTiposPrendas = $obTiposPrendas->listar_tipos_prendas();

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description"  content="Escoja uno de nuestros modelos prediseñados.">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Catálogo</title>
    <link rel="icon" type="image/png" href="static/images/default-logo.png"/>
    <link rel="stylesheet" href="static/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="static/css/Catalog.css" media="screen">
    <script class="u-script" type="text/javascript" src="static/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.17.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js'>
    <script src="static/js/Catalog.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link  href="static/css/jquery.fancybox.min.css" rel="stylesheet">
    <script src="static/js/jquery.fancybox.min.js"></script>
    -->
    
    
    <!-- PARA CHATBOT -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/chat.css">
    <link rel="stylesheet" href="static/css/chatBot.css">
    <link rel="stylesheet" href="static/css/typing.css">
    
    
    <script src="static/js/verModelo.js" type="text/javascript"></script>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "static/images/default-logo.png"
}</script>
    <meta property="og:title" content="Catalog">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    
    
  </head>
  <body id="home" class="wide">
      
      <?php
            
            include("./chatBot.php");
            
        ?>
      
      <header class="u-clearfix u-header u-header" id="sec-11b3"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
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
            <!--u-black--><div class="u-white u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Inicio</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="News.php">Noticias</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Catalog.php">Catálogo</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Contáctanos</a>
</li></ul>
              </div>
            </div>
            <!--u-black--><div class="u-white u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
      
      <section class="u-clearfix u-section-1" id="carousel_e887">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1"><!--blog--><!--blog_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/blog_options_json-->
          <div class="u-blog u-expanded-width u-blog-1">
              
              <strong>Filtrar</strong>
              
              <br>
              
              <div id="sexo">
                  <strong>Sexo: </strong>
                  <select class="form-select" id="selectsexo" onchange="cargarModelos();">
                    <option selected value="0">Seleccione una opción</option>
                    <?php foreach($obSexos as $sexo): ?>
                        <option value="<?php echo $sexo->idsexo ?>"><?php echo $sexo->nombre ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              
              <br>
              
              <div id="tipoprenda">
                  <strong>Tipo de prenda: </strong>
                  <select class="form-select" id="selecttipoprenda" onchange="cargarModelos();">
                    <option selected value="0">Seleccione una opción</option>
                    <?php foreach($obTiposPrendas as $tipoprenda): ?>
                        <option value="<?php echo $tipoprenda->idtipoprenda ?>"><?php echo $tipoprenda->nombre ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              
              
              <br>
              
            <div class="u-repeater u-repeater-1 list-wrapper" id="seccionmodelos"><!--blog_post-->
              
              <?php foreach($obModelos as $model): ?>
                <div class="u-blog-post u-container-style u-grey-20 u-repeater-item u-video-cover u-repeater-item-1 list-item">
                  <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                      <img src="<?php echo $model->imagen ?>" alt="" class="u-blog-control u-expanded-width u-image u-image-default u-image-1" data-image-width="2250" data-image-height="1500"><!--/blog_post_image-->
                    <h2 class="u-blog-control u-text u-text-1">
                        <?php echo $model->nombre ?>
                    </h2><!--/blog_post_header--><!--blog_post_content-->
                    <div class="u-blog-control u-post-content u-text u-text-2"><!--blog_post_content_content--><?php echo $model->descripcion ?><!--/blog_post_content_content--></div><!--/blog_post_content--><!--blog_post_metadata-->
                    <!--
                    <div class="u-blog-control u-metadata u-text-grey-40 u-metadata-1">
                      <span class="u-meta-date u-meta-icon">Sun Jun 13 2021</span>
                    </div>
                    -->
                    <br>
                    
                    <div style="text-align: center">
                        <button style="color: #00CDFF" value="<?php echo $model->idmodelo ?>" name="btnVerModelo" onclick="verModelo(this);" type="button" class="btn btn-primary openBtn2">Ver más</button>
                    </div>
                    
                    
                    
                    
                    
                    <!--
                    <a data-fancybox="gallery" href="static/images/2.jpeg">
                        <img src="static/images/2.jpeg">
                    </a>
                    -->
                    
                  </div>
                </div><!--/blog_post--><!--blog_post-->
              <?php endforeach; ?>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal contenido-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Detalle del Modelo</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
              <div id="pagination-container"></div>
            
          </div><!--/blog-->
        </div>
      </section>
      
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-3dc0"><div class="u-clearfix u-sheet u-sheet-1">
        <br>
        <br>
        <span class="u-small-text u-text u-text-variant u-text-1">Contáctanos a través de nuestras redes sociales</span>
        <a href="https://www.facebook.com/Angelina-Atelier-104636548527681/"><img src="static/images/facebook32.png" alt="" class="social-network-image"></a>
        <a href="https://wa.me/51993665517"><img src="static/images/whatsapp32.png" alt="" class="social-network-image"></a>
        <a href="mailto:AngelinaAtelierConfection@gmail.com"><img src="static/images/gmail32.png" alt="" class="social-network-image"></a>
      </div></footer>
      
      <script>
        crearPaginador();
        function crearPaginador(){
            
            var items = $(".list-wrapper .list-item");
            var numItems = items.length;
            var perPage = 6;

            items.slice(perPage).hide();

            $('#pagination-container').pagination({
                items: numItems,
                itemsOnPage: perPage,
                prevText: "&laquo;",
                nextText: "&raquo;",
                onPageClick: function (pageNumber) {
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide().slice(showFrom, showTo).show();
                }
            });
            
        }
        
        
        function verModelo(btn){
            $('.modal-body').load('verModelo.php?idmodelo='+btn.value,function(){
                $('#myModal').modal({show:true});
            });
        }
        
        function cargarModelos(){
            if (document.getElementById('selectsexo').value!=0 && document.getElementById('selecttipoprenda').value!=0) {
                $('#seccionmodelos').load('cargarModelosSexoyTipoPrenda.php?idsexo='+document.getElementById('selectsexo').value+'&idtipoprenda='+document.getElementById('selecttipoprenda').value, function(){
                       crearPaginador();                                    
                });
            } else if (document.getElementById('selectsexo').value!=0 && document.getElementById('selecttipoprenda').value==0){
                $('#seccionmodelos').load('cargarModelosSexo.php?idsexo='+document.getElementById('selectsexo').value, function(){
                       crearPaginador();                                    
                });
            } else if (document.getElementById('selectsexo').value==0 && document.getElementById('selecttipoprenda').value!=0){
                $('#seccionmodelos').load('cargarModelosTipoPrenda.php?idtipoprenda='+document.getElementById('selecttipoprenda').value, function(){
                       crearPaginador();                                    
                });
            } else if (document.getElementById('selectsexo').value==0 && document.getElementById('selecttipoprenda').value==0) {
                $('#seccionmodelos').load('cargarModelos.php', function(){
                       crearPaginador();                                    
                });
            }
            
        }
        
        /*
        function cargarPorSexo(select){
            if (document.getElementById('selectsexo').value!=0 && document.getElementById('selecttipoprenda').value!=0) {
                $('#seccionmodelos').load('cargarModelosSexoyTipoPrenda.php?idsexo='+select.value+'?idtipoprenda'+document.getElementById('selecttipoprenda').value);
            } else {
                $('#seccionmodelos').load('cargarModelosSexo.php?idsexo='+select.value);
            }
            crearPaginador();
        }
        
        function cargarPorTipoPrenda(select){
            if (document.getElementById('selectsexo').value!=0 && document.getElementById('selecttipoprenda').value!=0) {
                $('#seccionmodelos').load('cargarModelosSexoyTipoPrenda.php?idsexo='+document.getElementById('selectsexo').value+'&idtipoprenda='+select.value);
            } else {
                $('#seccionmodelos').load('cargarModelosTipoPrenda.php?idtipoprenda='+select.value);
            }
            crearPaginador();
        }
        */
      </script>
    
    <!-- PARA CHATBOT -->
    <script src="static/js/Chat.js"></script>
    <script src="static/js/chatBot.js"></script>
      
  </body>
</html>