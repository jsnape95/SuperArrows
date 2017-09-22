<?php
require __DIR__."/includes/bundle.php";

$mf = new MatchFactory($db);
$matches = unserialize($_POST['matches']);

$result = $mf->fromPostArrays(
    $matches, 
    $_POST['player1score'], 
    $_POST['player2score'], 
    $_POST['no180s']
);

foreach($matches as $match){
    $mf->save($match);
}

?>