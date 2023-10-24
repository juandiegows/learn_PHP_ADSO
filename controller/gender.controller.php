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

    public function read()
    {
        //conexion de la base de datos
        $mysqli = $this->connect();
        //consulta
        $sql = "SELECT id, name FROM gender";
        //recuperar los datos de la consulta
        $result = $mysqli->query($sql);
        //lista vacia
        $genders = [];
        //recorrer todas las filas y agregarlo en el vector
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $genders[] = $row;
            }
        }
        // Cerramos la conexion a la base de datos
        $mysqli->close();
        return $genders;
    }

    public function update($id, $newName)
    {
        //conexion de la base de datos
        $mysqli = $this->connect();
        //evitar caracteres de connsultas
        $newName = $mysqli->real_escape_string($newName);
        //consulta
        $sql = "UPDATE gender SET name = '$newName' WHERE id = $id";
        //miramos si se actualizo
        if ($mysqli->query($sql)) {
            echo "Registro actualizado con éxito.";
        } else {
            echo "Error al actualizar el registro: " . $mysqli->error;
        }
        // Cerramos la conexion a la base de datos
        $mysqli->close();
    }

    public   function delete($id)
    {
        //conexion de la base de datos
        $mysqli = $this->connect();
        //evitar caracteres de connsultas
        $sql = "DELETE FROM gender WHERE id = $id";

        if ($mysqli->query($sql)) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro: " . $mysqli->error;
        }

        $mysqli->close();
    }
}
