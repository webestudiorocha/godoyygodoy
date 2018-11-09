<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->themeInit();
$novedad  = new Clases\Novedades();
$novedadArray = $novedad->list("");
$imagen  = new Clases\Imagenes();
?>

<!-- Start Breadcumbs Area -->
<div class="breadcumbs-area breadcumbs-bg-2 bc-area-padding">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>
                            NOVEDAD
                        </h2>
                        <span>
                            <a href="<?= URL; ?>/index">
                                HOME
                            </a>/ NOVEDAD
                        </span>
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

                    <?php
                    foreach ($novedadArray as $actual): ?>
                    <?php $filter = array("codigo = '$actual[cod]'"); ?>
                    <?php $imagen->set("cod", $actual['cod']); ?>
                    <?php $imagenArray = $imagen->list($filter); ?>
                    <?php $fecha = explode('-',$actual['fecha']); ?>
                    <?php $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];?>

                    <div class="col-md-6">
                        <div class="single-blog-item">
                            <a href="<?= URL.'/novedad/'.$actual['titulo'].'/'.$actual['id']; ?>" class="zoomin">
                                <img src="<?= URL.'/'.$imagenArray[0]['ruta']; ?>" alt="Image Description">
                            </a>
                            <div class="blog-item-info">
                                <span class="blog-date">
                                    <?= $fecha; ?>
                                </span>
                                <div class="separator">
                                    |
                                </div>
                                <a class="blog-tags red" href="#">
                                    <i class="fa fa-tag">
                                    </i><?= $actual['categoria']; ?>
                                </a>
                                <a href="<?= URL.'/novedad/'.$actual['titulo'].'/'.$actual['id']; ?>">
                                    <h3>
                                        <?= $actual['titulo']; ?>
                                    </h3>
                                </a>
                                <?= substr($actual['desarrollo'],0,250); ?>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="blog-item-profile">
                                            <img src="<?= URL.'/'.$imagenArray[0]['ruta']; ?>" alt="Image description">
                                            <a href="<?= URL.'/novedad/'.$actual['titulo'].'/'.$actual['id']; ?>">
                                                Leer más
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
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
                                <a href="<?= URL.'/novedad/'.$actual['titulo'].'/'.$actual['id']; ?>" class="single-popular-news-item">
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