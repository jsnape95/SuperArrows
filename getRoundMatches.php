<?php
require __DIR__."/includes/bundle.php";

$round = $_GET['id'];

$mf = new MatchFactory($db);
$q = $mf->getRoundMatches($round);
$red = json_encode($q);

echo $res;


 ?>
