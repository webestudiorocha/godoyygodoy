<?php
$videos = new Clases\Videos();
?>
<div class="mt-20">
    <div class="col-lg-12 col-md-12">
        <h4>Videos <a class="btn btn-success pull-right" href="<?=URL?>/index/agregarVideos">AGREGAR VIDEOS</a></h4>
        <hr/>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
        <hr/>
        <table class="table  table-bordered  ">
            <thead>
                <th width="50%">Título</th>
                <th width="10%">Ajustes</th>
            </thead>
            <tbody>
                <?php
$filter = array();
$data   = $usuarios->list("");
if (is_array($data)) {
    for ($i = 0; $i < count($data); $i++) {
        echo "<tr>";
        echo "<td>" . strtoupper($data[$i]["nombre"]) . " " . strtoupper($data[$i]["apellido"]) . "</td>";
        echo "<td>" . strtoupper($data[$i]["email"]) . "</td>";
        echo "<td>" . strtoupper($data[$i]["celular"]) . "</td>";
        echo "<td>";
        echo '<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Modificar" href="' . URL . '/index/modificarUsuarios&cod=' . $data[$i]["cod"] . '">
                        <i class="fa fa-cog"></i></a>';

        echo '<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" href="' . URL . '/index/verUsuarios&borrar=' . $data[$i]["cod"] . '">
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
    $videos->set("id", $funciones->antihack_mysqli(isset($_GET["borrar"]) ? $_GET["borrar"] : ''));
        $videos->delete();
        $funciones->headerMove(URL . "/index/verVideos");
    }
    ?>

