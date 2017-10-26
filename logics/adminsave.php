<?php
require __DIR__."/../includes/bundle.php";
include __DIR__."/../models/matchFactory.php";
include __DIR__."/../models/match.php";

$mf = new MatchFactory($db);
$matches = unserialize($_POST['matches']);

// // var_dump($matches);
// var_dump($_POST['roundId']);
// var_dump($_POST['player1score']);
// var_dump($_POST['player2score']);

$result = $mf->fromPostArrays(
    $_POST['roundId'],
    $_POST['player1score'], 
    $_POST['player2score'], 
    $_POST['no180s']
);

foreach($result as $match){
    $mf->save($match);
}

header('Location: ../adminpage.php');

?>