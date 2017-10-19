<?php require __DIR__."/includes/bundle.php";
session_start();
?>

<html>
    <head>
        <title>Super Arrows</title>
        <!-- this stylesheet thing needs changing -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/fontAwesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/arrows.css"/>
    </head>
    <body>
        <?php include_once('includes/productHeader.inc.php'); ?>
        <?php include_once('includes/navBar.inc.php'); ?>
        <div class='container'>
            <div align='center'>
                <?php

                    $rf = new RoundFactory($db);
                    $currentRound = $rf->getCurrentRound();
                    echo $currentRound->idin;

                    $mf = new MatchFactory($db);
                    $q = $mf->getRoundMatches($currentRound->id);

                    $matches = serialize($q);

                    $uf = new UserFactory($db);
                    $currentUser = $uf->getCurrentUser();

                    $pf = new PredictionFactory($db);
                    $preds = $pf->getRoundPredictions($currentRound->id, $currentUser->id);


                    if(count($q) == 0){
                        echo "<p class='text-bg'>No matches scheduled</p>";
                    } else {
                        echo "<h1 class='text-bg'><u>Round $currentRound->id</u></h1>";

                        if(count($preds) != 0) {
                            echo "<p class='text-bg'>Predictions for this round already submitted</p>";
                        } else {
                            echo "<h3 class='text-bg'>Enter your predictions for this round.</h3>";
                            echo "<br><br>";
                            echo " <form method='POST' action='results.php'>";
                                foreach($q as $match) {
                                    echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6)</p>";
                                    echo "<input class='mod cl-black' type='number' name='player1score[]' min='0' max='6'/> ";
                                    echo "<input class='mod cl-black' type='number' name='player2score[]' min='0' max='6'/>";
                                    echo "<input type='hidden' name='matches' value='".$matches."'/>";
                                }
                                echo "<p>Golden 180's</p>";
                                echo "<input class='mod cl-black' type='number' name='golden180' min='0'/>";
                                echo "<br/><br/>";

                                if(empty($_SESSION)) {
                                    echo "<p class='text-danger'>You must be logged in to be able to make a prediction.</p>";
                                } else {
                                    echo "<input type='submit' class='btn btn-success'/>";
                                }
                            echo "</form>";
                        }
                    }
                ?>
            </div>
        </div>
        <?php require __DIR__."/includes/scripts.php"; ?>
        <script>
        </script>
    </body>
</html>
