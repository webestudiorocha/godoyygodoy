<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->themeInit();
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$servicio = new Clases\Servicios();
$servicio->set("id", $id);
$servicioData  = $servicio->view();
$servicioArray = $servicio->list("");
$imagen        = new Clases\Imagenes();
?>

<!-- Start Breadcumbs Area -->
<div class="breadcumbs-area breadcumbs-bg-2 bc-area-padding">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>
                            SERVICIOS
                        </h2>
                        <span>
                            <a href="<?=URL;?>/index">
                                HOME
                            </a>/ SERVICIOS / <?= $servicioData['titulo']; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcumbs Area -->

<!-- Start Services Area -->
<div class="content-block-area">
    <div class="container">
        <div class="row">
            <!-- Single Service Left -->
            <div class="col-sm-3">
                <div class="vertical-menu left-widget">
                    <ul>
                        <?php $i = 0;?>
                        <?php foreach ($servicioArray as $actual): ?>
                            <li class="<?php if ($actual['id'] == $servicioData['id']): echo 'active'; endif?>">
                                <a href="<?= URL.'/servicio/'.$actual['titulo'].'/'.$actual['id']; ?>">
                                    <?=$actual["titulo"];?>
                                    <i class="fa fa-arrow-circle-right pull-right">
                                    </i>
                                </a>
                            </li>
                            <?php $i++;?>
                        <?php endforeach?>
                    </ul>
                </div>
            </div>
            <!-- End Single Service Left -->

            <!-- Single Service Right -->
            <div class="col-sm-9">
                <div class="slider-wrapper">
                    <!-- Swiper -->
                    <?php $filter = array("codigo = '$servicioData[cod]'");?>
                    <?php $imagen->set("cod", $servicioData['cod']);?>
                    <?php $imagenArray = $imagen->list($filter);?>

                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <?php foreach ($imagenArray as $imgActual): ?>

                                <div class="swiper-slide" style="background-image:url('<?= URL . '/' . $imgActual['ruta'];?>');">
                                </div>
                            <?php endforeach?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white">
                        </div>
                        <div class="swiper-button-prev swiper-button-white">
                        </div>
                    </div>


                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <?php foreach ($imagenArray as $imgActual): ?>
                                <div class="swiper-slide" style="background-image:url('<?= URL . '/' . $imgActual['ruta'];?>')">
                                </div>
                            <?php endforeach?>
                        </div>
                    </div>
                </div>

                <div class="service-content">
                    <h3 class="page-header">
                        <?=$servicioData["titulo"];?>
                    </h3>
                    <?=$servicioData["desarrollo"];?>

                    <h3 class="page-header">
                        ¿Por qué la gente nos elige?
                    </h3>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-item-boxed">
                                        <span class="single-icon">
                                            <i class="fa fa-users">
                                            </i>
                                        </span>
                                        <h4>
                                            Professional Team
                                        </h4>
                                        <p>
                                            Our various areas of expertise are available on a consulting.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-item-boxed">
                                        <span class="single-icon">
                                            <i class="fa fa-cogs">
                                            </i>
                                        </span>
                                        <h4>
                                            Quality Parts
                                        </h4>
                                        <p>
                                            Our various areas of expertise are available on a consulting.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-item-boxed">
                                        <span class="single-icon">
                                            <i class="fa fa-wrench">
                                            </i>
                                        </span>
                                        <h4>
                                            Latest Equipments
                                        </h4>
                                        <p>
                                            Our various areas of expertise are available on a consulting.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-item-boxed">
                                        <span class="single-icon">
                                            <i class="fa fa-gavel">
                                            </i>
                                        </span>
                                        <h4>
                                            Quality Guarantee
                                        </h4>
                                        <p>
                                            Our various areas of expertise are available on a consulting.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-service-image">
                                <img src="<?= URL; ?>/assets/img/single-preview.jpg" alt="Image">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- End Single Service Right -->
        </div>
    </div>
</div>
<!-- End Services Area -->


<?php $template->themeEnd();?>