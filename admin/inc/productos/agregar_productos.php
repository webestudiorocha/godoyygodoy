<?php
$productos = new Clases\Productos();
$imagenes  = new Clases\Imagenes();
$zebra     = new Clases\Zebra_Image();

if (isset($_POST["agregar"])) {
    $count = 0;
    $cod   = substr(md5(uniqid(rand())), 0, 10);

    $productos->set("cod", $funciones->antihack_mysqli(isset($cod) ? $cod : ''));
    $productos->set("titulo", $funciones->antihack_mysqli(isset($_POST["titulo"]) ? $_POST["titulo"] : ''));
    $productos->set("precio", $funciones->antihack_mysqli(isset($_POST["precio"]) ? $_POST["precio"] : ''));
    $productos->set("precioDescuento", $funciones->antihack_mysqli(isset($_POST["precioDescuento"]) ? $_POST["precioDescuento"] : ''));
    $productos->set("stock", $funciones->antihack_mysqli(isset($_POST["stock"]) ? $_POST["stock"] : ''));
    $productos->set("desarrollo", $funciones->antihack_mysqli(isset($_POST["desarrollo"]) ? $_POST["desarrollo"] : ''));
    $productos->set("categoria", $funciones->antihack_mysqli(isset($_POST["categoria"]) ? $_POST["categoria"] : ''));
    $productos->set("subcategoria", $funciones->antihack_mysqli(isset($_POST["subcategoria"]) ? $_POST["subcategoria"] : ''));
    $productos->set("keywords", $funciones->antihack_mysqli(isset($_POST["keywords"]) ? $_POST["keywords"] : ''));
    $productos->set("description", $funciones->antihack_mysqli(isset($_POST["description"]) ? $_POST["description"] : ''));
    $productos->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d")));
    $productos->set("meli", $funciones->antihack_mysqli(isset($_POST["meli"]) ? $_POST["meli"] : ''));
    $productos->set("url", $funciones->antihack_mysqli(isset($_POST["url"]) ? $_POST["url"] : ''));

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

    $productos->add();
    //$funciones->headerMove(URL . "/index/verProductos");
}
?>

<div class="col-md-12">
    <h4>Productos</h4>
    <hr/>
    <form method="post" class="row" enctype="multipart/form-data">
        <label class="col-md-3">Título:<br/>
            <input type="text" name="titulo">
        </label>
        <label class="col-md-3">Categoría:<br/>
            <select name="categoria">
                <option value="" disabled selected>-- categorías --</option>
                <option value="Novedades">Novedades</option>
                <option value="Marketing">Marketing</option>
                <option value="Social">Social</option>
            </select>
        </label>
        <label class="col-md-3">Subcategoría:<br/>
            <select name="subcategoria">
                <option value="" disabled selected>-- categorías --</option>
                <option value="Novedades">Novedades</option>
                <option value="Marketing">Marketing</option>
                <option value="Social">Social</option>
            </select>
        </label>
        <label class="col-md-3">Stock:<br/>
            <input type="number" name="stock">
        </label>
        <div class="clearfix"></div>
        <label class="col-md-3">Código:<br/>
            <input type="text" name="cod">
        </label>
        <label class="col-md-3">Precio:<br/>
            <input type="text" name="precio">
        </label>
        <label class="col-md-3">Precio Descuento:<br/>
            <input type="text" name="precioDescuento">
        </label>
        <label class="col-md-3">Url:<br/>
            <input type="text" name="url" id="url">
        </label>
        <div class="clearfix"></div>
        <label class="col-md-12">Desarrollo:<br/>
            <textarea name="desarrollo" class="ckeditorTextarea"></textarea>
        </label>
        <div class="clearfix"></div>
        <label class="col-md-12">Palabras claves dividas por ,<br/>
            <input type="text" name="keywords">
        </label>
        <label class="col-md-12">Descripción breve<br/>
            <textarea name="description"></textarea>
        </label>
        <br/>
        <div class="col-md-12">
         <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="meli">
            <label class="form-check-label" for="meli">¿Publicar en MercadoLibre?</label>
        </div>
    </div>
    <label class="col-md-7">Imágenes:<br/>
        <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
    </label>
    <div class="clearfix"></div>
    <br/>
    <div class="col-md-12">
        <input type="submit" class="btn btn-primary" name="agregar" value="Crear Novedad" />
    </div>
</form>
</div>
