<h1>hola desde el index</h1>
<link rel="stylesheet" href="css/style.css">
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// require_once(__DIR__ . "/process/create_gender.php");


if (isset($_POST["send"])) {
    require_once __DIR__ . "/process/create_gender.php";
}

?>

<form method="post" action="">
    <input name="name">
    <input name="send" type="submit" value="Enviar">
    <?php echo $error["name"] ?? "" ?>
    <h1> <?php echo $message ?? "" ?></h1>
</form>