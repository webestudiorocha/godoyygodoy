<?php namespace Clases;

class PublicFunction
{

    public function antihack_mysqli($str)
    {
        $con      = new Conexion();
        $conexion = $con->con();
        $str      = mysqli_real_escape_string($conexion, $str);
        return $str;
    }

    public function antihack($str)
    {
        $str = stripslashes($str);
        $str = strip_tags($str);
        $str = htmlentities($str);
        return $str;
    }

    public function headerMove($location)
    {
        echo "<script> document.location.href='" . $location . "';</script>";
    }
}
