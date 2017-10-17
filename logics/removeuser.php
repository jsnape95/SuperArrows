<?
require __DIR__."/../includes/bundle.php";
include __DIR__."/../models/userFactory.php";
$userfac = new UserFactory($db);
$userfac->deleteUser();
header('Location: ../adminusers.php');


?>