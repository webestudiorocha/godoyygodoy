<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->themeInit();
$id       = isset($_GET["id"]) ? $_GET["id"] : '';
$contenido     = new Clases\Contenidos();
$contenido->set("codigo", $id);
$contenidoData = $contenido->view();
?>

<!-- Start Breadcumbs Area -->
<div class="breadcumbs-area breadcumbs-bg-2 bc-area-padding">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>
                            <?= $contenidoData["codigo"]; ?>
                        </h2>
                        <span>
                            <a href="<?= URL; ?>/index">
                                HOME
                            </a>/ <?= $contenidoData["codigo"]; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcumbs Area -->

<!-- Start Content Area -->
<div class="content-block-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-boxed">
                    <?= $contenidoData["contenido"]; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Area -->


<?php $template->themeEnd(); ?>