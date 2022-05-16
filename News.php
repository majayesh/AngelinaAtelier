<?php

include_once 'admin/model/EuNoticia.php';

$obNoticias = new EuNoticia();
$obNoticias = $obNoticias->listar_noticias_clientes();

?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Noticias</title>
    <link rel="icon" type="image/png" href="static/images/default-logo.png"/>
    <link rel="stylesheet" href="static/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="static/css/News.css" media="screen">
    <script class="u-script" type="text/javascript" src="static/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.17.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js'>
    <script src="static/js/News.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    <script src="static/js/verNoticia.js" type="text/javascript"></script>
          
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "static/images/default-logo.png"
}</script>
    <meta property="og:title" content="News">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-11b3"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        
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
    
    
      
      
      <section class="u-align-center u-clearfix u-section-1" id="carousel_fc4a">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h1 class="u-custom-font u-font-georgia u-text u-text-default u-text-1">Últimas Noticias</h1><!--blog--><!--blog_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/blog_options_json-->
        <div class="u-blog u-blog-1">
          <div class="u-repeater u-repeater-1 list-wrapper" id="seccionnoticias"><!--blog_post-->
            
            <?php foreach($obNoticias as $noticia): ?> 
                <div class="u-blog-post u-container-style u-repeater-item u-grey-20 u-repeater-item-1 list-item">
                  <div class="u-container-layout u-similar-container u-valign-middle-xl u-container-layout-1">
                      <img alt="" class="u-blog-control u-expanded-height-lg u-expanded-height-xl u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1" src="<?php echo $noticia->imagen ?>"><!--/blog_post_image-->
                    <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-video-cover u-group-1">
                      <div class="u-container-layout u-valign-middle u-container-layout-2"><!--blog_post_metadata-->
                        <div class="u-blog-control u-metadata u-text-grey-50 u-metadata-1"><!--blog_post_metadata_date-->
                          <span class="u-meta-date u-meta-icon"><!--blog_post_metadata_date_content--><?php echo $noticia->fecha ?><!--/blog_post_metadata_date_content--></span><!--/blog_post_metadata_date--><!--blog_post_metadata_category-->
                          <!--<span class="u-meta-category u-meta-icon">Category</span>-->
                        </div><!--/blog_post_metadata--><!--blog_post_header-->
                        <h2 class="u-blog-control u-text u-text-2">
                          <?php echo $noticia->titular ?>
                        </h2><!--/blog_post_header--><!--blog_post_content-->
                        <div class="u-blog-control u-post-content u-text u-text-3"><!--blog_post_content_content--><?php echo $noticia->resena ?><!--/blog_post_content_content--></div><!--/blog_post_content--><!--blog_post_readmore-->
                        <br>
                        <div style="text-align: center">
                            <button style="color: #00CDFF" value="<?php echo $noticia->idnoticia ?>" name="btnVerNoticia" onclick="verNoticia(this);" type="button" class="btn btn-primary openBtn2">Leer más</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div><!--/blog_post--><!--blog_post-->
            <?php endforeach; ?>
            
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal contenido-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Noticia Completa</h4>
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
            <br>
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
          
        function verNoticia(btn){
            $('.modal-body').load('verNoticia.php?idnoticia='+btn.value,function(){
                $('#myModal').modal({show:true});
            });
        }
    </script>
    
  </body>
</html>