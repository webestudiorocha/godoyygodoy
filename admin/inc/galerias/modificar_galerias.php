<?php
$galerias = new Clases\Galerias();
$imagenes = new Clases\Imagenes();
$zebra    = new Clases\Zebra_Image();

$cod       = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$borrarImg = $funciones->antihack_mysqli(isset($_GET["borrarImg"]) ? $_GET["borrarImg"] : '');

$galerias->set("cod", $cod);
$novedad = $galerias->view();
$imagenes->set("cod", $novedad["cod"]);
$imagenes->set("link", "modificarGalerias");

if ($borrarImg != '') {
    $imagenes->set("id", $borrarImg);
    $imagenes->delete();
    $funciones->headerMove(URL . "/index/modificarGalerias&cod=$cod");
}

if (isset($_POST["agregar"])) {
    $count = 0;
    $cod   = $novedad["cod"];
    //$galerias->set("id", $id);
    $galerias->set("cod", $cod);
    $galerias->set("titulo", $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : ''));
    $galerias->set("categoria", $funciones->antihack_mysqli(isset($_POST["categoria"]) ? $_POST["categoria"] : ''));
    $galerias->set("desarrollo", $funciones->antihack_mysqli(isset($_POST["desarrollo"]) ? $_POST["desarrollo"] : ''));
    $galerias->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : ''));
    $galerias->set("description", $funciones->antihack_mysqli(isset($_POST["description"]) ? $_POST["description"] : ''));
    $galerias->set("keywords", $funciones->antihack_mysqli(isset($_POST["keywords"]) ? $_POST["keywords"] : ''));

    foreach ($_FILES['files']['name'] as $f => $name) {
        $imgInicio = $_FILES["files"]["tmp_name"][$f];
        $tucadena  = $_FILES["files"]["name"][$f];
        $partes    = explode(".", $tucadena);
        $dom       = (count($partes) - 1);
        $dominio   = $partes[$dom];
        $prefijo   = substr(md5(uniqid(rand())), 0, 10);
        if ($dominio != '') {
            $destinoFinal = "../assets/archivos/" . $prefijo . "." . $dominio;
            move_uploaded_file($imgInicio, $destinoFinal);
            chmod($destinoFinal, 0777);
            $destinoRecortado = "../assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

            $zebra->source_path            = $destinoFinal;
            $zebra->target_path            = $destinoRecortado;
            $zebra->jpeg_quality           = 80;
            $zebra->preserve_aspect_ratio  = true;
            $zebra->enlarge_smaller_images = true;
            $zebra->preserve_time          = true;

            if ($zebra->resize(800, 700, ZEBRA_IMAGE_NOT_BOXED)) {
                unlink($destinoFinal);
            }

            $imagenes->set("codigo", $cod);
            $imagenes->set("ruta", str_replace("../", "", $destinoRecortado));
            $imagenes->add();
        }

        $count++;
    }

    $galerias->edit();
    $funciones->headerMove(URL . "/index/verGalerias");
}
?>

<div class="col-md-12 ">
    <h4>Galerias</h4>
    <hr/>
    <form method="post" class="row" enctype="multipart/form-data">
        <label class="col-md-6">Título:<br/>
            <input type="text" value="<?=$novedad["titulo"]?>" name="titulo" readonly>
        </label>
        <label class="col-md-6">Fecha:<br/>
            <input type="date" name="fecha" value="<?=$novedad["fecha"]?>">
        </label>
        <br/>
        <div class="col-md-12">
            <div class="row">
                    <?php $filter = array("codigo = '$cod'"); ?>
                    <?php $imagenes->set("cod", $cod); ?>
                    <?php $imagenesArray = $imagenes->list($filter); ?>
                    <?php foreach ($imagenesArray as $imgActual): ?>
                        <div class="col-md-2">
                                <img src="../../<?= $imgActual['ruta']; ?>" alt="Image Description" width="100%">
                            </div>
                    <?php endforeach ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <label class="col-md-12">Imágenes:<br/>
            <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
        </label>
        <div class="clearfix"></div>
        <br/>
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" name="agregar" value="Crear Novedad" />
        </div>
    </form>
</div>