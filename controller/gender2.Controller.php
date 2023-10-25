
<?php
require_once(__DIR__ . "/../model/gender.model.php");
require_once(__DIR__ . "/Connection.php");
class Gender2Controller
{
    public function create(Gender $gender)
    {
        $conn = new Connection;
        $conexion =    $conn->connect();
        $sql = "INSERT INTO gender (name) VALUES ('$gender->name' )";
        return $conexion->query($sql);
    }
}
