<?php
$galerias = new Clases\Galerias();
$imagenes = new Clases\Imagenes();
$filter   = array();
$data     = $galerias->list("");
?>
<div class="mt-20">
	<div class="col-lg-12 col-md-12">
		<h4>Galerias <a class="btn btn-success pull-right" href="<?=URL?>/index/agregarGalerias">AGREGAR GALERIAS</a></h4>
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
if (is_array($data)) {
    for ($i = 0; $i < count($data); $i++) {
        echo "<tr>";
        echo "<td>" . strtoupper($data[$i]["titulo"]) . "</td>";
        echo "<td>";
        echo '<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Modificar" href="' . URL . '/index/modificarGalerias&cod=' . $data[$i]["cod"] . '">
						<i class="fa fa-cog"></i></a>';

        echo '<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar" href="' . URL . '/index/verGalerias&borrar=' . $data[$i]["cod"] . '">
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