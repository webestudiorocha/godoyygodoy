<?php

namespace Clases;

class TemplateAdmin
{

    public $title;
    public $keywords;
    public $description;
    public $favicon;
    public $canonical;

    public function themeInit()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

            <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css" />
            <link rel="stylesheet" href="<?=URL?>/css/style.css" />

            <meta charset="UTF-8">
            <title><?=$this->title?></title>
            <meta name="description" content="<?=$this->description?>">
            <meta name="keywords" content="<?=$this->keywords?>">
        </head>
        <body>
            <?php include "inc/nav.inc.php";?>
            <div class="container-fluid pb-100">
                <?php
}

    public function themeEnd()
    {
        ?>
            </div>
        </body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script src="<?=URL?>/ckeditor/ckeditor.js"></script>
        <script src="<?=URL?>/ckeditor/lang/es.js"></script>
        <script src="<?=URL?>/js/script.js"></script>
        </html>
        <?php
}

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
}
