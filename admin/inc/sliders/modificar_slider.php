<?php
$sliders  = new Clases\Sliders();
$imagenes = new Clases\Imagenes();
$zebra    = new Clases\Zebra_Image();

$cod       = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$borrarImg = $funciones->antihack_mysqli(isset($_GET["borrarImg"]) ? $_GET["borrarImg"] : '');

$sliders->set("cod", $cod);
$slide = $sliders->view();
$imagenes->set("cod", $slide["cod"]);
$imagenes->set("link", "modificarSliders");

if ($borrarImg != '') {
    $imagenes->set("id", $borrarImg);
    $imagenes->delete();
    $funciones->headerMove(URL . "/index/modificarSliders&cod=$cod");
}

if (isset($_POST["agregar"])) {
    $cod = $slide["cod"];
    //$sliders->set("id", $id);
    $sliders->set("cod", $cod);
    $sliders->set("titulo", $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : ''));
    $sliders->set("subtitulo", $funciones->antihack_mysqli(isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : ''));
    $sliders->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d")));

    if ($_FILES['files']['name'] != '') {
        $imgInicio = $_FILES["files"]["tmp_name"];
        $tucadena  = $_FILES["files"]["name"];
        $partes    = explode(".", $tucadena);
        $dom       = (count($partes) - 1);
        $dominio   = $partes[$dom];
        $prefijo   = substr(md5(uniqid(rand())), 0, 10);
        if ($dominio != '') {
            $destinoFinal = "../../assets/archivos/" . $prefijo . "." . $dominio;
            move_uploaded_file($imgInicio, $destinoFinal);
            chmod($destinoFinal, 0777);
            $destinoRecortado = "../../assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

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
            $imagenes->set("ruta", str_replace("../../", "", $destinoRecortado));
            $imagenes->add();
        }

    }

    $sliders->edit();
    //$funciones->headerMove(URL . "/index/verSliders");
}
?>

<div class="col-md-12 ">
    <h4>Sliders</h4>
    <hr/>
    <form method="post" class="row" enctype="multipart/form-data">
        <label class="col-md-4">Título:<br/>
            <input type="text" value="<?=$slide["titulo"]?>" name="titulo">
        </label>
        <label class="col-md-4">Subtitulo:<br/>
            <input type="text" value="<?=$slide["subtitulo"]?>" name="titulo">
        </label>
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
            <input type="submit" class="btn btn-primary" name="agregar" value="Modificar Sliders" />
        </div>
    </form>
</div>