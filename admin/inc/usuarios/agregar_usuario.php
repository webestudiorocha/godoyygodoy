<?php
$usuarios = new Clases\Usuarios();

if (isset($_POST["agregar"])) {
    $cod = substr(md5(uniqid(rand())), 0, 10);

    $usuarios->set("cod", $cod);
    $usuarios->set("nombre", $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : ''));
    $usuarios->set("apellido", $funciones->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : ''));
    $usuarios->set("doc", $funciones->antihack_mysqli(isset($_POST["doc"]) ? $_POST["doc"] : ''));
    $usuarios->set("email", $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : ''));
    $usuarios->set("password", $funciones->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : ''));
    $usuarios->set("postal", $funciones->antihack_mysqli(isset($_POST["postal"]) ? $_POST["postal"] : ''));
    $usuarios->set("localidad", $funciones->antihack_mysqli(isset($_POST["localidad"]) ? $_POST["localidad"] : ''));
    $usuarios->set("provincia", $funciones->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : ''));
    $usuarios->set("pais", $funciones->antihack_mysqli(isset($_POST["pais"]) ? $_POST["pais"] : ''));
    $usuarios->set("telefono", $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : ''));
    $usuarios->set("celular", $funciones->antihack_mysqli(isset($_POST["celular"]) ? $_POST["celular"] : ''));
    $usuarios->set("invitado", $funciones->antihack_mysqli(isset($_POST["invitado"]) ? $_POST["invitado"] : '0'));
    $usuarios->set("descuento", $funciones->antihack_mysqli(isset($_POST["descuento"]) ? $_POST["descuento"] : ''));
    $usuarios->set("fecha", $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d")));

    $usuarios->add();

    $funciones->headerMove(URL . "/index/verUsuarios");
}
?>

<div class="col-md-12 ">
    <h4>Usuarios</h4>
    <hr/>
    <form method="post" class="row">
        <label class="col-md-4">
            Nombre:<br/>
            <input type="text" name="nombre" />
        </label>
        <label class="col-md-4">
            Apellido:<br/>
            <input type="text" name="apellido" />
        </label>
        <label class="col-md-4">
            DNI/CUIT/CUIL:<Br/>
            <input type="text" name="doc" />
        </label>
        <label class="col-md-4">
            Email:<br/>
            <input type="text" name="email" />
        </label>
        <label class="col-md-4">
            Password:<br/>
            <input type="text" name="password" />
        </label>
        <label class="col-md-4">
            Postal:<br/>
            <input type="text" name="postal" />
        </label>
        <label class="col-md-4">
            Localidad:<br/>
            <input type="text" name="localidad" />
        </label>
        <label class="col-md-4">
            Provincia:<br/>
            <input type="text" name="provincia" />
        </label>
        <label class="col-md-4">
            Pais:<Br/>
            <input type="text" name="pais" />
        </label>
        <label class="col-md-4">
            Telefono:<br/>
            <input type="text" name="telefono" />
        </label>
        <label class="col-md-4">
            Celular:<br/>
            <input type="text" name="celular" />
        </label>
        <label class="col-md-2">
            Invitado:<br/>
            <input type="text" name="invitado" />
        </label>
        <label class="col-md-2">
            Descuento:<br/>
            <input type="text" name="descuento" />
        </label>
        <div class="clearfix"></div><br/>
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" name="agregar" value="Crear Usuarios" />
        </div>
    </form>
</div>
