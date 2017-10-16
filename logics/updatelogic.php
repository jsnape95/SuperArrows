<?
require __DIR__."/../includes/bundle.php";
include __DIR__."/../models/playerFactory.php";
$playerfac = new PlayerFactory($db);
$playerfac->updatePlayer();
header('Location: ../adminplayers.php');


?>