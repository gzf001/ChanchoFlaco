<?php
class BaseDatos
{
    protected $conexion;
    protected $db;
    public function conectar()
    {
        $conexion = mysqli_connect('localhost', 'root', 'ZZ4mI3NZ', 'chanchoflaco');
        if ($conexion === false) {
            echo 'Ha habido un error <br>' . mysqli_connect_error();
        } else {
            return $conexion;
        }
    }
}
?>