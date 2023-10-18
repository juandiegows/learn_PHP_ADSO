<?php

class Connection
{
    public function connect()
    {
        $mysqli = new mysqli($_ENV['SERVER'], $_ENV['USER'], $_ENV['PASS'], $_ENV['DATABASE'], $_ENV['PORT']);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        echo "Conexion exitosa";
        return $mysqli;
    }
}
