<?
require __DIR__."/../includes/bundle.php";
include __DIR__."/../models/playerFactory.php";
$playerfac = new PlayerFactory($db);
$playerfac->deletePlayer();
header('Location: ../adminplayers.php');


?>