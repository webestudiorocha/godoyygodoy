<?php
$servicios = new Clases\Servicios();
$imagenes  = new Clases\Imagenes();
?>
<div class="mt-20">
    <div class="col-lg-12 col-md-12">
        <h4>Servicios <a class="btn btn-success pull-right" href="<?=URL?>/index/agregarServicios">AGREGAR SERVICIOS</a></h4>
        <hr/>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
        <hr/>
        <table class="table  table-bordered  ">
            <thead>
                <th>Título</th>
                <th>Ajustes</th>
            </thead>
            <tbody>
                <?php
$filter = array();
$data   = $servicios->list("");
if (is_array($data)) {
    for ($i = 0; $i < count($data); $i++) {
        echo "<tr>";
        echo "<td>" . strtoupper($data[$i]["titulo"]) . "</td>";
        echo "<td>";
        echo '<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Modificar" href="' . URL . '/index/modificarServicios&cod=' . $data[$i]["cod"] . '">
                        <i class="fa fa-cog"></i></a>';

        echo '<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" href="' . URL . '/index/verServicios&borrar=' . $data[$i]["cod"] . '">
                        <i class="fa fa-trash"></i></a>';
        echo "</td>";
        echo "</tr>";
    }
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php
if (isset($_GET["borrar"])) {
    $cod = $funciones->antihack_mysqli(isset($_GET["borrar"]) ? $_GET["borrar"] : '');
    $servicios->set("cod", $cod);
    $imagenes->set("cod", $cod);
    $servicios->delete();
    $imagenes->deleteAll();
}
?>