<?php
    session_start();
    require __DIR__."/includes/bundle.php";

    $roundId = $_GET['id'];

    $mf = new MatchFactory($db);

    $results = $mf->getRoundMatches($roundId);
    $res = json_encode($results);

    echo $res;


?>