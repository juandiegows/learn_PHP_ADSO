<h1>hola desde el index</h1>
<link rel="stylesheet" href="css/style.css">
<?php
require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// require_once(__DIR__ . "/process/create_gender.php");

require_once(__DIR__ . "/controller/gender2.Controller.php");
if (isset($_POST["send"])) {
    require_once __DIR__ . "/process/create_gender.php";
}

?>


<form method="post" action="">
    <input type="text" name="name" value="<?php echo $_POST["name"] ?? "" ?>">
    <?php echo $error["name"] ?? "" ?>
    <br>
    <select name="gender_id">
        <?php
        $array  = (new Gender2Controller())->read();
        foreach ($array as $key => $value) :
        ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
        <?php
        endforeach;
        ?>
    </select>
    <input type="text" name="last_name">
    <?php echo $error["last_name"] ?? "" ?>
    <br>
    <input name="send" type="submit" value="Enviar">

    <h1> <?php echo $message ?? "" ?></h1>
</form>