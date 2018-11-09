<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$template->themeInit();
$correo     = new Clases\Email();
$funcion     = new Clases\PublicFunction();

?>

<!-- Start Breadcumbs Area -->
<div class="breadcumbs-area breadcumbs-bg-2 bc-area-padding">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>
                            Contacto
                        </h2>
                        <span>
                            <a href="<?= URL; ?>/index">
                                HOME
                            </a>/ CONTACTO
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcumbs Area -->

<!-- Contact Form Area -->
<div class="content-block-area contact-us">
    <div class="container">
     <h2 class="area-title">Información de contacto</h2>
     <div class="row">
        <div class="col-sm-4"> 
            <div class="media">
                <div class="media-left">
                    <i class="ion-ios-location-outline"></i>
                </div>
                <div class="media-body">
                    <h4><?= DIRECCION; ?></h4>
                </div>
            </div>
        </div>

        <div class="col-sm-4"> 
            <div class="media">
                <div class="media-left">
                    <i class="ion-ios-telephone-outline"></i>
                </div>
                <div class="media-body">
                    <h4><?= TELEFONO; ?></h4>
                </div>
            </div>
        </div>

        <div class="col-sm-4"> 
            <div class="media">
                <div class="media-left">
                    <i class="ion-ios-email-outline"></i>
                </div>
                <div class="media-body">
                    <h4><?= EMAIL; ?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-for-area">
     <h2 class="area-title">Formulario de consulta</h2>
     <div class="row">
        <div class="col-sm-5 col-md-4">
            <div class="contact-img-bg"></div>
        </div>
        <div class="col-sm-7 col-md-8">

            <?php if(isset($_POST["enviar"])): ?>
                <?php
                $nombre = $funcion->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : ''); 
                $apellido = $funcion->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : ''); 
                $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : ''); 
                $telefono = $funcion->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : ''); 
                $consulta = $funcion->antihack_mysqli(isset($_POST["consulta"]) ? $_POST["consulta"] : '');

                $mensajeFinal = "<b>Nombre</b>: ".$nombre." <br/>";
                $mensajeFinal .= "<b>Email</b>: ".$email."<br/>";
                $mensajeFinal .= "<b>Teléfono</b>: ".$telefono." <br/>";
                $mensajeFinal .= "<b>Consulta</b>: ".$consulta."<br/>"; 

                $correo->set("asunto","Consulta web");
                $correo->set("receptor",$email);
                $correo->set("emisor",EMAIL);
                $correo->set("mensaje",$mensajeFinal);

                $correo->emailEnviar();
                ?>
            <?php endif ?>

                <form method="POST">
                    <div class="col-sm-12"> 
                        <div class="form-group">
                            <label>Nombre y Apellido</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required=""/>
                        </div>
                    </div>

                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                        </div>
                    </div>

                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="number" class="form-control" name="telefono" placeholder="Número de teléfono" required=""/>
                        </div>
                    </div>

                    <div class="col-sm-12"> 
                        <div class="form-group">
                            <label>Consulta</label>
                            <textarea class="form-control" name="consulta" rows="6" placeholder="Consulta..." required=""></textarea>
                        </div>
                        <button type="submit" name="enviar" class="btn theme-btn">Enviar</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
</div>
<!-- End Contact Form Area -->  


<?php $template->themeEnd(); ?>