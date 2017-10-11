<?php require __DIR__."/includes/bundle.php"; ?>

<html>
    <head>
        <title>Super Arrows</title>
        <!-- this stylesheet thing needs changing -->
        <?php require __DIR__."/includes/stylesheets.php"; ?>
    </head>
    <body>
    <div class='container'>

        <h4>
            <a href="logics/authorize.php">Admin Page</a> |
            <a href='generateResults.php'>View Results</a>
        </h4>
        <hr>
        <div align='center'>
            <h1>Welcome to Super Arrows!</h1>
            <br>
    
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

                $mf = new MatchFactory($db);
                $q = $mf->getRoundMatches($currentRound->id);
                
                $matches = serialize($q);

                $pf = new PredictionFactory($db);
                $preds = $pf->getRoundPredictions($currentRound->id);

                if(count($q) == 0){
                    echo "No matches scheduled";
                } else {
                    echo "<h3><u>Round $currentRound->id</u></h3>";

                    if(count($preds) != 0) {
                        echo "<p>Predictions for this round already submitted</p>";
                    } else {
                        echo " <form method='POST' action='results.php'>";
                            foreach($q as $match) {
                                echo "<p>$match->player1First $match->player1Last vs $match->player2First $match->player2Last (6)</p>";
                                echo "<input type='number' name='player1score[]' min='0'/>";
                                echo "<input type='number' name='player2score[]' min='0'/>";
                                echo "<input type='hidden' name='matches' value='".$matches."'/>";
                            }
                            echo "<p>Golden 180's</p>";
                            echo "<input type='number' name='golden180' min='0'/>";
                            echo "<br/><br/>";
                            echo "<input type='submit'/>";
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
