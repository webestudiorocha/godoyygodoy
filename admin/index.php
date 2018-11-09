<?php
require_once "../Config/Autoload.php";
Config\Autoload::runAdmin();

$template = new Clases\TemplateAdmin();
$template->set("title", "Admin");
$template->set("description", "Admin");
$template->set("keywords", "Inicio");
$template->set("favicon", "url");
$template->themeInit();

$admin     = new Clases\Admin();
$funciones = new Clases\PublicFunction();

if (!isset($_SESSION["admin"])) {
    $admin->loginForm();
} else { 
    $op = isset($_GET["op"]) ? $_GET["op"] : '';
    switch ($op) {
        ////////
        case 'verContenidos':
            include "inc/contenidos/ver_contenido.php";
            break;
        case 'modificarContenidos':
            include "inc/contenidos/modificar_contenido.php";
            break;
        case 'agregarContenidos':
            include "inc/contenidos/agregar_contenido.php";
            break;
        /////////
        case 'verPortfolio':
            include "inc/portfolio/ver_portfolio.php";
            break;
        case 'modificarPortfolio':
            include "inc/portfolio/modificar_portfolio.php";
            break;
        case 'agregarPortfolio':
            include "inc/portfolio/agregar_portfolio.php";
            break;
        /////////
        case 'verVideos':
            include "inc/videos/ver_videos.php";
            break;
        case 'modificarVideos':
            include "inc/videos/modificar_videos.php";
            break;
        case 'agregarVideos':
            include "inc/videos/agregar_videos.php";
            break;
        /////////
        case 'verGalerias':
            include "inc/galerias/ver_galerias.php";
            break;
        case 'modificarGalerias':
            include "inc/galerias/modificar_galerias.php";
            break;
        case 'agregarGalerias':
            include "inc/galerias/agregar_galerias.php";
            break;
        /////////
        case 'verProductos':
            include "inc/productos/ver_productos.php";
            break;
        case 'modificarProductos':
            include "inc/productos/modificar_productos.php";
            break;
        case 'agregarProductos':
            include "inc/productos/agregar_productos.php";
            break;
        /////////
        case 'verNovedades':
            include "inc/novedades/ver_novedades.php";
            break;
        case 'modificarNovedades':
            include "inc/novedades/modificar_novedades.php";
            break;
        case 'agregarNovedades':
            include "inc/novedades/agregar_novedades.php";
            break;
        /////////
        case 'verSliders':
            include "inc/sliders/ver_slider.php";
            break;
        case 'modificarSliders':
            include "inc/sliders/modificar_slider.php";
            break;
        case 'agregarSliders':
            include "inc/sliders/agregar_slider.php";
            break;
        /////////
        case 'verServicios':
            include "inc/servicios/ver_servicios.php";
            break;
        case 'modificarServicios':
            include "inc/servicios/modificar_servicios.php";
            break;
        case 'agregarServicios':
            include "inc/servicios/agregar_servicios.php";
            break;
        /////////
        case 'verUsuarios':
            include "inc/usuarios/ver_usuario.php";
            break;
        case 'modificarUsuarios':
            include "inc/usuarios/modificar_usuario.php";
            break;
        case 'agregarUsuarios':
            include "inc/usuarios/agregar_usuario.php";
            break;
        /////////
        case 'salir':
            $admin->logout();
            break;
        default:
            include "inc/novedades/ver_novedades.php";
            break;
    }
}

$template->themeEnd();
