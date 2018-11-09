<?php

namespace Config;

class Autoload
{
    public static function runSitio()
    {
        session_start();
        define('URL', "http://".$_SERVER['HTTP_HOST']."/Godoy");
        define('TITULO', "GODOY");
        define('TELEFONO', "03564 42-8232");
        define('EMAIL', "web@estudiorochayasoc.com.ar");
        define('PASS_EMAIL', "weAr2010");
        define('SMTP_EMAIL', "mail.estudiorochayasoc.com.ar");
        define('DIRECCION', "D Alighieri 2152, San Francisco, Córdoba");
        define('LOGO', URL . "/assets/img/logo.png");
        define('APP_ID_FB', "180729959302622");
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once $ruta;
        });
    }

    public static function runAdmin()
    {
        session_start();
        define('URL', "http://".$_SERVER['HTTP_HOST']."/Godoy/admin");
        require_once "../Clases/Zebra_Image.php";
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            include_once "../" . $ruta;
        });
    }
}
