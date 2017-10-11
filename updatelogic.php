<?
require __DIR__."/includes/bundle.php";
$playerfac = new PlayerFactory($db);
$playerfac->updatePlayer();
header('Location: adminplayers.php');


?>