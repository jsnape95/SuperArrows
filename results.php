<html>
    <head>
        <title>Super Arrows</title>
    </head>
    <body>
        <form method="POST" action="generateResults.php">
            <?php 

                $predictionObjs = [];

                foreach($_POST['player1'] as $val => $player1score) {

                    $dt = new DateTime();

                    $prediction = new Prediction();
                    $prediction->player1prediction = $player1score;
                    $prediction->userId = 16;
                    $prediction->numberOf180s = $_POST['golden180'];
                    $prediction->predictionDate = $dt->Now;
                    $prediction->roundId = 1;

                    array_push($predictionObjs, $prediction);
                }

                foreach($_POST['player2'] as $val => $player2score) {
                    $prediction = $predictionObjs[$val];
                    $prediction->player2prediction = $player2score;
                    $predictionObjs[$val] = $prediction;
                }

                foreach($predictionObjs as $p) {
                    $pf = new PredictionFactory($db);
                    $pf->save($p);
                }


                echo "<h2>Predictions Submitted, Good Luck!</h2>";
                

                echo "<input type='hidden' name='predictions' value='$dataString'/>";
                echo "<input type='submit' value='Results'/>";
                // print_r($predictions);
            ?>
        </form>
    </body>
</html>