<h1>hola desde el index</h1>
<link rel="stylesheet" href="css/style.css">
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once(__DIR__ . '/controller/gender.controller.php');


$controller = new GenderController();
$controller->create("Masculino");




?>