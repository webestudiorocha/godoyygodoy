<?php namespace Clases;

class Conexion
{
    private $datos = array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "godoy_site"
    );

    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect($this->datos["host"], $this->datos["user"], $this->datos["pass"], $this->datos["db"]);
    }

    public function con() {
        $conexion = mysqli_connect($this->datos["host"], $this->datos["user"], $this->datos["pass"], $this->datos["db"]);
        return $conexion;
    }

    public function sql($query)
    {
        $this->con->query($query);
    }

    public function sqlReturn($query)
    {
        $dato = $this->con->query($query);
        return $dato;
    }
}
