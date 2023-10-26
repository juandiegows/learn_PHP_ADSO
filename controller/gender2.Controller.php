
<?php
require_once(__DIR__ . "/../model/gender.model.php");
require_once(__DIR__ . "/Connection.php");
class Gender2Controller extends Connection
{
    public function create(Gender $gender)
    {
        $conexion =    $this->connect();
        $sql = "INSERT INTO gender (name) VALUES ('$gender->name' )";
        return $conexion->query($sql);
    }
    public function read(): array
    {
        $conexion =    $this->connect();
        $array = [];
        $sql = "SELECT id, name FROM gender";
        $result = $conexion->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = new Gender;
            $data->id = $row["id"];
            $data->name = $row["name"];
            $array[] = $data;
        }

        return $array;
    }
}
