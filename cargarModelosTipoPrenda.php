
<?php

include_once 'admin/model/EuModelo.php';
    
$obModelos = new EuModelo();
$obModelos = $obModelos->listar_modelos_clientes_tipo_prenda($_GET['idtipoprenda']);

?>

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

    <!--
    <a data-fancybox="gallery" href="static/images/2.jpeg">
        <img src="static/images/2.jpeg">
    </a>
    -->

  </div>
</div><!--/blog_post--><!--blog_post-->
<?php endforeach; ?>