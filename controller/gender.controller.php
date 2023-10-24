<?php
require_once(__DIR__ . './Connection.php');
class GenderController extends Connection
{
    public function create($name)
    {
        //Conexion con Herencia
        $mysqli = $this->connect(); // para que esto funcione en la clase debe ir extends Connection
        // donde Connection es el nombre de la clase que genera la conexion

        //conexion sin herencia;
        $mysqliSinHerencia =  (new Connection)->connect();

        //evitar caracteres de connsultas
        $name = $mysqli->real_escape_string($name);
        // la consulta
        $sql = "INSERT INTO gender (name) VALUES ('$name')";
        //comprobamos si esta se guardo
        if ($mysqli->query($sql)) {
            echo "Registro creado con éxito.";
        } else {
            echo "Error al crear el registro: " . $mysqli->error;
        }
        // Cerramos la conexion a la base de datos
        $mysqli->close();
    }
}
