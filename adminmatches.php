<?php require __DIR__."/includes/bundle.php"; ?>
<html>
<head>
    <title> Super Arrows Admin Page</title>
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
        <h1>Welcome Admin</h1>
        <form method="POST" action="submittedMatches.php">
            <?php

                $playerf = new PlayerFactory($db);
                $m = $playerf->getAllPlayers();

                $rf = new RoundFactory($db);
                $rounds = $rf->getAllRounds();

                echo "Round: <select name='round' class='black-input'>";
                foreach($rounds as $round) {
                    echo "<option value='$round->id'>$round->id ($round->startdate - $round->enddate)</option>";
                }
                echo "</select>";
                echo "<br/><br/>";

                for($i=0; $i<=5; $i++){
                    echo "<select name ='player1[]' class='black-input'>";
                    foreach($m as $player) {
                        echo "<option value='$player->id'>$player->firstname $player->lastname</option>";
                    }
                    echo "</select>";
                    echo " vs ";
                    echo "<select name ='player2[]' class='black-input'>";
                    foreach($m as $player) {
                        echo "<option value='$player->id'>$player->firstname $player->lastname</option>";
                    }
                    echo "</select>";
                    echo "<br/><br/>";
                }
                echo "<input type='submit'/>";
            ?>
        </form>
    </div>
    <?php require __DIR__."/includes/scripts.php"; ?>
</body>
</html>
