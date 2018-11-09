<?php
$portfolio = new Clases\Portfolio();
$imagenes  = new Clases\Imagenes();
$zebra     = new Clases\Zebra_Image();

$cod       = $funciones->antihack_mysqli(isset($_GET["cod"]) ? $_GET["cod"] : '');
$borrarImg = $funciones->antihack_mysqli(isset($_GET["borrarImg"]) ? $_GET["borrarImg"] : '');

$portfolio->set("cod", $cod);
$portfolioInd = $portfolio->view();
$imagenes->set("cod", $portfolioInd["cod"]);
$imagenes->set("link", "modificarPortfolio");

if ($borrarImg != '') {
    $imagenes->set("id", $borrarImg);
    $imagenes->delete();
    $funciones->headerMove(URL . "/index/modificarPortfolio&cod=$cod");
}

if (isset($_POST["agregar"])) {
    $count = 0;
    $cod   = $portfolioInd["cod"];
    //$portfolio->set("id", $id);
    $portfolio->set("cod", $cod);
    $portfolio->set("titulo", $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : ''));
    $portfolio->set("categoria", $funciones->antihack_mysqli(isset($_POST["categoria"]) ? $_POST["categoria"] : ''));
    $portfolio->set("desarrollo", $funciones->antihack_mysqli(isset($_POST["desarrollo"]) ? $_POST["desarrollo"] : ''));
    $portfolio->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : ''));
    $portfolio->set("description", $funciones->antihack_mysqli(isset($_POST["description"]) ? $_POST["description"] : ''));
    $portfolio->set("keywords", $funciones->antihack_mysqli(isset($_POST["keywords"]) ? $_POST["keywords"] : ''));

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

    $portfolio->edit();
    $funciones->headerMove(URL . "/index/verPortfolio");
}
?>

<div class="col-md-12 ">
    <h4>Portfolio</h4>
    <hr/>
    <form method="post" class="row" enctype="multipart/form-data">
        <label class="col-md-4">Título:<br/>
            <input type="text" value="<?=$portfolioInd["titulo"]?>" name="titulo">
        </label>
        <label class="col-md-4">Categoría:<br/>
            <select name="categoria">
                <option value="<?=$portfolioInd["categoria"]?>" selected><?=$portfolioInd["categoria"]?></option>
                <option value="Novedades">Novedades</option>
                <option value="Marketing">Marketing</option>
                <option value="Social">Social</option>
            </select>
        </label>
        <label class="col-md-4">Fecha:<br/>
            <input type="date" name="fecha" value="<?=$portfolioInd["fecha"]?>">
        </label>

        <div class="clearfix"></div>
        <label class="col-md-12">Desarrollo:<br/>
            <textarea name="desarrollo" class="ckeditorTextarea"><?=$portfolioInd["desarrollo"];?></textarea>
        </label>
        <div class="clearfix"></div>
        <label class="col-md-12">Palabras claves dividas por ,<br/>
            <input type="text" name="keywords" value="<?=$portfolioInd["keywords"]?>">
        </label>
        <label class="col-md-12">Descripción breve<br/>
            <textarea name="description"><?=$portfolioInd["description"]?></textarea>
        </label>
        <br/>
        <div class="col-md-12">
            <div class="row">
                <?php
$imagenes->imagenesAdmin();
?>
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