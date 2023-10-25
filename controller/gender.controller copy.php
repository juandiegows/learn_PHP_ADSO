<?php
require_once(__DIR__ . './Connection.php');
class GenderController extends Connection
{
    private $pdo; // Propiedad para almacenar la conexión PDO

    public function __construct()
    {
        // Configura la conexión PDO en el constructor
        $dbHost = "nombre_del_servidor";
        $dbName = "nombre_de_la_base_de_datos";
        $dbUser = "nombre_de_usuario";
        $dbPass = "contraseña";

        try {
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    public function create($name)
    {
        $name = htmlspecialchars($name); // Evita inyecciones SQL

        $sql = "INSERT INTO gender (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()) {
            echo "Registro creado con éxito.";
        } else {
            echo "Error al crear el registro: " . $stmt->errorInfo()[2];
        }
    }

    public function read()
    {
        $sql = "SELECT id, name FROM gender";
        $stmt = $this->pdo->query($sql);

        $genders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $genders;
    }

    public function update($id, $newName)
    {
        $newName = htmlspecialchars($newName);

        $sql = "UPDATE gender SET name = :newName WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':newName', $newName);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Registro actualizado con éxito.";
        } else {
            echo "Error al actualizar el registro: " . $stmt->errorInfo()[2];
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM gender WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro: " . $stmt->errorInfo()[2];
        }
    }
}
