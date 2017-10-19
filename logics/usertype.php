<?
require __DIR__."/../includes/bundle.php";
include __DIR__."/../models/userFactory.php";
$userfac = new UserFactory($db);
$userfac->changeType();
header('Location: ../adminusers.php');


?>