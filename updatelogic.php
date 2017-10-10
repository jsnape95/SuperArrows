<?
require __DIR__."/includes/bundle.php";

$id = $_GET['id'];
$playerfac = new PlayerFactory($db);
$playerfac->updatePlayer();
header('Location: adminplayers.php');


?>