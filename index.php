<h1>hola desde el index</h1>
<link rel="stylesheet" href="css/style.css">
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once(__DIR__ . '/controller/Connection.php');


$conn = new Connection;
$conn->connect();
if (isset($_SESSION['user'])) {
    echo "<br/>";
    echo "\n \n  no se ha logueado";
    session_start();
    $_SESSION['user'] = "Juan Diego";
} else {
    global $_SESSION;
    echo "<br/>";
    echo "\n \n   se ha logueado";
    echo  $_SESSION['user'] ?? "HOla";
    echo DIRECTORY_SEPARATOR;
}
?>