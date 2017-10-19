<?php
    session_start();
    require __DIR__."/includes/bundle.php";

    $roundId = $_GET['id'];

    $uf = new UserFactory($db);
    $rf = new RoundFactory($db);

    $user = $uf->getCurrentUser();
    $userId = $user->id;
    $results = $rf->getRoundResults($roundId, $userId);
    $TEST = json_encode($results);

    echo $TEST;


?>