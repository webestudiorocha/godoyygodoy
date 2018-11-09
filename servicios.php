<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template      = new Clases\TemplateSite();
$template->themeInit();
$servicio      = new Clases\Servicios();
$servicioArray = $servicio->list("");
$imagen = new Clases\Imagenes();
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
                            <a href="<?= URL; ?>/index">
                                HOME
                            </a>/ SERVICIOS
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

        <?php foreach ($servicioArray as $actual): ?>
        <?php $filter = array("codigo = '$actual[cod]'"); ?>
        <?php $imagen->set("cod", $actual['cod']); ?>
        <?php $imagenArray = $imagen->list($filter); ?>

        <div class="col-sm-6 col-md-4">
            <div class="services-item">
                <div class="box">
                    <img src="<?= $imagenArray[0]["ruta"]; ?>" alt="Image">
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
                                <a href="<?= URL.'/servicio/'.$actual['titulo'].'/'.$actual['id']; ?>">
                                    <i class="fa fa-link">
                                    </i> 
                                    Ver más
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</div>
<!-- End Services Area -->


<?php $template->themeEnd(); ?>