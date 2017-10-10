<?php 

require __DIR__."/includes/bundle.php";

$playerfac = new PlayerFactory($db);
$playerfac->savePlayer();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>


