<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->themeInit();
$id        = isset($_GET["id"]) ? $_GET["id"] : '';
$novedad = new Clases\Novedades();
$novedad->set("id", $id);
$novedadData = $novedad->view();
$novedadArray = $novedad->list("");
$fecha = explode("-",$novedadData['fecha']);
$fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];
$imagen = new Clases\Imagenes();
?>

<!-- Start Breadcumbs Area -->
<div class="breadcumbs-area breadcumbs-bg-2 bc-area-padding">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>NOVEDADES</h2>
            <span><a href="<?= URL; ?>/index">HOME</a> / NOVEDADES / <?= $novedadData['titulo']; ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcumbs Area -->

<!-- Start News Area -->
<div class="content-block-area blog-content">
  <div class="container">
    <div class="row">
      <!-- Blog Content Area -->
      <div class="col-sm-7 col-md-9">
        <div class="row">
          <div class="col-md-12">
           <!-- Start Single Blog Post -->
           <div class="single-blog-post">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php $filter = array("codigo = '$novedadData[cod]'");?>
                    <?php $imagen->set("cod", $novedadData['cod']);?>
                    <?php $imagenArray = $imagen->list($filter);?>
                    <?php for($j=0;$j<count($imagenArray);$j++): ?>
                      <div class="item <?php if($j==0) {echo "active";} ?>"><img src="<?= URL.'/'.$imagenArray[$j]['ruta'] ?>" width="100%"></div>
                    <?php endfor ?>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
            <div class="blog-item-info">
              <span class="blog-date"><i class="fa fa-clock-o"></i> <?= $fecha; ?></span> <div class="separator">|</div> 
              <a class="blog-tags blue" href="#"><i class="fa fa-tag"></i> <?= $novedadData['categoria']; ?></a>
              <h3><?= $novedadData['titulo']; ?></h3>
              <?= $novedadData['desarrollo']; ?>
            </div>
          </div>
          <!-- End Single Blog Post -->
        </div>
      </div>
    </div>
    <!-- End Blog Content Area -->
    <!-- Right Sidebar Area -->
    <div class="col-sm-5 col-md-3">
      <div class="widget-boxed">
        <h3 class="widget-tile">
          Seguinos:
        </h3>
        <div class="widget-follow-us">
          <ul>
            <li>
              <a href="">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="widget-boxed">
        <h3 class="widget-tile">
          Reciente
        </h3>
        <div class="widget-popular-post">
          <ul>
            <?php
            foreach ($novedadArray as $actual): ?>
              <?php $filter = array("codigo = '$actual[cod]'"); ?>
              <?php $imagen->set("cod", $actual['cod']); ?>
              <?php $imagenArray = $imagen->list($filter); ?>
              <?php $fecha = explode('-',$actual['fecha']); ?>
              <?php $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0]; ?>
              <li>
                <a href="#" class="single-popular-news-item">
                  <img src="<?= URL.'/'.$imagenArray[0]['ruta']; ?>" alt="Novedad">
                  <h4>
                    <?= $actual['titulo']; ?>
                  </h4>
                  <span>
                    <i class="fa fa-clock-o">
                      </i><?= $fecha; ?>
                    </span>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>

      </div>
      <!-- End Right Sidebar Area -->
    </div>
  </div>
</div>
<!-- End News Area -->


<?php $template->themeEnd(); ?>