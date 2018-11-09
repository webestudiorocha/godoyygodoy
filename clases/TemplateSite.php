<?php

namespace Clases;

class TemplateSite
{

    public $title;
    public $keywords;
    public $description;
    public $favicon;
    public $canonical;

    public function themeInit()
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="es">';
        echo '<head>';
        include 'assets/inc/header.inc.php';
        echo '</head>';
        echo '<body>';
        include 'assets/inc/nav.inc.php';
    }

    public function themeEnd()
    {
        include 'assets/inc/footer.inc.php';
        echo '</body>';
        echo '<script src="<?=URL?>/js/script.js"></script>';
        echo '</html>';
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
