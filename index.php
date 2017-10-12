<?php require __DIR__."/includes/bundle.php"; ?>

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
    session_start();
    if (isset($_SESSION['user']))
    {
        include "includes/logoutbutton.php";
    }
    if(isset($_SESSION['admin']))
    {
        include "includes/logoutbutton.php";
    }
    if(empty($_SESSION))
    {
        echo 'Please enter your log in details';
        include "includes/login.php";        
    }
                    $rf = new RoundFactory($db);
                    $currentRound = $rf->getCurrentRound();
                    echo $currentRound->idin;

                    $mf = new MatchFactory($db);
                    $q = $mf->getRoundMatches($currentRound->id);
                    
                    $matches = serialize($q);

                    $pf = new PredictionFactory($db);
                    $preds = $pf->getRoundPredictions($currentRound->id);


                    if(count($q) == 0){
                        echo "No matches scheduled";
                    } else {
                        echo "<h1><u>Round $currentRound->id</u></h1>";

                        if(count($preds) != 0) {
                            echo "<p>Predictions for this round already submitted</p>";
                        } else {
                            echo "<h3>Enter your predicitons for this round.</h3>";
                            echo "<br><br>";
                            echo " <form method='POST' action='results.php'>";
                                foreach($q as $match) {
                                    echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6)</p>";
                                    echo "<input class='black-input' type='number' name='player1score[]' min='0'/>";
                                    echo "<input class='black-input' type='number' name='player2score[]' min='0'/>";
                                    echo "<input type='hidden' name='matches' value='".$matches."'/>";
                                }
                                echo "<p>Golden 180's</p>";
                                echo "<input class='black-input' type='number' name='golden180' min='0'/>";
                                echo "<br/><br/>";
                                echo "<input type='submit' class='btn btn-success'/>";
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
