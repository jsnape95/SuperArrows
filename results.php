<?php 

require __DIR__."/includes/bundle.php";
session_start();
?>

<html>
    <head>
        <title>Super Arrows</title>
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
                $pf = new PredictionFactory($db);
                $matches = unserialize($_POST['matches']);

                $uf = new UserFactory($db);
                $user = $uf->getCurrentUser();

                $predictionObjs = $pf->fromPostArrays(
                    $_POST['player1score'],
                    $_POST['player2score'],
                    $matches,
                    $user->id
                );

                foreach($predictionObjs as $p) {
                    $pf->save($p);
                }

                echo "<h2>Predictions Submitted, Good Luck!</h2>";
            ?>
            </div>
        </div>
        <?php require __DIR__."/includes/scripts.php"; ?>
    </body>
</html>