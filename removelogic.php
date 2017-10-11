<?
require __DIR__."/includes/bundle.php";
$playerfac = new PlayerFactory($db);
$playerfac->deletePlayer();
header('Location: adminplayers.php');


?>