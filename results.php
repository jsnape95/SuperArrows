<?php 

require __DIR__."/includes/bundle.php";

?>

<html>
    <head>
        <title>Super Arrows</title>
        <?php require __DIR__."/includes/stylesheets.php"; ?>
    </head>
    <body>
            <?php 
                $pf = new PredictionFactory($db);
                $matches = unserialize($_POST['matches']);
                
                $predictionObjs = $pf->fromPostArrays(
                    $_POST['player1score'],
                    $_POST['player2score'],
                    $matches
                );
                foreach($predictionObjs as $p) {
                    $pf->save($p);
                }

                echo "<h2>Predictions Submitted, Good Luck!</h2>";
            ?>
            <?php require __DIR__."/includes/scripts.php"; ?>
    </body>
</html>