<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template      = new Clases\TemplateSite();
$template->themeInit();
$servicio      = new Clases\Servicios();
$servicioArray = $servicio->list("");
$novedad      = new Clases\Novedades();
$novedadArray = $novedad->list("");
$slider      = new Clases\Sliders();
$sliderArray = $slider->list("");
$marcas      = new Clases\Galerias();
$marcasArray = $marcas->list("");
$imagen = new Clases\Imagenes();
$caja = new Clases\Contenidos();
/*
$enviar= new Clases\Email();
$enviar->emailEnviar("asfaf","facundo@estudiorochayasoc.com.ar","facundo@estudiorochayasoc.com.ar","asfasf");
*/
?>

<!-- Start Homepage Slider -->
<div class="homepage-slides-wrapper">
    <!-- Slider main container -->
    <div class="swiper-container swiper1">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($sliderArray as $actual): ?>
                <?php $imagen->set("cod", $actual["cod"]); ?>
                <?php $data = $imagen->view(); ?>
                <div class="swiper-slide" style="background: url('<?= $data["ruta"]; ?>') center/cover;">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <h1>
                                            <?= $actual["titulo"]; ?>
                                        </h1>
                                        <p>
                                            <?= $actual["subtitulo"]; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination swiper-pagination1">
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev">
        </div>
        <div class="swiper-button-next">
        </div>

    </div>
</div>
<!-- End Homepage Slider -->

<!-- Start Services Area -->
<div class="content-block-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title text-center">
                    <h2>
                        <span>
                            Nuestros
                        </span>servicios
                    </h2>
                    <div class="car-icon">
                        <img src="assets/img/cars.png" alt="car">
                    </div>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="featured-boxed text-center">
                    <div class="octagonWrap">
                        <img src="<?= URL; ?>/assets/img/caja1.png">
                    </div>
                    <h3>
                        <?php $caja->set("id","8"); ?>
                        <?php $cajaData = $caja->view(); ?>
                        <?= $cajaData["codigo"]; ?>
                    </h3>
                    <div class="upper-line">
                    </div>
                    <div class="bottom-line">
                    </div>
                    <p>
                        <?= $cajaData["contenido"]; ?>
                    </p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="featured-boxed text-center">
                    <div class="octagonWrap">
                        <img src="<?= URL; ?>/assets/img/caja2.png">
                    </div>
                    <h3>
                        <?php $caja->set("id","9"); ?>
                        <?php $cajaData = $caja->view(); ?>
                        <?= $cajaData["codigo"]; ?>
                    </h3>
                    <div class="upper-line">
                    </div>
                    <div class="bottom-line">
                    </div>
                    <p>
                        <?= $cajaData["contenido"]; ?>
                    </p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="featured-boxed text-center">
                    <div class="octagonWrap">
                        <img src="<?= URL; ?>/assets/img/caja3.png">
                    </div>
                    <h3>
                        <?php $caja->set("id","10"); ?>
                        <?php $cajaData = $caja->view(); ?>
                        <?= $cajaData["codigo"]; ?>
                    </h3>
                    <div class="upper-line">
                    </div>
                    <div class="bottom-line">
                    </div>
                    <p>
                        <?= $cajaData["contenido"]; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="separator-line">
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($servicioArray as $actual): ?>
                <?php $filter = array("codigo = '$actual[cod]' "); ?>
                <?php $imagen->set("cod", $actual['cod']); ?>
                <?php $imagenArray = $imagen->list($filter); ?>

                <div class="col-md-4">
                    <div class="services-item">
                        
                            <div class="box" style="background: url('<?= $imagenArray[0]['ruta']; ?>')center/cover;">
                                <h3>
                                    <?= $actual["titulo"]; ?>
                                </h3>
                                <div class="box-content">
                                    <h3 class="title">
                                        <?= $actual["titulo"]; ?>
                                    </h3>
                                    <span class="post">
                                     <?= substr($actual["desarrollo"],0,250); ?>
                                 </span>
                                 <ul class="icon">
                                    <li>
                                        <a href="#">
                                        <i class="fa fa-link">
                                        </i> Más información
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    
                </div>
            </div>
        <?php endforeach ?>
        <div class="col-md-12 text-center">
            <a href="<?= URL.'/servicios' ?>" class="btn theme-btn">
                Ver todos los servicios
            </a>
        </div>
    </div>
</div>
</div>
<!-- End Services Area -->

<!-- Start News Area -->
<div class="content-block-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title text-center">
                    <h2>
                        <span>
                            Novedades
                        </span>Recientes
                    </h2>
                    <div class="car-icon">
                        <img src="assets/img/cars.png" alt="car">
                    </div>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($novedadArray as $actual): ?>
                <?php $filter = array("codigo = '$actual[cod]'"); ?>
                <?php $imagen->set("cod", $actual['cod']); ?>
                <?php $imagenArray = $imagen->list($filter); ?>
                <?php $fecha = explode("-",$actual["fecha"]); ?>
                <?php $fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?>

                <div class="col-sm-4">
                    <div class="single-blog-item">
                        <a href="#" class="zoomin">
                            <div class="novedad_img_index" style="background: url('<?= $imagenArray[0]["ruta"]; ?>')center/cover">
                            </div>
                        </a>
                        <div class="blog-item-info">
                            <span class="blog-date">
                                <?= $fecha; ?>
                            </span>
                            <div class="separator">
                                |
                            </div>
                            <a class="blog-tags green" href="#">
                                <i class="fa fa-tag">
                                    </i><?= $actual["categoria"]; ?>
                                </a>
                                <a href="#">
                                    <h3>
                                        <?= $actual["titulo"]; ?>
                                    </h3>
                                </a>
                                <p>
                                    <?= substr($actual["desarrollo"],0,250); ?>
                                </p>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="blog-item-profile">
                                            <a href="#">
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
    </div>
    <!-- End News Area -->

    <!-- Start Our Parners Area -->
    <div class="content-block-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>
                            <span>
                                Nuestas
                            </span>Marcas
                        </h2>
                        <div class="car-icon">
                            <img src="assets/img/cars.png" alt="car">
                        </div>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="partner-slides">
                <?php foreach ($marcasArray as $actual): ?>
                    <?php $filter = array("codigo = '$actual[cod]'"); ?>
                    <?php $imagen->set("cod", $actual['cod']); ?>
                    <?php $imagenArray = $imagen->list($filter); ?>
                    <?php foreach ($imagenArray as $imgActual): ?>
                        <div class="single-partner-slide">
                            <a class="partners-logo" href="#">
                                <img src="<?= $imgActual['ruta']; ?>" alt="Image Description">
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- End Our Parners Area -->

    <?php $template->themeEnd(); ?>